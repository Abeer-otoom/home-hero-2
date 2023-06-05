@extends('layouts.app')
@section('content')



<form action="{{ route('review.store') }}" method="POST">
    @csrf
    <div class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5 py-10 p-x 15"> 
       
    <label for="ratting"  class="text-sm font-bold py-10 px-5 mb-7">rating:</label>
    <select id="rating" name="rating">
     
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
      
       

    </select>

  </div>

  <div class="py-5" >
    <label for="comment" class="text-sm font-bold py-10 px-5 mb-7">Write comment to tasker </label>
    
    <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5 py-10 px-5" name="comment" placeholder="comment" value="{{ old("comment") }}" id="comment" >
    @error('comment')
    <div class="form-error">
        {{ $message }}
    </div>
        
    @enderror
  </div>
  <div class="position:center">
    <button class="box text-green-500" type="submit">sent the review</button>
 </div> 
  <input type="hidden" name="tasker_id" value="{{ $tasker_id }}">

</form>
@endsection