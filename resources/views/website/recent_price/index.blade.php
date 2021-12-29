<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" Content="">
        <meta name="keywords" Content="">
        <link rel="icon" type="image/png" href="{{ asset('frontend/icons/favicon.ico') }}">
        <script src="{{ asset('frontend/marketing/js/bamis/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/marketing/js/bamis/jquery-ui.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/marketing/css/bamis/jquery-ui.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/marketing/css/bamis/easyui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/marketing/css/bamis/icon.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/marketing/css/bamis/theme.css') }}">
        <style>
            .color1 {
                background-color: #00b300;
            }

            .color2 {
                background-color: #00cc00;
            }

            .color3 {
                background-color: #00e600;
            }

            .color4 {
                background-color: #00ff00;
            }

            .color5 {
                background-color: #1aff1a;
            }

            .color6 {
                background-color: #E1E08D;
            }

            .color7 {
                background-color: #4dff4d;
            }

            .colorretail {
                background-color: #d8ae00;
            }

            .colorwholesale {
                background-color: #fbe400;
            }

            .colorgrower {
                background-color: #fff48c;
            }

            .colorup {
                color: #f0f0f0;
            }

            .colordown {
                color: #c20;
            }

            .market_price tr {
                width: 100%;
            }

            .market_price td {
                font-size: 17px;
            }

            .market_price .td_commodity {
                width: 22%;
            }

            .market_price .td_price_type {
                width: 11%;
            }

            .market_price .td_measurement {
                width: 11%;
            }

            .market_price .td_region {
                width: 8%;
            }

            body {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 12px;
                line-height: 1.42857;
                color: #222;
            }

            #bcontainer {
                height: 100%;
                position: relative;
                margin-top: -999;
                margin-right: auto;
                margin-bottom: 0;
                margin-left: auto;
                z-index: 2;
            }

            #bheader {
                background: #ff0;
                padding: 0px;
                width: 100%;
                position: fixed;
            }

            #bbody {
                padding: 0px;
                margin: 0px;
                padding-bottom: 25px;
                /* Height of the footer */
                width: 100%;
                height: 100%;
            }

            #bfooter {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 25px;
                /* Height of the footer */
                background: #006C5E;
            }

        </style>
        <style>
            @import url(../css/bangla/kalpurush.css);

            * {
                padding: 0;
                margin: 0;
                font-family: kalpurushregular !important;
                font-size: 20px;
            }

            .vticker {
                font-family: kalpurushregular !important;
                border: 1px solid green;
                width: 100%;
                font-size: 20px;
            }

            .vticker ul {
                padding: 0;
            }

            .vticker li {
                font-family: kalpurushregular !important;
                list-style: none;
                border-bottom: 1px solid #006C5E;
                padding: 0px;
            }

            .et-run {
                background: red;
            }

            .vticker a {
                font-family: kalpurushregular !important;
                font-size: 20px;
                font-weight: bold;
            }

            .heading {
                font-family: kalpurushregular !important;
                background: #090;
                color: white;
            }

            /*.market_price tr  td[rowspan] , .market_price tr:nth-child(4n) td[rowspan]  {background-color:#009900; color:#ffffff;} */
            .market_price td b {
                font-size: 18px
            }

        </style>
        <script type="text/javascript" src="{{ asset('frontend/marketing/js/bamis/easingTicker/jquery-1.8.0.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                var rowcount = 0;
                $('table td[rowspan]').parent().each(function (index) {
                    if (rowcount % 2 == 0) {
                        $(this).css('background-color', 'green');
                        $(this).next('tr').css('background-color', 'green');

                        if ($(this).next('tr').find('td[rowspan]').length == 1) {
                            $(this).next('tr').css('background-color', '#ffffff');
                            index++;
                        }
                    }
                    rowcount++;
                });

                var table_ticker = setInterval(function () {
                    var content = $('#example tr:first');

                    if (content.next('tr').find('td[rowspan]').length) {
                        content1 = null;
                    } else {
                        content = $('#example tr:first, #example tr:nth-child(2)');
                    }

                    $(content).animate({
                        opacity: 0 //use more parameter for effect
                    }, 1200, function () {
                        $(content).css('opacity', 1);
                        $(content).appendTo('#example');
                        // Animation complete.
                    });

                }, 10000);

            });

        </script>
    </head>

    <body>
        <div id="bcontainer">
            <div id="bbody">
                <section class="con">
                    <div class="jumbotron_div"
                        style="background-image:url({{ asset('frontend/marketing/img/fresh-fruits-and-vegetables1.jpg') }})">
                        <br>
                        <table style="border-collapse:collapse">
                            <tr>
                                <td align="center"><br />&nbsp;&nbsp;&nbsp;<img width="80" height="80"
                                        src="{{ asset('frontend/logo/logo.png') }}" alt="">&nbsp;&nbsp;<br /><br /></td>
                                <td><a href="{{ url('/') }}"
                                        style="list-style: none; color: #fff; font-weight: 900;">Agriculture Marketing
                                        System</a></td>
                                <td style="width:51%"></td>
                                <td></td>
                            </tr>
                        </table>
                        <br>
                    </div>
                </section>

                <div id="ticker_container" style="overflow:hidden;">
                    <table width="98%" class="table table-bordered market_price"
                        style="margin-bottom:0px; margin-top:0px; display:block; position:relative;">
                        <tbody style="width:100%; display:inline-table;">
                            <tr style="font-size:16px;">
                                <td width="22%" align="center"
                                    style="background-color: #090; color:white; height:7px;padding:0px;">&nbsp;</td>
                                <td width="11%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Price Type </b></td>
                                <td width="11%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Measurement </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Dhaka </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Chittagong </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Khulna </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Rajshahi </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Rangpur </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Sylhet </b></td>
                                <td width="8%"
                                    style="text-align:center;background-color: #090; color:white;height:7px;padding:0px;">
                                    <b>Barishal </b></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="98%" class="table table-bordered market_price" id="example"
                        style="margin-bottom:0px; margin-top:0px; display:block; position:relative;">
                        <tbody style="width:100%; display:inline-table;">
                            @foreach($recent as $sc)
                            <tr>
                                <td width='22%' align='left' rowspan='2' style='vertical-align:middle;'><a href='#'>{{ $sc->name }}</a></td>
                                <td width="11%" align="center">Retail </td>
                                <td align="center">Kilogram </td>
                                <td align="right" padding="2"><b>{{ $sc->dhakaKg }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->chittagongKg }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->khulnaKg }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->rajshahiKg }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->rangpurKg }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->sylhetKg }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->barishalKg }}</b></td>
                            </tr>
                            <tr>
                                <td width="11%" align="center">Wholesale </td>
                                <td align="center">Quintal </td>
                                <td align="right" padding="2"><b>{{ $sc->dhakaQuintal }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->chittagongQuintal }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->khulnaQuintal }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->rajshahiQuintal }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->rangpurQuintal }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->sylhetQuintal }}</b></td>
                                <td align="right" padding="2"><b>{{ $sc->barishalQuintal }}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div id="bfooter">
                        <div class="panel-heading" style="padding: 1px 1px; z-index:9999"></div>
                        <!-- Border bottome Marquee -->
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <center>
                                <h4
                                    style="font-family:sans-serif; font-style:italic; margin-top:0px; margin-bottom:0px; font-size:14px;">
                                    Asif </b> </h4>
                            </center>
                        </div>
                    </div>
                </div>
    </body>

</html>
