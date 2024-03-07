<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="min-h-screen bg-gray-800 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-700 to-purple-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
        </div>
        <div class="text-white relative px-4 py-10 bg-indigo-400 shadow-lg sm:rounded-3xl sm:p-20">

            <div class="text-center pb-6">
                <h1 class="text-3xl">Register</h1>
            </div>

            <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" placeholder="Name" required autofocus autocomplete="name" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" placeholder="Email" required autocomplete="email" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" placeholder="Password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <input id="password_confirmation" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                </div>

                <!-- Radio Buttons for Role -->
                <div class="mb-4 flex items-center">
                    <input type="radio" name="role" id="client" value="client" class="hidden">
                    <label for="client" class="text-sm px-2 py-1 rounded-md cursor-pointer border border-gray-300 mr-2 select-none" style="background-color: white; color: black;">Client</label>
                    <input type="radio" name="role" id="organizer" value="organizer" class="hidden">
                    <label for="organizer" class="text-sm px-2 py-1 rounded-md cursor-pointer border border-gray-300 select-none" style="background-color: transparent; color: inherit;">Organizer</label>
                </div>

                <!-- File Upload for Image -->
                <div class="mb-4">
                    <input type="file" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*" style="background-color: #f3f4f6; color: #4b5563; border-color: #e5e7eb;">
                </div>

                <!-- Register Button -->
                <div class="flex justify-between">
                    <input type="submit" value="Register" class="shadow bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set default active radio button
        document.getElementById('client').checked = true;
        document.querySelector('label[for="client"]').classList.add('active');

        // Add click event listener to each radio button
        document.querySelectorAll('input[type="radio"]').forEach(function(radio) {
            radio.addEventListener('click', function() {
                // Remove active class from all labels
                document.querySelectorAll('label').forEach(function(label) {
                    label.style.backgroundColor = 'transparent';
                    label.style.color = 'inherit';
                });

                // Add active class to the selected label
                const selectedLabel = document.querySelector('label[for="' + this.id + '"]');
                selectedLabel.style.backgroundColor = 'white';
                selectedLabel.style.color = 'black';
            });
        });
    });
</script>
</body>
</html>
