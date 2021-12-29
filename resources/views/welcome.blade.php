@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper">
        <div class="banner">
            <a href="" target="_blank">
                <img src="{{ asset($banner->image) }}">
            </a>
        </div>
        <div class="scroll">
            <h3>
                <marquee direction="left" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()"
                    style="color: red;">
                    {{ $recent->news }}
                </marquee>
            </h3>
        </div>
        <style>
            .banner>a>img {
                width: 100%;
                height: 380px;
            }

            .scroll {
                background: #E6E7E8;
                padding: 5px 0px 0px 0px;
            }

            .scroll>h3 {
                font-weight: bold;
                font-size: 22px;
                line-height: 22px;
            }

            marquee {
                padding: 5px;
            }

            @media(max-width: 480px) {
                iframe {
                    height: 215px !important;
                }

                .scroll {
                    margin: 0px 0px 40px 0px;
                }

                .banner>a>img {
                    width: 100%;
                    height: 215px;
                }
            }

        </style>

        <div class="typewriter">
            <h3>
                <marquee direction="left" scrollamount="7" onmouseover="this.stop()" onmouseout="this.start()">
                    <h2>
                        <strong>
                            <span style="font-size:18px">
                                <a href="">{{ $instruction->instruction }}</a>
                            </span>
                            <strong>

                    </h2>
                </marquee>
            </h3>
        </div>
        <style>
            .typewriter h3 {
                padding-top: -25px;
                white-space: nowrap;
                margin: 0 auto;
                font-size: 16px;
                overflow: hidden;
                border-right: .15em solid white;
            }

        </style>

        <div class="row" id="notice-board">
            <div class="notice-board-bg">
                <h2>Notice Board</h2>

                <div id="notice-board-ticker">
                    <ul>
                        @foreach($notice as $n)
                        <li>
                            <a>
                                <p style="margin:0 !important;">@ {{ $n->instruction }}</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <!-- <a class="btn right" href="#">All</a> -->
                </div>
            </div>
        </div>
        <style>
            #notice-board-ticker ul li {
                list-style: none;
            }

        </style>

        <div style=" background-color: #EFEFEF;border: 1px solid #CCCCCC;margin-bottom: 20px;padding: 10px;" class="row"
            id="news">
            <h5 style="float:left;margin:-3px 5px 0 0; font-weight:bold;font-size:.9em">News : </h5>
            <div id="news-ticker" style="overflow: hidden; position: relative; height: 0px;">
                <ul style="font-size: 0.9em; position: absolute; margin: 0px; padding: 0px; width: 95%;">
                    @foreach($news as $n)
                    <li class="lineheight">
                        <a>{{ $n->news }}</a>
                    </li>
                    @endforeach
                </ul>
                <!-- <div style="float:right">
                    <a class="btn" href="#">All</a>
                </div> -->
            </div>
        </div>
        <style>
            .lineheight {
                line-height: 22px;
            }

        </style>

        <div class="row">
            @foreach($details as $item)
            <div id="box-16" class="six columns service-box box">
                <h4>{{$item->title}}</h4>
                <img src="{{asset($item->image)}}" alt="card" width="110" height="">
                <ul class="caption fade-caption" style="margin:0">
                    @foreach($item->list as $row)
                    <li><a href="#">{{ $row->list }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
        <style>
            .ad-image-description span {
                display: none
            }

        </style>
        <div class="column block">
            <h5 class="bk-org title">Image Gallery</h5>
            @foreach($images as $image)
            <div class="gallery">
                <a href="{{ asset($image->image) }}">
                    <img src="{{ asset($image->image) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
        <style>
            div.gallery {
                margin: 10px;
                float: left;
                width: 160px;
            }

            div.gallery:hover {
                margin: 9px;
                border: 1px solid #777;
            }

            div.gallery img {
                width: 100%;
                height: 170px;
            }

        </style>


        <div class="column block">
            <h5 class="bk-org title">Video Gallery</h5>
            <p>&nbsp;</p>
            <table align="center" border="0" cellpadding="1" cellspacing="1"
                style="height:200px; width:750px; display: block; overflow-x: auto;white-space: nowrap;">
                <tbody style="display:table;width: 100%;">
                    <tr>
                        @foreach($videos as $video)
                        <td style="height:120px; width:200px">
                            <p style="text-align:center">
                                <iframe frameborder="0" height="120" scrolling="no" src="{{$video->link}}"
                                    width="200"></iframe>
                            </p>
                            <p style="text-align:center"><strong>{{$video->name}}</strong></p>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <style>
            #right-content .block {
                display: block !important
            }

        </style>

        <!-- <div class="column block">
                        <h5 class="bk-org title">Map</h5>
                        <p>
                            <iframe frameborder="0" height="400" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.4964565165888!2d90.40652161494171!3d23.72966949548483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f72156970d%3A0x571b248853bec456!2sMinistry%20Of%20Agriculture%20(MOA)%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1566974325322!5m2!1sen!2sbd" style="border:0" width="750"></iframe>
                        </p>
                        <p></p>
                    </div>
                    <style>
                        #right-content .block {
                            display: block !important
                        }
                    </style> -->
    </div>
</div>
@endsection
