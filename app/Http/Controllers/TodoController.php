<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use File;
use Storage;

class TodoController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function index()
    {
        //query list of todos from db

      //  return view('helloworld')
      // $todos = Todo::all(); ->keluar semua list dalam table
        $todos = Todo::paginate(2);
      //  $user = auth()->user();
        //dd($user);
      return view ('todos.index', compact('todos')); //todos tu nama folder
        //return to view
    }

    public function create()
    {
      return view('todos.create');
    }

    public function store(Request $request)
    {
      $todo = new Todo();
      $todo->title = $request ->title;
      $todo->description = $request ->description;
      $todo->user_id = auth()->user()->id;
      $todo->save();

      if($request->hasFile('attachment')){
        //rename
          $filename = $todo->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();
        //store at file storage
        Storage::disk('public')->put($filename, File::get($request->attachment));
        //update rown on db
        $todo->attachment = $filename;
        $todo->save();

      }

      return redirect()->to('/todos')->with([
        'type' => 'alert-primary',
        'message' =>'Berjaya Disimpan!'
      ]);

    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function edit(Todo $todo)
    {
      return view('todos.edit',compact('todo'));

    }

    public function update(Todo $todo, Request $request)
    {
       $todo->title = $request->title;
       $todo->description = $request ->description;
       $todo->save();

       return redirect()->to('/todos')->with([
        'type' => 'alert-success',
        'message' =>'Berjaya Dikemaskini!'
      ]);

    }


    public function delete(Todo $todo)
    {
      if($todo->attachment){
        Storage::disk('public')->delete($todo->attachment);
      }

       $todo->delete();
       return redirect()->to('/todos')->with([
        'type' => 'alert-danger',
        'message' =>'Berjaya Dihapus!'
      ]);

    }



}
