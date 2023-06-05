@extends('layouts.app')
@section('content')



<div class="request-bg-image flex flex-col items-center justify-center">
    <h1 class="text-gray-900 text-5xl uppercase font-bold pb-10">your orders</h1>
    

    <p style="color:crimson font-bold"> sorry ther are no orders display </p>
       
-->

    


   <div class="container sm:grid grid-cols-1 gap-15 mx-auto py-15 px-5 border-b border-gray-300">
   
    <div>
        <h2 class="text-gray-700 font-bold text-4xl py-5 md:pt-0">{{ $order->tasker_id }}</h2>
        <div>
           
           work in : <span class="text-gray-500 italic">{{ $order->location }}</span>
            <p class="text-l text-gray-700 py-8 leading-6">{{ $order->date }}</p>
            <p class="text-l text-gray-700 py-8 leading-6">{{ $order->hour }}</p>
        
        </div>
    </div>
   </div>

</div>

@endsection