<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Task;

class TasksController extends Controller
{

    public function index(Request $request){
        $statuses = Status::all();
        if ($request->status_id) {
            $tasks = Task ::where('status_id', $request->status_id)->get()->sortByDesc("add_date");
            $status_id = $request->status_id;
        }
        else {
            $tasks = Task::all()->sortByDesc("add_date");
            $status_id = 0;
        }
        return view('tasks.index', [
            'tasks' => $tasks,
            'statuses' => $statuses,
            'order' => $order ?? '',
            'sort' => $sort ?? '',
            'status_id' => $status_id,
        ]);
    }

    public function show($id){
        $tasks = Task::where('id',$id)->first();
        return view('tasks.show')->with('tasks', $tasks);
    }

    public function create(){
        $statuses = Status::orderBy('created_at', 'desc')->get();
        return view('tasks.create')->with('statuses', $statuses);
    }
    
    public function store(Request $request){
        $added = $request->add_date;
        $this->validate(request(),[
            'task_name' => 'required|max:128|regex:/(^[A-Za-z1-9 ]+$)+/',
            'task_description' => 'required',
            'status_id' => 'required',
            'add_date' => 'required',
            'completed_date' => 'required|after_or_equal:'.$added,
            
        ]);
        $data = [];
        $data['task_name'] = $request->task_name;
        $data['task_description'] = $request->task_description;
        $data['status_id'] = $request->status_id;
        $data['add_date'] = $request->add_date;
        $data['completed_date'] = $request->completed_date;
        $tasks = Task::insert($data);
        return redirect()->route('tasks.index')->with('success', 'Task added successfully');

    }

    public function edit($id){
        $statuses = Status::all();
        $tasks = Task::where('id',$id)->first();
        return view('tasks.edit')->with(['statuses' => $statuses, 'tasks' => $tasks]);
    }

    public function update(Request $request, $id){
        $tasks = Task::where('id',$id)->first();
        $added = $tasks->add_date;
        $this->validate(request(),[
            'task_name' => 'required|max:128|regex:/(^[A-Za-z1-9 ]+$)+/',
            'task_description' => 'required',
            'status_id' => 'required',
            'completed_date' => 'required|after_or_equal:'.$added,
        ]);
        $data = [];
        $data['task_name'] = $request->task_name;
        $data['task_description'] = $request->task_description;
        $data['status_id'] = $request->status_id;
        $data['completed_date'] = $request->completed_date;

        $tasks = Task::where('id', $id)->update($data);
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');

    }


    public function delete($id){

        $data = Task::where('id', $id)->first();
        $tasks = Task::where('id', $id)->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
