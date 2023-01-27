<?php

namespace App\Http\Controllers\Task;

use App\Models\Tasks;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function getAll(){
       return Tasks::all();
   }

   public function getByID($id){
       return Tasks::where('id', $id)->first();
   }

   public function addTask(Request $request){
    $data = $request->all();
       try {
        $data = Tasks::create([
         'name' => $request->name,
         'is_done' => 0,
         'description' => $request->description,
         'due_date' =>$request->due_date,
         'date_added' => Carbon::now(),
        ]);
        return response()->json(['success' => 'true','message' => $data], 200);
       } catch (\Throwable $th) {
           echo($th);
        return response()->json(['success' => 'false','message' => $data], 500);
       }
   }

   public function editTask($id, Request $request){
       $task = Tasks::find($id);
       try {
           $task->name = $request->name;
           $task->description = $request->description;
           $task->is_done = $request->is_done;
           $task->due_date = $request->due_date;
           $task->save();
        return response()->json(['success' => 'true','message' => $task], 200);
       } catch (\Throwable $th) {
        return response()->json(['success' => 'false','message' => $task], 500);
       }
   }

   public function deleteTask($id){
       $task = Tasks::find($id);
        try {
            $task->delete();
            return response()->json(['success' => 'true','message' => 'success delete task'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => 'false','message' => $task], 500);
        }
   }
}
