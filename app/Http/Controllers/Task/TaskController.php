<?php

namespace App\Http\Controllers\Task;

use App\Models\Tasks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function getAll(){
       return Tasks::all();
   }

   public function getByID($id){
       return Tasks::where('id', $id)->first();
   }

   public function 
}
