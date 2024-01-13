{{-- @props(['jobs']); --}}
<x-layout>

    <body class=" bg-gradient-to-r from-gray-200 via-gray-200 to-gray-200">

        <div>
            <blockquote class="text-4xl font-semibold italic text-center text-slate-90 mt-20">
                <span
                    class="h-12 before:block before:absolute before:-inset-1 before:-skew-y-2 before:bg-blue-500 relative inline-block">
                    <span class="relative text-white">Find your dream job now</span>
            </blockquote>
            <div class="flex justify-center ">
                <span class="realtive inline-block text-center mt-6 text-2xl">5 lakh+ jobs for you to explore</span>
            </div>
        </div>
        <!-- search bar -->
        <form action="/" class="w-full  pl-80 ">

            <div class=" w-full md:w-.5 flex mx-auto ">
                <input type="search" name="search"
                    class="block w-7/12   px-4 py-2 pl-10 pr-4 leading-normal text-gray-900 bg-white
                border border-gray-300 rounded-lg appearance-none hover:border-gray-700 focus:outline-none focus:ring-2 
               focus:ring-blue-600 ">
                <button class="inline-block ml-6 bg-blue-400 rounded-md p-2">Search</button>
            </div>
        </form>

        <div class="lg:grid lg:grid-cols-4 gap-4 mt-10 space-y-4 md:space-y-0 mx-4">
            @if ($jobs->isEmpty())
                <p>Search not found</p>
                   
            @else
                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach
                
            @endif

        </div>
        </div>
    </body>
    <footer>

        <div class=" mt-8 pd-4 b-0 flex justify-center">

            {{ $jobs->links() }}
    </footer>
    </div>
</x-layout>
