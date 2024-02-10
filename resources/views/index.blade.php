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
        <form action="/" class="w-full   ">

            <div class="w-full md:w-1/2 flex mx-auto justify-center items-center">
                <input type="search" name="search"
                    class="block w-7/12 px-4 py-2 pl-10 pr-4 leading-normal text-gray-900 bg-white border border-gray-300 rounded-lg appearance-none hover:border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Search...">
                    <button id="filterButton"
                    class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Search</button>


                <div class="ml-4 md:ml-6 flex">
                    <select id="countries" name="filters"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option selected>Filter by</option>
                        <option value="company">Company Name</option>
                        <option value="salary">Salary</option>
                        <option value="experience">Experience</option>

                    </select>

                    <button id="filterButton"
                        class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Filter</button>

                </div>
            </div>

        </form>

        @if ($jobs->isEmpty())
            <div class="text-5xl text-center text-pink-500 pt-8">
                Jobs not found
                {{-- <i class="fa fa-exclamation-circle" aria-hidden="true"></i> --}}
                <i class="fa-solid fa-exclamation"></i>
                <i class="fa-solid fa-exclamation"></i>
            </div>
        @else
            <div class="lg:grid lg:grid-cols-4 gap-4 mt-10 space-y-4 md:space-y-0 mx-4">

                @foreach ($jobs as $job)
                    <x-job-card :job="$job" />
                @endforeach


            </div>
        @endif
        </div>
    </body>
    <footer>

        <div class=" mt-8 pd-4 b-0 flex justify-center">

            {{ $jobs->links() }}
    </footer>
    </div>
</x-layout>
