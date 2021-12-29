@extends('website.website_master')
@section('website')
<div id="contents" class="sixteen columns">
    <div class="twelve columns" id="left-content">
        <div class="row mainwrapper">
            <h3 style="padding: 15px 30px;">Login</h3>
            <div class="row">
                <div class="webform">
                    <div class="body">
                        <form class="frm-bldr" method="POST" action="{{ route('storeWebsiteLogin') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address: </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" placeholder="Enter Your Email" required>
                            </div>                            
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    aria-describedby="emailHelp" placeholder="Enter Your Password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                            <p>Don't have account? <a href="{{ route('websiteRegister') }}">Click Here</a> </p>
                        </form>
                        <style>
                            form{
                                margin-left: 15px;
                            }
                            .frm-bldr input,
                            textarea {
                                width: 100%;
                                padding: 12px 20px;
                                margin: 8px 0;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                            }

                            button[type=submit] {
                                width: 100%;
                                background-color: #4CAF50;
                                color: white;
                                padding: 14px 20px;
                                font-size: 16px;
                                margin: 8px 0;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                            }

                            input[type=submit]:hover {
                                background-color: #45a049;
                            }

                        </style>
                    </div>
                    <div class="footer"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection
