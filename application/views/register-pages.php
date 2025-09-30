<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>Sistem Tempahan Bilik Mesyuarat</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="<?php echo base_url(); ?>login-assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>login-assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>login-assets/css/swiper.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>login-assets/css/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>login-assets/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Sitem Tempahan Bilik Mesyuarat</a> -->

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image"><img src="<?php echo base_url(); ?>/assets/img/kaiadmin/favicon.png" alt="alternative"></a> -->
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="ex-2-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                   
                    <!-- Sign Up Form -->
                     
                    <div class="form-container">
                        
                        <form id="registerForm" data-toggle="validator" data-focus="false">
                            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">STBM</a> -->
                             
                            <h4><a class=""><img src="<?php echo base_url(); ?>/assets/img/kaiadmin/favicon.png" alt="alternative" width="10%"></a> Sistem Tempahan Bilik Mesyuarat</h4>
                            <label style="color:grey;font-family: nunito-light, sans-serif;">Sila isi semua maklumat berikut untuk mendaftar akaun</label>
                            <br><br>
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="rname" name="name" required>
                                <label class="label-control" for="lemail">Nama</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" name="email" id="remail" required>
                                <label class="label-control" for="lemail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control-input" name="password" id="rpassword" required>
                                <label class="label-control" for="lpassword">Kata Laluan</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">DAFTAR</button>
                            </div>
                            <p style="color:grey; text-align: center; font-family: nunito-light, sans-serif;">Sudah mempunyai akaun? <a class="blue" href="<?php echo base_url(); ?>">Log masuk</a> </p> 
                            <div class="form-message">
                                <div id="lmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                    </div> <!-- end of form container -->
                    <!-- end of sign up form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>login-assets/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="<?php echo base_url(); ?>login-assets/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="<?php echo base_url(); ?>login-assets/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="<?php echo base_url(); ?>login-assets/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="<?php echo base_url(); ?>login-assets/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="<?php echo base_url(); ?>login-assets/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="<?php echo base_url(); ?>login-assets/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <?/*php <script src="<?php echo base_url(); ?>login-assets/js/scripts.js"></script>  */?>

    <script>

        var base_url = "<?php echo base_url(); ?>";

        (function($) {
            "use strict"; 
            
            /* Preloader */
            $(window).on('load', function() {
                var preloaderFadeOutTime = 500;
                function hidePreloader() {
                    var preloader = $('.spinner-wrapper');
                    setTimeout(function() {
                        preloader.fadeOut(preloaderFadeOutTime);
                    }, 500);
                }
                hidePreloader();
            });

            
            /* Navbar Scripts */
            // jQuery to collapse the navbar on scroll
            $(window).on('scroll load', function() {
                if ($(".navbar").offset().top > 60) {
                    $(".fixed-top").addClass("top-nav-collapse");
                } else {
                    $(".fixed-top").removeClass("top-nav-collapse");
                }
            });

            // jQuery for page scrolling feature - requires jQuery Easing plugin
            $(function() {
                $(document).on('click', 'a.page-scroll', function(event) {
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 600, 'easeInOutExpo');
                    event.preventDefault();
                });
            });

            // closes the responsive menu on menu item click
            $(".navbar-nav li a").on("click", function(event) {
            if (!$(this).parent().hasClass('dropdown'))
                $(".navbar-collapse").collapse('hide');
            });


            /* Image Slider - Swiper */
            var imageSlider = new Swiper('.image-slider', {
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false
                },
                loop: true,
                spaceBetween: 30,
                slidesPerView: 5,
                breakpoints: {
                    // when window is <= 580px
                    580: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    // when window is <= 768px
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    // when window is <= 992px
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    // when window is <= 1200px
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 20
                    },

                }
            });


            /* Text Slider - Swiper */
            var textSlider = new Swiper('.text-slider', {
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false
                },
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            });


            /* Video Lightbox - Magnific Popup */
            $('.popup-youtube, .popup-vimeo').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com/', 
                            id: function(url) {        
                                var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                                if ( !m || !m[1] ) return null;
                                return m[1];
                            },
                            src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                        },
                        vimeo: {
                            index: 'vimeo.com/', 
                            id: function(url) {        
                                var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                                if ( !m || !m[5] ) return null;
                                return m[5];
                            },
                            src: 'https://player.vimeo.com/video/%id%?autoplay=1'
                        }
                    }
                }
            });


            /* Details Lightbox - Magnific Popup */
            $('.popup-with-move-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false, /* keep it false to avoid html tag shift with margin-right: 17px */
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });
            
            
            /* Move Form Fields Label When User Types */
            // for input and textarea fields
            $("input, textarea").keyup(function(){
                if ($(this).val() != '') {
                    $(this).addClass('notEmpty');
                } else {
                    $(this).removeClass('notEmpty');
                }
            });


            /* Sign Up Form */
            $("#signUpForm").validator().on("submit", function(event) {
                if (event.isDefaultPrevented()) {
                    // handle the invalid form...
                    sformError();
                    // ssubmitMSG(false, "Please fill all fields!");
                } else {
                    // everything looks good!
                    event.preventDefault();
                    ssubmitForm();
                }
            });

            function ssubmitForm() {
                // initiate variables with form content
                var email = $("#semail").val();
                var name = $("#sname").val();
                var password = $("#spassword").val();
                var terms = $("#sterms").val();
                
                $.ajax({
                    type: "POST",
                    url: "php/signupform-process.php",
                    data: "email=" + email + "&name=" + name + "&password=" + password + "&terms=" + terms, 
                    success: function(text) {
                        if (text == "success") {
                            sformSuccess();
                        } else {
                            sformError();
                            ssubmitMSG(false, text);
                        }
                    }
                });
            }

            function sformSuccess() {
                $("#signUpForm")[0].reset();
                ssubmitMSG(true, "Sign Up Submitted!");
                $("input").removeClass('notEmpty'); // resets the field label after submission
            }

            function sformError() {
                $("#signUpForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $(this).removeClass();
                });
            }

            function ssubmitMSG(valid, msg) {
                if (valid) {
                    var msgClasses = "h3 text-center tada animated";
                } else {
                    var msgClasses = "h3 text-center";
                }
                $("#smsgSubmit").removeClass().addClass(msgClasses).text(msg);
            }


            /* Log In Form */
            $("#logInForm").validator().on("submit", function(event) {
                if (event.isDefaultPrevented()) {
                    // handle the invalid form...
                    lformError();
                    // lsubmitMSG(false, "Please fill all fields!");
                } else {
                    // everything looks good!
                    event.preventDefault();
                    lsubmitForm();
                }
            });

            function lsubmitForm() {
                // initiate variables with form content
                var email = $("#lemail").val();
                var password = $("#lpassword").val();
                
                $.ajax({
                    type: "POST",
                    url: "php/loginform-process.php",
                    data: "email=" + email + "&password=" + password, 
                    success: function(text) {
                        if (text == "success") {
                            lformSuccess();
                        } else {
                            lformError();
                            lsubmitMSG(false, text);
                        }
                    }
                });
            }

            function lformSuccess() {
                $("#logInForm")[0].reset();
                lsubmitMSG(true, "Log In Submitted!");
                $("input").removeClass('notEmpty'); // resets the field label after submission
            }

            function lformError() {
                $("#logInForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $(this).removeClass();
                });
            }

            function lsubmitMSG(valid, msg) {
                if (valid) {
                    var msgClasses = "h3 text-center tada animated";
                } else {
                    var msgClasses = "h3 text-center";
                }
                $("#lmsgSubmit").removeClass().addClass(msgClasses).text(msg);
            }


            /* Newsletter Form */
            $("#newsletterForm").validator().on("submit", function(event) {
                if (event.isDefaultPrevented()) {
                    // handle the invalid form...
                    nformError();
                    // nsubmitMSG(false, "Please fill all fields!");
                } else {
                    // everything looks good!
                    event.preventDefault();
                    nsubmitForm();
                }
            });

            function nsubmitForm() {
                // initiate variables with form content
                var email = $("#nemail").val();
                var terms = $("#nterms").val();
                $.ajax({
                    type: "POST",
                    url: "php/newsletterform-process.php",
                    data: "email=" + email + "&terms=" + terms, 
                    success: function(text) {
                        if (text == "success") {
                            nformSuccess();
                        } else {
                            nformError();
                            nsubmitMSG(false, text);
                        }
                    }
                });
            }

            function nformSuccess() {
                $("#newsletterForm")[0].reset();
                nsubmitMSG(true, "Subscribed!");
                $("input").removeClass('notEmpty'); // resets the field label after submission
            }

            function nformError() {
                $("#newsletterForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $(this).removeClass();
                });
            }

            function nsubmitMSG(valid, msg) {
                if (valid) {
                    var msgClasses = "h3 text-center tada animated";
                } else {
                    var msgClasses = "h3 text-center";
                }
                $("#nmsgSubmit").removeClass().addClass(msgClasses).text(msg);
            }
            

            /* Privacy Form */
            $("#privacyForm").validator().on("submit", function(event) {
                if (event.isDefaultPrevented()) {
                    // handle the invalid form...
                    pformError();
                    // psubmitMSG(false, "Please fill all fields!");
                } else {
                    // everything looks good!
                    event.preventDefault();
                    psubmitForm();
                }
            });

            function psubmitForm() {
                // initiate variables with form content
                var name = $("#pname").val();
                var email = $("#pemail").val();
                var select = $("#pselect").val();
                var terms = $("#pterms").val();
                
                $.ajax({
                    type: "POST",
                    url: "php/privacyform-process.php",
                    data: "name=" + name + "&email=" + email + "&select=" + select + "&terms=" + terms, 
                    success: function(text) {
                        if (text == "success") {
                            pformSuccess();
                        } else {
                            pformError();
                            psubmitMSG(false, text);
                        }
                    }
                });
            }

            function pformSuccess() {
                $("#privacyForm")[0].reset();
                psubmitMSG(true, "Request Submitted!");
                $("input").removeClass('notEmpty'); // resets the field label after submission
            }

            function pformError() {
                $("#privacyForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                    $(this).removeClass();
                });
            }

            function psubmitMSG(valid, msg) {
                if (valid) {
                    var msgClasses = "h3 text-center tada animated";
                } else {
                    var msgClasses = "h3 text-center";
                }
                $("#pmsgSubmit").removeClass().addClass(msgClasses).text(msg);
            }
            

            /* Back To Top Button */
            // create the back to top button
            $('body').prepend('<a href="body" class="back-to-top page-scroll">Back to Top</a>');
            var amountScrolled = 700;
            $(window).scroll(function() {
                if ($(window).scrollTop() > amountScrolled) {
                    $('a.back-to-top').fadeIn('500');
                } else {
                    $('a.back-to-top').fadeOut('500');
                }
            });


            /* Removes Long Focus On Buttons */
            $(".button, a, button").mouseup(function() {
                $(this).blur();
            });

            function lsubmitMSG(valid, msg) {
                    if (valid) {
                        var msgClasses = "h3 text-center tada animated";
                    } else {
                        var msgClasses = "h3 text-center";
                    }
                    $("#lmsgSubmit").removeClass().addClass(msgClasses).text(msg);
                }

                $("#registerForm").validator().on("submit", function(event) {
                    if (event.isDefaultPrevented()) {
                        // handle the invalid form...
                        rformError();
                        // lsubmitMSG(false, "Please fill all fields!");
                    } else {
                        // everything looks good!
                        event.preventDefault();
                        rsubmitForm();
                    }
                });

                function rformError() {
                    $("#registerForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        $(this).removeClass();
                    });
                }

                function rsubmitForm() {

                    // initiate variables with form content
                    var email       = $("#remail").val();
                    var name        = $("#rname").val();
                    var password    = $("#rpassword").val();
                    
                    $.ajax({
                        type: "POST",
                        url: base_url + "auth/register",
                        dataType: "json",
                        data: "email=" + email + "&password=" + password + "&name=" + name, 
                        success: function(data) {
                            console.log(data);
                            if (data.result === true) {
                                rformSuccess(data.message);
                            } else {
                                lformError();
                                lsubmitMSG(false, data.result);
                            }
                        }
                    });
                }

                function rformSuccess(msg) {
                    $("#registerForm")[0].reset();
                    lsubmitMSG(true, msg);
                    $("input").removeClass('notEmpty'); // resets the field label after submission
                }

        })(jQuery);

    </script>

</body>
</html>