<nav class="bg-gray-800 pl-6 pr-6 pt-4 pb-4  w-full my-0">
    <div class="container mx-auto flex   items-center justify-between">
        @auth
            
        <div class="text-white font-mono">
            Welcome back , <span class="font-bold text-xl">{{auth()->user()->name}}</span>
        </div>
        @endauth
        <div class="text-white font-bold text-xl ">
            <!-- <img src="images/newlogo.png" alt="image" class="rounded-lg w-20 h-10"> -->
            <a href="/">
                <i class="fa-solid fa-house"></i>
                Home
            </a>
            </div>
        
        @auth

            <div class="hidden md:flex items-center hover:pointer  space-x-6">
                <div class="text-white hover:pointer">
                    <i class="fa-regular fa-square-plus fa-lg hover:pointer "></i>
                    <a href="/job/post"  class="hover:text-blue-300">Create</a>
                </div>
                
            </div>

            <a href="/manage" class="cursor-pointer">
                <div class="text-white cursor-pointer">
                    <i class="fa-solid fa-gear "></i>
                    <label for="" class="cursor-pointer">Manage Post</label>
                </div>
            </a>
            <div class="text-white">

                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="bg-red-600 p-2 rounded ">
                        <i class="fa-solid fa-door-closed"></i>
                        Logout
                    </button>

                </form>

            </div>
        @else
            <div class="hidden md:flex items-center space-x-6">
                <div class="text-white">
                 
                    <a href="/login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Login
                    </a>
                </div>
                <div class="text-white">
                    <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Register
                    </a>
                </div>
            </div>

        @endauth


    </div>

</nav>
