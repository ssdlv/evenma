@extends('template.mail.layout')

@section('section-image')
    <table cellspacing="0" cellpadding="0" align="left" border="0" width="100%" bgcolor="#ffffff">
        <tr>
            <td valign="top" align="center" width="100%" style="padding-right: 25px; padding-left: 25px;">
                <img width="100%" style="max-width: 600px; height: auto" src="https://s3.amazonaws.com/growth.lyft.com/Business/Images/Hero%20Images/Verifyemail_hero%402x.png" alt="Lyft business profile" />
            </td>
        </tr>
    </table>
@endsection
@section('section-text')
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px;">
        <tr>
            <td style="font-family: 'LyftPro-Bold', Arial, Helvetica, sans-serif; font-size: 14px; line-height: 1.0; color: #000000; font-weight: bolder; text-transform: uppercase; padding: 25px 25px 5px 25px;" class="mso-line-solid">
                YOU'RE ONE STEP AWAY
            </td>
        </tr>
        <tr>
            <td style="font-family: 'LyftPro-Bold', Arial, Helvetica, sans-serif; font-size: 52px; line-height: 1.0; color: #000000; font-weight: bolder; padding: 0 25px 15px 25px;" class="mso-line-solid mobile-headline">
                {{ $title }}
            </td>
        </tr>
        <tr>
            <td style="font-family: 'LyftPro-Regular', Arial, Helvetica, sans-serif; font-size: 18px; line-height: 1.4; color: #000000; padding: 0 25px 50px 25px;">
                To complete your profile and start publishing your events with Evenma, you need to verify your email address.
            </td>
        </tr>

        <!-- CTA -->
        <tr>
            <td align="center" style="padding: 0 25px 30px 25px; background-color: #ffffff;">
                <table align="center" cellpadding="0" cellspacing="0" border="0" class="full-width">
                    <tr>
                        <td class="cta-shadow" align="center" bgcolor="#FF00BF" style="border-radius: 40px; -webkit-border-radius: 40px; -moz-border-radius: 40px;">
                            <a href="{{ $url }}" target="_blank" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 1.0; font-weight: bold; color: #ffffff; text-transform: uppercase; text-decoration: none; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; display: block; padding: 12px 25px 12px 25px;">
                                RESET PASSWORD
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
