<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],


            //Required fields
            'title' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'idcard' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'preferred_name' => ['required', 'string', 'max:255'],
            'preferred_city' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // $newakant = User::orderBy('id', 'desc')->first()->account_number;
        // $account_number_1 = $newakant + 1;
        // $account_number = '0000' . $account_number_1;
        $account_number = '0001001901229114';

        $fname = $data['firstname'];
        $lname = $data['lastname'];
        $rand = rand() & 99;
        $first = substr($lname, 0, 1);

        $customer_id = $first . $fname . $rand;

        $user = User::create([
            // 'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'type' => 'user',
            'customer_id' => $customer_id,
            'account_number' => $account_number,
            'customer_category' => 'Personal',
            'status' => 'Free',
            'transfer_status' => 'Free',
            'transfer_count' => '50',

            'title' => $data['title'],
            'middle_name' => $data['middle_name'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'dob' => $data['dob'],
            'idcard' => $data['idcard'],
            'country' => $data['country'],
            'city' => $data['city'],
            'street' => $data['street'],
            'mobile' => $data['mobile'],
            'preferred_name' => $data['preferred_name'],
            'preferred_city' => $data['preferred_city'],

        ]);

        return $user;
    }
}
