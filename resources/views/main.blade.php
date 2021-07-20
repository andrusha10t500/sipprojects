<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>homeTorrent</title>
</head>
<body>
    <div id="app">
        <App></App>
    </div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>