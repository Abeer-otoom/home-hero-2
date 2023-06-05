<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Tasker;
use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    //

    public function index(){
        return view('index')->with('categories',category::all()); 
    }

    public function Category($name){
      

     if(category::where('name',$name)->exists())
     {
        $category =category::where('name',$name)->first();
         $taskers= Tasker::where('category_id',$category->id)->where('status','0')->get();
        return view('tasker.index');//,compact('category','tasker')
     }
     else
     {
        return redirect('/');
     }

    }
}

