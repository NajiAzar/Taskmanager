<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Category;
use App\Models\User; 
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tasks = Task::with('category')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('tasks.create', compact('categories', 'users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'due_date' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);
        Task::create($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        $categories = Category::all();
        $users = User::all();
        return view('tasks.edit', compact('task', 'categories', 'users'));
    }
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'due_date' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

}
