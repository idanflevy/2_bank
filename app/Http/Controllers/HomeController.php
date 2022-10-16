<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Deposits;
use App\Models\Depositones;
use App\Models\Withdraw;
use App\Models\Transfer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        //$this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $balence = $this->getBalence();

        // $users = DB::table('users')->simplePaginate(15);



        return view(
            'home',
            compact($balence),
            [
                'statement' => compact('statement')
            ]

        );
        // return view('user-home', compact('balence'));
    }

    public function index1()
    {
        $balence = $this->getBalence();
        $statement = $this->statement1();

        // compact('balence'),

        return view('home', [
            'balence' => ($balence),
            'statement' => ($statement)
        ]);
        //return $this->sendResponse($shipschedule, 'schedule list');
    }

    public function balance()
    {
        $balence = $this->getBalence();
        // return view('uhome', compact('balence'));
        return $this->sendResponse('Customer Account Balance');
    }

    public function deposit()
    {
        return view('deposit');
    }

    public function depositone()
    {
        return view('depositone');
    }
    public function saveDepositone(Request $request)
    {
        $message = [
            'min' => 'The :attribute must be above :min $'
        ];
        $validator = Validator::make($request->all(), [
            'amount' => 'required|min:1|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required',
            'mdate' => 'required',


        ], $message)->validate();
        $deposit = new Depositones;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request->amount;
        $deposit->description = $request->description;
        $deposit->manual_date = $request->mdate;
        $deposit->type = 'Credit';
        $deposit->balance = '3000';
        $save = $deposit->save();
        if ($save) {
            return back()->with('success', 'Cash deposited successfully');
        } else {
            return back()->with('error', 'Something encountered with cash deposit. Please try again');
        }
    }
    public function saveDeposit(Request $request)
    {
        $message = [
            'min' => 'The :attribute must be above :min $'
        ];
        $validator = Validator::make($request->all(), [
            'amount' => 'required|min:1|regex:/^\d+(\.\d{1,2})?$/'
        ], $message)->validate();
        $deposit = new Deposits;
        $deposit->user_id = Auth::user()->id;
        $deposit->amount = $request->amount;
        $deposit->description = $request->description;
        $deposit->fkdate = $request->mdate;
        $save = $deposit->save();
        if ($save) {
            return back()->with('success', 'Cash deposited successfully');
        } else {
            return back()->with('error', 'Something encountered with cash deposit. Please try again');
        }
    }
    public function withdraw()
    {
        return view('withdraw');
    }
    public function saveWithdraw(Request $request)
    {
        $message = [
            'min' => 'The :attribute must be above :min $'
        ];
        $validator = Validator::make($request->all(), [
            'amount' => 'required|min:1|regex:/^\d+(\.\d{1,2})?$/',
            'mdate' => 'required'
        ], $message)->validate();
        $balence = $this->getBalence();
        $amount = $request->amount;
        if ($balence < $amount) {
            return redirect()->back()->with('error', 'Insufficient fund to withdraw');
        } else {
            $withdraw = new Withdraw;
            $withdraw->user_id = Auth::user()->id;
            $withdraw->amount = $amount;
            $withdraw->description = $request->description;
            $withdraw->fkdate = $request->mdate;

            $save = $withdraw->save();
            if ($save) {
                return back()->with('success', 'Cash withdrawed successfully');
            } else {
                return back()->with('error', 'Something encountered with cash withdraw. Please try again');
            }
        }
    }

    //Tranfer
    public function transfer()
    {
        return view('transfer');
    }

    public function transfers()
    {
        return view('transfer-user');
    }
    public function saveTransfer1(Request $request)
    {
        $message = [
            'min' => 'The :attribute must be above :min $'
        ];
        $validator = Validator::make($request->all(), [
            // 'email' => 'required|string|email|max:255',
            'amount' => 'required|min:1|regex:/^\d+(\.\d{1,2})?$/',
            'account_no' => 'required|min:16|regex:/^\d+(\.\d{1,2})?$/'

        ], $message)->validate();
        $email = $request->email;
        $amount = $request->amount;
        $balence = $this->getBalence();
        if ($email === Auth::user()->email) {
            return redirect()->back()->with('error', 'You cannot transfer fund to yourself. Please try with another registered email');
        } else {
            $email_exists = User::where('email', $email)->first();
            if (!$email_exists) {
                return redirect()->back()->with('error', 'Email address not found. Please try with registered e-mail address.');
            } else {
                $transferToEmail = $email_exists->id;
            }
            if ($amount > $balence) {
                return redirect()->back()->with('error', 'Insufficient fund to transfer');
            }
            $transfer = new Transfer;
            $transfer->transferFrom = Auth::user()->id;
            $transfer->transferTo = $transferToEmail;
            $transfer->amount = $amount;
            $save = $transfer->save();
            if ($save) {
                return back()->with('success', 'Fund Transfered successfully');
            } else {
                return back()->with('error', 'Something encountered with fund transfer. Please try again');
            }
        }
    }

    public function saveTransfer(Request $request)
    {
        $message = [
            'min' => 'The :attribute must be above :min'
        ];
        $validator = Validator::make($request->all(), [
            // 'email' => 'required|string|email|max:255',
            'amount' => 'required|min:1|regex:/^\d+(\.\d{1,2})?$/',
            'account_number' => 'required|min:5|regex:/^\d+(\.\d{1,2})?$/',
            'mdate' => 'required'

        ], $message)->validate();
        $account_number = $request->account_number;
        $amount = $request->amount;
        $balence = $this->getBalence();
        if ($account_number === Auth::user()->account_number) {
            return redirect()->back()->with('error', 'You cannot transfer fund to yourself. Please try with another account Number');
        } else {
            $account_number_exists = User::where('account_number', $account_number)->first();
            if (!$account_number_exists) {
                return redirect()->back()->with('error', 'Account Number not found. Please re-check');
            } else {
                $transferTo_account_number = $account_number_exists->id;
            }

            if ($amount > $balence) {
                return redirect()->back()->with('error', 'Insufficient fund to transfer');
            }
            $transfer = new Transfer;
            $transfer->transferFrom = Auth::user()->id;
            $count = Auth::user()->transfer_count;
            $transfer->transferTo = $transferTo_account_number;
            $transfer->amount = $amount;
            $transfer->description = $request->description;
            $transfer->fkdate = $request->mdate;
            $save = $transfer->save();

            if ($count < '100') {
                return back()->with('error', 'Transfer failed');
            }

            if ($save) {
                return back()->with('success', 'Fund Transfered successfully');
            } else {
                return back()->with('error', 'Something encountered with fund transfer. Please try again');
            }
        }
    }

    public function statement1()
    {
        $statement = [];
        $deposit = Auth::user()->deposits()->get();
        $balence = 0;
        foreach ($deposit as $d) {
            $balence += $d->amount;
            $statement[] = [
                // 'datetime' => $d->created_at,
                'datetime' => $d->fkdate,
                'description' => $d->description,
                'amount' => number_format($d->amount, 2),
                'type' => 'Credit',
                'details' => 'Deposit',
                'balence' => number_format($balence, 2)
            ];
        }
        $withdraw = Auth::user()->withdraws()->get();

        foreach ($withdraw as $w) {
            $balence -= $w->amount;
            $statement[] = [
                //'datetime' => $w->created_at,
                'datetime' => $w->fkdate,
                'description' => $w->description,
                'amount' => number_format($w->amount, 2),
                'type' => 'Debit',
                'details' => 'Withdraw',
                'balence' => number_format($balence, 2)
            ];
        }
        $transfer = Transfer::where('transferFrom', Auth::user()->id)->orWhere('transferTo', Auth::user()->id)->get();

        $creditTransfer = $transfer->where('transferTo', Auth::user()->id);
        foreach ($creditTransfer as $ct) {
            $balence += $ct->amount;
            $user = User::find($ct->transferFrom);
            $statement[] = [
                'datetime' => $ct->fkdate,
                'amount' => number_format($ct->amount, 2),
                'type' => 'Credit',
                'description' => $ct->description,
                'details' => 'Transfer from ' . $user->firstname . '****'  . substr($user->account_number, 0, -1),
                'balence' => number_format($balence, 2)
            ];
        }
        $debitTransfer = $transfer->where('transferFrom', Auth::user()->id);

        foreach ($debitTransfer as $dt) {
            $balence -= $dt->amount;
            $user = User::find($dt->transferTo);
            $statement[] = [
                'datetime' => $dt->created_at,
                'amount' => number_format($dt->amount, 2),
                'type' => 'Debit',
                'description' => $dt->description,

                'details' => 'Transfer to ' . $user->firstname . '****'  . substr($user->account_number, 0, -1),
                'balence' => number_format($balence, 2)
            ];
        }
        $statement = collect($statement)->sortBy('datetime');
        $balence = 0;
        $state = [];
        foreach ($statement as $s) {
            if ($s['type'] == 'Debit') {

                $balence -= floatval($s['amount']);
            } else {
                $balence += floatval($s['amount']);
            }
            $s['balence'] = number_format($balence, 2);
            $state[] = $s;
        }
        $statement = $state;

        $statement = $this->paginate($state, 8);
        // $statement->path('');
        $statement->withPath('statement');


        return $statement;
    }


    //new transfer


    public function statement()
    {


        $statement = [];
        $deposit = Auth::user()->deposits()->get();
        $balence = 0;
        foreach ($deposit as $d) {
            $balence += $d->amount;
            $statement[] = [
                //'datetime' => $d->created_at,
                'datetime' => $d->fkdate,
                'description' => $d->description,
                'amount' => number_format((float)$d->amount, 2),
                'type' => 'Credit',
                'details' => 'Deposit',
                'balence' => number_format($balence, 2)
            ];
        }
        $withdraw = Auth::user()->withdraws()->get();

        foreach ($withdraw as $w) {
            $balence -= $w->amount;
            $statement[] = [
                // 'datetime' => $w->created_at,
                'datetime' => $w->fkdate,
                'description' => $w->description,
                'amount' => number_format((float)$w->amount, 2),
                'type' => 'Debit',
                'details' => 'Withdraw',
                'balence' => number_format($balence, 2)
            ];
        }
        $transfer = Transfer::where('transferFrom', Auth::user()->id)->orWhere('transferTo', Auth::user()->id)->get();

        $creditTransfer = $transfer->where('transferTo', Auth::user()->id);
        foreach ($creditTransfer as $ct) {
            $balence += (float)$ct->amount;
            $user = User::find($ct->transferFrom);
            $statement[] = [
                //'datetime' => $ct->created_at,
                'datetime' => $ct->fkdate,
                'amount' => number_format((float)$ct->amount, 2),
                'description' => $ct->description,
                'type' => 'Credit',
                'details' => 'Transfer from ' . $user->firstname . '****'  . substr($user->account_number, 0, -1),
                'description' => $ct->description,
                'balence' => number_format($balence, 2)
            ];
        }
        $debitTransfer = $transfer->where('transferFrom', Auth::user()->id);

        foreach ($debitTransfer as $dt) {
            $balence -= (float)$dt->amount;
            $user = User::find($dt->transferTo);
            $statement[] = [
                'datetime' => $dt->created_at,
                'amount' => number_format((float)$dt->amount, 2),
                'type' => 'Debit',
                'description' => $dt->description,
                'details' => 'Transfer to ' . $user->firstname . '****'  . substr($user->account_number, 0, -1),
                'balence' => number_format($balence, 2)
            ];
        }
        $statement = collect($statement)->sortBy('datetime');
        $balence = 0;
        $state = [];
        foreach ($statement as $s) {
            if ($s['type'] == 'Debit') {

                $balence -= floatval($s['amount']);
            } else {
                $balence += floatval($s['amount']);
            }
            $s['balence'] = number_format($balence, 2);
            $state[] = $s;
        }
        $statement = $this->paginate($state, 10);
        // $statement->path('');
        $statement->withPath('statement');
        return view('statement', compact('statement'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }



    public function getBalence()
    {
        $balence = 0;
        $deposit = Auth::user()->deposits()->get();
        foreach ($deposit as $d) {
            $balence += $d->amount;
        }
        $withdraw = Auth::user()->withdraws()->get();
        foreach ($withdraw as $w) {
            $balence -= $w->amount;
        }
        $transfer = Transfer::where('transferFrom', Auth::user()->id)->orWhere('transferTo', Auth::user()->id)->get();
        $creditTransfer = $transfer->where('transferTo', Auth::user()->id);
        $debitTransfer = $transfer->where('transferFrom', Auth::user()->id);
        foreach ($creditTransfer as $ct) {
            $balence += $ct->amount;
        }
        foreach ($debitTransfer as $dt) {
            $balence -= $dt->amount;
        }
        return $balence;
    }
}
