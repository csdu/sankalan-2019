@extends('_layouts.master')
@section('title', 'What\'s New | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h1 class="banner-subtitle">Cool new nerd stuff</h1>
        <h2 class="banner-title">What's New</h2>
    </div>
</div>
<div class="content">
    <div class="section module auto">
        <div>
            <h3>New Events</h3>
            <p>We introduced some new events this year in Sankalan 2019 like:</p><br/>
            <p><strong>Blind Coding:</strong> No, it isn't related to Blind Dating. In this event, we will give you simpler problems to solve. But you're forbidden to look at your code! Can you run it in one attempt? Let's see how much confident are you
                in your skills! See event page at: <a class="xhr" href="{{ $page->baseUrl }}/events/blind-coding/" target="_blank">https://ducs.in/sankalan/events/blind-coding/</a></p><br/>
            <p><strong>Quriosity:</strong> In this event, we will give you a knowledgeable prime-time. Every night at 10pm, before Sankalan, we will post a simple question or a puzzle for you to answer. The player who tops the leaderboard at the end wins
                the game. See event page at: <a class="xhr" href="{{ $page->baseUrl }}/events/quriosity/" target="_blank">https://ducs.in/sankalan/events/quriosity/</a></p><br/>
            <p><strong>Beg Borrow Steal:</strong> In this fun game you can win exciting prizes by begging, borrowing or stealing things. Each participant will be given an item in each round, they have to either beg it, borrow it or steal it. See event page
                at: <a class="xhr" href="{{ $page->baseUrl }}/events/beg-borrow-steal/" target="_blank">https://ducs.in/sankalan/events/beg-borrow-steal/</a></p><br/>
            <p><strong>Cypher-o-more</strong> An event for crypto heads! (Not limited to crypto-currencies). See event page at: <a class="xhr" href="{{ $page->baseUrl }}/events/cypher-o-more/" target="_blank">https://ducs.in/sankalan/events/cypher-o-more/</a></p><br/>
            <p><strong>Pictionary:</strong> In this fun-learn event, you will be given a word from any domain, and will be required to explain that, by drawing anything related to the same on the board, to the audience in a time span of 2 minutes. See event
                page at: <a class="xhr" href="{{ $page->baseUrl }}/events/pictionary/" target="_blank">https://ducs.in/sankalan/events/pictionary/</a></p><br/>
            <p>There are some more fun and short events which you can explore at the Sankalan itself.</p><br/>
            <p>We merged Java Juggling and Code-a-thon to a single event, Code-a-thon, which is now language independent. See event page at: <a class="xhr" href="{{ $page->baseUrl }}/events/code-a-thon/" target="_blank">https://ducs.in/sankalan/events/code-a-thon/</a></p><br/>
            <p>The problems in each event, are of course, new.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <h3>Registration process</h3>
            <p>We created a brand new <a href="#">registration portal</a>(link will be active soon) for Sankalan 2019 participation & Online Quizzing. No, we are not using Google Forms (nothing wrong in that).</p>
            <p>We made registration process really simple, for you, and for us (not necessarily for our developers).</p><br/>
            <p>In almost every fest, you register using a form. Most of times, they ask you for very useless and repetitive info. Our dashboard will ask you for only to required details, to the point. We'll even fill some info about you if we can get it
                ;)</p><br/>
            <p>Team up with your friends right on the portal and participate in different events with your custom teams. You cannot participate in same event from different teams.</p><br/>
            <p>And the best part, just remember your Team ID &amp; User ID and we will do the magic for you. We won't waste your time in writing details about you in spreadsheets or paper for each event! Real Smooth.</p><br/>
            <p>And you can see your progress/stats and leaderboards in the portal.</p><br/>
            <p>If you haven't registered for Sankalan yet, what are you waiting for? Register yourself at <a href="#">our portal</a> (link will be active soon) and tell your friends also!</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <h3>The Website</h3>
            <p>We created this website: <strong>ducs.in</strong> as a single place to host all events and info related to our department.</p>
            <p>The future students can use this as a platform for future events and publications. And we'll pass on the knowledge.</p>
            <p>The website is totally student managed and is not endorsed by any official regulatory commities (that is, our department or university).</p>
            <p>For you, the important part is the Sankalan section, most likely.</p><br/>
            <p>The website is using <strong>https</strong>, and is hosted with AWS (to be precise, see <a href="/uses/">https://csdu.github.io/uses/</a> for technical details about the website)</p><br/>
            <p>The embrace <strong>open source</strong> development, we have decided to publish all the source code of website (including the Dashboard, Sankalan website, main website; excluding security related stuff) on Github.</p>
            <p>Source code for:</p>
            <p>&nbsp;&ndash; Sankalan 2019 website:&nbsp;<a href="https://github.com/csdu/sankalan" target="_blank">https://github.com/csdu/sankalan</a></p>
            <p>&nbsp;&ndash; Srijan 2019 website:&nbsp;<a href="https://github.com/csdu/srijan-2018" target="_blank">https://github.com/csdu/srijan-2018</a></p>
            <p>&nbsp;&ndash; Sankalan Portalx:&nbsp;<a href="https://github.com/csdu/sankalan-portal" target="_blank">https://github.com/csdu/sankalan-portal</a></p>
        </div>
    </div>
</div>    
@endsection