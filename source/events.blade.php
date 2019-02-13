@extends('_layouts.master')
@section('title', 'Events | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h1 class="banner-subtitle">Events</h1>
        <h2 class="banner-title">Something for everyone!</h2>
        <p>
            We have {{ $page->getTechEventsCount($events) }} technical events as well as {{ $page->getNonTechEventsCount($events) }} non-technical events.
        </p>
    </div>
</div>
<div class="content">
    <div>
        <div class="section" itemscope itemtype="http://schema.org/ItemList">
            @foreach($events as $event)
                @include('_partials.event', compact('event'))
            @endforeach
        </div>
    </div>
</div>
@endsection
