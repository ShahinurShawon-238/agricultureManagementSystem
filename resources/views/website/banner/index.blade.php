<div class="sixteen columns"
    style="background-color: #0f9d31; box-shadow: 0 1px 5px #999999;width: 960px;border-bottom: 4px solid #8bc643;">
    <div class="slide-panel-btns" style="float: left;width: 165px;height: 30px">
        <div class="slide-panel-button" style="display: table;margin-top: 5px; width: 300px;">
            <a style="color: white;font-size:.9em;" href="{{ url('/') }}">Agriculture Management System</a>
        </div>
    </div>

    <div id="div-lang" style="float:left;width: 795px;height: 32px;">
        <div id="newNavigation"></div>
        <div id="div-lang-sel">
            <div id="search_any" style="float: left">
                <a href="{{ route('show.cart') }}" style="color: white;font-size:13px;"><img
                        src="{{ asset('frontend/icons/shopping-cart.png') }}" alt="cart" height="20px" width="22px"
                        style="margin-top: 5px !important;">
                    @if(session()->has('customer'))
                    {{App\Models\Cart::where(['customer_id'=>session()->get('customer')['id']])->count()}}
                    @else
                    0
                    @endif
                </a>
                @if(!session()->has('customer'))
                <a href="{{ route('websiteLogin') }}" type="button" style="color: white;font-size:13px;">Login</a>
                @else
                <span style="font-size:13px;">{{session()->get('customer')['name']}}</span>
                <a href="{{ route('websiteLogout') }}" type="button" style="color: white;font-size:13px;">Logout</a>
                @endif

            </div>
        </div>
    </div>
</div>
<div class="sixteen columns">
    <div class="callbacks_container" style="box-shadow: 0 1px 5px #999999;">
        <ul class="rslides" id="front-image-slider">
            @foreach($slides as $slide)
            <li>
                <img src="{{ asset($slide->image) }}" alt="slider" width="960" height="370">
            </li>
            @endforeach
        </ul>
        <style>
            .rslides img {
                height: 370px
            }

        </style>
    </div>

    <div class="header-site-info" id="header-site-info">
        <div>
            <div id="logo">
                <a title="Home" href="{{ url('/') }}" style="height: 70px !important; width: 70px !important">
                    <img alt="logo" src="{{ asset($logos->image) }}" width="70" height="70"
                        style="height: 70px !important; width: 70px !important">
                </a>
            </div>
            <div class="clearfix" id="site-name-wrapper">
                <span id="site-name">
                    <a title="Home" href="{{ url('/') }}">Agriculture Management System</a>
                </span>
                <span id="slogan"></span>
            </div>
        </div>
    </div>

</div>
<script>
    /* Responsive Design*/
    $(document).ready(function () {
        var wi = $(window).width();
        if (wi < 980) {
            $('.mzr-responsive').slideUp();
            $('#jmenu .show-menu').click(function () {
                //$('.mzr-responsive').show();
                $(".mzr-responsive").slideToggle(400, "linear", function () {

                });
            });

            $("#jmenu a.submenu").click(function () {

                $('#jmenu a.submenu').siblings().addClass('sibling-toggle');
                $(this).parent().find(".mzr-content").removeClass('sibling-toggle').addClass(
                    'slide-visible').slideToggle(400, "linear", function () {
                    return false;
                });
                // return false;
            });
        }
    });

</script>
