<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <title>{{ config('', 'BHL') }}</title>


    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>


    <style>
        .jumbotron {
            padding: 2rem 1rem;
            margin-bottom: 2rem;
            /* background-color: red; */
            /* border-radius: 0.3rem; */
            background-image: url('/images/ushp_hero_june.jpg');
            background-size: 100% 100%;
            min-height: 480px;
        }

        /* personal css */

        .navheader {

            display: flex;
            justify-content: center;

            max-height: 75px;
            background-color: rgb(77, 20, 140);


        }

        .box1 {
            width: 100px;
            height: 100px;
            background-color: white;
            text-align: center;
            justify-content: center;


        }

        .imageSect2 {
            width: 307px;
            width: 250px;


        }

        .imageSect {
            width: 30%;
            margin-bottom: 10px;
            align-items: center;

        }

        .custombtn {
            height: 120px;
            width: 120px;
            margin-left: -3px;
            margin-right: -3px;
            border: 5px solid rgb(224, 218, 218);
            background-color: rgb(77, 20, 140);
            color: white;
            border-radius: 0;
        }

        /* .navheader  a{

 color: white;
 font-size: 14px;
 font-family: 'Roboto', sans-serif;
 font-weight:400 ;
 line-height: 14px;


} */



        .bannerheader {
            /* color: white; */
            color: white;
            display: flex;
            justify-content: center;
            margin-top: 100px;
            text-align: center;
            flex-direction: column;


        }

        .bannerheader h1 {

            text-align: center;
            font-size: 55px;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            line-height: 60px;

        }

        @media (min-width: 576px) {
            /* .jumbotron {
   padding: 4rem 2rem;
 } */
        }


        /* personal css */
    </style>

    <style>
        .height {
            height: 100vh;
        }


        .search {
            position: relative;
            box-shadow: 0 0 40px rgba(51, 51, 51, .1);

        }

        .search input {

            height: 60px;
            text-indent: 25px;
            border: 2px solid #d6d4d4;


        }


        .search input:focus {

            box-shadow: none;
            border: 2px solid blue;


        }

        .search .fa-search {

            position: absolute;
            top: 500px;
            left: 16px;

        }

        .search button {

            position: absolute;
            top: 5px;
            right: 5px;
            height: 50px;
            width: 110px;
            background: blue;

        }
    </style>
</head>

