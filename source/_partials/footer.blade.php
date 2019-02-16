<footer>
    <nav>
        <ul>
            <li>
                <a class="xhr" href='{{ $page->baseUrl }}/contact/' data-id='footer-contact'>Contact</a>
            </li>
            <li>
                <a class="xhr" href='{{ $page->baseUrl }}/terms/' data-id='footer-terms'>Terms</a>
            </li>
            <li>
                <a href='{{ $page->baseUrl }}#' data-id='footer-dashboard'>Dashboard</a>
            </li>
            <li class="social" itemscope itemtype="http://schema.org/Organization">
                <link itemprop="url" href="https://csdu.github.io/sankalan/"/>
                <link itemprop="logo" href="https://3.bp.blogspot.com/-hRUBNsFroTw/WoQqtKB941I/AAAAAAAAAGw/nwyz6wSxFT0-AxFmLRnVivVaikG4DLE3gCLcBGAs/s1600/logo.png"/>
                <meta itemprop="name" content="DUCS Sankalan"/>
                <a href="https://facebook.com/DUCS.Sankalan" title="Find us on Facebook" data-id='footer-FB' rel="noopener" target="_blank" itemprop="sameAs">
                  <img src="{{ $page->baseUrl  }}/assets/images/fb-icon.svg" alt="FB"/>
                </a> &nbsp;
                <a href="https://www.instagram.com/sankalan.ducs/" title="Find us on Instagram" data-id='footer-IG' rel="noopener" target="_blank" itemprop="sameAs">
                  <img src="{{  $page->baseUrl  }}/assets/images/instagram-icon.png" alt="Instagram"/>
                </a>
            </li>
        </ul>
    </nav>
    <div class="copyright">
        <p>
            Copyright &copy; 2019. Made with &hearts; by&nbsp;
            <a href='https://github.com/sidvishnoi' data-id="footer-dev">
            <span style="white-space: nowrap"> Sudhanshu Vishnoi </span>.
            </a>
        </p> 
        <p> Meet the <a class="xhr" href='{{ $page->baseUrl }}/team/' data-id='footer-team'> Sankalan Team</a>. </p>
        <p>Delhi University Computer Science Society (DUCSS)</p>
    </div>
</footer>
<script>
    function loadJs(a){const b=document.createElement('script');b.src=a,b.setAttribute('async','true'),document.documentElement.firstChild.appendChild(b)};function loadCSS(a){const b=document.createElement('link');b.href=a,b.setAttribute('rel','stylesheet'),document.documentElement.firstChild.appendChild(b)};
    loadCSS("{{ $page->baseUrl }}{{mix('css/style.css', 'assets/build') }}");
    loadCSS("https://fonts.googleapis.com/css?family=Open+Sans|Noticia+Text|Amaranth:700");
    loadJs("{{ $page->baseUrl }}{{ mix('js/bundle.js', 'assets/build') }}");
</script>