@if(session()->has('message'))
<div x-data="{ show: true }" x-show="show" x-init="setTimeout(()=>show=false,2000)"  id="successModal" tabindex="-1" aria-hidden="true" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0  z-50 justify-center flex items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="successModal">
                <i class="fa-solid fa-x"></i>
                <span class="sr-only">Close modal</span>
            </button >
            <div class="w-12 h-12 rounded-full bg-green-200   p-2 flex items-center justify-center mx-auto mb-3.5">
                <i class="fa-solid fa-check  "></i>
                <span class="sr-only"> {{session('message')}}</span>
            </div>
            <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{session('message')}}</p>
           
        </div>
    </div>
    @endif