@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Complains</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Complain</li>
                    </ul>
                </div>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Complain Messages</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center" width="25%">Message</th>
                                        <th scope="col" class="text-center" width="25%">Answer</th>
                                        <th scope="col" class="text-center" width="5%">Status</th>
                                        <th scope="col" class="text-center" width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($complains as $c)
                                    <tr>
                                        <td class="text-center">{{$c->message}}</td>
                                        <td class="text-center">{{$c->answer}}</td>
                                        <td class="text-center">
                                            @if($c->status == 0)
                                            <a href="" class="btn btn-danger">Unanswered</a>
                                            @else
                                            <a href="{{ url('complain-answer-email/'.$c->id) }}"
                                                class="btn btn-info">Send
                                                Mail</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($c->status == 0)
                                            <a href="{{ url('complain/answer/give/'.$c->id) }}"
                                                class="btn btn-success">Answer</a>
                                            @else
                                            <div style="margin-bottom: 10px;">
                                                <a href="{{ url('complain/answer/edit/'.$c->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </div>
                                            <a href="{{ url('complain/delete/'.$c->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right">{{ $complains->links() }}</div>
    </div>
</div>
@endsection
