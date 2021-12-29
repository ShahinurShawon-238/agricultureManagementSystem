@extends('admin.dashboard_master')
@section('dashboard_content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                        <div class="dash-widget-info">
                            @if(App\Models\Product::count()>0)
                            <h3>{{ App\Models\Product::count() }}</h3>
                            @else
                            <h3>0</h3>
                            @endif
                            <span>Product</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                        <div class="dash-widget-info">
                            @if(App\Models\Customer::count()>0)
                            <h3>{{ App\Models\Customer::count() }}</h3>
                            @else
                            <h3>0</h3>
                            @endif
                            <span>Customer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                        <div class="dash-widget-info">
                            @if(App\Models\WarehousePlace::count()>0)
                            <h3>{{ App\Models\WarehousePlace::count() }}</h3>
                            @else
                            <h3>0</h3>
                            @endif
                            <span>Warehouse</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="card dash-widget">
                    <div class="card-body">
                        <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                        <div class="dash-widget-info">
                            @if(App\Models\Complain::count()>0)
                            <h3>{{ App\Models\Complain::count() }}</h3>
                            @else
                            <h3>0</h3>
                            @endif
                            <span>Complain</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
