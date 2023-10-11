<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-gray-800">
        <div class="container mx-auto">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="/" class="text-white text-3xl font-bold ">Logo</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">Properties</a>
                            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="">
        @yield('content')
    </div>



</body>

</html>