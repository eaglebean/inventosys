<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    // TODO:
    // - Add APIController with transformers

    /*
    |--------------------------------------------------------------------------
    | API Layer
    |--------------------------------------------------------------------------
    |
    | Declare all the methods to manage data directly to the storage without UI
    |
     */

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        if (isset($key)) {
            if (is_numeric($key)) {
                $users = User::find($key);
            } else {
                $users = User::where("name", "like", "%$key%");
                $users->paginate(10);
            }
        }

        return response()->json($users);
    }

    public function showAll()
    {
        $users = User::paginate(10);
        return $users;
    }

    // public function read(Request $request)
    // {
    //     $limit = $request->get('limit') ?: 10;
    //     // return all
    //     $users = User::paginate($limit);

    //     return response()->json($users);

    //     //  if (isset($key)) {
    //     //     if (is_numeric($key)) {
    //     //         $users = User::find($key);
    //     //     } else {
    //     //         $users = User::where("name", "like", "%$key%");
    //     //         $users->paginate(10);
    //     //     }
    //     // }
    //     // return response()->json($users);
    // }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | User Interface Layer
    |--------------------------------------------------------------------------
    |
    | Here is where you can declare all the methods used to dsipatch the UI or
    | laravel views
    |
     */

    public function index()
    {
        $users = $this->showAll();
        $data = ['users' => $users];

        return view('users.index', $data);
    }

    public function create()
    {
        //
    }

    public function edit($id)
    {
        //
    }
}
