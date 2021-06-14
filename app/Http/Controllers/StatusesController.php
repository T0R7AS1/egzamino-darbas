<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Task;
use Carbon\Carbon;

class StatusesController extends Controller
{
    
    public function index(){
        $statuses = Status::orderBy('created_at', 'desc')->paginate(5);
        return view('statuses.index')->with('statuses', $statuses);
    }

    public function create(){

        $statuses = Status::all();

        return view('statuses.create')->with('statuses', $statuses);
    }
    
    public function store(Request $request){

        $now = Carbon::now()->toDateTimeString();

        $this->validate(request(),[
            'name' => 'required|max:16|regex:/(^[A-Za-z ]+$)+/',
        ]);
        $data = [];
        $data['name'] = $request->name;
        $data['created_at'] = $now;
        Status::insert($data);
        return redirect()->route('statuses.index')->with('success', 'Status added successfully');

    }

    public function edit($id){
        $statuses = Status::where('id',$id)->first();
        return view('statuses.edit')->with('statuses', $statuses);
    }

    public function update(Request $request, $id){
        $now = Carbon::now()->toDateTimeString();

        $this->validate(request(),[
            'name' => 'required|max:16|regex:/(^[A-Za-z ]+$)+/',
        ]);
        $data = [];
        $data['name'] = $request->name;
        $data['updated_at'] = $now;

        Status::where('id', $id)->update($data);
        return redirect()->route('statuses.index')->with('success', 'Status updated successfully');

    }


    public function delete($id){

        $statuses = Status::find($id);

        $tasksCount = Task::where('status_id', $statuses->id)->get();

        $tasksCount = count($tasksCount);

        if ($tasksCount == 0) {
            $statuses->delete();
            return redirect()->route('statuses.index')->with('success', $statuses->name .' category deleted successfully');
        }else{
        return redirect()->back()->with('error', $statuses->name . ' category has tasks in it');
        }
    }
}
