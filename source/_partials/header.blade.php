<header class="site-header">
    <a class="logo-text xhr" href='{{ $page->baseUrl }}/' data-id='header'>
      <h1>Sankalan</h1>
    </a>
    <a class='menu-toggle xhr' href='{{ $page->baseUrl }}/' data-id='menu-toggle'>Menu</a>
    <nav>
        @include('_partials.nav', ['context' => 'header'])
    </nav>
</header>