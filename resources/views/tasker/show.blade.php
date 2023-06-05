@extends('layouts.app')
@section('title','tasker')
@section('contact')

<link rel="stylesheet" href="{{ asset('css/stayl2.css') }}" >
<div class="request-bg-image flex flex-col items-center justify-center">
    <h1 class="text-gray-900 text-5xl uppercase font-bold pb-10">category tasker</h1>
    

</div>
<div class="container sm:grid grid-cols-2 gap-15 mx-auto py-15 px-5 border-b border-gray-300">
    <div class="flex">
        <img class="object-cover" src="/images/{{$tasker->image}}" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-4xl py-5 md:pt-0">{{ $tasker->name }}</h2>
        <div>
           
           work in : <span class="text-gray-500 italic">{{ $tasker->location}}</span>
            <p class="text-l text-gray-700 py-8 leading-6">{{ $tasker->bio }}</p>
            <a href="{{ route("order.create") }}" class="box bg-gray-700 text-gray-900 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">get the tasker</a>
        </div>
    </div>
   
</div>

@endsection