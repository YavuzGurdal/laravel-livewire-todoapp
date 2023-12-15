<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App template</title>

    <!-- Include Tailwind CSS with dark mode enabled -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-700 text-gray-100">

    <div id="head" class="flex border-blue-700 border-t-2">
        <div class="w-full">
            <header class="flex bg-gray-800 justify-between h-20 border-b border-b-gray-600 items-center px-6">
                <div id="left-header" class=""></div>
                <div id="right-header" class="text-gray-300 hover:text-gray-400 space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
            </header>
        </div>
    </div>

    <div id="content" class="mx-auto px-2" style="max-width:800px;">
        @livewire('todo-list')
    </div>

</body>

</html>
