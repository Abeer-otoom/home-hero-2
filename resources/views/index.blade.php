@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/stayl.css') }}" >

<!--- hero --->
<div class="hero-bg-image  flex flec-col items-center justify-center ">
    <h1 class="text-gray-100 text-5xl text-shadow uppercase font-bold pb-10">welcom to home hero</h1>
    <br>
    @if (Auth::check())
          <a class="box bg-gray-100 text-gray-900 py-4 px-5 rounded-lg  font-bold uppercase text-xl" href="/tasker/create">becom tasker</a>

    @endif

    

</div>

<div class=" text-center p-15 bg-white">
  <h2 class="text-2xl">choos category</h2>
  <div class="container mx-auto pt-10 sm:grid  grid-cols-5">
    @foreach ($categories as $category)
    <a href="{{ route('categories.showTaskers', $category) }}">
        <span class="box font-bold text-1xl py-2 ">{{ $category->name }}</span>
    </a>
    @endforeach
 

  </div>

</div>

<div class="contaner bg-purple  mx-auto  text-center my-15">
  <h2 class="font-bold text-2xl py-10">about us</h2>
  <p class="text-gray-600 laeding-6 px-10">Home Hero is a site that works to provide necessary home services that make it easier for the user to solve home problems and help him by providing a qualified labor force to provide the required assistance and provides job opportunities for those wishing to provide their services through the site</p>
</div>

@endsection