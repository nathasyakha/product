<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;


class UserController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $response = [
                'success' => true,
                'message' => 'User login successful',
                'user'  =>  $user, // optional
                'token' =>  $user->createToken('laravel_token')->accessToken // token available ke blade
            ];
            return redirect()->route('home');
        } else {
            //return response
            $response = [
                'success' => false,
                'message' => 'Unauthorised',
            ];
            return response()->json($response, 404);
        }
    }
    public function register(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'postalcode' => 'required',
            'city' => 'required',
            'countryID' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => 'Validation Error', $validator->errors(),
            ];
            return response()->json($response, 404);
        }
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'street' => $request->street,
            'postalcode' => $request->postalcode,
            'city' => $request->city,
            'countryID' => $request->countryID,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('nApp')->accessToken;

        $response = [
            'success' => true,
            'message' => 'User registration successful',
            'accessToken' => $token,
        ];
        return response()->json($response, 200);
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function edit($id)
    {
        //
    }




    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->street = $request->street;
        $user->postalcode = $request->postalcode;
        $user->city = $request->city;
        $user->countryID = $request->countryID;
        $user->email = $request->email;

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Customer Updated'
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer Deleted'
        ]);
    }
}
