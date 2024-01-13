<x-layout class="hidden">


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropzone = document.getElementById('dropzone');
            const dropzoneFileInput = document.getElementById('dropzone-file');
            const messageDiv = document.getElementById('message');

            dropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropzone.classList.add('border-blue-500');
            });

            dropzone.addEventListener('dragleave', function() {
                dropzone.classList.remove('border-blue-500');
            });

            dropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropzone.classList.remove('border-blue-500');

                const file = e.dataTransfer.files[0];

                if (file) {
                    dropzoneFileInput.files = e.dataTransfer.files;
                    // You can handle the file as needed, e.g., display its name
                    console.log('Dropped file:', file.name);
                    messageDiv.innerHTML = `Dropped file:${file.name}`;
                }

            });

            // Additional event listener for clicking on the dropzone to trigger the file input
            dropzone.addEventListener('click', function() {
                dropzoneFileInput.click();
            });

            // Event listener for file input change
            dropzoneFileInput.addEventListener('change', function() {
                // You can handle the selected file as needed
                const file = dropzoneFileInput.files[0];
                if (file) {
                    console.log('Selected file:', file.name);
                }
            });
        });
    </script>




    <div class="max-w-2xl h-auto mx-auto border bg-white  p-4 mt-20">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create a Job</h2>
            <p class="mb-4">Post a job to find a developer</p>
        </header>
        <form action="/job/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Company
                    Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                    value="{{ old('company') }}" />

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Job
                    title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full"
                    placeholder="Senior Software developer'" name="title" value="{{ old('title') }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            
            {{-- <div class="mb-6">
                <label for="dropzone-file"
                    class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Company Logo</label>
                <div id="dropzone"
                    class="flex items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div id="message" class="flex flex-col items-center text-white  justify-center pt-5 pb-6">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload
                        {{-- <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> 
                    </div>
                    <input id="dropzone-file" type="file" name="logo"  class="bg-gray-100" />
                </div>
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div> --}}


            <div class="mb-6">
                <label for="company"
                    class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Company logo</label>
                    <input  type="file" name="logo"  class="bg-gray-100" />


                @error('logo')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company"
                    class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Experience</label>
                <input type="number" min="0" class="border border-gray-200 rounded p-2 w-full" placeholder="eg:0-10"
                    name="experience" value="{{ old('experience') }}" />

                @error('experience')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company"
                    class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Salary</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="2000"
                    name="salary" value="{{ old('salary') }}" />

                @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company"
                    class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">skills</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="separate skills by adding comma. eg:php,excel"
                    name="skills" value="{{ old('skills') }}" />

                @error('skill')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company"
                    class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" placeholder="eg:2000"
                    name="location" value="{{ old('location') }}" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="job_link" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Job
                    link</label>
                <input type="url" class="border border-gray-200 rounded p-2 w-full" placeholder="eg:https://xyz.com"
                    name="job_link" value="{{ old('job_link') }}" />

                @error('job_link')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2 after:content-['*'] after:text-red-500">Job
                    Description</label>
                <textarea type="text" class="border border-gray-200 rounded p-1 w-full h-80" placeholder="Enter description here"
                    name="description" value="{{ old('description') }}">
                </textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-pink-500 p-2 rounded-lg w-20 ">Post</button>

            </div>
        </form>
    </div>

</x-layout>
