<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @include('_partials.head')
    </head>
    <body class="{{ $page->getUrl() == "$page->baseUrl/" ? 'is-front-page' : ''}}">
        @include('_partials.header')
        <div class="loader">
            <p>
                &gt; loading... <br>
            </p> 
            @include('_partials.svg.loader')
        </div>
    <div id="content" class="site-content">
        @include('_partials.splash')
        <nav class="nav">
            <div class="nav-container">
                @include('_partials.nav', ['context' => 'splash'])
            </div>
        </nav>
        <div class="content-wrapper">
            <div id="main" class="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <div class="pattern-background"></div>
    <canvas id="canvas" class="bg-scene"></canvas>
    @include('_partials.footer')
    </body>
</html>
