@extends('website.website_master')
@section('website')
<div class="twelve columns" id="left-content">
    <div class="row mainwrapper">
        <h3 style="padding: 15px;">Warehouse</h3>
        <div class="row">
            @foreach($warehouse as $item)
            <div id="box-16" class="six columns service-box box">
                <h4>{{$item->place}}</h4>
                <img src="{{asset($item->image)}}" alt="card" width="110" height="">
                <ul class="caption fade-caption" style="margin:0">
                    @foreach($item->info as $row)
                    <li><a href="#">{{ $row->info }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
