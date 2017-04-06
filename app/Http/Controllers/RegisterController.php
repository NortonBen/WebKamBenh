<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['first_name','last_name', 'email', 'password','birthday','sex','address','phone']);
        $data['role_id'] = 3;
        $data['password'] = Hash::make($data['password']);
        if(User::create($data)){
            return redirect('/');
        }
        return redirect()->back();


    }
}
