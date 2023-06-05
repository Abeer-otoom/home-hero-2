<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tasker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('order.index')->with('orders',order::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function createOrder($tasker_id)
    {
        //
        return view('order.create',compact('tasker_id'));
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

        $request->validate([
           
            'image'=>['required'],
            'location'=>'required',
            'date'=>'required',
            'hour'=>'required',
            'desc'=>'required',
            

        ]);

        $newImageName= uniqid(). '-' .$request->name .'.'.$request->image->extension(); 
          
        $request->image->move(public_path('images'),$newImageName);
        $order =new order();
        $order->tasker_id=$request->tasker_id;
        $order->user_id=Auth::id();
        $order->location=strip_tags($request->input('location'));
        $order->image=strip_tags($newImageName) ;
        $order->date=strip_tags($request->input('date'));
        $order->hour=strip_tags($request->input('hour'));
        $order->desc=strip_tags($request->input('desc'));

        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        //
        return view('order.show',['order'=>order::findOrFail($order)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($order)
    {
        //
        return view('order.edit',['order'=>order::findOrFail($order)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $order)
    {
        //
        

        $request->validate([
           
            'image'=>['required'],
            'location'=>'required',
            'date'=>'required',
            'hour'=>'required',
            'desc'=>'required',
            

        ]);

        $newImageName= uniqid(). '-' .$request->name .'.'.$request->image->extension(); 
          
        $request->image->move(public_path('images'),$newImageName);
        $order =new order();
        $order->tasker_id=$request->tasker_id;
        $order->user_id=Auth::id();
        $order->location=strip_tags($request->input('location'));
        $order->image=strip_tags($newImageName) ;
        $order->date=strip_tags($request->input('date'));
        $order->hour=strip_tags($request->input('hour'));
        $order->desc=strip_tags($request->input('desc'));

        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($order)
    {
        //
        $to_delete=order::findOrFail($order);
        
         
        //We assign values to the information to be stored
        

        $to_delete->delete($order);


        return redirect()->route('order.index');
    }
}
