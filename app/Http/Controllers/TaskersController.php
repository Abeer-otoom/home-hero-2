<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasker;
use App\Models\category;
use App\Models\Review;


class TaskersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $taskers = Tasker::with('reviews')->get();
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
            
         return view('tasker.index',compact('final_rate','count_rate','taskers'));
    }
    public function showByCategory($category_id)
    {
        
        $taskers = Tasker::with('reviews')->get();
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
            
        
     $category=category::findOrFail($category_id);
     $tasker=$category->Taskers;
     return view('tasker.index',compact('final_rate','count_rate','taskers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function myProfile($tasker)
     {
       
       
     }
  


    public function create()
    {
        //
        return view('tasker.create')->with('categories',category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:taskers'],
            'password' => ['required', 'string', 'min:8'],
            'image'=>['required'],
            'phone_number'=>['required'],
            'location'=>'required',
            'bio'=>'required',
            'category_id'=>'required'

        ]);
      
        $newImageName= uniqid(). '-' .$request->name .'.'.$request->image->extension(); 
          
        $request->image->move(public_path('images'),$newImageName);

        $tasker=new Tasker();

        

        //We assign values to the information to be stored
        $tasker->name=strip_tags($request->input('name')) ;
        $tasker->image=strip_tags($newImageName) ;
        $tasker->email=strip_tags($request->input('email')); 
        $tasker->password=strip_tags(bcrypt($request->input('password')));
        $tasker->phone_number=strip_tags($request->input('phone_number')) ;
        $tasker->location=strip_tags($request->input('location')); 
        $tasker->category_id=strip_tags($request->input('category_id'));
        $tasker->bio= strip_tags($request->input('bio'));
        $tasker->status=$request->input('status',0);
        
       
        $tasker->save();
       
        return redirect()->route('tasker.index');
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tasker)
    {
        //
        return view('tasker.myProfile',['tasker'=>Tasker::findOrFail($tasker)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($taskers)
    {
        //
        return view('tasker.edit',['tasker'=>Tasker::findOrFail($taskers)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tasker)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tasker'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image'=>['required|mimes:png,jpg,jped|max:5048'],
            'phone_number'=>['required','integer'],
            'location'=>'required',
            'bio'=>'required',
            'category'=>'required'

        ]);

        $newImageName= uniqid(). '-' .$request->name .'.'.$request->image->extension(); 
          
        $request->image->move(public_path('images'),$newImageName);

       
        $to_update=new Tasker();

        

        //We assign values to the information to be stored
        $tasker->name=strip_tags($request->input('name')) ;
        $tasker->image=strip_tags($newImageName) ;
        $tasker->email=strip_tags($request->input('email')); 
        $tasker->password=strip_tags(bcrypt($request->input('password')));
        $tasker->phone_number=strip_tags($request->input('phone_number')) ;
        $tasker->location=strip_tags($request->input('location')); 
        $tasker->category_id=strip_tags($request->input('category_id'));
        $tasker->bio= strip_tags($request->input('bio'));
        $tasker->status=$request->input('status',0);
        
       
        $tasker->save();
        return redirect()->route('tasker.index');
      
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tasker)
    {
        //
        $to_delete=Tasker::findOrFail($tasker);
        
         
        //We assign values to the information to be stored
        

        $to_delete->delete();


        return redirect()->route('tasker.index');

    }
}
