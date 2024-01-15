<x-layout>
    <body class="antialiased bg-slate-200">
        <form action="/passreset" method="POST" class="my-10">
            @csrf
        <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
            <h1 class="text-4xl font-medium">Reset password</h1>
            <p class="text-slate-500">Fill up the form to reset the password</p>

            <div class="my-10">
                <div class="flex flex-col space-y-5">
                    <label for="email">
                        <p class="font-medium text-slate-700 pb-2">Email address</p>
                        <input id="email" name="email" type="email"
                            class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                            placeholder="Enter email address">
                            @error('email')
                                <p class="text-red-400 font-sm">{{$message}}</p>
                            @enderror
                    </label>

                    {{-- <form action="/passreset" class="my-10">
                        <button
                            class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">


                            <span>Send otp</span>
                        </button>
                    </form> --}}

                    {{-- <form action="/passreset" class="my-10"> --}}
                        <button
                            class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">

                            <span>Reset password</span>
                        </button>
                    </form>
                    <p class="text-center">Not registered yet? <a href="#"
                            class="text-indigo-600 font-medium inline-flex space-x-1 items-center"><span>Register now
                            </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg></span></a></p>
                </div>
            </div>
        </div>

    </form>
    </body>
</x-layout>
