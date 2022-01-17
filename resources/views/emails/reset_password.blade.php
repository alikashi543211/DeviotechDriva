@extends('emails.layout')
@section('subject', 'Reset your password')
@section('content')
<div>
    <h1 align="center" style="color: #06090f;font-size:24px;font-weight:bold;margin-top: 30px;text-transform:none;font-family: sans-serif;line-height: 1.4;margin-bottom: 30px;">Reset your password</h1>
</div>
<p style="font-family: sans-serif;text-align:center;color:grey;font-size:16px;margin-bottom: 30px;">We received your request to reset your password. You can reset your password with the link below.</p>

<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;min-width: 100%;width: 100%;box-sizing: border-box;">
    <tbody>
        <tr>
            <td style="font-family: sans-serif;font-size: 14px;vertical-align: top;background-color: #ea5455;border-radius: 5px;text-align: center;" align="center">
                <table role="presentation" border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: separate;mso-table-lspace: 0pt;mso-table-rspace: 0pt;min-width: 100%;width: 100%;">
                    <tbody>
                        <tr>
                            <td> <a style="font-family: sans-serif;font-size: 14px;vertical-align: top;background-color: #ea5455;border-radius: 5px;text-align: center;"> <a style="text-decoration: none;box-sizing: border-box;text-transform: capitalize;cursor: pointer;font-size: 14px;font-weight: bold;margin: 0;padding: 12px 25px;display: inline-block; border: solid 1px #ea5455;border-color: #ea5455;border-radius: 5px;color: #ffffff;" href="{{route('login.reset_password',base64_encode($email))}}" target="_blank">Reset my password</a> </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<div align="center"><p style="font-family: sans-serif;color:grey;font-size:16px;margin-top: 30px;margin-bottom: 0px;">Paste link into your browser</p></div>
<div align="center"><p style="font-family: sans-serif;color:#5c5cf1;font-size:15px;font-weight:bold;word-break: break-all;">{{route('login.reset_password',['email'=>base64_encode($email)])}}</p></div>

@endsection
