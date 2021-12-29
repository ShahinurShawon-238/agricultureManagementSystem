@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div id='printable_area' style="padding: 15px;">
        <h3>Office/Agency</h3>
        <div>
            <table cellpadding="0" cellspacing="0" style="width:100%">
                <tbody>
                    <tr>
                        <td>
                            <h4 style="text-align:center"><span style="color:#000000"><span
                                        style="font-size:18px"><strong>No.</strong></span></span></h4>
                        </td>
                        <td>
                            <h4 style="text-align:center"><span style="color:#000000"><span
                                        style="font-size:18px"><strong>Office/Agency</strong></span></span>
                            </h4>
                        </td>
                        <td>
                            <h4 style="text-align:center"><span style="color:#000000"><span
                                        style="font-size:18px"><strong>Address</strong></span></span></h4>
                        </td>
                        <td>
                            <h4 style="text-align:center"><span style="color:#000000"><span
                                        style="font-size:18px"><strong>Contact</strong></span></span></h4>
                        </td>
                    </tr>
                    <?php $count = 01;?>
                    @foreach($offices as $office)
                    <tr>
                        <td style="text-align:center">
                            <p><span style="color:#000000">{{ $count++ }}.</span></p>
                        </td>
                        <td style="text-align:center">
                            <p>
                                <a href="#" target="_blank">
                                    <span style="color:#000000">{{$office->name}}</span>
                                </a>
                            </p>
                        </td>
                        <td style="text-align:center">
                            <p>
                                <a href="#" target="_blank">
                                    <span style="color:#000000">{{$office->address}}</span>
                                </a>
                            </p>
                        </td>
                        <td style="text-align:center">
                            <p>
                                <span style="color:#000000">{{$office->employee_name}}</span><br />
                                    Phone: {{$office->phone}}<br />
                                    Email: {{$office->email}}</span>
                            </p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <style>
            a:visited span {
                color: green !important;
            }

            #left-content ul {
                list-style: circle;
                list-style-position: inside;
            }

            th {
                border: 1px solid black;
            }

            td {
                border: 1px solid black;
            }

            @media only screen and (min-width:320px) and (max-width:959px) {
                table {
                    display: block;
                    overflow-x: auto;
                    white-space: nowrap;
                }

                #printable_area p img {
                    width: 100% !important;
                    height: unset !important;
                }
            }

            sub {
                vertical-align: sub !important;
                font-size: smaller !important;
            }
        </style>
    </div>
</div>
@endsection
