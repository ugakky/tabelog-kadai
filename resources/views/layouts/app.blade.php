<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAGOYAMESHI</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <main>
        @yield('content') <!-- 子テンプレートの内容が挿入される -->
    </main>

    <!-- 共通のフッター -->
    <footer>
        <p>&copy; 2023 My Laravel App</p>
    </footer>

</body>

</html>