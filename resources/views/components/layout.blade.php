<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script  src="{{asset('resources/js/app.js')}}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>

<x-navbar />


<body class="bg-gradient-to-r from-gray-200 via-gray-200 to-gray-200  ">

    {{ $slot }}
    <x-alert />
    <x-confirm-box/>
</body>
{{-- <footer>
    <footer
        {{ $attributes->merge([
            'class' => 'fixed bg-red-100 bottom-0 left-0 w-full flex items-center
               justify-start font-bold bg-laravel text-gray-500 h-16 mt-24 opacity-90 md:justify-center',
        ]) }}>
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>

        <a href="/job/post" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>
</footer> --}}



</html>
