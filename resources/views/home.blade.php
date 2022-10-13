@extends('layouts.masterlocal')

@section('content')


<section class="content" style="margin:0px 20px;">
    <div class="row">
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


    <div class="card" style="border-radius:none;">
        <div class="card-header">
            <h3 class="card-title">Statements Over-view</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>



                        <th scope="col">DATE & TIME</th>
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






</section>
@endsection