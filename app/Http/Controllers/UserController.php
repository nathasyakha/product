<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'postalcode' => 'required',
            'city' => 'required',
            'countryID' => 'required',
            'email' => 'required'
        ]);

        $user = $request->all();
        $us = User::create($user);
        $us->save();
        if ($us) {
            return response()->json([
                'success' => true,
                'message' => 'Customer Created'
            ]);
        }
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