<body class=" ">

    <nav class="navbar navbar-expand-md navbar-dark  fixed-top" id="banner" style="background-color: rgb(77, 20, 140); color:white;">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><span>BHL</span></a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="/search?query=000000">Tracking</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="#">About</a>
                    </li>
                    <!-- Dropdown -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Dropdown link
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" style="color: black;" href="#">Link 1</a>
                            <a class="dropdown-item" style="color: black;" href="#">Link 2</a>
                            <a class="dropdown-item" style="color: black;" href="#">Link 3</a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="bannerheader">
            <div class="">
                <h1 style="text-align: center;">Ship, manage, track, deliver</h1>
            </div>



            <div class="" style="display: flex;justify-content:center;text-align:center; margin-top:10px;">
                <!-- <form class="form-inline">
          <input class="btntracking form-control " style="width:600px ;" type="search" placeholder="TRACKING ID" aria-label="Search">
          <button class="   btn btn-light btn-lg my-2 my-sm-0" type="submit">Search</button>
        </form> -->
            </div>

        </div>
    </div>




    </div>

    <div class="container mt-5" ;>
        <div class="col-md-12 mt-5" style="text-align:center ;">








            <div class="col-md-12">
                <form action="{{route('web.search')}}" method="GET">

                    <div class="search">
                        <!-- <i class="fa fa-search"></i> -->
                        <input type="text" class="form-control" name="query" placeholder="TRACKING ID">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>



            </div>

            <div>
                @if(count($couriers) > 0)
                @foreach($couriers as $courier)
                <!-- <tr>
            <td>
                <h4>{{$courier->gi_carrier_ref_no}}</h4>
            </td>
        </tr> -->





                @endforeach







                @if(isset($couriers))
                <div class="container mt-5">
                    <div class="col-md-12" style="text-align:center ;">
                        <!-- <h2>Manage your shipments and returns</h2> -->

                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5>Tracking Number</h5>

                            <img src='http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=https://bhlworld.space/search?query=538429117' alt='qr code'><a href='https://www.qr-code-generator.com' border='0' style='cursor:default' rel='nofollow'></a>
                            <hr />
                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>
                                            <h4>{{$courier->gi_carrier_ref_no}}</h4>
                                        </td>
                                    </tr>





                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>





                    </div>
                </div>

                <div class="container mt-5">
                    <div class="col-md-12" style="text-align:center ;">
                        <!-- <h2>Manage your shipments and returns</h2> -->

                    </div>

                    <div class="row">
                        <div class="col-md-6 ">
                            <h5>Shipper Information</h5>
                            <hr />
                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>{{$courier->si_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>{{$courier->si_region}}</td>
                                    </tr>

                                    <tr>
                                        <td>{{$courier->si_phone_number}}</td>
                                    </tr>

                                    <tr>
                                        <td>{{$courier->si_email}}</td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>




                        <div class="col-md-6 ">
                            <h5>Reciever Information</h5>
                            <hr />
                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>{{$courier->ri_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>{{$courier->ri_address}}</td>
                                    </tr>

                                    <tr>
                                        <td>{{$courier->ri_number}}</td>
                                    </tr>

                                    <tr>
                                        <td>{{$courier->ri_email}}</td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="container mt-5">

                    <h5>Shipment Information </h5>
                    <hr />
                    <div class="col-md-12" style="text-align:center ;">
                        <!-- <h2>Manage your shipments and returns</h2> -->

                    </div>

                    <div class="row">
                        <div class="col-md-4 ">


                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Origin</p> {{$courier->si_region}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Destination</p> {{$courier->gi_destination}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Weight</p> {{$courier->gi_weight}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Product</p> {{$courier->gi_product}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Total Freight</p> {{$courier->gi_total_freight}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>




                        <div class="col-md-4 ">

                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Expected Date of Delivery</p> {{$courier->gi_edd}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Pick Up Date</p> {{$courier->gi_pickup_date}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Package</p> {{$courier->gi_package}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Shipment Mode</p> {{$courier->gi_shipment_mode}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Total Freight</p> {{$courier->gi_qty}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>

                        <div class="col-md-4 ">


                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Pick Up Time</p> {{$courier-> gi_pickup_time}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Status</p> {{$courier->gi_status}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Type of Shipment</p> {{$courier->gi_typeof_shipment}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Payment Mode</p> {{$courier->gi_payment_mode}}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="font-weight-bold"> Departure Time</p> {{$courier->gi_departure_time}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="container mt-5">
                    <div class="col-md-12" style="text-align:center ;">
                        <!-- <h2>Manage your shipments and returns</h2> -->

                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <h5>Comments</h5>
                            <hr />
                            <div class=" mb-4 box-shadow ">


                                <table class="table table-borderless">

                                    @if(count($couriers) > 0)
                                    @foreach($couriers as $courier)
                                    <tr>
                                        <td>{{$courier->gi_comments}}</td>
                                    </tr>





                                    @endforeach
                                    @else

                                    <tr>
                                        <td>No result found!</td>
                                    </tr>
                                    @endif

                                </table>

                            </div>
                        </div>





                    </div>
                </div>


                <div class="col-md-12 mt-5">



                    @if(isset($trackings))

                    <table class="table table-hover">
                        <thead>

                            <h5>Tracking History </h5>

                            <tr>
                                <th>Date / Time</th>
                                <th>Activities</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($trackings) > 0)
                            @foreach($trackings as $tracking)
                            <tr>
                                <td><?php echo date_format(date_create($tracking->ti_date), "m/d/Y"); ?> <?php echo date_format(date_create($tracking->ti_time), "H:i"); ?></td>
                                <td>{{ $tracking->ti_activities }}</td>
                                <td>{{ $tracking->ti_location }}</td>

                            </tr>
                            @endforeach
                            @else

                            <tr>
                                <td>No result found!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>



                    @endif
                </div>




                <!-- <div class=" column">
                <img src="{{ asset('/images/icon_courier_purple_lg_1637809911.png') }}" alt="The Logo" class=" imageSect">
        </div> -->

                <!-- Put here -->

                @else

                <tr class="mt-5">
                    <td>
                        <h1 style="margin-top: 30px; color:red;">SORRY </h1>

                        <h3 style="margin-top: 10px;color:red">Unfortunately we are unable to retrieve your tracking results at this time. Please try again later. </h3>

                    </td>
                </tr>
                @endif
            </div>
            <!-- Put here -->

        </div>
    </div>





    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4" style="background-color: rgb(77, 20, 140);">



        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© BHL 1995-2022
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
    <script type="text/javascript">
        var cTime = moment().format();
        cons

        console.log(cTime);
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>