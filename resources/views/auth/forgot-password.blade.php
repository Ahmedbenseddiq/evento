<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
<main class="w-full max-w-sm p-4 bg-white shadow-md rounded">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-400">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300 focus:border-indigo-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
        </div>

        @error('email')
        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
        @enderror

        <div>
            <button type="submit" class="w-full bg-indigo-500 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">Email Password Reset Link</button>
        </div>

        <div class="text-center text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-indigo-500 hover:underline">Remember your password? Log in here.</a>
        </div>
    </form>
</main>
</body>
</html>
