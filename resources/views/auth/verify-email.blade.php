<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="h-screen bg-gray-50 flex items-center">
    <section class="w-full bg-cover bg-center relative py-32" style="background-image: url('https://cdn.pixabay.com/photo/2019/05/05/17/32/stadium-4181150_1280.jpg');">
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto text-center text-white relative z-10">
            <h1 class="text-5xl font-medium mb-6">Complete Your Registration</h1>
            <p class="text-xl mb-12">
                Thanks for signing up! An email has been sent to you with a verification link.<br>
                Please check your inbox and follow the instructions to verify your email address.
            </p>

            <!-- Resend Verification Email Form -->
            <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
                @csrf
                <x-primary-button>
                    Resend Verification Email
                </x-primary-button>
            </form>

            <!-- Log Out Form -->
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Log Out
                </button>
            </form>
        </div>
    </section>
</div>
</body>
</html>
