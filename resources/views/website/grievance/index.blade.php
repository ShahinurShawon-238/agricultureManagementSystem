@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div id='printable_area' style="padding: 15px;">
        <h3>Grievance Reports</h3>
        <div>
            @foreach($grievances as $grievance)
            <p>
                <a href="{{ url('grievance/download/'.$grievance->file) }}">
                    *&nbsp;{{ $grievance->name }}.
                </a>
            </p>
            @endforeach
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
