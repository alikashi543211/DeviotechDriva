<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EnquiryType;
use App\Ticket;
use App\Comment;
use App\Notifications\NewOpenedTicket;
use App\Notifications\TicketUpdate;
use App\Notifications\TicketClose;
use Mail;
use App\TicketAttachment;

class SupportTicketController extends Controller
{
    public function index(Request $req)
    {
        if(isset($req->type))
        {
            if($req->type=="open")
            {
                $tickets=Ticket::whereUserId(auth()->user()->id)->where('status','open')->get();
            }
            elseif($req->type=="closed")
            {
                $tickets=Ticket::whereUserId(auth()->user()->id)->where('status','closed')->get();
            }
        }
        else
        {
            $tickets = Ticket::whereUserId(auth()->user()->id)->get();
        }
        if(count($tickets)>10)
        {
            $show_pagination=true;
        }else{
            $show_pagination=false;
        }
        return view('consumer.support.my_tickets', get_defined_vars());
    }

    public function detail($ticket_id=null)
    {
        $ticket = Ticket::whereTicketId($ticket_id)->first();
        return view('consumer.support.tickets', get_defined_vars());
    }

    public function detailView(Request $req)
    {
        $ticket = Ticket::whereTicketId($req->ticket_id)->first(); 
        // return sizeof($ticket);
        return view('consumer.ajax.ticket_view_main', get_defined_vars());   
    }

    public function detailSidebar(Request $req)
    {
        $ticket = Ticket::whereTicketId($req->ticket_id)->first(); 
        return view('consumer.ajax.ticket_view_sidebar', get_defined_vars());   
    }

    public function open_ticket()
    {
        $enquiry_types = EnquiryType::all();
        return view('consumer.support.open_ticket', get_defined_vars());
    }

    function save_ticket(Request $req)
    {
        // dd($req->images);
        $req->validate([
            'images' => 'max:1000|array',
            'subject' => 'required|max:191',
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'name' => $req->name,
            'email' => $req->email,
            'ticket_id' => strtoupper(str_random(10)),
            'subject' => $req->subject,
            'description' => $req->description,
        ]);
        if ($req->has('images')) {
            // dd("Ok");
            foreach($req->images as $image)
            {
                $gi = new TicketAttachment();
                $gi->ticket_id = $ticket->id;
                $gi->file = uploadFile($image, 'ticket-attachments/'.str_slug($ticket->ticket_id));
                $gi->save();
            }
        }
        $consumer=auth()->user();
        $details = [
            'msg' => 'You have opened ticket #'.$ticket->ticket_id,
        ];
        $consumer->notify(new NewOpenedTicket($details));
        Mail::send('emails.consumer.support',['user' => $consumer,'ticket_id'=>'#'.$ticket->ticket_id], function ($send) use($consumer,$ticket){
            $send->to($consumer['email'])->subject('Customer support ticket #'.$ticket['ticket_id']);
        });
        return redirect()->route("consumer.tickets")->with('success', 'You have opened a ticket');
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
        $ticket=Ticket::where("id",$req->ticket_id)->first();

        if ($req->has('images')) {
            // dd("Ok");
            foreach($req->images as $image)
            {
                $gi = new TicketAttachment();
                $gi->ticket_id = $ticket->id;
                $gi->file = uploadFile($image, 'ticket-attachments/'.str_slug($ticket->ticket_id));
                $gi->type="comment";
                $gi->comment_id=$comment->id;
                $gi->save();
            }
        }

       $consumer=auth()->user();
        $details = [
            'msg' => 'Ticket #'.$req->ticket_id.' has an update',
        ];

        $consumer->notify(new TicketUpdate($details));
        return back()->with('success', 'You have submitted a reply to your ticket');
    }

    public function close_ticket($id)
    {
        $ticket = Ticket::find($id);
        $ticket->status = 'closed';
        $ticket->save();
        $consumer=auth()->user();
        $details = [
            'msg' => 'Ticket #'.$ticket->ticket_id.' has been closed',
        ];
        $consumer->notify(new TicketClose($details));
        Mail::send('emails.consumer.support_status_change',['user' => $consumer,'ticket_id'=>'#'.$ticket->ticket_id], function ($send) use($consumer,$ticket){
            $send->to($consumer['email'])->subject('Customer support ticket #'.$ticket['ticket_id']);
        });
        return redirect()->route('consumer.tickets')->with('success', 'You have successfully closed your ticket');
    }

    public function load_tickets(Request $req)
    {
        $tickets = Ticket::whereUserId(auth()->user()->id);
        if($req->filter_key=="open")
        {
            $tickets=$tickets->where('status','open');
        }elseif($req->filter_key=="closed")
        {
            $tickets=$tickets->where('status','closed');
        }else
        {

        }
        $tickets=$tickets->get();
        if(count($tickets)>10)
        {
            $show_pagination=true;
        }else
        {
            $show_pagination=false;
        }
        return view("consumer.ajax.my_support_tickets",get_defined_vars());
    }

    public function loadTicketForm()
    {
        $enquiry_types = EnquiryType::all();
        return view("consumer.ajax.open_ticket_form",get_defined_vars());
    }
}