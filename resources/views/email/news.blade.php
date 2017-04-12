<!doctype html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        
        img {
            -ms-interpolation-mode: bicubic;
        }
        /* RESET STYLES */
        
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
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }
        /* iOS BLUE LINKS */
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* MOBILE STYLES */
        
        @media screen and (max-width: 600px) {
            .img-max {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
            }
            .max-width {
                max-width: 100% !important;
            }
            .mobile-wrapper {
                width: 85% !important;
                max-width: 85% !important;
            }
            .mobile-padding {
                padding-left: 5% !important;
                padding-right: 5% !important;
            }
        }
        /* ANDROID CENTER FIX */
        
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; padding: 0; !important background-color: #ffffff;" bgcolor="#ffffff">

    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        Lorem ipsum dolor que ist
    </div>

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" valign="top" width="100%" background="bg.jpg" bgcolor="#3b4a69" style="background: #3b4a69 url('bg.jpg'); background-size: cover; padding: 50px 15px;"
                class="mobile-padding">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                            <h1 style="font-size: 40px; color: #ffffff;">Сүүлийн үеийн мэдээ</h1>
                            <p style="color: #b7bdc9; font-size: 20px; line-height: 28px; margin: 0;">
                                Ардчилсан Залуучуудын Холбоо
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" height="100%" valign="top" width="100%" bgcolor="#f6f6f6" style="padding: 50px 15px;" class="mobile-padding">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 0 0 25px 0; font-family: Open Sans, Helvetica, Arial, sans-serif;">
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td align="center" bgcolor="#ffffff" style="border-radius: 3px 3px 0 0;">
                                        <img src="{{ asset($news->image) }}" width="600" height="200" alt="insert alt text here" style="display: block; border-radius: 3px 3px 0 0; font-family: sans-serif; font-size: 16px; color: #999999;"
                                            class="img-max" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" bgcolor="#ffffff" style="border-radius: 0 0 3px 3px; padding: 25px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif;">
                                                    <h2 style="font-size: 20px; color: #444444; margin: 0; padding-bottom: 10px;">{{$news->title}}</h2>
                                                    <p style="color: #999999; font-size: 16px; line-height: 24px; margin: 0;">
                                                       {!! $news->short_description !!}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 30px 0 0 0;">
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" style="border-radius: 26px;" bgcolor="#75b6c9">
                                                                <a href="{{ url('news', $news->id) }}" target="_blank" style="font-size: 16px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 26px; background-color: #202A61; padding: 14px 26px; border: 1px solid #202A61; display: block;">Дэлгэрэнгүй &rarr;</a>
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
            </td>
        </tr>
    </table>

</body>

</html>