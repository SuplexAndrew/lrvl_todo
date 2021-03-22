<?php


namespace App\Http\Controllers;


use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function GetUsers(Request $request)
    {
        $id = $request->id;
        $users1 = DB::table('users')
            ->select('*')
            ->where('id' , '=', (integer)$id);
        $leaderid = $users1->get()->first()->leaderid;
        $users2 = DB::table('users')
            ->select('*')
            ->where('leaderid' , '=', (integer)$leaderid)
            ->union($users1);
        return response()->json($users2->get());
    }

    public function Login(Request $request)
    {
        $login = json_decode($request->body)->login;
        $password = json_decode($request->body)->password;

        $user = DB::table('users')->select()->where('login', '=', $login)->first();
        if ($user == null) {
            return response(['error' => [
                'message' => 'wrong login',
                'statusCode' => 403
            ]]);
        } else {
            if ($user->password == crypt($password, $user->salt)) {
                return response()->json($user);
            } else
                return response(['error' => [
                    'message' => 'wrong password',
                    'statusCode' => 403
                ]]);
        }
        //return response()->json([$user->password, , $user->password == crypt($password, $user->salt)]);
    }
}
