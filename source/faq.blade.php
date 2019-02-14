@extends('_layouts.master')
@section('title', 'FAQ | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h2 class="banner-title">FAQ</h2>
    </div>
</div>
<div class="content">
    <div class="section module auto">
        <div>
            <p><strong>What is Sankalan?</strong></p>
            <p>Sankalan is the annual technical festival of Department of Computer Science, University of Delhi. The fest blends a plethora of events including coding, quizzes, gaming, debates and a lot more offering something for each and everyone. It is
                entirely organised by the DUCS student body. To know more about it, please see <a class="xhr" href="{{ $page->baseUrl }}/about/">https://csdu.github.io/sankalan/about/</a></p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>When is Sankalan 2019 scheduled to be held?</strong></p>
            <p>Sankalan 2019 will be organized in Department of Computer Science, University of Delhi on March 9th, 2019 and March 10th, 2019. Some events will be taking place earlier also. See events page for details.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>What is Sankalan actually for? Kids? Undergrads? Post Grads? Adults?</strong></p>
            <p>Sankalan has something in it for everyone. It includes both technical and non-technical events. The fest is open to undergraduates and postgraduates only.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>Can I get a list of all the events to be held at Sankalan 2019?</strong></p>
            <p>Yes, you can find the list of all the events at <a class="xhr" href="{{ $page->baseUrl }}/events/">https://csdu.github.io/sankalan/events/</a> with detailed description.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>Will non-Computer Science students be able to participate in the non-tech events?</strong></p>
            <p>Yes, you are most welcome to participate in non-tech events. Non-tech events are open to all. Even if you are not a CS student, you can try.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>Do I need to do an online registration?</strong></p>
            <p>Yes, you need to get registered online in order to participate in the events of Sankalan 2019. Please carry the e-ticket generated after <a href="{{ $page->baseUrl }}#">online registration</a> on the day of Sankalan.
                In case you require hospitality from our side, please contact us before hand.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>How does one get to Department of Computer Science?</strong></p>
            <p>Get directions on <a href="https://goo.gl/maps/YqMFB3uxy9m" target="_blank" rel="noopener">Google Maps</a>.</p>
            <p>If you're coming from distance, reaching GTB Nagar Metro Station or Delhi University Metro Station and then taking an e-rickshaw might be a good option for you.</p>
            <p>If you've trouble finding the venue location, you may look for following landmarks: Daulat Ram College, Shri Ram College or Faculty of Mathematical Sciences/Social Sciences.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>What's new in Sankalan this year?</strong></p>
            <p>We introduced so many new things at Sankalan 2019 that it deserves its own page. See <a class="xhr" href="{{ $page->baseUrl }}/whats-new/">What's new in Sankalan 2019</a>.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>Can I leave and re-enter the fest?</strong></p>
            <p>Yes, you can leave and re-enter the festival if you have the ID card (ticket) provided to you from the <a href="{{ $page->baseUrl }}#">registration portal</a>.</p>
        </div>
    </div>
    <div class="section module auto">
        <div>
            <p><strong>I have a question that was not answered here. What do I do?</strong></p>
            <p>You can drop your queries at <a href="mailto:sankalan@ducs.in">sankalan@ducs.in</a></p>
            <p>Or call at <a href="tel:9990395650">+91-9990395650</a> /
                <a href="tel:7376125490">+91-7376125490</a></p>
            <p>You can also send a message on our Facebook page: <a href="https://facebook.com/DUCS.Sankalan" target="_blank" rel="nofollow">https://facebook.com/DUCS.Sankalan</a></p>
            <p>We have also provided event specific details and contacts on their respective pages.</p>
        </div>
    </div>
</div>
@endsection