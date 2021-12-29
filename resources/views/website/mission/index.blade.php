@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper" style="padding: 15px;">
        <h3>Our Mission</h3>
        <div class="banner">
            <a href="" target="_blank">
                <img src="{{ asset($mission->image) }}" width="700" height="400">
            </a>
            <p>
                {{$mission->details}}
            </p>
        </div>
    </div>
</div>
@endsection
