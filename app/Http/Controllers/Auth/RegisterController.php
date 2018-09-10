<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Redirect;

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

    protected static $valid_type = [
        'pdf',
        'doc',
        'docx',
        'jpeg',
        'png'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function is_valid_type($type)
    {
        return in_array($type, RegisterController::$valid_type);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handles custom user registration to use with our application
     *
     * @param Request $request
     * @return Redirect
     */
    public function user_registration(UserRequest $request)
    {
        //upload image for header
        if ($file = $request->file('file')) {
            try {
                if($this->is_valid_type($file->extension())) {
                    $extension = $file->extension();
                    $destinationPath = public_path() . '/uploads/files/';
                    $safeName = str_random(10) . '.' . $extension;
                    $file->move($destinationPath, $safeName);
                    $file_path = $safeName;
                } else {
                    throw new \Exception();
                }
            } catch (\Exception $e) {
                $error = trans('templates/message.error.file_type_error');
            }
        }

        try {
            // Register the user
            $user = new User();

            $user->file = $file_path;
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];
            if($request['password_confirm'] === $user->password)
                $user->password = Hash::make($request['password']);

            $user->save();

            // Redirect to the home page with success menu
            return Redirect::route('home')->with('success', trans('users/message.success.create'));
        } catch (\Exception $e) {
            $error = trans('users/message.error.create');
        }
        return Redirect::route('home')->with('error', $error);
    }

    /**
     * Handles custom user registration to use with our application
     *
     * @param Request $request
     * @return Redirect
     */
    public function simple_user_registration(UserRequest $request)
    {
        //upload image for header
        if ($file = $request->file('file')) {
            try {
                if($this->is_valid_type($file->extension())) {
                    $extension = $file->extension();
                    $destinationPath = public_path() . '/uploads/files/';
                    $safeName = str_random(10) . '.' . $extension;
                    $file->move($destinationPath, $safeName);
                    $file_path = $safeName;
                } else {
                    throw new \Exception();
                }
            } catch (\Exception $e) {
                $error = trans('templates/message.error.file_type_error');
            }
        }

        try {
            // Register the user
            $user = new User();

            $user->file = $file_path;
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];

            $user->save();

            // Redirect to the home page with success menu
            return Redirect::route('home')->with('success', trans('users/message.success.create'));
        } catch (\Exception $e) {
            $error = trans('users/message.error.create');
        }
        return Redirect::route('home')->with('error', $error);
    }
}
