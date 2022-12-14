@extends('layouts.masterlocal')


@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-7">
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
            @endif
            <ul class="list-group list-unstyled">
                <li class="list-group-item">
                    <h5 class="m-0">Deposit Money</h5>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-12">
                            <form method="POST" action="{{ route('saveDepositone') }}">
                                @csrf
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
                                        <button type="submit" class="btn btn-block btn-primary">Deposit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection