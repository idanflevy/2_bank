<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <title>{{ config('', 'Home - MeteorsBank') }}</title>


    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/css/custom.css') }}">

    <style>
        /* personal css */
    </style>
</head>

<body class=" ">



    <div class="nav-menu">
        <div class="logo1">

            <div>
                <img class="img1" src="{{asset('/images/newlogo.png')}}" alt="">

            </div>

            <div class="logotext">
                Meteorsbank
            </div>
        </div>

        @include('layouts.nav-web')








    </div>

    @include('layouts.nav-web2')

    <div id="carouselExampleControls" class="hidesmall carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="position: absolute;"></div>
                <img class="d-block w-100" src="{{asset('/images/t345.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/images/b2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/images/b3.jpg')}}" alt="Third slide">
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('/images/b4.png')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




    <div class="container" style="margin-top:20px ;">
        <!-- <div class="col-md-12" style="text-align:center ;">
            <h2>Manage your shipments and returns</h2>

        </div> -->
        <!-- <div class="column">
          <img src="{{ asset('/images/icon_courier_purple_lg_1637809911.png') }}" alt="The Logo" class=" imageSect">
        </div> -->

        <div class="row">
            <div class="col-md-4 row-style navbar-toggle collapsed pro-toggle pull-left " style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/icon_courier_purple_lg_1637809911.png') }}" alt="The Logo" class="mx-auto d-block imageSect">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt1">
                    <p style="text-align: left; ">Explore As</p>
                    <p class="img-txt">INDIVIDUAL</p>

                </div>
                <div class="navbar-toggle collapsed pro-toggle pull-left icon-arrow" data-toggle="collapse">
                    <!-- <span class="icon-bar top-bar">Text</span> -->
                    <i class="fa fa-arrow-down arrow icon-bar top-bar toggle-btn" aria-hidden="true"></i>

                </div>
            </div>
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/icon_courier_purple_lg_1637809911.png') }}" alt="The Logo" class="mx-auto d-block imageSect">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt1">
                    <p style="text-align: left; ">Explore As</p>
                    <p class="img-txt">BUSINESS</p>

                </div>
            </div>

            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/icon_courier_purple_lg_1637809911.png') }}" alt="The Logo" class="mx-auto d-block imageSect">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt1">
                    <p style="text-align: left; ">Explore the latest in a</p>
                    <p class="img-txt">FEED VIEW</p>

                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class=" card card-body" style="background-color:#f0efe9">
                    <div class="row">
                        <div class="col-md-4">
                            <h3><strong>Accounts</strong></h3>
                            <h4>Salary Account</h4>
                            <p>With Meteorsbank's Salary Account, access your salary 24/7
                                in a convenient and easy manner!​Benefit from a set of
                                facilities and free services coupled with added value
                                to your salary!... </p>
                            <hr>
                            <h4>Checking Account</h4>
                            <p> Meteorsnank offers its Checking Account for all individuals,
                                Companies and Non-Profit Associations What do you get?</p>
                            <hr>
                            <h4>Current Account</h4>
                            <p>
                                Meteorsbank offers its Current Account for all Physical and Moral Individuals who wish to open a current account that allows debit and credit operations What... Read more</p>
                            <hr>
                            <h4>Fresh Funds Account</h4>
                            <p> The Fresh Funds Account is tailored for individuals & companies who receive international wire transfers or deposit cash in foreign currencies with features that were customized to provide a smooth... </p>


                        </div>

                        <div class="col-md-4">
                            <h3><strong>Payment Cards</strong></h3>
                            <h4>Accessibility Cards</h4>
                            <p>
                                Do you wish to stay in control of your money and make easy and safe transactions without having to carry around cash? </p>
                            <hr>
                            <h4>Credit Cards</h4>
                            <p> Use your MeteorsBank Card to manage and control your business and employees' work-related expenses and benefit at the same time from valuable features, useful business tools and choices of rewards.</p>
                            <hr>
                            <h4>Elite Credit Cards</h4>
                            <p>
                                MeteorsBank Card is the defining purchasing tool for premium cardholders looking for worldwide acceptance, excellent service and access to remarkable benefits. If your passion is savouring life's pleasures, this card is up to the task. </p>
                            <hr>
                            <h4>Cash Back Reward Program</h4>
                            <p> With Meteorsbank you can benefit from a loyalty program that offers you cash rewards: The Cash Back Reward Program. </p>

                        </div>
                        <div class="col-md-4">
                            <h3><strong>Insurance & Savings</strong></h3>
                            <h4>Meteorsjeunesse – Education Saving & Insurance Plan</h4>
                            <p> Are you looking to secure your children's education with a saving plan that offers you the best return on investement?</p>
                            <hr>
                            <h4>Meteorsplus: Life Insurance Plan with Accidental Coverage</h4>
                            <p>Are you looking to secure yourself and your family from any incident you may go through in life? </p>
                            <hr>
                            <h4>Meteorsvenir - Retirement Saving Plan</h4>
                            <p>Who said income has to end when retirement begins? </p>
                            <hr>
                            <h4>Meteorsvie – Life Insurance Plan</h4>
                            <p>Sometimes in life, you may encounter events and incidents that create unanticipated results and unexpected challenges </p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/k1.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect-1">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt2">
                    <p style="text-align: left; ">New Update !!!</p>
                    <p class="img-txt-1">BDL Circulars 158 & 161 ATM USD Cash Withdrawal</p>

                </div>
            </div>
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/k2.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect-1">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt2">
                    <p style="text-align: left; ">New Update !!!</p>
                    <p class="img-txt-1">BDL Circulars 158 & 161 ATM USD Cash Withdrawal</p>

                </div>
            </div>
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/k2.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect-1">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt2">
                    <p style="text-align: left; ">New Update !!!</p>
                    <p class="img-txt-1">BDL Circulars 158 & 161 ATM USD Cash Withdrawal</p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/k1.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect-1">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt2">
                    <p style="text-align: left; ">New Update !!!</p>
                    <p class="img-txt-1">BDL Circulars 158 & 161 ATM USD Cash Withdrawal</p>

                </div>
            </div>
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/k2.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect-1">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt2">
                    <p style="text-align: left; ">New Update !!!</p>
                    <p class="img-txt-1">BDL Circulars 158 & 161 ATM USD Cash Withdrawal</p>

                </div>
            </div>
            <div class="col-md-4 row-style" style="cursor: pointer;" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/k2.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect-1">

                </div>
                <div class=" mb-4 box-shadow align-items-center img-txt2">
                    <p style="text-align: left; ">New Update !!!</p>
                    <p class="img-txt-1">BDL Circulars 158 & 161 ATM USD Cash Withdrawal</p>

                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="container" style="margin-top: 40px;">
        <div class="col-md-12">
            <h2>EXPLORE MORE</h2>

        </div>
        <!-- <div class="column">
          <img src="{{ asset('/images/icon_courier_purple_lg_1637809911.png') }}" alt="The Logo" class=" imageSect">
        </div> -->

        <div class="row" style="margin-top: 20px;">
            <div class=" col-md-4 ">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/c3.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect2">
                    <p class="explore">Prepaid Card Balance Inquiry</p>

                </div>
            </div>



            <div class=" col-md-4 ">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/b1.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect2">
                    <p class="explore">Car Mecanique Calculator</p>

                </div>
            </div>

            <div class=" col-md-4 ">
                <div class=" mb-4 box-shadow align-items-center">
                    <img src="{{ asset('/images/c2.jpg') }}" alt="The Logo" class="mx-auto d-block imageSect2">
                    <p class="explore">Branch and ATM Locator</p>

                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="col-md-12" style="text-align:center ;">

            <hr class="featurette-divider">

            <div class="row featurette mb-3">
                <div class="col-md-8 to-help">
                    <div style="padding:30px;" ;>
                        <h5 style="text-align: left; font-size:24px;color:white; margin-bottom:30px;">
                            WE'RE HERE TO HELP
                        </h5>
                        <div class="row">
                            <div class="col-md-4">
                                <p style="font-size: 18px;color:white;" class="">If you’re looking for any information about
                                    MeteorsBank products and services or would like to reach
                                    us, our agents are ready to get your queries answered.</p>
                            </div>
                            <div class="col-md-4">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="phone-cl">
                                            <i class="fas fa-phone item-icon-1"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 style=" color:white;">
                                            CALL US
                                        </h4>
                                        <p style="font-size: 14px; color:white;">+961-1-734 000 <br />
                                            1552 (inside lebanon)</p>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="phone-cl">
                                            <!-- <i class="fas fa-phone item-icon-1"></i> -->
                                            <i class="fas fa-envelope-open item-icon-1"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 style=" color:white;">
                                            SEND US A MESSAGE
                                        </h4>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4" style="background-color: #feeb97 ;">
                    <p class="lead">
                    <div style="font-size:24px; color:#003470; margin-top:45px;">
                        BUSINESS ETHICS & CUSTOMER PROTECTION
                    </div>
                    <div style="margin-top:10px;">
                        <button type="button" class="btn btn-1 default  btn-lg">KNOW YOUR RIGHTS AN DUTY</button>
                    </div>

                    <div style="margin-top:10px;">
                        <button type="button" class="btn btn-1 default  btn-lg">COMPLAINTS / FEEDBACK FORM</button>
                    </div>

                    <div style="margin-top:10px;">
                        <button type="button" class="btn btn-1 default  btn-lg">GENERAL TERMS AND CONDITIONS</button>
                    </div>
                </div>
            </div>
        </div>



    </div>





    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">



        <!-- Copyright -->
        <div class=" footer-copyright text-center py-3" style="color: #b2b4b7;">Copyright © 2021 MeteorsBank. All rights reserved <br />
            No.1 on the list of banks. BDL Authorization No. 11/438 dated 21.09.2006. Designed and developed by Borninteractive
            <a href="/"></a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->





    <!-- @auth
  <script>
 window.user=@json(auth()->user())
  </script>
  @endauth -->


    <script src="{{ mix('/js/app.js') }}"></script>

    <script>
        // $('.toggle-btn').on('click', function() {
        //     $(this).toggleClass('active')
        // });
        $(document).ready(function() {
            $(".pro-toggle").on("click", function() {
                $(".top-bar").toggleClass("active");
            });
        });
    </script>
</body>

</html>