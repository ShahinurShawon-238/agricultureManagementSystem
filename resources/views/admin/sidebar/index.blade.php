<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="la la-dashboard"></i> <span> Dashboard</span>
                </li>

                <li class="menu-title">
                    <span>Website</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="lar la-caret-square-left"></i> <span>Sidebar</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('sidebar.one') }}">One</a></li>
                        <li><a href="{{ route('sidebar.two') }}">Two</a></li>
                        <li><a href="{{ route('sidebar.three') }}">Three</a></li>
                        <li><a href="{{ route('sidebar.four') }}">Four</a></li>
                        <li><a href="{{ route('sidebar.five') }}">Five</a></li>
                        <li><a href="{{ route('social.media') }}">Social Media</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="las la-images"></i> <span>Banner</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('slides') }}">Slides</a></li>
                        <li><a href="{{ route('logo') }}">Logo</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="las la-home"></i> <span>Home</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('home.banner') }}">Banner</a></li>
                        <li><a href="{{ route('recent.news') }}">News</a></li>
                        <li><a href="{{ route('instruction') }}">Notice Board</a></li>
                        <li class="submenu">
                            <a href="#"><span>Card</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('card.details') }}">Card Details</a></li>
                                <li><a href="{{ route('card.list') }}">Card List</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('image.gallery') }}">Image Gallery</a></li>
                        <li><a href="{{ route('video.gallery') }}">Video Gallery</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="las la-universal-access"></i> <span>About Us</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('mission') }}">Mission</a></li>
                        <li><a href="{{ route('vision') }}">Vision</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('office') }}"><i class="las la-building"></i> <span>Office</span></a>
                </li>
                <li>
                    <a href="{{ route('grievance') }}"><i class="las la-film"></i> <span>Grievance</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="lab la-product-hunt"></i><span>Product</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('product.seller') }}">Sell</a></li>
                        <li><a href="{{ route('product.buyer') }}">Buy</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('recent.price') }}"><i class="las la-money-bill-wave"></i> <span>Recent
                            Price</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="las la-tractor"></i><span>Agriculture Input</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('fertilizer') }}">Fertilizer</a></li>
                        <li><a href="{{ route('seed') }}">Seed</a></li>
                        <li><a href="{{ route('irrigation') }}">Irrigation</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="las la-store-alt"></i><span>Warehouse</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('warehouse.place') }}">Warehouse Place</a></li>
                        <li><a href="{{ route('warehouse.info') }}">Warehouse Info</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('complain') }}"><i class="las la-gavel"></i> <span>Complains</span></a>
                </li>
                <li>
                    <a href="{{ route('customer') }}"><i class="las la-users"></i> <span>Customer</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
