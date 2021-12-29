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

<div class="sixteen columns" id="jmenu">
    <div class="sixteen columns">
        <a href="javascript:;" class="show-menu menu-head">Select Menu</a>
        <div role="navigation" id="dawgdrops">
            <ul class="meganizr mzr-slide mzr-responsive">
                <li class="col0"><a title="Home" href="{{ url('/') }}"
                        style="background-image: url({{ asset('frontend/logo/home_dark.png') }}); margin-top:5px;"></a>
                </li>
                <li class="col1 mzr-drop"><a href="#" class="submenu">About Us</a>
                    <div class="mzr-content drop-one-columns">
                        <div class="one-col">
                            <h6></h6>
                            <ul class="mzr-links">
                                <li>
                                    <a href="{{ route('about.vision') }}">Vision</a>
                                </li>
                                <li>
                                    <a href="{{ route('about.mission') }}">Mission</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="col2"><a href="{{ route('website.office') }}">Office/Agency</a></li>

                <li class="col3 mzr-drop"><a href="#" class="submenu">Grievance</a>
                    <div class="mzr-content drop-one-columns">
                        <div class="two-col">
                            <h6> </h6>
                            <ul class="mzr-links">
                                <li>
                                    <a href="{{ route('website.grievance') }}">Grievance Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col4 mzr-drop"><a href="#" class="submenu">Products</a>
                    <div class="mzr-content drop-one-columns">
                        <div class="one-col">
                            <h6> </h6>
                            <ul class="mzr-links">
                                <li>
                                    <a href="{{ route('website.product.seller') }}">Product Seller</a>
                                </li>
                                <li>
                                    <a href="{{ route('website.product.buyer') }}">Product Buyer</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col5 mzr-drop"><a href="#" class="submenu">Marketing</a>
                    <div class="mzr-content drop-one-columns">
                        <div class="one-col">
                            <h6> </h6>
                            <ul class="mzr-links">
                                <li>
                                    <a href="{{ route('website.recent.price') }}">Recent Price</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="col6 mzr-drop"><a href="#" class="submenu">Agricultural Inputs</a>
                    <div class="mzr-content drop-one-columns">
                        <div class="two-col">
                            <h6> </h6>
                            <ul class="mzr-links">
                                <li>
                                    <a href="{{ route('website.fertilizer') }}">Fertilizer</a>
                                </li>
                                <li>
                                    <a href="{{ route('website.seed') }}">Seed</a>
                                </li>
                                <li>
                                    <a href="{{ route('website.irrigation') }}">Irrigation</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col7"><a href="{{ route('warehouse') }}" class="">Warehouse</a></li>
                <li class="col8"><a href="{{ route('complain.box') }}" class="">Complain Box</a></li>
            </ul>
        </div>
    </div>
</div>
