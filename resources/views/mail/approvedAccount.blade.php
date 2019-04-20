<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Infinite-Funds</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 300;
            color: #4d4d4d;
        }

        a {
            text-decoration: none !important;
            color: #2980b9 !important;
            font-weight: 400 !important;
        }

        :active, :focus {
            outline: 0 !important;
        }

        p {
            margin-bottom: .25em;
           font-size: 1.1em;
        }

        p.small {
            font-size: 0.75em;
            margin-top: .5em;
            color: #adadad;
        }

        #emailContainer {
            width: 100%;
            max-width: 800px;
        }

        #emailBody {
            border-radius: 3px;
            background-color: #ffffff;
            box-shadow: 4px 7px 21px 0 rgba(0, 1, 1, 0.06);
            padding: 15px 0;
        }

        .logo > img {
            max-height: 65px;
        }

        .logo {
            font-size: 2.5em;
            font-weight: 700;
        }
.style2 {color: #0066CC;padding-left:10px;}
    </style>

</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4F4F4" style="margin: 0 auto">
    <tr>
        <td align="center" valign="top">
          <table border="0" cellpadding="0" cellspacing="0" id="emailContainer">
                <tr>
                    <td align="center" valign="top" style="height: 100px"> </td>

                </tr>
                <tr>
                    <td align="center" valign="top" style="padding-bottom:30px;">
                        <table border="0" cellpadding="20" cellspacing="0" width="90%" id="emailBody" valign="top">
                            <tr>
                                <td align="center">
                                    <h2 style="margin-top: 0">Congratulations Your Account Has Been Approved!</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                               
                                   <p>Dear {{ $data['name'] }}, </p>
                                   
                                   
                                      
                                       <p>Thank you for opening an account with ESPFX. As one of the leaders in this industry, we can assure you that our products and our services will not disappoint you. <br>
                                  </p>
                                        <p><b>Username :</b> {{ $data['slug'] }}</p>
                                  <p><b>Date Activated :</b>	{{ $data['approve_date'] }}</p>
								  <p><a href="http://infinite-funds.com/login" style='font-family: "Helvetica Neue",Arial; border-collapse: collapse;padding: 11px 20px;
    color: rgb(51, 49, 49);
    font-size: 16px;
    background-color: rgb(243, 216, 30);'>Login to your account</a></p>
                                        <br>
                                       
                                  <p>Warm Regards,</p>
                                  <p>Infinite-Funds</p>
                                      
                              </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Email: <u>support@infinite-funds.com</u></p>
                              </td>
                            </tr>
                        </table>
                    </td>
                </tr>
          
          </table>
        </td>
    </tr>
</table>
</body>

</html>