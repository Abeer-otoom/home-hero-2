@extends('layouts.app')
@section('content')



@foreach ($taskers as $tasker)
    

   

  <div class="container sm:grid grid-cols-2 gap-15 mx-auto py-15 px-5 border-b border-gray-600">



    




    <!--taser image-->
        <div class="flex">
          <img class="object-cover rounded-full  w-64 h-64" src="/images/{{ $tasker->image }}" alt="">
        </div>

        
        <div> 

            <!--tasker name  -->
         <h2 class="text-gray-900 font-bold text-4xl py-5 md:pt-0">{{ $tasker->name }}</h2>
 

         <div>
        
         <!--tasker email  -->
         <div class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
           <div class="flex flex-col pb-3">
           <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email address</dt>
            <dd class="text-lg font-semibold">{{ $tasker->email }}</dd>
         </div>
         </div>

         <!--tasker location -->

          <div class="flex flex-col py-3">
          <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">work in :</dt>
          <dd class="text-lg font-semibold">{{ $tasker->location }}</dd>
          </div>

          <!-- tasker phone number -->
          <div class="flex flex-col pt-3">
          <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Phone number</dt>
          <dd class="text-lg font-semibold">{{ $tasker->phone_number }}</dd>
          </div>

         <!-- </dl> -->
         </div>

         <div class="mb-4 top-10">
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
         </div>



                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                         <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                              <path
                                  d="M7 7l3-3 3 3m0 6l-3 3-3-3"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  stroke-linecap="round"
                                   stroke-linejoin="round"
                                 />
                                 </svg>
                        </div>

 
                       </div>
               @endforeach

      <div class="relative">
       <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 top-4 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <!--<option value="" disabled selected>comments</option>-->
       @foreach ($tasker->reviews as $com)
       <option value="" disabled selected>{{ $com->comment }}</option>
       @endforeach
        </select>
        </div>


         <p class="text-l text-gray-700 py-8 leading-6">{{ $tasker->bio }}</p>

     <div>
         @if (Auth::check('user'))
         <a href="{{ route("order.createOrder",$tasker->id) }}" class="box bg-gray-700 text-gray-900 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">get the tasker</a>
         <a href="{{ route("review.create",$tasker->id) }}" class="box bg-gray-700 text-yellow-300 py-4 px-5 rounded-lg font-bold uppercase text-l place-self-start">sent a review</a>
        @endif
     </div>
 

       
  </div>
  
      </div>
  

@endforeach








@endsection