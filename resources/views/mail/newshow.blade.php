<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
        a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]-->
    <!--[if !mso]> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!--<![endif]-->
</head>

<body>
<div class="es-wrapper-color">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#ffffff"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" style="background-position: center top;" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="esd-email-paddings" valign="top">
                <table class="es-header" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" esd-custom-block-id="15610" align="center">
                            <table class="es-header-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
                                <tbody>
                                <tr>
                                    <td class="esd-structure" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td class="esd-container-frame" width="600" valign="top" align="center">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="esd-block-image es-p20b" align="center">
                                                                <a href="{{ url('/redirect') }}" target="_blank"><img src="{{ asset('assets/images/logo-light.png') }}" alt="" style="display: block;" width="154"></a>
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
                    </tbody>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" align="center">
                            <table class="es-content-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
                                <tbody>
                                <tr>
                                    <td class="esd-structure" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                            <tr>
                                                <td class="esd-container-frame" width="600" valign="top" align="center">
                                                    <table style="border-radius: 3px; border-collapse: separate; background-color: rgb(252, 252, 252);" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc">
                                                        <tbody>
                                                        <tr>
                                                            <td class="esd-block-text es-m-txt-l es-p30t es-p20r es-p20l" align="left">
                                                                <h3 style="color: #333333;">Hello {{ $data->surname }} {{ $data->name }}</h3>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
                                                                <p>You have been invited as a guest for a show. below are more details.<br/></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Title:</td><th> {{$show->name  }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Host:</td><th> {{$show->getHost()  }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Guest:</td><th> {{$show->getGuest()  }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Guest Status:</td><th> {{$show->guest_status  }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Date:</td><th> {{$show->date  }}</th>
                                                        </tr>

                                                        <tr>
                                                            <td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
                                                                <p>Would you be available?<br/></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="{{ url('/accept-show/'.$show->id) }}" target="_blank">ACCEPT</a></td>
                                                            <th><a href="{{ url('/decline-show/'.$show->id) }}" target="_blank">DECLINE</a></th>
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
                                    <td class="esd-structure es-p30t es-p20r es-p20l" style="background-color: rgb(252, 252, 252);" esd-custom-block-id="15791" bgcolor="#fcfcfc" align="center">
                                        <table width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>

                                            <tr>
                                                <td class="esd-structure" align="left">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                <table style="border-radius: 3px; border-collapse: separate; background-color: rgb(252, 252, 252);" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
                                                                            {{--<p>Click on <a href="https://ops.ibedc.com/download/ops-manager"> this link</a>  to download the mobile application</p>--}}

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
                                                                            <p>Visit <a href="https://ops.ibedc.com/redirect"> https://ops.ibedc.com </a>  to login.</p>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="esd-block-text es-p10t es-p20r es-p20l" bgcolor="#fcfcfc" align="left">
                                                                            <p>Thank you</p>
                                                                            <p style="color:#003057">Ibadan Electricity Distribution Company Plc</p>
                                                                            <a style="color:#003057" href="http://tvshowmanager.herokuapp.com/">TVPMS </a>

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
                                            <table class="es-header" cellspacing="0" cellpadding="0" align="center">
                                                <tbody>
                                                <tr>
                                                    <td class="esd-stripe" esd-custom-block-id="15610" align="center">
                                                        <table class="es-header-body" style="background-color: transparent;" width="600" cellspacing="0" cellpadding="0" align="center">
                                                            <tbody>
                                                            <tr>
                                                                <td class="esd-structure" align="left">
                                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="600" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <footer class="footer" style="width: 100%; min-height: 40px; max-height:60px; background-image: url('{{asset('/assets/img/footer.png')}}'); background-size: 100% 100%;">

                                                                                        </footer>
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
                                                </tbody>
                                            </table>
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
        </tbody>
    </table>
</div>
</body>

</html>