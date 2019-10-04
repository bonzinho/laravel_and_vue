<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>

    <!-- Define Charset -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <meta name="viewport" content="width=600,initial-scale = 2.3,user-scalable=no">

    <link href='https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i' rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,500,300,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Hind+Siliguri:400,300,500,600,700' rel='stylesheet' type='text/css'>

    <title>#FEUPWorld</title>

    <style type="text/css">t

        body{
            width: 100%;
            background-color: #ffffff;
            margin:0;
            padding:0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;
        }

        p,h1,h2,h3,h4{
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            padding-bottom:0;
        }

        span.preheader{display: none; font-size: 1px;}

        html{
            width: 100%;
        }

        table{
            font-size: 14px;
            border: 0;
        }


        /* ----------- responsivity ----------- */
        @media only screen and (max-width: 798px){
            body[yahoo] .hide-800{display: none !important;}
            body[yahoo] .container800{width: 100% !important;}
            body[yahoo] .container800_img{width: 50% !important;}
            body[yahoo] .section800_img img{width: 100% !important; height: auto !important;}
            body[yahoo] .half-container800{width: 49% !important;}
        }

        /* ----------- responsivity ----------- */
        @media only screen and (max-width: 640px){

            /*------ top header ------ */
            body[yahoo] .main-header{font-size: 20px !important;}
            body[yahoo] .main-section-header{font-size: 40px !important;}
            body[yahoo] .show{display: block !important;}
            body[yahoo] .hide{display: none !important;}
            body[yahoo] .align-center{text-align: center !important;}
            body[yahoo] .display-block{display: block !important;}
            body[yahoo] .no-bg{background: none !important;}

            /*----- main image -------*/
            body[yahoo] .main-image img{width: 440px !important; height: auto !important;}

            /* ====== divider ====== */
            body[yahoo] .main-img img{width: 440px !important;}
            body[yahoo] .divider img{width: 440px !important;}

            /*-------- container --------*/
            body[yahoo] .container590{width: 440px !important;}
            body[yahoo] .container580{width: 400px !important;}
            body[yahoo] .team-container590{width: 320px !important;}
            body[yahoo] .team-container580{width: 300px !important;}
            body[yahoo] .container800{width: 440px !important;}
            body[yahoo] .container800_img{width: 100% !important;}
            body[yahoo] .section800_img img{width: 100% !important;}
            body[yahoo] .half-container{width: 220px !important;}
            body[yahoo] .main-button{width: 220px !important;}

            /*-------- secions ----------*/
            body[yahoo] .section-img img{width: 320px !important; height: auto !important;}
            body[yahoo] .team-img img{width: 100% !important; height: auto !important;}

        }

        @media only screen and (max-width: 479px){
            /*------ top header ------ */
            body[yahoo] .main-header{font-size: 18px !important;}
            body[yahoo] .main-section-header{font-size: 30px !important;}

            /* ====== divider ====== */
            body[yahoo] .main-img img{width: 280px !important;}
            body[yahoo] .divider img{width: 280px !important;}

            /*-------- container --------*/
            body[yahoo] .container590{width: 280px !important;}
            body[yahoo] .container590{width: 280px !important;}
            body[yahoo] .container580{width: 260px !important;}
            body[yahoo] .team-container590{width: 280px !important;}
            body[yahoo] .team-container580{width: 260px !important;}
            body[yahoo] .container800{width: 100% !important;}
            body[yahoo] .container800_img{width: 100% !important;}
            body[yahoo] .section800_img img{width: 100% !important; height: auto !important;}
            body[yahoo] .half-container800{width: 100% !important;}
            body[yahoo] .half-container{width: 130px !important;}

            /*-------- secions ----------*/
            body[yahoo] .section-img img{width: 280px !important; height: auto !important;}
        }

    </style>
</head>


<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f5f6f7" mc:repeatable="promail" mc:variant="big title" class="editablr">
        <tbody class="nana ui-sortable">

        <tr class="tata2 tata">
            <td align="center" class="section-img sasa sasa2 ui-resizable">
                <a href="https://web.fe.up.pt/~feupworld">
                    <img editable="true" mc:edit="video_img" width="100%" border="0" style="display: block;" src="{{asset("storage/guest/banner_default.jpg")}}">
                </a>
            </td>
        </tr>
        </tbody>
