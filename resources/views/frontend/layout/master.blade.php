<!DOCTYPE html>
<!--[if IE 7]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js">
    <!--<![endif]-->

    <head>
        @php
            $setting = \App\Models\Setting::first();
            $categories = \App\Models\Category::where('status', 'active')->get();
            $socials = \App\Models\Social::where('status', 'active')->get();
            $logo = \App\Models\LogoSetting::first();
            $color = \App\Models\WebsiteColor::first() ?? new \App\Models\WebsiteColor();

        @endphp
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Red Art - Digital Painting</title>

        <meta name="description" content="" />
        <meta name="author" content="" />

        <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

        <!-- **CSS - stylesheets** -->
        <link id="default-css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css"
            media="all" />

        <!-- **Additional - stylesheets** -->
        <link href="{{ asset('frontend/css/animations.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link id="shortcodes-css" href="{{ asset('frontend/css/shortcodes.css') }}" rel="stylesheet" type="text/css"
            media="all" />
        <link id="skin-css" href="{{ asset('frontend/skins/red/style.css') }}" rel="stylesheet" media="all" />
        <link href="{{ asset('frontend/css/isotope.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/css/pace.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" type="text/css" media="all" />

        <link id="light-dark-css" href="{{ asset('frontend/dark/dark.css') }}" rel="stylesheet" media="all" />

        <!-- **Font Awesome** -->
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />

        <!-- Modernizr -->
        <script src="{{ asset('frontend/js/modernizr.js') }}"></script>
    </head>

    <body>
        <!-- <div class="loader-wrapper">
        <div id="large-header" class="large-header">
            <h1 class="loader-title"><span>Red</span> Art</h1>
        </div>
    </div> -->
        <!-- **Wrapper** -->
        <div class="wrapper">
            <div class="inner-wrapper">
                <div id="header-wrapper" class="dt-sticky-menu">
                    <!-- **header-wrapper Starts** -->
                    <section id="header" class="header">
                        <div class="container menu-container">
                            <a class="logo" href="index.html"><img alt="Logo"
                                    src="{{ asset('frontend') }}/images/logo.png" /></a>
                            <a href="javascript:;" class="total-overlay-trigger"></a>
                        </div>
                    </section>

                    <div class="total-overlay-sticky">
                        <nav id="navigation">
                            <ul class="menu type2">
                                <li class="logo">
                                    <a href="#"><img alt="Logo" src="images/logo.png" /></a>
                                </li>
                                <li class="current_page_item menu-item-simple-parent dropdown-widget">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-widget"
                                        data-hover="dropdown-widget" aria-haspopup="true">Home Page<span
                                            class="has-child animation"></span></a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="http://www.wedesignthemes.com/html/redart/default">Default</a>
                                        </li>
                                        <li class="current_page_item">
                                            <a href="http://www.wedesignthemes.com/html/redart/menu-overlay">Menu
                                                Overlay</a>
                                        </li>
                                        <li>
                                            <a href="http://www.wedesignthemes.com/html/redart/slide-bar">Slide Bar</a>
                                        </li>
                                        <li>
                                            <a href="http://www.wedesignthemes.com/html/redart/slider-over-menu">Slider
                                                Over Menu</a>
                                        </li>
                                    </ul>
                                    <a class="dt-menu-expand">+</a>
                                </li>
                                <li class="menu-item-simple-parent">
                                    <a title="About" href="about.html">About Us</a>
                                </li>
                                <li class="menu-item-simple-parent dropdown-widget">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-widget"
                                        data-hover="dropdown-widget" aria-haspopup="true">Gallery Page<span
                                            class="has-child animation"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="gallery-detail.html">Gallery detail</a></li>
                                        <li>
                                            <a href="gallery-detail-with-lhs.html">Gallery-detail-left-sidebar</a>
                                        </li>
                                        <li>
                                            <a href="gallery-detail-with-rhs.html">Gallery-detail-right-sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-simple-parent dropdown-widget">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-widget"
                                        data-hover="dropdown-widget" aria-haspopup="true">Shop Page<span
                                            class="has-child animation"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop-detail.html">Shop Detail</a></li>
                                        <li><a href="shop-cart.html">Cart Page</a></li>
                                        <li><a href="shop-checkout.html">Checkout Page</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-simple-parent dropdown-widget">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-widget"
                                        data-hover="dropdown-widget" aria-haspopup="true">Blog Page<span
                                            class="has-child animation"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="blog-detail.html">Blog detail</a></li>
                                        <li>
                                            <a href="blog-detail-with-lhs.html">Blog-detail-left-sidebar</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail-with-rhs.html">Blog-detail-right-sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-simple-parent">
                                    <a title="Contact" href="contact.html">Contact</a>
                                </li>
                                <li class="menu-item-simple-parent dropdown-widget">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown-widget"
                                        data-hover="dropdown-widget" aria-haspopup="true">Shortcodes<span
                                            class="has-child animation"></span></a>
                                    <ul class="sub-menu">
                                        <li><a href="progressbar.html"> Progress bar </a></li>
                                        <li><a href="buttons.html"> Buttons Page </a></li>
                                        <li><a href="tabs.html"> tabs &amp; accordions </a></li>
                                        <li><a href="typography.html"> typography </a></li>
                                        <li><a href="columns.html"> columns </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <a href="javascript:;" class="total-overlay-sticky-close"></a>
                    </div>
                </div>
                <!-- **header-wrapper Ends** -->
                <div class="slider-container">
                    <div class="slider fullwidth-section parallax"></div>
                </div>
                <div id="main">
                    <section id="primary" class="content-full-width">
                        <!-- **Primary Starts Here** -->

                        <div class="dt-sc-hr-invisible-small"></div>

                        <div class="fullwidth-section">
                            <!-- **Full-width-section Starts Here** -->
                            <div class="container">
                                <div class="main-title animate" data-animation="pullDown" data-delay="100">
                                    <h2 class="aligncenter">Portfolio</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do
                                    </p>
                                </div>
                            </div>


                        </div>
                        <!-- **Full-width-section Ends Here** -->
                        <div class="clear"></div>

                        <div class="fullwidth-section">
                            <div class="blog-section">
                                <article class="blog-entry type2">
                                    <div class="entry-details">
                                        <div class="entry-title">
                                            <h3><a href="blog-detail.html">Encaustic</a></h3>
                                        </div>
                                        <div class="entry-body">
                                            <p>
                                                <b>Encaustic painting</b>, technique in which pigments
                                                are mixed with hot, liquid wax. After all of the colours
                                                have been applied to the painting surface, a heating
                                                element is passed over them until the individual brush
                                                or spatula marks fuse into a uniform film.
                                            </p>
                                        </div>
                                        <a class="type1 dt-sc-button small" href="gallery-detail-with-lhs.html">View
                                            Gallery<i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="entry-thumb">
                                        <ul class="blog-slider">
                                            <li>
                                                <img src="http://via.placeholder.com/955x470&text=Blog+Slider5"
                                                    alt="" title="" />
                                            </li>
                                            <li>
                                                <img src="http://via.placeholder.com/955x470&text=Blog+Slider6"
                                                    alt="" title="" />
                                            </li>
                                            <li>
                                                <img src="http://via.placeholder.com/955x470&text=Blog+Slider7"
                                                    alt="" title="" />
                                            </li>
                                            <li>
                                                <img src="http://via.placeholder.com/955x470&text=Blog+Slider8"
                                                    alt="" title="" />
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <!-- **Full-width-section Ends Here** -->
                        <div class="clear"></div>

                        <div class="dt-sc-hr-invisible-small"></div>

                        <div class="clear"></div>

                        <div class="fullwidth-section">
                            <!-- **Full-width-section Starts Here** -->
                            <div class="container">
                                <div class="main-title animate" data-animation="pullDown" data-delay="100">
                                    <h2 class="aligncenter">About Me</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                        do
                                    </p>
                                </div>

                                <div class="about-section">
                                    <div class="dt-sc-one-half column first">
                                        <img src="{{ asset('frontend') }}/images/about.png" title=""
                                            alt="" />
                                    </div>

                                    <div class="dt-sc-one-half column">
                                        <h3 class="animate" data-animation="fadeInLeft" data-delay="200">
                                            A Little Intro
                                        </h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit
                                            esse cillum dolore
                                        </p>
                                        <h3 class="animate" data-animation="fadeInLeft" data-delay="300">
                                            My Exhibitions
                                        </h3>
                                        <p>
                                            Sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut
                                            enim ad minim veniam, Lorem ipsum dolor quis nostrud
                                            exercitation ullamco
                                        </p>
                                        <h3 class="animate" data-animation="fadeInLeft" data-delay="400">
                                            Newsletter
                                        </h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        </p>
                                        <form method="post" class="mailchimp-form dt-sc-three-fourth"
                                            name="frmnewsletter" action="php/subscribe.php">
                                            <p class="input-text">
                                                <input class="input-field" type="email" name="mc_email"
                                                    value="" required />
                                                <label class="input-label">
                                                    <i class="fa fa-envelope-o icon"></i>
                                                    <span class="input-label-content">Mail</span>
                                                </label>
                                                <input type="submit" name="submit" class="submit"
                                                    value="Subscribe" />
                                            </p>
                                        </form>
                                        <div id="ajax_subscribe_msg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- **Full-width-section Ends Here** -->

                        <div class="dt-sc-hr-invisible-small"></div>
                    </section>
                    <!-- **Primary Ends Here** -->
                    <footer id="footer" class="animate" data-animation="fadeIn" data-delay="100">
                        <div class="container">
                            <div class="copyright">
                                <ul class="footer-links">
                                    <li><a href="#">Contact us</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="#">Faq</a></li>
                                </ul>

                                <ul class="payment-options">
                                    <li><a href="#" class="fa fa-cc-amex"></a></li>
                                    <li><a href="#" class="fa fa-cc-mastercard"></a></li>
                                    <li><a href="#" class="fa fa-cc-visa"></a></li>
                                    <li><a href="#" class="fa fa-cc-discover"></a></li>
                                    <li><a href="#" class="fa fa-cc-paypal"></a></li>
                                </ul>

                                <p>© 2015 <a href="#">RED ART</a>. All rights reserved.</p>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- Main Ends Here-->
            </div>
            <!-- **inner-wrapper - End** -->
        </div>
        <!-- **Wrapper Ends** -->

        <!-- **jQuery** -->

        <script src="{{ asset('frontend/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.inview.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/js/jquery.viewport.js') }}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('frontend/js/jquery.isotope.min.js') }}"></script>

        <script src="{{ asset('frontend/js/jsplugins.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.validate.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('frontend/js/jquery.tipTip.minified.js') }}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('frontend/js/jquery.bxslider.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('frontend/js/jquery.menu-2.js') }}"></script>

        <script src="{{ asset('frontend/js/custom.js') }}"></script>
    </body>

</html>
