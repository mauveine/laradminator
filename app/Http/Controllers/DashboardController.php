<?php

namespace App\Http\Controllers;

use App\Models\User\Proposal;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('admin.dashboard.index', ['user' => $user]);
    }

    public function getPosts () {
        $posts = Proposal::query()->take(10)->get();
        dump(count($posts));
        return view('admin.dashboard.posts', ['posts' => $posts]);
    }
}
