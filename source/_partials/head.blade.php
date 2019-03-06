<title>@yield('title') Sankalan 2019</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="description" content="{{ $page->description }}"/>

<meta property="og:url" content=url/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="{{ $page->title }}"/>
<meta property="og:description" content="{{ $page->description }}"/>
<meta property="og:image" content="{{$page->image ?? '/assets/images/favicon/apple-icon-180x180.png' }}"/>
<meta property="fb:app_id" content="211826412729565"/>

<script>
    function loadJs(a){const b=document.createElement('script');b.src=a,b.setAttribute('async','true'),document.documentElement.firstChild.appendChild(b)};function loadCSS(a){const b=document.createElement('link');b.href=a,b.setAttribute('rel','stylesheet'),document.documentElement.firstChild.appendChild(b)};
    loadCSS("{{ $page->baseUrl }}{{mix('css/critical.css', 'assets/build') }}");
    loadCSS("{{ $page->baseUrl }}{{mix('css/style.css', 'assets/build') }}");
    loadCSS("https://fonts.googleapis.com/css?family=Open+Sans|Noticia+Text|Amaranth:700");
    loadJs("{{ $page->baseUrl }}{{ mix('js/bundle.js', 'assets/build') }}");
</script>
<link rel="apple-touch-icon" sizes="60x60" href="{{ $page->baseUrl }}/assets/images/favicon/apple-icon-60x60.png"/>
<link rel="apple-touch-icon" sizes="72x72" href="{{ $page->baseUrl }}/assets/images/favicon/apple-icon-72x72.png"/>
<link rel="apple-touch-icon" sizes="120x120" href="{{ $page->baseUrl }}/assets/images/favicon/apple-icon-120x120.png"/>
<link rel="apple-touch-icon" sizes="144x144" href="{{ $page->baseUrl }}/assets/images/favicon/apple-icon-144x144.png"/>
<link rel="apple-touch-icon" sizes="180x180" href="{{ $page->baseUrl }}/assets/images/favicon/apple-icon-180x180.png"/>
<link rel="icon" type="image/png" sizes="192x192"  href="{{ $page->baseUrl }}/assets/images/favicon/android-icon-192x192.png"/>
<link rel="icon" type="image/x-icon" href="{{ $page->baseUrl }}/assets/images/favicon/favicon.ico"/>
<link rel="icon" type="image/png" sizes="32x32" href="{{ $page->baseUrl }}/assets/images/favicon/favicon-32x32.png"/>
<link rel="icon" type="image/png" sizes="96x96" href="{{ $page->baseUrl }}/assets/images/favicon/favicon-96x96.png"/>    
@stack('styles')
