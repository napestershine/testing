<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bizzort</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- new CSS -->
    <link href="css/custom1.css" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Bizzort</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="#" id="abt" class="btn btn-link" data-toggle="modal"
                       data-target="#demo-modal-3">Register</a>
                </li>
                <li>
                    <a href="#" id="login" class="btn btn-default">Login</a>
                </li>
                <li>
                    <a href="#" class="btn btn-default">Contact us</a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<?php
include_once("inc/connect.php");
include_once("functions.php");
$getSlide = "SELECT `header_text` AS title, `description`, `image` FROM `home_slider` limit 1";
$getSlideResult = $pdo->prepare($getSlide);
$getSlideResult->execute();
$getSlide = $getSlideResult->fetchObject();
?>

<!-- Full Page Image Background Carousel Header -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php
        $getSlides = "SELECT `header_text` AS title, `description`, `image` FROM `home_slider` limit 1, 10";
        $getSlideResults = $pdo->prepare($getSlides);
        $getSlideResults->execute();
        if ($getSlideResults->rowCount() > 0) {
            $i = 1;
            while ($getSlides = $getSlideResults->fetchObject()) {
                ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
            <?php }
        } ?>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill"
                 style="background-image:url('<?php echo 'web/homeBackgroundImages/' . $getSlide->image; ?>') ;"></div>
            <div class="carousel-caption">
                <h1 class="hi"><?php echo $getSlide->title; ?></h1>

                <h2><?php echo htmlspecialchars_decode($getSlide->description); ?></h2>
            </div>
        </div>
        <?php
        $getSlides = "SELECT `header_text` AS title, `description`, `image` FROM `home_slider` limit 1, 10";
        $getSlideResults = $pdo->prepare($getSlides);
        $getSlideResults->execute();
        if ($getSlideResults->rowCount() > 0) {
            while ($getSlides = $getSlideResults->fetchObject()) {
                ?>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill"
                         style="background-image:url('<?php echo 'web/homeBackgroundImages/' . $getSlides->image; ?>');"></div>
                    <div class="carousel-caption">
                        <h1 class="hi"><?php echo $getSlides->title; ?></h1>

                        <h2><?php echo htmlspecialchars_decode($getSlides->description); ?></h2>
                    </div>
                </div>
            <?php }
        } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</header>
