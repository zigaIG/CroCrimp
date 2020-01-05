<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @mapstyles
    </head>
        <title>{{config('app.name','CroCrimp')}}</title>
            <body>
                @mapscripts
                @include('inc.navbar')
                <div class='container'>
                    @include('inc.messages')
                    @yield('content')
                </div>
                {{-- @include('inc.footer') --}}
                <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace( 'article-ckeditor' );
                </script>
            </body>  
</html>