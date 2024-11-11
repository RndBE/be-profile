<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Pesan;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        return view('Admin.dashboard.index');
    }
}
