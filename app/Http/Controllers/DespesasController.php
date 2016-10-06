<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;

use PI\Http\Requests;

class UsersController extends Controller
{
    public function index () {
    	return view('users.index');
    }
}