<!-- start of Multi-step modal window -->
<form class="modal multi-step" id="demo-modal-3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title step-1" data-step="1"></h4>
                <h4 class="modal-title step-2" data-step="2"></h4>
                <h4 class="modal-title step-3" data-step="3"></h4>

                <div class="m-progress">
                    <div class="m-progress-bar-wrapper">
                        <div class="m-progress-bar" style="width: 14.2857%">
                        </div>
                    </div>
                    <div class="m-progress-stats">
                    </div>
                    <div class="m-progress-complete">
                    </div>
                </div>
            </div>
            <div class="modal-body step-1" data-step="1">
                <div class="row linespace">
                    <div class="col-sm-6">
                        <label><input type="radio" name="cat" value="company">Company</label>
                    </div>

                    <div class="col-sm-6">
                        <label><input type="radio" name="cat" value="individual">Individual</label>
                    </div>
                </div>
                <div class="row">
                    <div id="sel"></div>
                    <div id="seltwo"></div>
                </div>
                <br/><br/>
            </div>
            <div class="modal-body step-2" data-step="2">
                <div class="row">
                    <div class="col-sm-offset-2">
                        <a href="#"><img src="images/signUpWithLinkedIn.png"
                                         class="img-responsive image linkedinPad"/><i
                                class="fa fa-linkedin"></i></a>
                        <!-- <a href="#" class="btn btn-default btn-lg"><img src="images/linkedin_logo (1).png" class="img-responsive"/></a>-->
                    </div>
                </div>
                <div class="col-sm-offset-5">
                    <div>
                        <h3 class="h3or">or</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-4">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="button step step-2 signupMargin buttonSignupEmail"
                                    data-step="2"
                                    onclick="sendEvent('#demo-modal-3', 3)"> Sign Up with Email
                            </button>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-body step-3" data-step="3">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Please Register</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group">
                            <input type="text" name="cname" id="cname" class="form-control input-sm"
                                   placeholder="Company Name">
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="fname" id="fname" class="form-control input-sm"
                                           placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="lname" id="lname" class="form-control input-sm"
                                           placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm"
                                   placeholder="Email Address">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password"
                                           class="form-control input-sm"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control input-sm" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group frmSearch">
                                    <select name="country" id="country" class="form-control">
                                        <option value="">-- Select Country --</option>
                                        <?php
                                        include_once("inc/connect.php");
                                        $getCountry = "SELECT `id`, `country` FROM `countries`";
                                        $getCountryResult = $pdo->prepare($getCountry);
                                        $getCountryResult->execute();
                                        if ($getCountryResult->rowCount() > 0) {
                                            while ($row = $getCountryResult->fetchObject()) {
                                                ?>
                                                <option
                                                    value="<?php echo $row->id; ?>"><?php echo $row->country; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select name="state" id="state" class="form-control">
                                        <option value="">-- Select State --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 pull-left">
                                <div class="form-group">
                                    <select id="catOneId" class="form-control">
                                        <option value="0">-- Select Category --</option>
                                        <?php
                                        $checkQuery = "SELECT `id`, `catonename` FROM `catone`";
                                        $checkStmt = $pdo->prepare($checkQuery);
                                        $checkStmt->execute();
                                        if ($checkStmt->rowCount() > 0) {
                                            while ($row = $checkStmt->fetchObject()) {
                                                ?>
                                                <option
                                                    value="<?php echo $row->id; ?>"><?php echo $row->catonename; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 pull-left">
                                <div class="form-group">
                                    <select id="catTwoId" class="form-control">
                                        <option value="0">-- Select Category --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <p>
                                    <input type="checkbox" value="" name="chbox" id="chbox"/>
                                    <label for="chbox">Newsletter </label>
                                </p>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <p>
                                    <input type="checkbox" value="" name="chbox" id="terms"/>
                                    <label for="chbox"> Yes, I agree to all the Terms.
                                    </label>
                                </p>
                            </div>
                        </div>
                        <br/>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <button id="already_registered" type="button" class="btn btn-secondary">Already
                                    Registered
                                </button>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <button id="reg" type="button" class="bttn sub btn btn-primary-register">Register
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cont" class="btn btn-contine-step1 step step-1 bttn" data-step="1"
                        onclick="sendEvent('#demo-modal-3', 2)">Continue
                </button>
            </div>
        </div>
    </div>
</form>
<!-- end of Multi-step modal window -->
<!-- modal for confirmation -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="messageBox"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- end -->
<!-- modal for login -->

<div class="modal fade" id="loginSub" tabindex="-1" role="dialog" aria-labelledby="loginSubmit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Log in</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-md-offset-4">
                            <img src="images/LoginWithlinkedIn.png" class="img-responsive loginwithlinkedinMargin">
                        </div>
                    </div>
                    <div class="col-md-offset-5">
                        <div>
                            <h3 class="h3or">or</h3></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="emailLogin" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="passsLogin" placeholder="Enter password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-1">
                            <button type="button" id="submm" class="btn btn-primary">Log in</button>
                        </div>
                        <div class="col-md-4 text-center">
                            <label>Forgot Password</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end -->


<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/multi-step-modal.js"></script>
<!-- Script to Activate the Carousel -->
<script type="text/javascript">

    // jQuery for carousel
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    });
    $(document).ready(function () {
        if ($('input:radio[name=cat]').is(':checked') === false) {
            $("#cont").prop('disabled', true);
        }

        //radio button change
        $('input:radio[name=cat]').on('change', function () {
            $("#cont").prop('disabled', false);
            $("#seltwo").css("display", "none");
            var v = $('input[name=cat]:checked').val();
            $("#sel").load("ajaxResult/returnValue.php?v=" + v + "");
            // drop down of company
            if (v === "company") {
                $(document).on('change', '#ccat', function () {
                    $("#seltwo").css("display", "block");
                    window.ccat = $("#ccat").val();
                    $("#seltwo").load("ajaxResult/returnValue.php?cat=" + ccat);
                });
            }
            if (v === "individual") {
                $("#cname").prop("disabled", true);
                // drop down of indvidual
                $(document).on('change', '#icat', function () {
                    $("#seltwo").css("display", "block");
                    var icat = $("#icat").val();
                    $("#seltwo").load("ajaxResult/returnValue.php?icat=" + icat);
                });
            }
        });

        $("#cont").on("click", function () {
            var cat = $("#ccat").val();
            if (cat == 5) {
                var allVals = [];
                $('#chk :checked').each(function () {
                    allVals.push($(this).val());
                });
            }
        });

        /**
         * Select box change value script for country and state
         */
        $("#country").on("change", function () {
            var country = $("#country").val();
            $("#state").load("ajaxResult/ctos.php?country=" + country + "");
        });

        /**
         * Select box change value script for cat one and cat two
         */
        $("#catOneId").on("change", function () {
            var catOneId = $("#catOneId").val();
            $("#catTwoId").load("ajaxResult/catOneToCatTwo.php?catOneId=" + catOneId + "");
        });


        // for multistep modal window
        $('#abt').click(function () {
            $('#demo-modal-').modal();
        });

        sendEvent = function (sel, step) {
            $(sel).trigger('next.m.' + step);
        };


        $("#reg").click(function () {
            if ($('#terms').is(':checked')) {
                var v = $('input[name=cat]:checked').val();
                var company = $("#cname").val();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var password2 = $("#password_confirmation").val();
                var country = $("#country").val();
                var state = $("#state").val();
                var catOneId = $("#catOneId").val();
                var catTwoId = $("#catTwoId").val();
                var nl = ($('#chbox').is(':checked') ? 1 : 0 );
                if (v === "company") {
                    var allVals = [];
                    if (ccat == 5) {
                        $('#chk :checked').each(function () {
                            allVals.push($(this).val());
                        });
                    }
                    allVals.toString();
                    $.ajax({
                        url: 'ajaxResult/register.php',
                        type: 'POST',
                        data: {
                            v: v,
                            catOne: ccat,
                            allVals: allVals,
                            company: company,
                            fname: fname,
                            lname: lname,
                            email: email,
                            password: password,
                            password2: password2,
                            country: country,
                            state: state,
                            catOneId: catOneId,
                            catTwoId: catTwoId,
                            nl: nl
                        }
                    }).done(function (data) {
                        if (!data) {
                            window.location.href = "http://bizzort.com/dashboard/profile.php";
                        } else {
                            $("#demo-modal-3").modal('hide');
                            $("#myModal").modal();
                            $("#messageBox").html(data);
                        }
                    });
                }
                if (v === "individual") {
                    var catOne = $(document).on('change', '#icat', function () {
                        return $("#icat").val();
                    });

                    var catTwo = $(document).on('change', '#icattwo', function () {
                        return $("#icattwo").val();
                    });
                    $.ajax({
                        url: 'ajaxResult/register.php',
                        type: 'POST',
                        data: {
                            v: v,
                            catOne: catOne,
                            catTwo: catTwo,
                            allVals: allVals,
                            fname: fname,
                            lname: lname,
                            email: email,
                            password: password,
                            password2: password2,
                            country: country,
                            state: state,
                            catOneId: catOneId,
                            catTwoId: catTwoId,
                            nl: nl
                        }
                    }).done(function (data) {
                        if (!data) {
                            window.location.href = "http://bizzort.com/dashboard/profile.php";
                        } else {
                            $("#demo-modal-3").modal('hide');
                            $("#myModal").modal();
                            $("#messageBox").html(data);
                        }
                    });
                }
            }
            else {
                alert("You have to be agree with Terms of Service");
            }
        });
        $("#login").click(function () {
            $("#loginSub").modal();
        });

        $("#submm").click(function () {
            var emailLogin = $("#emailLogin").val();
            var passLogin = $("#passsLogin").val();
            $.ajax({
                url: 'ajaxResult/login.php',
                type: 'post',
                data: {emailLogin: emailLogin, passLogin: passLogin}
            }).done(function (data) {
                if (!data) {
                    window.location.href = "http://bizzort.com/dashboard/profile.php";
                }
                else {
                    $("#loginSub").modal('hide');
                    $("#myModal").modal();
                    $("#messageBox").html(data);
                }
            });
        });

        $("#already_registered").click(function () {
            $("#demo-modal-3").modal('hide');
            $("#loginSub").modal();
        });
    });
</script>
</body>
</html>