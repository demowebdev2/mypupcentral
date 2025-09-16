<!DOCTYPE html>
<html lang="en">

<head>
    <!--<title></title>-->
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?= (!empty($description)) ? $description : ''; ?>">
    <meta name="keywords" content="<?= (!empty($keyboard)) ? $keyboard : ''; ?>">

    <meta name="csrf-token" content="H7OFH3Hg8Ao2SicKwdGSMXE5PINRZcVBI2waPFl2">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-title" content="My Pup Central">

    <?php if ($this->uri->segment(1) == 'ad') { ?>
        <meta name="robots" content="noindex,nofollow">
    <?php } ?>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url(); ?>assets/front/storage/app/default/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url(); ?>assets/front/storage/app/default/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url(); ?>assets/front/storage/app/default/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url(); ?>assets/front/storage/app/default/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/front/storage/app/default/ico/favicon.png">

    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//google.com">
    <link rel="dns-prefetch" href="//apis.google.com">
    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link rel="dns-prefetch" href="//www.googletagmanager.com">
    <link rel="dns-prefetch" href="//cloudflare.com">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/css/header.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/plugins/slick/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/front/plugins/slick/slick-theme.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="<?= base_url(); ?>assets/front/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />


    <meta name="description" property="description" content="">
    <meta name="keywords" property="keywords" content="">

    <link rel="canonical" href="<?= 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />

    <base target="_top" />
    <meta property="og:site_name" content="My Pup Central " />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:description" content="<?= (!empty($description)) ? $description : ''; ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:image" content="<?= base_url(); ?>assets/front/storage/app/logo/thumb-2000x1000-header-6151bd54619ac.jpeg" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="600" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= $title ?>">
    <meta name="twitter:description" content="<?= (!empty($description)) ? $description : ''; ?>">
    <meta name="twitter:domain" content="<?= base_url() ?>">

    <script src="https://www.google.com/recaptcha/api.js?render=6Lfy9i0nAAAAAOyFg5Z1uP7Yk6tyt_kLvQuWkAJN"></script>

    <meta name="p:domain_verify" content="23448547b910eb1267e60d2583f644ef" />

    <link href="<?= base_url(); ?>assets/front/css/app.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // $(window).on('load', function() {
        //     $(".loader").fadeOut("slow");
        // });

        $(document).ready(function() {
            $(".loader").fadeOut("slow");
        });
    </script>




    <?php $set = $this->common_model->list_row('tb_settings', array('id' => 1));
    echo $set->google_tag;
    ?>


    <!-- Hotjar Tracking Code for https://mypupcentral.com -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2989979,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K9HJ69R');
    </script>
    <!-- End Google Tag Manager -->

    <script>
        $(function() {
            $(".dt").DataTable();
        });
    </script>

    <link href="<?= base_url(); ?>assets/front/css/custom.css" rel="stylesheet">


    <script src="<?= base_url(); ?>assets/front/plugins/modernizr/modernizr-custom.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">

    <script>
        $(document).ready(function() {
            var lastScrollTop = 0;
            var ticking = false;
            
            function updateStickyHeader() {
                var scroll = $(window).scrollTop();
                var $header = $('.header_stickey');
                
                if ($header.length > 0) {
                    if (scroll >= 100) {
                        $header.addClass('sticky');
                        // console.log('Header made sticky at scroll:', scroll);
                    } else {
                        $header.removeClass('sticky');
                        // console.log('Header unstuck at scroll:', scroll);
                    }
                }
                
                lastScrollTop = scroll;
                ticking = false;
            }
            
            // Initial check
            updateStickyHeader();
            
            $(window).scroll(function() {
                if (!ticking) {
                    requestAnimationFrame(updateStickyHeader);
                    ticking = true;
                }
            });
        });
    </script>
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1106066128385949');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1106066128385949&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

</head>

