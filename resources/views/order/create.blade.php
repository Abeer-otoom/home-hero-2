@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/stayl2.css') }}" >

<!--- hero --->
<div class="hero-bg-image  flex flec-col items-center justify-center ">
    <h1 class="text-gray-100 text-5xl text-shadow uppercase font-bold pb-10" >ceate an order</h1>
 
</div>
<form action="{{ route('order.store') }}" method="post" class="from bg-white p-5 border-1" enctype="multipart/form-data" >
    @csrf

    <div class="py-5" >
       <label for="desc" class="text-sm font-bold">Write about the task to be done</label>
       <br>
       <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="desc" placeholder="details about the task" value="{{ old("desc") }}" id="desc" >
       @error('desc')
       <div class="form-error">
           {{ $message }}
       </div>
           
       @enderror
    </div>

    <div class="py-5" >
       
       <label for="location" class="text-sm font-bold">Write the taske location</label>
       <br>
       <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="location" placeholder="the location" value="{{ old("location") }}" id="location" >
       @error('location')
       <div class="form-error">
           {{ $message }}
       </div>
           
       @enderror
    </div>
   
    <div class="py-5">
       <label for="date" class="text-sm font-bold">Any day you want to start working</label>
       <br>
       <input type="date" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="date"  id="date">
       <div class="form-error">
          @error('date')
          {{ $message }}
            </div> 
          @enderror  
       
      
    </div>

    <div class="py-5">
       <label for="time" class="text-sm font-bold">Choose the hour you want to work</label>
       <br>
       <input type="time" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="hour"  id="hour">
       <div class="form-error">
          @error('hour')
          {{ $message }}
             </div> 
          @enderror 
       
      
    </div>

    <div class="py-15" >
       <label class="bd-gray-200 hover:bg-gray-700 text-gray-700 hover:text-gray-200 transition duration-300 cursor-pointer p-5 rounded-lg font-bold uppercase">
          <span>upload the task photos </span>
       <input type="file" class="hidden"  name="image"  value="{{ old("image") }}" id="image" >
       </label><!--
       <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="tasker_image">A profile picture is useful to confirm your are logged into your account</div>
       -->
       @error('image')
       <div class="form-error">
           {{ $message }}
       </div>
           
       @enderror
    </div>
    

    
    <div class="position:center">
       <button class="box text-green-500" type="submit">sent the request</button>
    </div> 
<input type="hidden" name="tasker_id" value="{{ $tasker_id }}">

   </form>



@endsection