<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function getAll() {
        $tasks = Task::all();
        return view('tasks', $data = ['tasks' => $tasks]);
    }

    public function onSwitch(Request $request) {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->completed=$request->completed;
            $task->save();
            return '';
        }
        return 'Not found';
    }

    public function onCreate(Request $request) {
        $task = new Task();
        $text = $request->text;
        if ($text) {
            $task->text = $text;
            $task->save();
            return redirect('/');
        }
        return 'The text was not written';
    }

    public function onDelete(Request $request) {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect('/');
        }
        return 'Not found';
    }
}
