<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoListController extends Controller
{
    public function index(Request $request) {
        $users = [];
        if($request->has('name') && $request->input('name') != '' && strlen($request->input('name')) > 2){
            // $users = DB::select('select * from users where name like "%'.$request->input('name').'%"');

            $users = User::where('name', 'like', '%'.$request->input('name').'%')->get();
        }else{
            // $users = User::all();
        }
        return view('todolist.index', [
            'users' => $users
        ]);
    }
}
