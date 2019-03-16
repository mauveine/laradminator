<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('admin.dashboard.index', ['user' => $user]);
    }

    public function getPosts () {
        return view('admin.dashboard.posts');
    }
}
