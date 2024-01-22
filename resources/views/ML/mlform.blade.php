<x-layout>
 
    <div class=" mx-auto bg-white p-8 rounded-md shadow-md h-screen">

        <div class="container mx-auto mt-16 h-full  lg:grid lg:grid-cols-2 gap-0 ">
            <div class="max-w-2xl ml-20">
                <img src="images/ml_image.jpg" alt="background">
            </div>
            <div class="max-w-2xl  mx-auto bg-white p-8 rounded-md shadow-md">
                <div class="flex items-center mb-8">
                    <svg class="w-10 h-10 mr-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <h2 class="text-3xl font-semibold text-gray-800">ML Model Prediction Salary </h2>
            </div>

            <form action="/predict" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="experience" class="block text-sm font-medium text-gray-600 mb-2">Experience</label>
                    <input type="number" max="10" name="experience" min="0"
                    value="{{isset($exp) ? $exp:''}}"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <div class="mb-6">
                    <label for="test_score" class="block text-sm font-medium text-gray-600 mb-2">Test Score</label>
                    <input type="number" name="test_score" id="test_score"
                    value="{{isset($test_score) ? $test_score:''}}"
                    min="0"
                    max="10"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-6">
                    <label for="test_score" class="block text-sm font-medium text-gray-600 mb-2">Interview</label>
                    <input type="number" name="interview_score" id="test_score"
                    min="0"
                    max="10"
                    value="{{isset($interview_score) ? $interview_score:''}}"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                   
                </div>
                
                <div class="text-sm text-gray-600 mb-4">
                    Enter your experience, interview score and test score to predict the Salary using our ML model.
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        Predict
                    </button>
                </div>
            </form>

            @if (isset($output))
            <div class="mt-4 text-gray-800">
                
                <strong>Predicted Salary :</strong> {{ $output }}
            </div>
            @endif
        </div>
    </div>
</div>
</x-layout>
