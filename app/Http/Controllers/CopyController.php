<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copy;
use App\Models\User;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index()
    {
        $copies=response()->json(Copy::all());
        return $copies;
    }

    public function show($id)
    {
        $copies=response()->json(Copy::find($id));
        return $copies;
    }

    public function destroy($id)
    {
        Copy::find($id)->delete();
        // return redirect('/copy/list'); // átirányít a törlés után vissza a listázó oldalra
    }

    public function store(Request $request)
    {
        $copies=new Copy();
        $copies->book_id=$request->book_id;
        $copies->user_id=$request->user_id;
        $copies->status=$request->status;
        $copies->save();
        // return redirect('/copy/list'); // átirányít a hozzáadás után vissza a listázó oldalra
    }

    public function update(Request $request, $id)
    {
        $copies = Copy::find($id);
        $copies->book_id=$request->book_id;
        $copies->user_id=$request->user_id;
        $copies->status=$request->status;
        $copies->save();
        // return redirect('/copy/list'); // átirányít a módosítás után vissza a listázó oldalra
    }

    public function newView()
    {
        $users=User::all();
        $books=Book::all();
        return view("copy.new", ["users"=>$users, "books"=>$books]);
    }

    public function editView($id)
    {
        $users = User::all();
        $books = Book::all();
        $copies = Copy::find($id);
        return view("copy.edit", ["users"=>$users, "books"=>$books, "Copy"=>$copies]);
    }

    public function listView()
    {
        $copies=Copy::all();
        return view("copy.list",["copies"=>$copies]);
    }
}
