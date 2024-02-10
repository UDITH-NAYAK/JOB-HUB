<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JonPost') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans "style="background-image: url('{{ asset('images/newbackground.png') }}'); background-size: cover ">
    <x-navbar />

    <!-- Content -->
    <div class="container mx-auto mt-16">
        <div class=" max-h-xl flex items-center justify-center ">
            <div class="max-w-xl max-h-xl  w-full p-6 bg-white rounded-md shadow-md">
                <h1 class="text-4xl font-extrabold text-center text-indigo-600 mb-4">Register</h1>
                <p class="text-lg text-gray-600 text-center mb-8">Find a job & grow your career</p>

                <form action="/create_user" method="POST" class="space-y-4">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="email" name="name" value="{{ old('name') }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                             autofocus />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                             autofocus />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                             />
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="password" name="password_confirmation"
                            class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                             />
                        @error('confirm_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between mb-4">

                        <a href="/login" class="text-sm text-indigo-600 hover:underline">
                            Already have a account?
                        </a>
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full text-white bg-blue-500 hover:bg-blue-700 rounded-md  h-12">
                            Register
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-700">
                        Don't have an account?
                        <a href="{{route('login')}}" class="text-indigo-600 hover:underline">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
