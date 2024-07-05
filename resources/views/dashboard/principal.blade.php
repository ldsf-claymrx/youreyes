<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CCA | Dashboard</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
        <link rel="shortcut icon" type="image/png" href="https://flowbite.com/docs/images/logo.svg">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <h1>{{ Auth::user()->name." ".Auth::user()->lastname }}</h1>
    </body>
</html>