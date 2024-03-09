<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="../assets/js/init-alpine.js"></script>
  </head>
  <body>
    <div class="flex items-center justify-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900"> <!-- Adjusted to use justify-center -->
      <div class="w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" style="width: 75%;"> <!-- Adjusted width to take 75% of the parent -->
        <div class="flex flex-col overflow-y-auto md:flex-col">
          <div class="flex items-center justify-center p-6 sm:p-12"> <!-- Removed md:w-1/2 class -->
            <div class="w-full md:w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200" > Update Category </h1>
                <div class="text-gray-600 !important">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <form method="post" action="{{ route('admin.updateCategory', ['category'=>$category]) }}">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                      <div>         
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="title">Title</label>
                        <input id="title" name="name" value="{{$category->name}}" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Party" />
                      </div>
                      
                    </div>
                    <div class="flex justify-between mt-6"> <!-- Adjusted to use justify-between -->
                      <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Update Category</button>
                      <a href="{{ route('admin.categories') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Go Back</a>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
