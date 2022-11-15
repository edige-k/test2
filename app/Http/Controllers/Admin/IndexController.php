<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function client()
    {
        return view('client.index');
    }


}
