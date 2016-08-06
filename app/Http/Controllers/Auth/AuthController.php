<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255|alpha',
            'apellido' => 'required|max:255|alpha',
            'direccion' => 'required|max:255',
            'telefono' => 'required|numeric|unique:users|between:1000000,79999999',
            'genero' => 'required|max:1',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $var= User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'genero' => $data['genero'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user = DB::table('users')->where('email', $data['email'])->first();
        $user = $user->id;
        
        DB::table('role_user')->insert(
        ['user_id' => $user, 'role_id' => 3]
        );   

        return $var;
    }
}
