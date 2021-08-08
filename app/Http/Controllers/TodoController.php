<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todo->sortBy('completed');
        return view('todo/index')->with('todos', $todos);
    }

    public function create()
    {
        return view('todo/create');
    }

    public function store(TodoCreateRequest $request)
    {
        auth()->user()->todo()->create($request->all());
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

    public function show(Todo $todo)
    {
        return view('todo.show', compact('todo'));
    }

    public function completed(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back();
    }

    public function incompleted(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back();
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back();
    }
}
