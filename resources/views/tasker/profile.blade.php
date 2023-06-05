@extends('layouts.app')
@section('title','tasker')
@section('contact')




<div class="container sm:grid grid-cols-2 gap-15 mx-auto py-15 px-5 border-b border-gray-600">
    <div class="flex">
        <img class="object-cover w-64 h-64" src="/images/{{ $tasker->image }}" alt="">
    </div>
    <div>
        <h2 class="text-gray-900 font-bold text-4xl py-5 md:pt-0">{{ $tasker->name }}</h2>
        <div>
           
           work in : <span class="text-gray-700 italic md:pt-4"> {{ $tasker->location }}</span>
           <br>
           <br>
           phone number<span class="text-green-500 text-l italic pt-3 py-5">  {{ $tasker->phone_number }}</span>
           <br>
           <br>
           email : <span class="text-blue-700 italic">{{ $tasker->email }}</span>
            <br>
            <br>
    <div class="mb-4">
       <label for="rating" class="text-lg font-semibold">Rating:</label>
       {{-- <x-rating /> --}}
   <div class="flex items-center">
         
   @foreach($final_rate as $key => $item)
   @if($tasker->id == $key)
   @php
       $rating = $item/$count_rate[$tasker->id];
   @endphp
   @foreach (range(1, 5) as $i)
       <span class="fa-stack" style="width:1em">
           @if ($rating > 0)
               <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
           @endif
           @php $rating--; @endphp
       </span>
   @endforeach
   <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">{{ $item/$count_rate[$tasker->id] }} out of 5</p>
   
   @endif
   
   @endforeach
   
         </div>
   
     </div>
   
   
            <p class="text-l text-gray-700 py-8 leading-6">{{ $tasker->bio }}</p>
            @if (Auth::check())
            <a href="{{ route("order.createOrder",$tasker->id) }}" class="box bg-gray-700 text-gray-900 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">get the tasker</a>
            <a href="{{ route("review.create",$tasker->id) }}" class="box bg-gray-700 text-gray-900 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">review</a>
           @endif
           </div>
    </div>
   </div>

@endsection