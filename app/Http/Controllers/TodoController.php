<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderby('completed')->get();
        return view('todo/index')->with('todos', $todos);
    }

    public function create()
    {
        return view('todo/create');
    }

    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());
        return redirect('/todo')->with('success', 'Todo created.');
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title]);
        return redirect(route('todo.index'))->with('success','todo updated');
    }

    public function completed(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back();
    }
}
