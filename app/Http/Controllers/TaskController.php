<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.todo', compact('tasks'));
    }
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('task.todo')->withErrors($validator);
        }
        Task::create([
            'title' => $req->get('title')
        ]);

        return redirect()->route('task.todo')->with('pesan', 'Berhasil Dimasukkan');
    }
    public function edit(string $id)
    {
        $task = Task::where('id', $id)->first();
        return view('task.edit_todo', compact('task'));
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('task.edit_todo', ['task' => $id])->withErrors($validator);
        }
        $todo = Task::where('id', $id)->first();
        $todo->title = $request->get('title');
        $todo->is_completed = $request->get('is_completed');
        $todo->updated_at = now();
        $todo->save();

        return redirect()->route('task.todo')->with('pesan', 'Berhasil Mengupdate');
    }
    public function destroy(string $id)
    {
        Task::where('id', $id)->delete();
        return redirect()->route('task.todo')->with('pesan', 'Todo Dihapus');
    }
}
