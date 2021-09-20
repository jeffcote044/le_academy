<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:500px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:0;background:#101010;">
              <img src="{{asset('img/mails/mail_approved.jpg')}}" alt="Bienvenido"  style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:36px 30px 42px 30px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif; ">Hola! {{$user->name}} Tu pago ha sido confirmado</h1>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">Quiero darte la bienvenida, tu compra ha sido aprobada con éxito y ahora tendrás acceso a toda la información que este curso incluye.</p>
                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><a href="https://pediatraleonardoescobar.com/" style="color:#0077ff;text-decoration:underline;"><b>Entra aquí para acceder a tu contenido</b></a></p>
                  </td>
                </tr>
                <tr>
                    <td class="esd-structure" align="left">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-block-text " bgcolor="#eeeeee" align="left">
                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="80%">
                                                                        <h4 style="padding-left: 1rem">Confirmación de tu compra</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>

                </tr>
                <tr>
                    <td class="esd-structure  " align="left">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-block-text " align="left">
                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 5px 10px 5px 0" width="80%" align="left">
                                                                        <p>{{$course->title}}</p>
                                                                    </td>
                                                                    <td style="padding: 5px 0" width="20%" align="left">
                                                                        <p>{{$course->finalPrice}} US$</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="esd-structure" align="left">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-container-frame" width="530" valign="top" align="center">
                                        <table style="border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;" width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-block-text " align="left">
                                                        <table style="width: 500px;" class="cke_show_border" cellspacing="1" cellpadding="1" border="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="80%">
                                                                        <h4>TOTAL</h4>
                                                                    </td>
                                                                    <td width="20%">
                                                                        <h4>{{$course->finalPrice}} US$</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background:#b6b6b6;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#333333;">
                      &reg; <b>Pediatra Leonardo Escobar</b> 2021<br/>
                    </p>
                  </td>
                  <td style="padding:0;width:50%;" align="right">
                    <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                      <tr>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.facebook.com/pediatraleonardoescobar" style="color:#ffffff;"><img src="{{secure_asset('img/icons/rrss/facebook.svg')}}" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.instagram.com/pediatraleonardoescobar" style="color:#ffffff;"><img src="{{secure_asset('img/icons/rrss/instagram.svg')}}" alt="Instagram" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.youtube.com/channel/UCt1o9WcVgd7cpDsOUpU8zVg" style="color:#ffffff;"><img src="{{secure_asset('img/icons/rrss/youtube.svg')}}" alt="Youtube" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                        <td style="padding:0 0 0 10px;width:38px;">
                            <a href="https://www.tiktok.com/@pediatraleonardoescobar" style="color:#ffffff;"><img src="{{secure_asset('img/icons/rrss/tiktok.svg')}}" alt="TikTok" width="38" style="height:auto;display:block;border:0;" /></a>
                        </td>
                      </tr>
                    </table>
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
