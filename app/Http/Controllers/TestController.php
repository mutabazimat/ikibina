<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Test;
use App\Task;
class TestController extends Controller
{
    public function index()
    {
        $task = Task::where("isCompleted", false)->orderBy("id", "asc")->get();
        $comp = Task::where("isCompleted", true)->get();

        return response()->json([
            'task'=>$task,
            'completed tasks'=>$comp
        ]);
    }
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json([
            "code"=> 200,
            "message"=>"task registered successfully"
        ]);
    }
    // public function complete($id)
    // {

    // }
    // public function destroy($id)
    // {

    // }
}