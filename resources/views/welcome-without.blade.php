<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        @livewireAssets
    </head>
    <body class="p-12">
        <h1 class="text-3xl text-center font-semibold text-red-700">Livewire Query Builder</h1>
        <h3 class="mt-8 text-xl text-center text-red-600">Without uniquely named select</h3>

        @livewire('query-builder-without', $fields)
    </body>
</html>
