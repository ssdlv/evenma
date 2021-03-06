<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
@include('template.mail.head')
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: 'Open Sans', Arial, sans-serif;" align="center" id="body">
<custom type="content" name="ampscript">
    <!-- FULL PAGE WIDTH WRAPPER WITH TINT -->
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" bgcolor="#f3f3f5" valign="top" width="100%">
                <!--========= WHITE PAGE BODY CONTAINER/WRAPPER========-->
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="mobileView" width="600" style="">
                    <tr>
                        <td align="center" bgcolor="#FFFFFF" style="padding:0px;" width="100%">

                            <!--================================SECTION 0==========================-->
                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;background-color:#625a9c;" width="600">
                                <tr>
                                    <td bgcolor="#FFD6E5" class="" style="width:100% !important; padding: 0;background-color:#ffffff;">
                                        <!--========Paste your Content below=================-->
                                        <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                                            <tr>
                                                <td class="divider" align="center" height="16px" style="background-color: #F3F3F5;">
                                                </td>
                                            </tr>
                                        </table>
                                        <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                                            <tr>
                                                <td align="center" height="25px" style="background-color: #FFFFFF;">
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- BEGIN LOGO -->
                                        <table cellspacing="0" cellpadding="0" align="left" border="0" width="100%" bgcolor="#ffffff">
                                            <tr>
                                                <td valign="top" align="left" width="100%" style="padding-left: 25px;">
                                                    <img style="max-width: 150px; height: auto" src="https://s3.amazonaws.com/growth.lyft.com/Business/Logos/Business_LogoPink%402x.png" alt="Evenma for Business" />
                                                </td>
                                            </tr>
                                        </table>
                                        <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                                            <tr>
                                                <td align="center" height="25px" style="background-color: #FFFFFF;">
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- END LOGO -->

                                        <!-- nothing -->

                                        <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>
                            <!--=======END SECTION==========-->

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <custom type="content" name="hero_image">
                                            <!--========Paste your Content below=================-->

                                            <!-- nothing -->

                                            <!--BEGIN HERO IMAGE -->
                                            @yield('section-image')
                                            <!--END HERO IMAGE-->

                                            <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                                                <tr>
                                                    <td align="center" height="25px" style="background-color: #FFFFFF;">
                                                    </td>
                                                </tr>
                                            </table>

                                            <!--BEGIN TEXT SECTION-->
                                            @yield('section-text')
                                            <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                                                <tr>
                                                    <td align="center" height="25px" style="background-color: #FFFFFF;">
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--END TEXT SECTION -->

                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <custom type="content" name="notification-banner">
                                            <!--========Paste your Content below=================-->

                                            <!-- nothing -->

                                            <!-- nothing -->

                                            <!--BEGIN HELP SECTION -->
                                            <table cellspacing="0" cellpadding="0" align="center" border="0" width="80%" bgcolor="#ffffff">
                                                <tr>
                                                    <td valign="top" align="center" width="100%">
                                                        <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#EFEFF1">
                                                            <tr>
                                                                <td align="center" height="25px" style="background-color: #EFEFF1;">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#EFEFF1" style="max-width: 600px; background-color: #EFEFF1;">
                                                            <tr>
                                                                <td align="center" style="padding: 0px;">
                                                                    <table align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#EFEFF1">
                                                                        <tr>
                                                                            <td align="center" valign="top" style="padding: 25px 25px 25px 25px; background-color: #EFEFF1;">
                                                                                <img src="https://s3.amazonaws.com/growth.lyft.com/Business/Icons/Module%203_email_icon%402x.png" width="50" border="0" style="display: inline-block; width: 50px; height: auto; outline: none;">
                                                                            </td>
                                                                            <td align="left" style="font-family: 'LyftPro-Regular', Arial, Helvetica, sans-serif; font-size: 18px; line-height: 1.4; color: #000000; padding: 15px 15px 15px 0; background-color: #EFEFF1;">
                                                                                Have a question? <br />
                                                                                <a href="{{ route('about') }}" style="color: #ff00bf;">Reach out to our team</a>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#EFEFF1">
                                                            <tr>
                                                                <td align="center" height="25px" style="background-color: #EFEFF1;">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--END HELP SECTION -->
                                            <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                                                <tr>
                                                    <td align="center" height="50px" style="background-color: #FFFFFF;">
                                                    </td>
                                                </tr>
                                            </table>
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->

                                        <!-- nothing -->

                                        <!--END TEXT SECTION -->
                                        <!--=======End your Content here=====================-->

                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-02">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-03">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-04">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-05">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-06">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-07">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-08">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-09">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <table align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" class="fullScreen" style="width:100% !important;" width="600">
                                <tr>
                                    <td bgcolor="" class="" style="width:100% !important; padding: 0;">
                                        <!--========Paste your Content below=================-->
                                        <custom type="content" name="section-10">
                                            <!--=======End your Content here=====================-->
                                    </td>
                                </tr>
                            </table>

                            <!--=================FOOTER=====================-->
                            <table align="center" cellpadding="0" cellspacing="0" width="100%" style=" width:100% !important;">
                                <tr>
                                    <td align="center" valign="middle" style="padding: 0 25px 0 0;"></td>
                                    <td width="100%" align="center" valign="middle" style="border-top: 1px solid #d8d8d8;"></td>
                                    <td align="center" valign="middle" style="padding: 0 25px 0 0;"></td>
                                </tr>
                            </table>
                            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="mobileView" style="width:100% !important;" width="600">
                                <tr>
                                    <td>
                                        <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="mobileView" style="" width="100%">
                                            <tr>
                                                <td align="left" style="color: #88888f; font-family: 'LyftPro-Regular', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight:normal; padding: 10px 0px 0px 25px;" valign="middle" width="100%">
                                                    <a class="footerLinks" href="{{ route ('contact') }}" style=" text-decoration: none; color: #88888f" target="_blank"><span class="contact">Contact</span></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="color: #88888f; font-family: 'LyftPro-Regular', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; line-height:18px; font-weight: normal; padding: 10px 0px 0px 25px; text-decoration: none;" valign="middle">
                                                    El Kadi Iass Street, nr. 4, 20000 Casablanca, Morocco
                                                    <br/>&#169;{{ date ('Y') }}, made with <i class="material-icons">favorite</i> by
                                                    <a href="{{ route ('home') }}" target="_blank">{{ env ('APP_NAME') }} </a> for a better event.</td>
                                            </tr>
                                            <!--===========CUSTOMER ACTIONS===========-->
                                        </table>
                                        <!--=============END CUSTOMER ACTIONS========-->
                                    </td>
                                </tr>
                                <tr>
                                    <td width="auto" style="display: block;" height="40">&nbsp;</td>
                                </tr>
                            </table>
                            <!--=================END FOOTER=====================-->

                        </td>
                    </tr>
                </table>
                <!-- END WHITE PAGE BODY CONTAINER/WRAPPER -->
                <table cellspacing="0" cellpadding="0" align="center" border="0" width="100%" bgcolor="#F3F3F5">
                    <tr>
                        <td class="divider" align="center" height="16px" style="background-color: #F3F3F5;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- FULL PAGE WIDTH WRAPPER WITH TINT -->

    <!-- McGuyver'ed Android Gmail Spacer Fix -->

    <table border="0" cellpadding="0" cellspacing="0" class="hideDevice">
        <tr>
            <td class="hideDevice" height="1" style="min-width:700px; font-size:0px; line-height:0px;">
                <img height="1" src="http://image.lyftmail.com/lib/fe6915707166047a7d14/m/8/Spacer+for+Gmail.gif" style="min-width: 700px; text-decoration: none; border: none; -ms-interpolation-mode: bicubic;">
            </td>
        </tr>
    </table>

    <!--END FIX-->

    <!-- RETURNPATH TRACKING -->
    <table border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td border="0" align="center" height="1" style="font-size:0px; line-height:0px;">
                <img src="https://pixel.inbox.exacttarget.com/pixel.gif?r=4a4f30aa41389e0aba9e92c56574b86e3fc20465" width="1" height="1" />
                <img src="https://pixel.app.returnpath.net/pixel.gif?r=4a4f30aa41389e0aba9e92c56574b86e3fc20465" width="1" height="1" />
            </td>
        </tr>
    </table>
    <!-- END RETURNPATH  TRACKING -->
    <custom name="opencounter" type="tracking" style="display:none;">

        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
</body>
</html>
