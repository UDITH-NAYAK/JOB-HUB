<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'JonPost') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('JOB-HUB/resources/css/app.css') }}">
 
</head>

 
        
<body class="font-sans login" style="background-image: url('{{ asset('images/newbackground.png') }}'); background-size: cover  ">
    {{-- <img src="{{asset('images/background.jpg')}}" class="w-full h-screen absoulte"> --}}
    <x-navbar/>

    <!-- Content -->
    <div class="container mx-auto mt-20 ml-52 ">
        <div class=" max-h-xl flex items-center justify-center ">
            <div class="max-w-xl max-h-xl  w-full p-6 bg-white rounded-lg shadow-md">
                <h1 class="text-4xl font-extrabold text-center text-indigo-600 mb-4">Welcome to JobPost</h1>
                <p class="text-lg text-gray-600 text-center mb-8">Find the job that suits you!</p>
    
                <form action="/user/authenticate" method="POST" class="space-y-4">
                    @csrf
                        
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

                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                    @enderror
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
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }} </p>
                    @enderror
                    </div>
    
                    <div class="flex items-center   mb-4">
                
                        <a href="/showforgot" class="text-sm text-indigo-600 hover:underline">
                            Forgot your password?
                        </a>
                    </div>
    
                    <div>
                        <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-700 rounded-md  h-12">
                            Login
                        </button>
                    </div>
                </form>
    
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-700">
                        Don't have an account?
                        <a href="/register" class="text-indigo-600 hover:underline">Register here.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
