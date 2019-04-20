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
                                    <h2 style="margin-top: 0">Withdrawal Process Request!</h2>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                      <p>Dear {{ $data['name'] }}, </p>
                                    <p>This email is to advise you that your recently submitted withdrawal request has now been processed and is on its way to your nominated account.</p>
                                     <p>Your Requested Details:  </p><br>

                                        <table width="570" border="0" cellspacing="0" cellpadding="0">
										<tr>
                                            <td width="155" height="34"><span class="style8">Full Name</span></td>
                                            <td width="18" align="center">:</td>
                                            <td width="397"><span class="style21">{{ $data['name'] }}</span></td>
                                          </tr>
                                          <tr>
                                            <td width="155" height="34"><span class="style8">Username</span></td>
                                            <td width="18" align="center">:</td>
                                            <td width="397"><span class="style21">{{ $data['user_name'] }}</span></td>
                                          </tr>
										  <tr>
                                            <td width="155" height="34"><span class="style8">Account Currency</span></td>
                                            <td width="18" align="center">:</td>
                                            <td width="397"><span class="style21">USD</span></td>
                                          </tr>
                                          <tr>
                                            <td width="155" height="33"><span class="style8">Withdrawal Amount</span></td>
                                            <td width="18" align="center">:</td>
                                            <td width="397"><span class="style21">{{ number_format($data['amount'],2) }}</span></td>
                                          </tr>
                                          <tr>
                                            <td width="155" height="33"><span class="style8">Withdrawal Fee</span></td>
                                            <td width="18" align="center">:</td>
                                            <td width="397"><span class="style21">{{ number_format($data['fee'],2) }}</span></td>
                                          </tr>
                                            <tr>
                                            <td width="155" height="33"><span class="style8">Withdrawal Total</span></td>
                                            <td width="18" align="center">:</td>
                                            <td width="397"><span class="style21">{{ number_format($data['total'],2) }}</span></td>
                                          </tr>
                                          <tr>
                                            <td height="34"><span class="style8">Wallet Address</span></td>
                                            <td align="center">:</td>
                                            <td><span class="style21">{{$data['wallet_address']}}</span></td>
                                          </tr>
										  
                                          
                                  </table>
                                
                                      
                              </td>
                            </tr>
                            <tr>
                                <td>
                                     <p>To check the status of your withdrawal request, please visit the "Withdrawal" page or lower section of the Dashboard Area and the "History" page to see details of previous withdrawals.</p>
                                    <p>To visit your dashboard area, <a href="www.infinite-funds.com">click here</a>. If you have any questions, please let me know by replying to this email.</p>
                                    <p>Kind regards,<br>
                                      <strong>Infinite-Funds Team</strong><br>
                                  </p>
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