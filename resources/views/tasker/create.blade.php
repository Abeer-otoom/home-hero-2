@extends('layouts.app')

@section('content')
<div class="home-bg-image flex flex-col sm:container sm:mx-auto sm:max-w-lg sm:mt-10">

    <form action="{{ route('tasker.store') }}" method="post" class="from bg-white p-5 py-1 px5 border-1" enctype="multipart/form-data" >
       <!-- To prevent anry user from sending ,'<secript>'to the input and accessing the databases we use @ csef -->
        @csrf

        <div >
            <label for="name" class="text-sm font-bold ">tasker name</label>
            <br>
            <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="name" placeholder="tasker name" value="{{ old("name") }}" id="name" >
            @error('name')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div >
        
     
        <div class="py-10" >
            <label class="bd-gray-200 hover:bg-gray-700 text-gray-700 hover:text-gray-200 transition duration-300 cursor-pointer p-5 rounded-lg font-bold uppercase">
               <span>select an image to upload</span>
            <input type="file" class="hidden"  name="image"  value="{{ old("image") }}" id="image" >
            </label><!--
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="tasker_image">A profile picture is useful to confirm your are logged into your account</div>
            -->
            @error('tasker_image')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>
        
        
        <div >
            <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white py-2 font-bold ">Your Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                </div>
                 <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5 bg-gray-50  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" name="email" value="{{ old("email") }}" id="email">
            </div>

            @error('email')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>
        <div >
            <label for="password" class="text-sm font-bold ">password</label>
            <br>
            <input type="password" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="password" placeholder="passwors" value="{{ old("password") }}" id="password" >
            @error('password')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div >
        
        <div >
            <label for="phone_number" class="text-sm font-bold ">phone number</label>
            <br>
            <input type="tel" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="phone_number" value="{{ old("phone_numder") }}" id="phone_number"  required>
            @error('phone_number')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>
        

        <div class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5"> 
            
            <label for="category">Select a category:</label>
             <select id="category" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                
        
             </select>

          </div>
   

        <div >
            <label for="location" class="text-sm font-bold">working area</label>
            <br>
            <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="location"  value="{{ old("location") }}" id="location">
            @error('location')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>


     
    

        <div >
            <label for="bio" class="text-sm font-bold">bio</label>
            <br>
            <input type="text" class="w-full h-10 text-l rounded-l shadow-lg border-b p-1 mb-0.5" name="bio" value="{{ old("bio") }}" id="bio">
            @error('bio')
            <div class="form-error">
                {{ $message }}
            </div>
                
            @enderror
        </div>

        
        
        <div class="position:center py-5">
            <button class="box" type="submit">submit</button>
        </div> 

       </form>
</div>

@endsection