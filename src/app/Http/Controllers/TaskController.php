<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // 登録画面表示
    public function create()
    {
        return view('create');
    }

    // 登録処理
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|max:255',
            'deadline' => 'required'
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'deadline' => $request->deadline
        ]);

        return redirect('/list');
    }
    
    // 一覧画面表示
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $query = Task::orderBy('deadline', 'asc');

        if (!empty($keyword)) {
            $query->where('task_name', 'like', "%{$keyword}%");
        }

        $tasks = $query->get();

        return view('list', compact('tasks', 'keyword'));
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->task_name = $request->task_name;

        $task->deadline = $request->deadline;

        $task->save();

        return redirect('/list');
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return redirect('/list');
    }
}