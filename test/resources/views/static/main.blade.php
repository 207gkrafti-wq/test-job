<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script>
        /**
         * @type {Event} e
         */
        window.addEventListener('pageshow', function(e) {
            if (e.persisted || (window.performance && window.performance.navigation.type === 2)) {
                document.querySelector('main').style.display = 'none'
                window.location.reload()
            }
        })
    </script>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>
