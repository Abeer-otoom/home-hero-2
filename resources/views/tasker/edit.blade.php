@extends('layout')
@section('title','edit tasker')
@section('contact')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-center pt-8 ">
     <h1 >edit the tasker</h1>
    </div>

    <div class="flex justify-center pt-8 ">
       <form action="{{ route('tasker.update',['tasker'=>$tasker->id]) }}" method="POST" class="from bg-white p-6 border-1">
       
       @method('put')
        <!--To prevent any user from sending ,'<secript>'to the input and accessing the databases we use @ csef -->
        @csrf

        <div >
            <label for="name" class="text-sm">tasker name</label>
            <br>
            <input type="text" class="text-lg border-1" name="name" value="{{ $tasker->name }}" id="name" >
            @error('name')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>
   

        <div >
            <label for="tasker_image" class="text-sm">tasker photo</label>
            <br>
            <input type="file" class="text-lg border-1" name="tasker_image"  value="{{ $tasker->tasker_image }} " id="tasker_image" >
            @error('tasker_image')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>

        <div >
            <label for="email" class="text-sm">email</label>
            <br>
            <input type="text" class="text-lg border-1"  name="email" value="{{ $tasker->email }}" id="email">
            @error('email')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>
        
        <div >
            <label for="phone_number" class="text-sm">phone number</label>
            <br>
            <input type="text" class="text-lg border-1" name="phone_number" value="{{ $tasker->phone_number }}" id="phone_number">
            @error('phone_number')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>


   

        <div >
            <label for="working_area" class="text-sm">working area</label>
            <br>
            <input type="text" class="text-lg border-1" name="working_area" value="{{ $tasker->working_area }}" id="working_area">
            @error('working_area')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>


     
        
        <div>
            <label for="photo_about_his_work" class="text-sm">photo about his work</label>
            <br>
            <input type="file" class="text-lg border-1" name="photo_about_his_work" value="{{ $tasker->photo_about_his_work }}" id="photo_about_his_work" >
            @error('photo_about_his_work')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>
        

        <div>
            <label for="bio" class="text-sm">bio</label>
            <br>
            <input type="text" class="text-lg border-1" name="bio" value="{{ $tasker->bio }}" id="bio">
            @error('bio')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>

        
        
        <div class="position:center">
            <button type="submit">submit</button>
        </div> 

       </form>
       </div>
   
 
  
        
</div>
@endsection