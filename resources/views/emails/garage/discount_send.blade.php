@extends('emails.layout')
@section('subject', 'Discount Offer')
@section('content')
<div>
    <h1 align="center" style="color: #06090f;font-size:24px;font-weight:bold;margin-top: 30px;text-transform:none;font-family: sans-serif;line-height: 1.4;margin-bottom: 30px;">{{ $subject }}</h1>
</div>
<p style="font-family: sans-serif;text-align:center;color:grey;font-size:16px;margin-bottom: 30px;">{{ $discount->message }}</p>

<div style="text-align: center; justify-content: center; margin: 0 auto;">
    @foreach (explode(",", $discount->services) as $s)
        <img src="{{ asset(getService($s)->image) }}" width="40" style="z-index:999; margin-right: 10px;" alt="">
    @endforeach
</div>


@endsection
