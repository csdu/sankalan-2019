@extends('_layouts.master')
@section('title', 'Events | ')
@push('styles')
    <style>
        .event-tiles {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-shrink: 0;
            flex-grow: 0;
            margin: -1rem;
        }

        .event-tile {
            /* background: white; */
            margin: 1rem;
            position: relative;
            min-width: 340px;
            max-width: 360px;
        }
        .event-tile .event-bg {
            width: 100%;
        }

        .event-tile .event-overlay {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            display: flex;
            padding: 1rem;
            flex-direction: column;
            justify-content: space-around;
            background: rgba(255, 255, 255, 0.7); 
            color: #000;
        }
        .event-overlay .event-title {
            font-size: 1.5rem;
        }
    </style>
@endpush
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
        <div class="section event-tiles" itemscope itemtype="http://schema.org/ItemList">
            @foreach($events as $event)
                @include('_partials.event', compact('event'))
            @endforeach
        </div>
    </div>
</div>
@endsection
