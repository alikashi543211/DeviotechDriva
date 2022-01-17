<?php

namespace App\Http\Controllers\Garage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EnquiryType;
use App\Ticket;
use App\Comment;
use App\Notifications\NewOpenedTicket;
use App\Notifications\TicketUpdate;
use App\Notifications\TicketClose;
use Mail;

class SupportTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware("sub_garage");
    }
    public function index()
    {
        $tickets = Ticket::whereUserId(auth()->user()->id)->get();
        return view('garage.support.my_tickets', get_defined_vars());
    }

    public function detail($ticket_id)
    {
        $ticket = Ticket::whereTicketId($ticket_id)->first();
        return view('garage.support.tickets', get_defined_vars());
    }

    public function open_ticket()
    {
        $enquiry_types = EnquiryType::all();
        return view('garage.support.open_ticket', get_defined_vars());
    }

    function save_ticket(Request $req)
    {
        $req->validate([
            'subject' => 'required|max:191',
            'enquiry_type_id' => 'required',
            'priority' => 'required',
            'description' => 'required'
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'enquiry_type_id' => $req->enquiry_type_id,
            'ticket_id' => strtoupper(str_random(10)),
            'subject' => $req->subject,
            'priority' => $req->priority,
            'description' => $req->description,
        ]);
        $user=auth()->user();
        $details = [
            'msg' => 'You have opened ticket #'.$ticket->ticket_id,
        ];

        $user->notify(new NewOpenedTicket($details));
        Mail::send('emails.garage.support',['user' => $user,'ticket_id'=>'#'.$ticket->ticket_id], function ($send) use($user){
            $send->to($user['email'])->subject('Support');
        });
        return back()->with('success', 'You have opened a ticket');
    }

    public function save_comment(Request $req)
    {
        $req->validate([
            'comment' => 'required',
        ]);
        $comment = new Comment();
        $comment->ticket_id = $req->ticket_id;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $req->comment;
        $comment->save();
        $user=auth()->user();
        $details = [
            'msg' => 'Ticket #'.$req->ticket_id.' has an update',
        ];

        $user->notify(new TicketUpdate($details));
        return back()->with('success', 'You have submitted a reply to your ticket');
    }

    public function close_ticket($id)
    {
        $ticket = Ticket::find($id);
        $ticket->status = 'closed';
        $ticket->save();
        $user=auth()->user();
        $details = [
            'msg' => 'Ticket #'.$ticket->ticket_id.' has been closed',
        ];
        $user->notify(new TicketClose($details));
        Mail::send('emails.garage.support_status_change',['user' => $user,'ticket_id'=>'#'.$ticket->ticket_id], function ($send) use($user){
            $send->to($user['email'])->subject('Support-Status change');
        });
        return redirect()->route('garage.tickets')->with('success', 'You have successfully closed your ticket');
    }
}
