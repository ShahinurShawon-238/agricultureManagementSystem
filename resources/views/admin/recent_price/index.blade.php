@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Recent Price</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Recent Price</li>
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
                        <h4 class="card-title mb-0">Recent Price</h4>
                        <div class="float-right">
                            <a href="{{route('add.recent.price')}}"><button class="btn btn-success"
                                    style="margin-top: -25px;">Add Recent Price</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Price Type</th>
                                        <th scope="col" class="text-center">Measurement</th>
                                        <th scope="col" class="text-center">Dhaka</th>
                                        <th scope="col" class="text-center">Chittagong</th>
                                        <th scope="col" class="text-center">Khulna</th>
                                        <th scope="col" class="text-center">Rajshahi</th>
                                        <th scope="col" class="text-center">Rangpur</th>
                                        <th scope="col" class="text-center">Sylhet</th>
                                        <th scope="col" class="text-center">Barishal</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recent as $sc)    
                                    <tr>
                                        <td class="text-center" rowspan="2">{{ $sc->name }}</td>
                                        <td class="text-center">Retail</td>
                                        <td class="text-center">Kilogram</td>
                                        <td class="text-center">{{ $sc->dhakaKg }}</td>
                                        <td class="text-center">{{ $sc->chittagongKg }}</td>
                                        <td class="text-center">{{ $sc->khulnaKg }}</td>
                                        <td class="text-center">{{ $sc->rajshahiKg }}</td>
                                        <td class="text-center">{{ $sc->rangpurKg }}</td>
                                        <td class="text-center">{{ $sc->sylhetKg }}</td>
                                        <td class="text-center">{{ $sc->barishalKg }}</td>
                                        <td class="text-center" rowspan="2">
                                            <a href="{{ url('recent/price/edit/'.$sc->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('recent/price/delete/'.$sc->id) }}"
                                                onclick="return confirm('Are you sure to delete?')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Wholesale</td>
                                        <td class="text-center">Quintal</td>
                                        <td class="text-center">{{ $sc->dhakaQuintal }}</td>
                                        <td class="text-center">{{ $sc->chittagongQuintal }}</td>
                                        <td class="text-center">{{ $sc->khulnaQuintal }}</td>
                                        <td class="text-center">{{ $sc->rajshahiQuintal }}</td>
                                        <td class="text-center">{{ $sc->rangpurQuintal }}</td>
                                        <td class="text-center">{{ $sc->sylhetQuintal }}</td>
                                        <td class="text-center">{{ $sc->barishalQuintal }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right">{{ $recent->links() }}</div>
    </div>
</div>
@endsection
