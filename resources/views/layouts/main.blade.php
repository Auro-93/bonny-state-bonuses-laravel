<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?//FONTAWESOME CDN?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?//GOOGLE FONTS?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600&family=Square+Peg&display=swap"
        rel="stylesheet">

    <?//CUSTOM STYLES?>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield("title")</title>

</head>

<body class="antialiased">

    <?//NAVBAR?>

    @include('partials.navbar')

    <?//SIDEBAR?>
    @include('partials.sidebar')


    @yield("content")

    <?//JS SCRIPT?>
    <script src="{{ asset('js/app.js') }}"></script>



    <?//FOOTER?>
    @include('partials.footer')
</body>

</html>