<body class="skin-default">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9HJ69R" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Promotional Banner -->
    <?= get_promo_banner() ?>

    <div class="loader"></div>

    <div id="wrapper">
        <!--App       -->
        <div class="new-search-div new-search-div-app app-content" style="display:none; z-index:999">
            <div class="topsearch-nav mt-1" style="display:none">

                <form method="get" action="<?= base_url() ?>ads">
                    <div class="input-group search-box">
                        <input type="text" name="search search-box-input " id="search-box2" class="form-control" placeholder="Search here...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div class="search-loading-div">


                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:100%;height:100%;margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="317px" height="317px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <g transform="rotate(0 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(30 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(60 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(90 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(120 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(150 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(180 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(210 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(240 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(270 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(300 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <g transform="rotate(330 50 50)">
                            <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
                            </rect>
                        </g>
                        <!-- [ldio] generated by https://loading.io/ -->
                    </svg>
                </div>
                <div class="search-result-div" id="search-result-div">

                </div>


            </div>
        </div>

        <div class="new-menu-div app-content" style="display:none">
            <div class="bottom-nav">

                <a href="<?= base_url() ?>Home/home_redirect" class="bottom-nav-item <?php echo set_Topmenu('Home'); ?>">

                    <div class="bottom-nav-link">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </div>
                </a>


                <a href="<?= base_url() ?>ads" class="bottom-nav-item <?php echo set_Topmenu('List'); ?>">
                    <div class="bottom-nav-link">
                        <i class="material-icons"><i class="fas fa-paw"></i> </i>
                        <span>Puppies</span>
                    </div>
                </a>

                <a href="javascript:void(0)" class="bottom-nav-item app_search">
                    <div class="bottom-nav-link">
                        <i class="material-icons">search</i>
                        <span>Search</span>
                    </div>
                </a>

                <?php if (isset($_SESSION['siteuser']) && $_SESSION['siteuser']['is_loggedin'] == true) { ?>
                    <a href="#" onclick="openNav2()" class="bottom-nav-item">
                        <div class="bottom-nav-link">
                            <i class="material-icons">account_circle</i>
                            <span><?php echo substr($_SESSION['siteuser']['name'], 0, 8);
                                    if (strlen($_SESSION['siteuser']['name']) > 8) {
                                        echo '...';
                                    } ?></span>
                        </div>
                    </a>
                <?php } else { ?>
                    <a href="<?= base_url() ?>bookmarks" class="bottom-nav-item <?php echo set_Topmenu('Bookmark'); ?>">
                        <div class="bottom-nav-link">
                            <i class="material-icons">favorite</i>
                            <span>Faves</span>
                        </div>
                    </a>

                <?php } ?>

                <a href="javascript:void(0)" onclick="openNav()" class="bottom-nav-item">
                    <div class="bottom-nav-link">
                        <i class="material-icons"><i class="fas fa-ellipsis-h"></i></i>
                        <span>More</span>
                    </div>
                </a>

            </div>
        </div>


        <script>
            function openNav() {
                document.getElementById("myNav").style.display = "flex";
            }

            function closeNav() {
                document.getElementById("myNav").style.display = "none";
            }

            function openNav2() {
                document.getElementById("myNav2").style.display = "flex";
            }

            function closeNav2() {
                document.getElementById("myNav2").style.display = "none";
            }
        </script>

        <div id="myNav" class="overlay">

            <div class="overlay-content">
                <a href="<?= base_url() ?>available-breeds">Breeds</a>
                <a href="<?= base_url() ?>process">Our Process</a>
                <a href="<?= base_url() ?>standard">Our Standards</a>
                <a href="<?= base_url() ?>transportation">Puppy Travel</a>
                <a href="<?= base_url() ?>reviews">Reviews</a>
                 <li><a href="<?= base_url() ?>page/blog">Blogs</a></li>
                                        <li><a href="<?= base_url() ?>shopping">Shopping lists</a></li>
                <a href="<?= base_url() ?>Page/blog">Blog</a>
                 <li><a href="<?= base_url() ?>page/blog">Blogs</a></li>
                                        <li><a href="<?= base_url() ?>shopping">Shopping lists</a></li>
                <a href="<?= base_url() ?>contact">Contact</a>
                <?php if (!isset($_SESSION['siteuser']) && $_SESSION['siteuser']['is_loggedin'] != true) { ?>
                    <a href="<?= base_url() ?>register">Breeder Application</a>
                    <a href="<?= base_url() ?>login">Breeder Login</a>
                <?php } ?>
                <br>
                <a href="javascript:void(0)" onclick="closeNav()"><i style="font-size: 36px;" class="far fa-times-circle"></i></a>
            </div>
        </div>
        <div id="myNav2" class="overlay">
            <div class="overlay-content">
                <a href="<?= base_url() ?>new_post">New Ad</a>
                <a href="<?= base_url() ?>my_ads">My Ads</a>
                <a href="<?= base_url() ?>sold-out">Sold Ads</a>
                <a href="<?= base_url() ?>profile">My Account</a>
                <a href="<?= base_url() ?>ad/enquiries">Inquiries</a>
                <a href="<?= base_url() ?>transactions">Transactions</a>
                <a href="<?= base_url() ?>contact-person">Contact Person</a>

                <a href="<?= base_url() ?>logout">Logout</a>

                <br>
                <a href="javascript:void(0)" onclick="closeNav2()"><i style="font-size: 36px;" class="far fa-times-circle"></i></a>
            </div>
        </div>


        <!--app-->

        <div class="header">
            <nav class="navbar web-content fixed-top navbar-site navbar-light bg-light navbar-expand-md" role="navigation">
                <div class="container-fluid">

                    <div class="navbar-identity p-sm-0">


                        <button class="navbar-toggler -toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30" focusable="false">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </button>

                    </div>

                    <div class="navbar-collapse collapse" id="navbarsDefault">


                        <?php if (isset($_SESSION['siteuser']) && $_SESSION['siteuser']['is_loggedin'] == true) { ?>
                            <ul class="nav navbar-nav me-md-auto navbar-left">
                                <li class="nav-item ">
                                    <a href="<?= base_url() ?>logout" class="nav-link">
                                        <i class="icon-logout "></i> Log Out &nbsp;
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?= base_url() ?>my_ads" class="nav-link">
                                        <i class="icon-th-thumb"></i> My Ads
                                    </a>
                                </li>
                                <li class="nav-item hidden-sm">
                                    <a href="<?= base_url() ?>profile" class="nav-link">
                                        <i class="icon-user fa hidden-sm"></i> <?= $_SESSION['siteuser']['name'] ?>
                                    </a>
                                </li>
                                <!--				<li class="nav-item dropdown no-arrow">-->
                                <!--					<a data-toggle="collapse" data-target="#demo" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" style="display: flex;-->
                                <!--align-items: center;">-->
                                <!--						<i class="icon-user fa hidden-sm"></i>-->
                                <!--						<span><?= $_SESSION['siteuser']['name'] ?></span>-->
                                <!--						<span class="badge badge-pill badge-important count-threads-with-new-messages hidden-sm">0</span>-->
                                <!--						<i class="icon-down-open-big fa"></i>-->
                                <!--					</a>-->
                                <!--					<ul id="demo" class="collapse dropdown-menu user-menu dropdown-menu-right shadow-sm">-->
                                <!--						<li class="dropdown-item active">-->
                                <!--							<a href="<?= base_url() ?>profile">-->
                                <!--								<i class="icon-home"></i> Personal Home-->
                                <!--							</a>-->
                                <!--						</li>-->
                                <!--						<li class="dropdown-item"><a href="<?= base_url() ?>my_ads"><i class="icon-th-thumb"></i> My ads </a></li>-->
                                <!-- <li class="dropdown-item"><a><i class="icon-heart"></i> Favourite ads </a></li>
				<!--				<li class="dropdown-item"><a><i class="icon-star-circled"></i> Saved searches </a></li>-->
                                <!--				<li class="dropdown-item"><a><i class="icon-hourglass"></i> Pending approval </a></li>-->
                                <!--				<li class="dropdown-item"><a><i class="icon-folder-close"></i> Archived ads</a></li>-->
                                <!--				<li class="dropdown-item">-->
                                <!--					<a>-->
                                <!--						<i class="icon-mail-1"></i> Messenger-->
                                <!--						<span class="badge badge-pill badge-important count-threads-with-new-messages">0</span>-->
                                <!--					</a>-->
                                <!--				</li>-->
                                <!--				<li class="dropdown-item"><a><i class="icon-money"></i> Transactions</a></li> -->
                                <!--						<li class="dropdown-divider"></li>-->
                                <!--						<li class="dropdown-item">-->
                                <!--							<a href="<?= base_url() ?>logout"><i class="icon-logout"></i> Log Out</a>-->
                                <!--						</li>-->
                                <!--					</ul>-->
                                <!--				</li>-->



                                <!--<li class="nav-item postadd">-->
                                <!--	<a class="btn btn-block btn-border btn-post btn-add-listing" href="http://doodles.learning-ideas.com/posts/create">-->
                                <!--		<i class="fa fa-plus-circle"></i> Add Listing-->
                                <!--	</a>-->
                                <!--</li>-->



                            </ul>

                        <?php } else { ?>

                            <ul class="nav navbar-nav me-md-auto navbar-left">
                                <!--<li class="nav-item p-2">-->
                                <!--    <a href="<?= base_url(); ?>login" class="nav-link"><i class="icon-user fa"></i> Log In</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item p-2">-->
                                <!--    <a href="<?= base_url(); ?>register" class="nav-link"><i class="icon-user-add fa"></i> Breeder Application</a>-->
                                <!--</li>-->



                                <!--<li class="nav-item postadd">-->
                                <!--	<a class="btn btn-block btn-border btn-post btn-add-listing" href="<?= base_url(); ?>assets/front/posts/create">-->
                                <!--		<i class="fa fa-plus-circle"></i> Add Listing-->
                                <!--	</a>-->
                                <!--</li>-->



                            </ul>
                        <?php } ?>


                        <!--<ul class="nav navbar-nav  topfaq navbar-right hidden-sm">-->

                        <!--	<li class="nav-item">-->
                        <!--		<a href="<?= base_url(); ?>faq" class="nav-link">FAQ</a>-->
                        <!--	</li>-->

                        <!--	<li class="nav-item">-->
                        <!--		<a href="<?= base_url(); ?>avoid-scams" class="nav-link">Avoid Scams</a>-->
                        <!--	</li>-->

                        <!--</ul>-->
                        <?php $buk = $this->input->cookie('bookmarks');
                        if (empty($buk)) {
                            $cnt = 0;
                        } else {
                            $bookmark = explode(',', $buk);
                            $cnt = count($bookmark);
                        } ?>
                        <!--						<a href="<?= base_url() ?>bookmarks">-->
                        <!--							<button href="/" style="-->
                        <!--    border: unset;-->
                        <!--    background: #343333;-->
                        <!--    padding: 5px 10px;-->
                        <!--    border-radius: 5px;-->
                        <!--    font-size: 14pt;-->
                        <!--    color: #fff;-->
                        <!--"><i class="icon-heart fa"></i> <small class="bookmark_count"><?= $cnt ?></small></button>-->
                        <!--						</a>-->
                    </div>


                </div>
            </nav>
        </div>


        <div class="tphdrsec app-content" style="display:none; padding:10px">
            <div class="container">

                <div class="row">
                    <div class="col-1 col-md-1 "></div>
                    <div class="col-10 col-md-10 ">

                        <a href="<?= base_url(); ?>" class="navbar-brand logo logo-title">
                            <img src="<?= base_url(); ?>assets/lazyload.gif" data-src="<?= base_url(); ?>assets/logo10.png" class="img-fluid" alt="MyPupCentral">

                        </a>
                    </div>
                    <div class="col-1 col-md-1 "></div>
                </div>
            </div>
        </div>
        <div class="tphdrsec web-content header_stickey">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-9 col-md-3 col-lg-3">

                        <a href="<?= base_url(); ?>" class="navbar-brand logo logo-title mt-2 mb-2">
                            <img src="<?= base_url(); ?>assets/lazyload.gif" data-src="<?= base_url(); ?>assets/logo10.png" class="img-fluid brand-logo-img" alt="MyPupCentral">

                        </a>
                        <!--                    <p style="-->
                        <!--    /* display: block; */-->
                        <!--    font-size: 0.6vw;-->
                        <!--    width: 139px;-->
                        <!--    margin-bottom: 4px;-->
                        <!--">My Pup Central insures you will be buying from a verified breeder.</p>-->
                    </div>
                    <div class="col-md-9 col-3 col-lg-9">

                        <div id="main-nav" class="stellarnav">
                            <label for="search-terms" class="pt-2 search-label d-block d-md-none" style="cursor: pointer;" id="search-label"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAgCAMAAABJuvqBAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjA0NTZGMzIxRUNFQzExRTY5ODZERTAxMDA0RDc3N0Q3IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjA0NTZGMzIyRUNFQzExRTY5ODZERTAxMDA0RDc3N0Q3Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDQ1NkYzMUZFQ0VDMTFFNjk4NkRFMDEwMDRENzc3RDciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDQ1NkYzMjBFQ0VDMTFFNjk4NkRFMDEwMDRENzc3RDciLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7p5TyCAAABZVBMVEUIAAAAAAj///l3d3caAABvwv8AAA3o+f//+dv5////wm/b+f/Y9f+dPwgIP53/1I7/+eEkAABGDQA/CAD/25nLqHj/7MoiCAAQN19OrObd//+GgF1tncRvGgAADRo0AADw+f9QLhPT4vCdy+LjrE624fnov28IYboADTeTKwCSqcz/+cK/7P//4KITIkQkjtTs0ZP//9fw3NO28P9Gk8/f9f+SvN//7MIACD+Azf/swnX///UAABUNAAApX6gAFXsidb8IImj5250ACCJhuvPjqEgIInW2YRoIIlrMqZJ3alDw//+i3f8NRp0uEwjZ7PU/ndvPnVR6Nw3/7LaAMAh6xvArk9ddCADK+f9vCAAAOZ3//+zbnT/i07JOrOP5v2j1////+fD/+c0/AADKexW2XQh1xv+T0ewADUbYmT8Ab8KAGgD/9eXC7P+/ejfswm9EXXf58Nz/+egAAF0AFWgAAAD////z7oNeAAABEklEQVR42mIoIwowDBllhZ7MzMxa/viVCeTZloIAmx0PHmViIaUw4JaLUxkHb2mph7JCWWJsUGkpHzcuZSoMMEkB99LSMBzKDDVLS3Sg7KTsUvsI7Mp0k0v14aKupTaW2JVxlZaywkX5BZE4uJWJyJe6YFcGNEASLhpfypiGXZl2ZGmUFJQdnVpabIxdGVNKKWMAJ4SpxlKq7o0j3ILDS9lM2IGMokCWUgsfnJFlJV5aKlfA7OUHjC0JswScUW8gBI1SDWkGRgd2nAkpR1SRoZRRT8YUFL++PISTpblsaamjKuHU6yRcWpqRTjiR57OUljqHElTGFMNQWppFOMtYZzIwxhGRs5iMlDiHXq7HCQACDACYnQfQhh7EZgAAAABJRU5ErkJggg==" /></label>
                            <ul>
                                <!--<li><a href="<?= base_url(); ?>">Home</a></li>-->
                                <!--<li><a href="<?= base_url(); ?>ads">Available Puppies</a></li>-->
                                <li><a href="<?= base_url(); ?>available-breeds">Breeds</a></li>
                               <li><a href="<?= base_url(); ?>reviews">Reviews</a></li>
                               <li><a href="<?= base_url(); ?>training">Training Program</a></li>
                                <li><a href="#" onclick="location.href='<?= base_url() ?>process'" class="dropdown-toggle" data-toggle="dropdown">Our Process <i class="fa fa-angle-down u-header__nav-link-icon"></i></a>
                                    <ul class="dropdown-menu ">
                                        <li><a href="<?= base_url() ?>process">Our Process</a></li>
                                        <li><a href="<?= base_url() ?>standard">Our Standards</a></li>
                                        <!--<li><a href="#">Health Guarantee</a></li>-->
                                        <!--<li><a href="#">Puppy First Approach</a></li>-->
                                        <!--<li><a href="#">Puppy First Approach</a></li>-->
                                        <!--<li><a href="#">No Puppy Mill Pledge</a></li>-->
                                        <!--<li><a href="#">Fighting Puppy Scams</a></li>-->

                                        <li><a href="<?= base_url() ?>transportation">Puppy Travel</a></li>
                                        <!--<li><a href="<?= base_url(); ?>contact"> Contact Us </a></li>-->
                                        <!--<li><a href="#">Our Team</a></li>-->
                                    </ul>
                                </li>
                                
                                
                                 <li><a href="#" onclick="location.href='<?= base_url() ?>process'" class="dropdown-toggle" data-toggle="dropdown">Resources <i class="fa fa-angle-down u-header__nav-link-icon"></i></a>
                                    <ul class="dropdown-menu ">
                                        <li><a href="<?= base_url() ?>page/blog">Blogs</a></li>
                                        <li><a href="<?= base_url() ?>shopping">Shopping lists</a></li>
                                       
                                      
                                    </ul>
                                </li>
                                
                                
                                
                                <!--<li><a href="<?= base_url() ?>success-stories">Reviews</a></li>-->
                                <!--<li><a href=" <?= base_url() ?>Page/blog">Blog</a></li>-->
                                <li><a href=" <?= base_url(); ?>ads"><button class="btn btn-primary btn-lg"><i class="fas fa-paw"></i> Available Puppies</button></a></li>
                                <li><label for="search-terms" class="pt-2 search-label d-none d-md-block " style="cursor: pointer;" id="search-label"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAAgCAMAAABJuvqBAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjA0NTZGMzIxRUNFQzExRTY5ODZERTAxMDA0RDc3N0Q3IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjA0NTZGMzIyRUNFQzExRTY5ODZERTAxMDA0RDc3N0Q3Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDQ1NkYzMUZFQ0VDMTFFNjk4NkRFMDEwMDRENzc3RDciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDQ1NkYzMjBFQ0VDMTFFNjk4NkRFMDEwMDRENzc3RDciLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7p5TyCAAABZVBMVEUIAAAAAAj///l3d3caAABvwv8AAA3o+f//+dv5////wm/b+f/Y9f+dPwgIP53/1I7/+eEkAABGDQA/CAD/25nLqHj/7MoiCAAQN19OrObd//+GgF1tncRvGgAADRo0AADw+f9QLhPT4vCdy+LjrE624fnov28IYboADTeTKwCSqcz/+cK/7P//4KITIkQkjtTs0ZP//9fw3NO28P9Gk8/f9f+SvN//7MIACD+Azf/swnX///UAABUNAAApX6gAFXsidb8IImj5250ACCJhuvPjqEgIInW2YRoIIlrMqZJ3alDw//+i3f8NRp0uEwjZ7PU/ndvPnVR6Nw3/7LaAMAh6xvArk9ddCADK+f9vCAAAOZ3//+zbnT/i07JOrOP5v2j1////+fD/+c0/AADKexW2XQh1xv+T0ewADUbYmT8Ab8KAGgD/9eXC7P+/ejfswm9EXXf58Nz/+egAAF0AFWgAAAD////z7oNeAAABEklEQVR42mIoIwowDBllhZ7MzMxa/viVCeTZloIAmx0PHmViIaUw4JaLUxkHb2mph7JCWWJsUGkpHzcuZSoMMEkB99LSMBzKDDVLS3Sg7KTsUvsI7Mp0k0v14aKupTaW2JVxlZaywkX5BZE4uJWJyJe6YFcGNEASLhpfypiGXZl2ZGmUFJQdnVpabIxdGVNKKWMAJ4SpxlKq7o0j3ILDS9lM2IGMokCWUgsfnJFlJV5aKlfA7OUHjC0JswScUW8gBI1SDWkGRgd2nAkpR1SRoZRRT8YUFL++PISTpblsaamjKuHU6yRcWpqRTjiR57OUljqHElTGFMNQWppFOMtYZzIwxhGRs5iMlDiHXq7HCQACDACYnQfQhh7EZgAAAABJRU5ErkJggg==" /></label>

                                </li>


                                <!--<li><div class="alert alert-primary mb-0" role="alert">-->
                                <!--                           Call Us! (000) 111-3333-->
                                <!--                       </div></li>-->



                                <!--<li><a href="<?= base_url(); ?>">Home</a></li>-->
                                <!--<li><a href="<?= base_url(); ?>ads">Puppies</a></li>-->
                                <!--<li><a href="<?= base_url() ?>breeds_list">Puppies By Breed</a></li>-->
                                <!--<li><a href="<?= base_url() ?>transportation">Shipping</a></li>-->
                                <!--<li><a href="<?= base_url('sold'); ?>">Adopted Puppies</a></li>-->
                                <!--<li><a href="<?= base_url('our-pledge'); ?>">Our Pledge</a></li>-->
                                <!--<li><a href="<?= base_url('contact'); ?>">Contact</a></li>-->
                                <!-- <li><a href=" <?= base_url() ?>Page/blog">Blog</a></li>-->


                            </ul>

                            <div class="dropdown-menu dropdown-menu-search">
                                <div>
                                    <form method="get" action="<?= base_url() ?>ads">
                                        <div class="input-group search-box">
                                            <input type="text" name="search" id="search-box" class="form-control" placeholder="Search here...">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="search-loading-div">


                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:100%;height:100%;margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;" width="317px" height="317px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                            <g transform="rotate(0 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(30 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(60 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(90 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(120 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(150 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(180 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(210 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(240 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(270 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(300 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <g transform="rotate(330 50 50)">
                                                <rect x="47" y="24.5" rx="3" ry="5.5" width="6" height="11" fill="#8cc63f">
                                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
                                                </rect>
                                            </g>
                                            <!-- [ldio] generated by https://loading.io/ -->
                                        </svg>
                                    </div>
                                    <div id="search-result-div" class="search-result-div">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>














        <script>
            $(document).ready(function() {
                var show = false;
                $('.app_search ').click(function(e) {
                    e.preventDefault();
                    if (show == false) {
                        $('.topsearch-nav').show();
                        $('#search-box2').focus();
                        show = true;
                    } else {
                        $('.topsearch-nav').hide();
                        show = false;
                    }
                });
            });

            $(document).ready(function() {
                var show = false;
                $('.search-label ').click(function(e) {
                    e.preventDefault();
                    if (show == false) {
                        $('.dropdown-menu-search').show();
                        $('.search-box').focus();
                        show = true;
                    } else {
                        $('.dropdown-menu-search').hide();
                        show = false;
                    }
                });
            });


            $(document).ready(function() {
                var token = "<?= $this->security->get_csrf_hash(); ?>";
                $('#search-box').keyup(function(e) {
                    var search = $(this).val();
                    get_search_result(search);
                });

                $('#search-box2').keyup(function(e) {
                    var search = $(this).val();
                    get_search_result(search);
                });

                function get_search_result(search) {

                    $(".search-result-div").empty();
                    $('.search-loading-div').show();



                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>Ads/get_search_result",
                        data: {
                            'csrf_test_name': token,
                            'search': search
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $(".search-result-div").empty();
                            $('.search-loading-div').hide();
                            $(".search-result-div").append(response.msg);
                        }
                    });

                }
            });
        </script>