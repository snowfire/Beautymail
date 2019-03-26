<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <title>{{ $senderName ?? '' }}</title>
    <style type="text/css">
    #outlook a {
        padding: 0;
    }

    .ReadMsgBody {
        width: 100%;
    }

    .ExternalClass {
        width: 100%;
    }

    .ExternalClass {
        line-height: 100%;
    }

    .ExternalClass p {
        line-height: 100%;
    }

    .ExternalClass span {
        line-height: 100%;
    }

    .ExternalClass font {
        line-height: 100%;
    }

    .ExternalClass td {
        line-height: 100%;
    }

    .ExternalClass div {
        line-height: 100%;
    }

    body {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    table {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    td {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    p {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    li {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    blockquote {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        font-family: 'Raleway', sans-serif;
        font-weight: 300;
    }

    table {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        -ms-interpolation-mode: bicubic;
    }

    body {
        margin: 0;
        padding: 0;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
    }

    table {
        border-collapse: collapse !important;
    }

    body {
        height: 100% !important;
        margin: 0;
        padding: 0;
        width: 100% !important;
    }

    #bodyTable {
        height: 100% !important;
        margin: 0;
        padding: 0;
        width: 100% !important;
    }

    #bodyCell {
        height: 100% !important;
        margin: 0;
        padding: 0;
        width: 100% !important;
    }

    @media only screen and (max-width: 640px) {
        body {
            width: auto!important;
        }
        table[class="container"] {
            width: 100%!important;
            padding-left: 20px!important;
            padding-right: 20px!important;
        }
        table[class="body"] {
            width: 100%!important;
        }
        table[class="row"] {
            width: 100% !important;
        }
        td[class="side-pad"] {
            padding-left: 20px !important;
            padding-right: 20px !important;
        }
        .img-responsive {
            width: 100% !important;
        }
        .img-center {
            margin: 0 auto !important;
        }
    }

    @media only screen and (max-width: 589px) {
        table[class="body"] .collapse {
            width: 100% !important;
        }
        table[class="body"] .column {
            width: 100% !important;
            display: block !important;
        }
        .center {
            text-align: center !important;
        }
        table[class="body"] .logo {
            margin-bottom: 10px;
        }
        table[class="body"] .remove {
            display: none !important;
        }
    }
    .information-box {
        margin: 0 auto;
        width: 540px;
        height: auto;
        padding-bottom: 20px;
        background-color: #eee;
        overflow: visible;
    }
    .doctor-image {
        /*margin: 0px 0 -10px 359px;
        padding: 0;*/
        margin-top: -80px;
        overflow: auto;
        width: 540px;
    }
    .text-center {
        text-align: center;
    }
    .waiting-room-button a{
        background-color: #96C363;
        padding: 20px;
        color: white;
        text-decoration: none;
    }
    .is-flex  {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    </style>
</head>

<body bgcolor="#DDDDDD">
    <table border="0" cellpadding="0" cellspacing="0" style="background-color: #DDDDDD" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" width="640">
                    <tr class="logo-section">
                        <td align="center" class="side-pad" style="background-color: #ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="container" width="600">
                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row" width="580">
                                            <tr>
                                                <td height="20">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td valign="middle">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="collapse center">
                                                        <tr>
                                                            <td><img alt="" class="logo" height="21" src="{{ $logo['path'] }}" width="250" alt="Nu Image medical"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @section('content')
                    @show
                    <tr style="background-color: #414242">
                        <td align="center" class="side-pad" style="background-color: #333333">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="container" width="600">
                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row" width="580">
                                            <tr>
                                                <td align="center" height="20" valign="top">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td valign="middle">
                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" class="collapse center">
                                                        <tr>
                                                            <td><img alt="" class="logo" height="21" src="{{ $logo['path'] }}" width="123" alt="Nu Image medical"></td>
                                                        </tr>
                                                    </table>
                                                    <table align="right" border="0" cellpadding="0" cellspacing="0" class="collapse center">
                                                        <tr>
                                                            <td height="22" style="font-size:13px;"><span style="text-decoration:none;color:#e6e4d6;"><a href="#" style="text-decoration:none;color:#e6e4d6;">Unsubscribe</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration:none;color:#e6e4d6;"><a href="#" style="text-decoration:none;color:#e6e4d6;">Send to a Friend</a></span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" class="side-pad" style="background-color: #383939">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="container" width="600">
                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="row" width="580">
                                            <tr>
                                                <td height="4"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="collapse center">
                                                        <tr>
                                                            <td valign="top"><span style="color:#aaa;font-size:11px;text-decoration:none;">401 East Jackson St. Suite 2340 Tampa, FL 33602</span></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="4"></td>
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
