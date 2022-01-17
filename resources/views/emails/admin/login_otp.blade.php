@extends('emails.layout')
@section('subject', 'Booking Request')
@section('content')
<div>
    <h1 align="center" style="font-size:24px;font-weight:bold;margin-top: 30px;text-transform:none;font-family:arial;">Verify your login</h1>
</div>
<p style="text-align:center;color:grey;font-size:16px;margin-bottom: 30px;">Here below is the OTP to verify your login details. </p>

<p style="text-align:center;color:grey;font-size:16px;margin-bottom: 30px;"><b>{{ $otp }}</b> </p>

<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
    <tbody>
        <tr>
            <td align="center">
                <table role="presentation" border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td> <a style="text-transform:none;" href="{{route('admin.login')}}" target="_blank">Login</a> </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
