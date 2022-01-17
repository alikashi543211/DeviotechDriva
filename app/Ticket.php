<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id', 'ticket_id', 'subject', 'description', 'status','name','email'
    ];

    public function enquiry_type()
    {
        return $this->belongsTo(EnquiryType::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket_attachments()
    {
        return $this->hasMany(TicketAttachment::class);
    }
}
