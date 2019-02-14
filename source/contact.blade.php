@extends('_layouts.master')
@section('title', 'Contact | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h2 class="banner-title">Contact Us</h2>
    </div>
</div>
<div class="content">
    <div class="section">
        <div class="module">
            <p>For general queries, feel free to reach us at our Facebook page:</p><a class="button" href="https://facebook.com/DUCS.Sankalan" style="text-shadow: none;" target="_blank" rel="noopener" data-id="contact-FB">fb.com/DUCS.Sankalan</a></div>
        <div class="module">
            <p>You can also send us an email at</p>
            <a class="button" href="mailto:sankalan@ducs.in" style="text-shadow: none;" data-id="contact-sankalan@ducs.in">sankalan@ducs.in</a>
        </div>
    </div>
    <div class="section bg-white module">
        <div>
            <h3>We are located at:</h3>
            <pre itemprop="address" itemscope="itemscope" itemtype="http://schema.org/PostalAddress">
              Department of Computer Science,
              Faculty of Mathematical Sciences,
              New Academic Block,
              University of Delhi
            </pre>
        </div>
        <a class="button" href="https://goo.gl/maps/YqMFB3uxy9m" target="_blank" rel="noopener" style="margin-left: auto;" data-id="contact-directions">Get Directions <br/> 28°41'17.2"N 77°12'25.7"E</a>
    </div>
    <div class="module">
        <div class="contact vc"><a class="button" href="mailto:dev@ducs.in" data-id="contact-dev@ducs.in">dev@ducs.in</a><em>...if you need to talk to the web developer of Sankalan</em></div>
    </div>
    <div class="module">
        <div class="contact vc"><a class="button" href="mailto:sponsor@ducs.in" data-id="contact-sponsor@ducs.in">sponsor@ducs.in</a><a class="button" href="tel:9990395650" data-id="contact-9990395650">9990395650</a><em>...if you're interested in sponsoring the fest</em></div>
    </div>
</div>
@endsection