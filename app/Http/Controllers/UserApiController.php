<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserApiController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json($users);
    }

    public function login(Request $resquest) {
        $user = User::where('email', $resquest['email'])->get();

        if(Hash::check($resquest['senha'], $user[0]->password)) {
            return response()->json($user[0]);
        }

        abort(401);
    }
}
