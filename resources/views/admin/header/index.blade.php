<div class="header">

    <div class="header-left">
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('backend/img/logo.png') }}" width="40" height="40" alt="">
        </a>
    </div>

    <!-- <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a> -->

    <div class="page-title-box">
        <h3>Admin Dashboard</h3>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i> <span class="badge badge-pill">{{App\Models\Complain::where(['status'=>0])->count()}}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Complains</span>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @foreach(App\Models\Complain::where(['status'=>0])->get() as $complain)
                        <li class="notification-message">
                            <a href="{{ route('complain') }}">
                                <div class="media">
                                    <span class="avatar">
                                        <img alt="" src="">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">{{ $complain->name }}</span> Has 
                                            a Complain <span class="noti-title">{{ $complain->message }}</span>
                                        </p>
                                        <p class="noti-time"><span class="notification-time">{{ $complain->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ route('complain') }}">View all Complains</a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="h-8 w-8 rounded-full object-cover"
                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <span class="status online"></span></span>
                <span>Admin</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
                <a class="dropdown-item" href="">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </a>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('profile.show') }}">My Profile</a>
            <a class="dropdown-item" href="">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </a>
        </div>
    </div>

</div>
