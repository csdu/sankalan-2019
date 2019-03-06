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
                <a href='{{ $page->baseUrl }}/register' data-id='footer-dashboard'>Register</a>
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
            Copyright &copy; Sankalan 2019.
        </p> 
        <p> Meet the <a class="xhr" href='{{ $page->baseUrl }}/team/' data-id='footer-team'> Sankalan Team</a>. </p>
        <p>Delhi University Computer Science Society (DUCSS)</p>
    </div>
</footer>