@extends('layouts.masterlocal')

@section('content')


<section class="content " style="margin:0px 20px;">
    <div class="row hidesmall">
        <div class="col-lg-3 col-6">

            <div class="small-box account">
                <div class="inner" style="color:white;">
                    <p>Hello Welcome Back !</p>

                    <h3>{{ Ucfirst(Auth::user()->firstname) }}</h3>

                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box account">
                <div class="inner" style="color:white;">
                    <p>Present Balance</p>
                    <h3>${{ number_format($balence,2) }}</h3>

                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box account1">
                <div class="inner" style="color:white;">
                    <p>Account Type</p>
                    <h3>{{ Ucfirst(Auth::user()->customer_category) }}</h3>

                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            <div class="small-box account">
                <div class="inner" style="color:white;">
                    <p>Account Number</p>
                    <h3></h3>
                    <h4 style="font-size: 30px;line-height: 40px">{{ Ucfirst(Auth::user()->account_number) }}</h4>


                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="row hidebig">
        <div class="col-lg-6 col-12">

            <div class="small-box account">
                <div class="inner" style="color:white;">


                    <h6>Welcome, {{ Ucfirst(Auth::user()->firstname) }} {{ Ucfirst(Auth::user()->lastname) }}</h6>
                    <h6>Account Number : {{ Ucfirst(Auth::user()->account_number) }}</h6>
                    <h6>{{ Ucfirst(Auth::user()->customer_category) }} Account</h6>
                    <h3> ${{ number_format($balence,2) }}</h3>
                    <h6>Available Balance</h6>



                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
    </div>




    <div class=" card" style="border-radius:none;">
        <div class="card-header">
            <h3 class="card-title">Transaction Historys</h3>
            <div class="card-tools">

            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>



                        <th scope="col">DATE</th>
                        <th scope="col">AMOUNT</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">DETAILS</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($statement as $k => $s)
                    <tr>

                        <td>{{ date('Y-m-d', strtotime($s['datetime'])) }}</td>
                        <td>{{ $s['amount'] }}</td>
                        <td>{{ $s['type'] }}</td>
                        <td>{{ $s['details'] }}</td>
                        <td>{{ $s['description'] }}</td>
                        <td>{{ $s['balence'] }}</td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="card " style="border-radius:none; display:none;">
        <div class="card-header">
            <h3 class="card-title">Transaction History</h3>
            <div class="card-tools">

            </div>
        </div>

    </div>


    @foreach($statement as $k => $s)
    <div class="hidebig col-lg-6 col-12" style="margin-bottom: 0;display:none;
    
    ">

        <div class="small-box account3">
            <div class="inner" style="color:black;
           
            ">
                <h6>Transaction Date: {{ date('Y-m-d', strtotime($s['datetime'])) }} </h6>
                <h6>Amount: {{ $s['amount'] }} {{ $s['type'] }}</h6>
                <h6>{{ $s['details'] }}</h6>
                <h6>{{ $s['description'] }}</h6>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    @php($i++)
    @endforeach





</section>
@endsection