</table>

@foreach($newsletter->noticias as $noticia)
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f5f6f7" mc:repeatable="promail" mc:variant="headline and text" class="editablr">

    <tbody class="nana ui-sortable">
    <tr class="tata">
        <td height="35" style="font-size: 35px; line-height: 35px;">
        </td>
    </tr>
    <tr class="tata2 tata">
        <td align="center" class="section-img sasa sasa2 ui-resizable">
            <!-- ======= image ======= -->
            @if($noticia->link != "")
                <a class="edit_img" href="{{$noticia->link}}" target="_blank" style="display: block; border-style: none !important; border: 0 !important;">

            @else
                <a href="https://web.fe.up.pt/~feupworld" target="_blank">
            @endif
            <img editable="true" mc:edit="video_img" width="590" border="0" style="display: block;" src="{{asset("storage/noticias/images/{$noticia->photo}")}}" alt=""></a>
        </td>
    </tr>
    <!-- ======= end section ======= -->
    <tr class="tata">
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                <tbody class="nana ui-sortable"><tr class="tata2" style="display: table-row; opacity: 1;"><td height="15" style="font-size: 15px; line-height: 15px;" class="sasa sasa2 ui-resizable">&nbsp;</td></tr><tr class="tata2">
                    <td align="left" mc:edit="main-header4" kb:edit="main-header4" style="color: #333333; font-size: 16px; font-family: 'Work Sans', sans-serif; font-weight: 500; mso-line-height-rule: exactly; line-height: 20px;" class="align-center sasa">
                        <!-- ======= section header ======= -->
                        <div class="edit_text" style="line-height: 20px;">
                            <multiline>
                                @if($noticia->link != "")
                                    <a href="{{$noticia->link}}" target="_blank" style="color:#8C2D19; text-decoration:none;">
                                        <strong>{{ $noticia->title }}</strong>
                                    </a>
                                @else
                                    <a href="https://web.fe.up.pt/~feupworld" target="_blank" style="color:#8C2D19; text-decoration:none;">
                                        <strong>{{$noticia->title}}</strong>
                                    </a>
                                @endif
                            </multiline>
                        </div>
                    </td>
                </tr>

                <tr class="tata2"><td height="15" style="font-size: 15px; line-height: 15px;" class="sasa sasa2 ui-resizable">&nbsp;</td></tr>

                <tr class="tata2">
                    <td align="left" mc:edit="main-text4" kb:edit="main-text4" style="color: #888888; font-size: 14px; font-family: Muli, sans-serif; mso-line-height-rule: exactly; line-height: 23px;" class="align-center sasa">
                        <div class="edit_text" style="line-height: 23px">
                            <!-- ======= section text ======= -->
                            <multiline>
                                @if($noticia->intro_text === "" || $noticia->intro_text === null)
                                    {!! substr($noticia->description, 0, 142) !!}
                                    @else
                                    {{ $noticia->intro_text }}
                                @endif

                                @if($noticia->link != "")
                                    <a href="{{$noticia->link}}" target="_blank">Ver mais</a>
                                    @else
                                    <a href="https://web.fe.up.pt/~feupworld" target="_blank">Ver mais</a>
                                @endif
                                <p>
                                    @foreach($noticia->tags as $tags)
                                        <span>#{{$tags->tag}}</span>
                                    @endforeach
                                </p>
                            </multiline>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr class="tata">
        <td height="35" style="font-size: 35px; line-height: 35px;">&nbsp;</td>
    </tr>
    <!-- <tr class="tata"><td height="1" style="font-size: 60px; line-height: 1px;">&nbsp;</td></tr> -->

    </tbody>
</table>
@endforeach















