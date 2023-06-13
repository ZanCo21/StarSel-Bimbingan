<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class logController extends Controller
{
    public function index()
    {

        return view('admin.log_login.admin_log');
    }
    public function authenticated(Request $request)
    {
            $loginLogs = LoginLog::orderBy('timestamp', 'desc')->get();

            return view('admin.log_login.admin_log', compact('loginLogs'));
        }
    }
