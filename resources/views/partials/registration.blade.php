
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JonPost') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gradient-to-t from-purple-300  via-gray-200 to-purple-300">
    <x-navbar/>

    <!-- Content -->
    <div class="container mx-auto mt-16">
        <div class=" max-h-xl flex items-center justify-center ">
            <div class="max-w-xl max-h-xl  w-full p-6 bg-white rounded-md shadow-md">
                <h1 class="text-4xl font-extrabold text-center text-indigo-600 mb-4">Register</h1>
                <p class="text-lg text-gray-600 text-center mb-8">Find a job & grow your career</p>
    
                <form action="" method="POST" class="space-y-4">
                    @csrf
    
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Name</label>
                        <input
                            type="text"
                            id="email"
                            name="name"
                            value="{{ old('name') }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            required
                            autofocus
                        />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            required
                            autofocus
                        />
                    </div>
    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            required
                        />
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input
                            type="password"
                            id="password"
                            name="confirm_password"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            required
                        />
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        
                        <a href=" " class="text-sm text-indigo-600 hover:underline">
                            Forgot your password?
                        </a>
                    </div>
    
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-md focus:outline-none hover:bg-indigo-700">
                            Register
                        </button>
                    </div>
                </form>
    
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-700">
                        Don't have an account?
                        <a href=" " class="text-indigo-600 hover:underline">Register here.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
