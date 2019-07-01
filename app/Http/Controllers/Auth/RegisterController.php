<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
            'name_market' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'number_market' => ['required', 'min:10'],
            'id' => ['required'],
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
        $user = new User;

        $user->id_city = $data['id_city'];


        $id = City::where('name_city', $user->id_city)->first()->id_city;

        if ($id == null)
        {
            abort(404, "did not found city please write to Gmarket to further information");
        }

        return User::create([
            'name_market' => $data['name_market'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'description_market' => $data['description_market'],
            'number_market' => $data['number_market'],
            'id_city' => $id,
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register', ['cities' => City::all()]);
    }
}
