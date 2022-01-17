  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Verify Email - Driva</title>
  
  </head>
  <body>

  <table width="100%" style="border-collapse: collapse;background:lightgrey;" class="verify_email_table">
      <tr>
          <td width="5%"></td>
          <td align="center" width="90%">
              <table class="verify_email_table_inner" style="border-collapse: collapse;background:white;margin:50px;border:none;border-radius:0px;">
                  <tr>
                      <td align="center"><br><img height="40" width="50" src="{{asset('assets/app-assets/images/logo/favicon.png')}}"> <img height="40" width="120" src="{{asset('assets/app-assets/images/logo/logo-text.png')}}"></td>
                  </tr>
                  <tr>
                    <td align="center"><h3>Verify your email address</h3></td>
                </tr>
                <tr>
                  <td align="center"><p style="color:grey;margin-left:10px;margin-right:10px;">Please confirm that you want to use this as Driva account email address. Once it's done then you will be able to start booking.</p></td>
              </tr>
              <tr>
                <td align="center"><p style="background:#ea5455;border-radius:8px;padding:10px;margin-left:auto;margin-right:auto;width:400px;"><a style="color:white;font-size:18px;height:40px;width:200px;font-weight:bold;text-decoration:none;border-radius:5px;padding:10px;font-family:arial;margin-left:auto;margin-right:auto;" class="verify_btn" href="{{route('consumer.verify_email',base64_encode($user['email']))}}">Verify my email</a></p></td>
            </tr>
            <tr>
              <td align="center"><p style="color:grey;">Or paset link in the browser</p></td>
          </tr>
          <tr>
            <td align="center"><p style="color:grey;font-weight:bold;margin-left:10px;margin-right:10px;">{{route('consumer.verify_email',base64_encode($user['email']))}}</p></td>
        </tr>
              </table>
          </td>
          <td width="5%"></td>
      </tr>

      <tr>
        <td width="5%"></td>
        <td align="center" width="80%" class="verify_inner_table_column">
            &copy; 2020 Driva All rights reserved<br>
            <img height="30" width="30" src="{{asset('assets/app-assets/images/logo/favicon.png')}}">
        </td>
        <td width="5%"></td>
    </tr>
  </table>


  </body>
  </html>




  </body>
  </html>
