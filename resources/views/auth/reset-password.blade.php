<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">
<main class="w-full max-w-sm p-4 bg-white shadow-md rounded">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Reset Your Password
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-400">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300 focus:border-indigo-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
            @error('email')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-400">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300 focus:border-indigo-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
            @error('password')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-400">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-300 focus:border-indigo-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-indigo-600 dark:focus:border-indigo-600">
            @error('password_confirmation')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="w-full bg-indigo-500 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">Reset Password</button>
        </div>
    </form>
</main>
</body>
</html>
