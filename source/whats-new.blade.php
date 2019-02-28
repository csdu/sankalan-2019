@extends('_layouts.master')
@section('title', 'What\'s New | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h2 class="banner-title">What's New</h2>
    </div>
</div>
<div class="content">
    <div class="section module auto">
        <div>
            <h3>New Event</h3>
            <br/>
            <p><strong>अल्फ़ाज़ aur जज़्बात:</strong> 
            <br>
            This year we made an effort to amalgamate tech with culture. Here we bring to you the very first Poetry event of Sankalan ever -
            <a class="xhr" href="{{ $page->baseUrl }}/events/alfaaz-aur-jazbaat/" target="_blank">alfaaz aur jazbaat</a>. We went on to collaborate with 
            <a class="xhr" href="https://www.youtube.com/channel/UCeMecwNIJrd_kyw_6fKgmqw/featured" target="_blank"><b>Social House</b></a>, a one-of-its-kind youtube channel with more than a million subscribers. Best part is, The Winner will get a chance to be featured on India's most subscribed poetry and storytelling YouTube channel. 
            This will serve as the big break to the winners. </p><br/>
            </div>
    </div>
    <div class="section module auto">
        <div>
            <h3>Registration process</h3>
            <p>We created a brand new 
            <a class="xhr" href="{{ $page->baseUrl }}/register/" target="_blank">online portal</a> 
            for Sankalan 2019 participation & Online Quizzing. 
            
            <p>We made registration and the quizzing process really simple.</p><br/>
            <p>In almost every fest, you register using a form. Most of times, they ask you for very useless and repetitive info. 
            Our portal will ask you for only to required details, and only once. Team up with your friends right on the portal and participate in different events with your custom teams. </p><br/>
            <p>Just remember your email &amp; and password, and we will do the rest. <br>
            We won't waste your time in writing details about you in spreadsheets or paper for each event! 
            </p><br/>
            <p>Just register and login on the portal, create a team with you friend, and simply click participate to register for that event. 
            You can register for as many event as you like, as long as the schedule allows.
            </p><br/>
            <p>If you haven't registered for Sankalan yet, what are you waiting for? Register yourself at <a href="{{ $page->baseUrl }}/register/">our portal</a>, 
            and don't forget to share sankalan among your friends.</p>

        </div>
    </div>
    <div class="section module auto">
        <div>
            <h3>The Website</h3>
            <p>For the main website, we ported our last year's site to jigsaw to make it more beginner-friendly. </p>
            <p>For the sankalan portal, we built everything from scratch. The frontend is in VueJS, and laravel is used in backend.</p>
            <p>The website is using https by certbot, and is hosted on a digital ocean VPS.</p><br/>
            <p>We also revamped the <a href="https://chakravyuh.ducs.in/">charakvyuh portal</a> this year. </p>
            <p>Embracing the <strong>open source</strong> development, we have decided to publish all the source code of website (including the Dashboard) on Github.</p>
            <p>Source code for:</p>
            <p>&nbsp;&ndash; Sankalan 2019 website:&nbsp;<a href="https://github.com/csdu/sankalan" target="_blank">https://github.com/csdu/sankalan</a></p>
            <p>&nbsp;&ndash; Sankalan Portal:&nbsp;<a href="https://github.com/csdu/sankalan-portal" target="_blank">https://github.com/csdu/sankalan-portal</a></p>
            <p>&nbsp;&ndash; Chakravyuh Portal:&nbsp; has not been open sourced due to security reasons. </p>
            <br>
            <p>The website is totally student managed and is not endorsed by any official regulatory commities/departments.</p>
        </div>
    </div>
</div>    
@endsection