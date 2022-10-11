<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users=response()->json(User::all());
        return $users;
    }

    public function show($id)
    {
        $user=response()->json(User::find($id));
        return $user;
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        // return redirect('/User/list'); // átirányít a törlés után vissza a listázó oldalra
    }

    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->permission=1;
        $user->save();
        // return redirect('/User/list'); // átirányít a hozzáadás után vissza a listázó oldalra
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        // if ($user->permission == 0)
        $user->permission = $request->permission; //csak az admin kap engedélyt módosításra
        // else
            // $user->permission = 1;
        $user->save();
        // return redirect('/User/list'); // átirányít a módosítás után vissza a listázó oldalra
    }
}
