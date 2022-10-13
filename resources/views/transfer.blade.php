@extends('layouts.masterlocal')

<style>
    #langages {
        height: 100px;
    }

    #fr {
        width: 100%;
    }

    .size {
        max-height: 50em;
    }

    .bgBlue {
        background-color: red;
    }

    #langages2 {
        height: 100px;
    }

    #fr {
        width: 20%;
    }

    .size {
        max-height: 50em;
    }

    .bgBlue {
        background-color: #5DD5FF;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-7">

            <ul class="list-group list-unstyled">
                <li class="list-group-item">
                    <h5 class="m-0">Transfer Money</h5>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('saveTransfer') }}">
                                @csrf

                                <div id="form">
                                    <div class="form-group">
                                        <label for="" class="col-form-label text-md-right font-weight-bold mx-3">Account Number</label>
                                        <div class="col-md-12">
                                            <input onkeypress="return isNumber(event)" id="account_number" placeholder="Enter Account Number" required type="number" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required autocomplete="email" autofocus>

                                            @error('account_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="" class="col-form-label text-md-right font-weight-bold mx-3">Amount</label>
                                        <div class="col-md-12">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input onkeypress="return isNumber(event)" id="amount" min="1" autocomplete="off" step="0.1" placeholder="Enter amount to deposit" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                            @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-form-label text-md-right font-weight-bold mx-3">Description</label>
                                        <div class="col-md-12">
                                            <input id="description" autocomplete="off" placeholder="Enter Description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autofocus>

                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-form-label text-md-right font-weight-bold mx-3">Manual Deposit Date</label>
                                        <div class="col-md-12">
                                            <input id="mdate" autocomplete="off" placeholder="Date" type="date" class="form-control @error('mdate') is-invalid @enderror" name="mdate" value="{{ old('mdate') }}" required autofocus>

                                            @error('mdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button onclick="move()" type=" submit" class="btn btn-block btn-primary" id="demoC">Transfer</button>

                                        </div>
                                    </div>
                                </div>







                        </div>

                        <?php
                        $jsString = Auth::user()->transfer_count;


                        ?>
                        <script>
                            var width = <?php echo json_encode($jsString); ?>;

                            $(document).ready(function() {




                                // we check if animation was done once
                                if (!$("#fr").hasClass('animationDone')) {
                                    // if not, then we do animation
                                    $("#fr").animate({
                                        width: width + '%'
                                    }, 1000, function() {
                                        // we add class animationDone once 
                                        // we add class animationDone once 
                                        $("#fr").addClass('animationDone');
                                        // console.log('Animate once');
                                    });
                                }

                            });
                        </script>



                        </form>
                    </div>
        </div>

        <div class="col-md-5">
            <div id="session">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>

                <ul class="list-group list-unstyled">
                    <li class="list-group-item">
                        <h5 class="m-0">Transfer Status</h5>

                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-12">


                                @if ($message = Session::get('success'))
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div id="langages" class="">
                                            <div class="">
                                                Tranfer Successfully
                                                <div class=" mt-1">
                                                    <div class="progress-bar " style="background-color: green;" id="fr" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="">
                                                            100%
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="margin-top:-50px; background-color:red; padding:10px; border-radius:20px;">

                                    @endif
                                    @if ($message = Session::get('error'))
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div id="langages" class="">
                                                <div class="">
                                                    Tranfer Failed
                                                    <div class=" mt-1">
                                                        <div class="progress-bar " style="background-color: red;" id="fr" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="">
                                                                {{ Ucfirst(Auth::user()->transfer_count) }}%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" style="margin-top:-50px; background-color:red; padding:10px; border-radius:20px;">
                                        <p style="color: white;">Erorr :
                                            {{ Ucfirst(Auth::user()->transfer_status) }}
                                        </p>

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </li>
                </ul>
                @endif



            </div>
        </div>


        <script>
            setTimeout(function() {
                $('#session').fadeOut('fast');
            }, 30000); // <-- time in milliseconds
        </script>
    </div>
    @endsection


    <div>

    </div>