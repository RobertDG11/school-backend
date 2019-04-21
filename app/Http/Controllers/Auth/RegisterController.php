<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;

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

    //use RegistersUsers;

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'legitimation_id' => ['required', 'string', 'size:12'/*, 'exists:legitimations,value'*/]
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

        if ($data['legitimation_id'][0] === '1') {
            $user_type = 1;
        }
        else {
            $user_type = 2;
        }

        $data['user_type'] = $user_type;
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return $user;
    }

    public function register(Request $request) {

        $data = $request->all();

        if ($this->validator($data)->fails()) {
            return $this->sendError('Validation Error.', $this->validator($data)->errors());
        }

        if (mb_substr($data['legitimation_id'], 0, 1) != 'P' || mb_substr($data['legitimation_id'], 0, 1) != 'E' ) {
            return 'Invalid legitimation ID!';
        };

        $user = $this->create($data);

        $success = ['first_name' => $user['first_name'], 'last_name' => $user['last_name']];

        return $this->sendResponse($success, 'User register successfully.');
    }
}
