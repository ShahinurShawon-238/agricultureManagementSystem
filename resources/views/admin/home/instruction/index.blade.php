@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Notice Board</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notice_Board</li>
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
                        <h4 class="card-title mb-0">Notice Board (First inserted notice will be countered as Instruction)</h4>
                        <div class="float-right">
                            <a href="{{route('add.instruction')}}"><button class="btn btn-success"
                                    style="margin-top: -25px;">Add Notice</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Notice</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instruction as $sc)
                                    <tr>
                                        <td class="text-center">{{$sc->instruction}}</td>
                                        <td class="text-center">
                                            <a href="{{url('instruction/edit/'.$sc->id)}}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('instruction/delete/'.$sc->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
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
        <div class="float-right">{{ $instruction->links() }}</div>
    </div>
</div>
@endsection
