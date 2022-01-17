<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ticket;
use App\Comment;
use App\Report;
use App\TicketAttachment;

class SupportController extends Controller
{

    public function tickets()
    {
        $open_tickets = Ticket::whereStatus('open')->get();
        $close_tickets = Ticket::whereStatus('closed')->get();
        return view('Admin.support.enquiries', get_defined_vars());
    }

    public function detail($ticket_id)
    {
        $ticket = Ticket::whereTicketId($ticket_id)->first();
        return view('Admin.support.enquiry_detail', get_defined_vars());
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

        return back()->with('success', 'Reply Successfuly Sent');
    }

    public function close_enquriy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->status = 'closed';
        $ticket->save();

        return redirect()->route('admin.support.enquiries')->with('success', 'Ticket Closed with the Ticket ID #'.$ticket->ticket_id);
    }

     public function reports()
    {
        $open_reports = Report::where("status","open")->get();
        $closed_reports = Report::where("status","closed")->get();
        return view('Admin.support.reports', get_defined_vars());
    }
}
