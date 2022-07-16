<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->select('users.*', 'profiles.title', 'profiles.description', 'profiles.image')
            ->get();
        return view('employee.index', compact('users'));
    }

    public function datatable()
    {
        $users = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->select('users.*', 'profiles.title', 'profiles.description', 'profiles.image')
            ->get();
        return view('employee.datatable', compact('users'));
    }
    public function ajax()
    {
        return view('employee.ajax');       
    }

    public function get_users_ajax()
    {
        $query = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'profiles.image', 'profiles.title', 'profiles.description')
            ->join('profiles', 'users.id', '=', 'profiles.user_id');
        return Datatables($query)->make(true);        
    }
}
