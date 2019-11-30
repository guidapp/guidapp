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

    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->save();

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message'   => 'Usuário não encontrado.',
            ], 404);
        }

        $user->fill($request->all());
        $user->save();

        return response()->json($user);
    }

    public function login(Request $request) {
        $user = User::where('email', $request['email'])->first();

        if($user) {
            if(Hash::check($request['senha'], $user->password)) {
                return response()->json($user);
            }
        }

        abort(401);
    }

    public function alterarSenha(Request $request) {
        $user = User::find($request['id']);

        if(Hash::check($request['senhaAtual'], $user->password)) {
            $user->password = password_hash($request['novaSenha'], PASSWORD_DEFAULT);
            $user->save();
            return response()->json($user);
        }

        abort(401);
    }
}
