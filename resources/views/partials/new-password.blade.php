<x-layout>

    <body class="antialiased bg-slate-200">
        <form action="/rest-password-post" method="POST" class="my-10">
            @csrf
            <input type="text" name="token" hidden value="{{$token}}">
            <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
                <h1 class="text-4xl font-medium">Reset password</h1>
                <p class="text-slate-500">Fill up the form to reset the password</p>

                <input id="email" hidden name="email" type="email" value="{{$email}}">
                <div class="my-10">
                    <div class="flex flex-col space-y-5">
                        <label for="email">
                            <p class="font-medium text-slate-700 pb-2">Enter new Password</p>
                            <input id="email" name="password" type="text"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder="Enter email address">
                            @error('email')
                                <p class="text-red-400 font-sm">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>
                </div>
                
                <div class="my-10">
                    <div class="flex flex-col space-y-5">
                        <label for="email">
                            <p class="font-medium text-slate-700 pb-2">Confirm Password</p>
                            <input id="email" name="password_confirmation" type="text"
                                class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                                placeholder="Enter email address">
                            @error('email')
                                <p class="text-red-400 font-sm">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>
                </div>
                
                <button
                class="w-full py-3 font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                <span>Reset password</span>
            </button>
        </div>
    </div>

        </form>
    </body>
</x-layout>
