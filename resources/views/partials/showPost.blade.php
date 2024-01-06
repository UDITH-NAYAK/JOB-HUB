<x-layout class="hidden">
    
    <div class="max-w-2xl h-auto mx-auto border bg-white  p-4 mt-20">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a Job</h2>
            <p class="mb-4">Post a job to find a developer</p>
          </header>
        <form action="/job/create" method="post">
            @csrf
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" value="" />

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Job title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="Senior Software developer'" name="title" value="" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
           
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Experience</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="eg:0-10" name="experience" value="" />

                @error('experience')
                    <p class="text-red-500 text-xs mt-1"> {{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Salary</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="2000" name="salary" value="" />

                @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
           
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">skills</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="2000" name="skills" value="" />

                @error('skill')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
           
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="eg:2000" name="location" value="" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
           
           
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Job Description</label>
                <textarea type="text" class="border border-gray-200 rounded p-1 w-full" placeholder="Enter description here" name="description" value="">
                </textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                @enderror
            </div>
           
            <div class="mb-6">
                    <button type="submit" class="bg-pink-500 p-2 rounded-lg w-20 ">Post</button>
             
            </div>
        </form>
    </div>

</x-layout>
