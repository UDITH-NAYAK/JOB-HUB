<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Reset Your Password</h1>
        <p class="text-gray-600 mb-4">We received a request to reset your password. Click the link below to reset it:
        </p>
        <a href="{{ url("/reset-password/$token/$email") }}"
            class="bg-blue-500 text-white py-2 px-4 rounded inline-block hover:bg-blue-600">Reset Password</a>
        <p class="text-gray-600 mt-4">If you didn't request a password reset, you can ignore this email.</p>
    </div>
</body>

</html>
