<div class="splash-wrapper">
    <div class="splash">
        <div class="splash-borders">
            <div class="top"></div>
            <div class="right"></div>
            <div class="bottom"></div>
            <div class="left"></div>
        </div>
        <div class="splash-content">
            <div>
                <div class="title">
                    @include('_svg.sankalan-logo', ['classes' => 'logo'])
                    <h1 class="splash-logo-text logo-text">Sankalan</h1>
                </div>
                <div class="text">
                    <p id="splash-date"><span title="Saturday, March 9th, 2019">March 9, 2019</span>&nbsp;&mdash;&nbsp;<span title="Sunday, March 10th, 2019">March 10, 2019</span></p>
                    <p><strong><a href="https://goo.gl/maps/YqMFB3uxy9m" target="_blank" rel="noopener" title="Get directions on Google Maps. See 'About' page for details." style="color: #fafafa;"> 28&deg;41'17.2"N 77&deg;12'25.7"E</a></strong></p>
                </div>
                <nav class="content-nav">
                    <ul>
                    <li><a class="button xhr" href="{{ $page->baseUrl }}/register/" style="text-shadow: none; color: #000;" data-id="register-main">Register</a></li>
                    <li><a class="xhr" href="{{ $page->baseUrl }}/team/" data-id="ct-nav-meet-the-team">Meet the team</a></li>
                    <li><a class="xhr" href="{{ $page->baseUrl }}/contact/" data-id="ct-nav-need-help?">Need help?</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>