<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //query list of todos from db

      //  return view('helloworld')
       // $user = User::all();
       $user = User::paginate(2);
      return view ('user.index', compact('user')); //todos tu nama folder
        //return to view
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
      return view('user.edit',compact('user'));

    }


    public function update(User $user, Request $request)
    {
       $user->name = $request->name;
       $user->email = $request ->email;
       $user->save();

       return redirect()->to('/listuser');

    }


    public function delete(User $user)
    {

       $user->delete();
       return redirect()->to('/listuser');

    }



}
