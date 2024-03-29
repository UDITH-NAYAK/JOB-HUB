@if (session()->has('confirm-message'))
<div id="info-popup" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-8">
            <div class="mb-4 text-sm font-light text-gray-500 dark:text-gray-400">
                <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Delete<i class="fas fa-question"></i>
                </h3>
                <p>
                    Deleting this will permently remove
                </p>
            </div>
            <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">

                <div class="items-center space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                    <button id="close-modal" type="button"
                        class="py-2 px-4 w-full text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 sm:w-auto hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>

                    <form  method="POST" action="/job/delete/{{ session('job_id') }}">
                        @method('DELETE')
                        @csrf
                        <button id="confirm-button" type="submit"
                            class="py-2 px-4 w-full text-sm font-medium text-center text-pink-500 rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const modalEl = document.getElementById('info-popup');
        const privacyModal = new Modal(modalEl, {
            placement: 'center'
        });

        privacyModal.show();

        const closeModalEl = document.getElementById('close-modal');
        closeModalEl.addEventListener('click', function() {
            privacyModal.hide();
        });

        // const acceptPrivacyEl = document.getElementById('confirm-button');
        // acceptPrivacyEl.addEventListener('click', function() {
          
        //     privacyModal.hide();
        // });
    </script>
</div>
    
@endif
