<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tasker;
use App\Models\Review;
class categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function showTaskers(Category $category)
    {
        
        $taskers = Tasker::get();
        $ratings =Review::get();
        $final_rate = array();
        $count_rate = array();
        foreach($ratings as $rating){
            if(isset($final_rate[$rating->tasker_id])){
                $final_rate[$rating->tasker_id]+=$rating->rating;
                $count_rate[$rating->tasker_id]+=1;
             }
             else{
                  $final_rate[$rating->tasker_id]=$rating->rating;
                  $count_rate[$rating->tasker_id]=1;
                 }
        }
            
        
    
     $taskers = $category->taskers;
     return view('tasker.index',compact('final_rate','count_rate','taskers'));
     //return view('tasker.index', compact('taskers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
