@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper" style="padding: 15px;">
        <h3>Our Vision</h3>
        <div class="banner">
            <a href="" target="_blank">
                <img src="{{ asset($vision->image) }}" width="700" height="400">
            </a>
            <p>
                {{$vision->details}}
            </p>
        </div>
    </div>
</div>
@endsection
