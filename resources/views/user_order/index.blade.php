@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/stayl2.css') }}" >

<!--- hero --->
<div class="request-bg-image flex flex-col items-center justify-center">
    <h1 class="text-gray-100 text-5xl uppercase font-bold pb-10">my orders</h1>
</div>
 
@if ($order->status=="done" && $tasker->rstatus(false))
<div>add rating</div>
    
@endif


@endsection