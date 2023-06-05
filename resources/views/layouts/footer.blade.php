<footer class="bg-green-500 py-15 mt-20">

    <dev class="containar container mx-auto f   flex flex-col items-center justify-center px-6">

        <div>

        <h3 class="font-bold text-gray-100">pages</h3>

        <ul class="py-4 text-gray-400  items-center ">

            <li class="pb-2"> 
                <a class="hover:text-gray-200 transition duration-300" href="/">home</a>
            </li>
            <li class="pb-2"> 
                <a class="hover:text-gray-200 transition duration-300  " href="{{ route('order.index') }}">my orders</a>
            </li>

            <li class="pb-2"> 
                <a class="hover:text-gray-200 transition duration-300  " href="{{ route('tasker.login') }}">tasker login</a>
            </li>


          

        </ul>

    </div>

    

    </dev>

</footer>