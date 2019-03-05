@extends('_layouts.master')
@section('title', 'Events | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h1 class="banner-subtitle">Events</h1>
        <h2 class="banner-title">Something for everyone!</h2>
        <p>
            We have {{ $page->getTechEventsCount($events) }} technical events as well as {{ $page->getNonTechEventsCount($events) + 1 }} non-technical events.
        </p>
    </div>
</div>
<div class="content">
    <div>
        <div class="section event-tiles" itemscope itemtype="http://schema.org/ItemList">
            @foreach($events as $event)
                @include('_partials.event', compact('event'))
            @endforeach
            <div class="event-tile event-tag" data-tag="Gaming">
                <a href="https://pubg.ducs.in" class="xhr event-bg-link" data-id="events-pubg-mobile">
                    <img class="event-bg" src="/assets/images/events/pubg-mobile.jpg" alt="PUBG Mobile"/>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
