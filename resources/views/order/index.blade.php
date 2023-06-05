@extends('layouts.app')
@section('content')



<div class="request-bg-image flex flex-col items-center justify-center">
    <h1 class="text-gray-900 text-5xl  uppercase font-bold pb-10">orders page</h1>
    

  
</div> 
@foreach ($orders as $order)
    


<div class="container sm:grid grid-cols-2 gap-15 mx-auto py-15 px-5 border-b border-gray-300">
    <div class="flex">
        <img class="object-cover w-64 h-64" src="/images/{{$order->image}}" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-4xl py-5 md:pt-0">{{ $order->tasker->name }}</h2>
        <div>
             

           taske address : <span class="text-gray-500 italic mb-10">{{ $order->location }}</span>
           <br>
           phone number : <span class="text-gray-500 italic">{{ $order->tasker->phone_number }}</span>
           <br>
           taske date : <span class="text-gray-500 italic">{{ $order->date }}</span>
           taske hour : <span class="text-gray-500 italic">{{ $order->hour }}</span>



   
   
            <p class="text-l text-gray-700 py-8 leading-6">{{ $order->desc }}<p>
                
                <form action="{{ route('order.destroy', $order) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="box" type="submit">Delete</button>
                </form>
                

               


        </div>
    </div>
   </div>
@endforeach
</div>

@endsection