<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" mc:repeatable="promail" mc:variant="contact section" class="editablr">

    <tbody class="nana ui-sortable"><tr class="tata"><td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td></tr>

    <tr class="tata">
        <td align="center">
            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">

                <tbody class="nana ui-sortable"><tr class="tata2">
                    <td class="sasa">
                        <table border="0" width="320" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                            <tbody>
                            <tr>
                                <!-- ======= logo ======= -->
                                <td align="left" class="align-center">
                                    <a href="https://fe.up.pt" target="_blank" style="border-style: none !important; border: 0 !important;" class="edit_img">
                                        <img editable="true" mc:edit="footer-logo" kb:edit="footer-logo" width="200" border="0" style="width: ;" src="{{asset("storage/newsletter/feup-logo.png")}}" alt="">
                                    </a>
                                </td>
                            </tr>

                            <tr><td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td></tr>

                            </tbody>
                        </table>

                        <table border="0" width="2" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                            <tbody>
                            <tr>
                                <td width="2" height="30" style="font-size: 30px; line-height: 30px;"></td>
                            </tr>
                            </tbody>
                        </table>

                        <table border="0" width="180" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                            <tbody>


                            <tr>
                                <td align="left" mc:edit="contact-text3" kb:edit="contact-text3" style="color: #0e242f; font-size: 16px; font-family: Montserrat, Calibri, sans-serif; mso-line-height-rule: exactly; line-height: 25px;" class="align-center">

                                    <!-- ======= main header ======= -->

                                    <table align="left" border="0" cellpadding="0" cellspacing="0" class="container590">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="https://twitter.com/feup_porto" style="display: block;" class="edit_img">
                                                                <img editable="true" mc:edit="twitter" kb:edit="twitter" width="30" border="0" style="display: block;" src="{{asset("storage/newsletter/twitter.png")}}" alt="">
                                                            </a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a href="https://www.facebook.com/paginafeup" style="display: block;" class="edit_img">
                                                                <img editable="true" mc:edit="facebook" kb:edit="facebook" width="30"  border="0" style="display: block;" src="{{asset("storage/newsletter/facebook.png")}}" alt="">
                                                            </a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a href="https://www.linkedin.com/school/6498/" style="display: block;" class="edit_img">
                                                                <img editable="true" mc:edit="linkden" kb:edit="linkden" width="30" border="0" style="display: block;" src="{{asset("storage/newsletter/linkedin.png")}}" alt="">
                                                            </a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a href="https://www.instagram.com/feup_porto/" style="display: block;" class="edit_img">
                                                                <img editable="true" mc:edit="instagram" kb:edit="instagram" width="30" border="0" style="display: block;" src="{{asset("storage/newsletter/instagram.png")}}" alt="" class="current_img">
                                                            </a>
                                                        </td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a href="https://www.youtube.com/user/FEUPtv" style="display: block;" class="edit_img">
                                                                <img editable="true" mc:edit="youtube" kb:edit="youtube" width="30" border="0" style="display: block;" src="{{asset("storage/newsletter/youtube.png")}}" alt="">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" style="height: 20px;"><div style="height: 20px"></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" style="font-size: 11px; line-height: 12px; margin-top:5px;">Veja estas e outras notícias em: <a href="https://web.fe.up.pt/~feupworld" target="_blan">www.fe.up.pt/feupworld</a></td>
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
        </td>
    </tr>

    <tr class="tata">
        <td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td>
    </tr>
    </tbody>
</table>

<!-- ======= footer ====== -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f3f0f2">

    <tbody><tr><td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td></tr>

    <tr>
        <td align="center">

            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                <tbody><tr>
                    <td>
                        <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                            <tbody><tr>
                                <td align="center" mc:edit="copy-text" kb:edit="copy-text" style="color: #a5a9b0; font-size: 14px; font-family: 'Hind Siliguiri', Calibri, sans-serif; line-height: 24px;" class="align-center">
                                    <div class="editable_text edit_text" style="line-height: 24px;">
                                        <multiline>
                                            &nbsp;Copyright 2017 All right reserved
                                        </multiline>
                                    </div>
                                </td>
                            </tr>
                            </tbody></table>

                        <table border="0" align="left" width="5" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                            <tbody><tr><td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td></tr>
                            </tbody></table>

                        <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">

                            <tbody><tr>
                                <td align="center" mc:edit="footer-navigation" kb:edit="footer-navigation" style="color: #a5a9b0; font-size: 14px; font-family: 'Hind Siliguiri', Calibri, sans-serif; line-height: 24px;">
                                    <div class="editable_text edit_text" style=" line-height: 24px;">

                                    </div>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>

                </tbody></table>
        </td>
    </tr>

    <tr><td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td></tr>

    </tbody></table>
<!-- ======= end footer ====== -->

</body>
</html>