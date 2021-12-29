@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Complains Answer</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Complain Answer</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Complain Messages Answer</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('complain/answer/store/'.$complain->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="message">Message: </label>
                                <textarea class="form-control" id="message" name="message" rows="3" required>{{$complain->message}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer: </label>
                                <textarea class="form-control" id="answer" name="answer" rows="3" required>{{$complain->answer}}</textarea>
                            </div>
                            <div class=" pt-4 pt-5 float-right border-top">
                                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection