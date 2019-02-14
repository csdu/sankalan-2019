@php
$classes = collect([
    "event-live" => $event->islive, 
    "event-over" => $event->isover, 
    "event-nt" => $event->isnontech, 
    "event-fl" => $event->isfunlearn    
])->filter()->keys()->implode(' ');
@endphp
<div class="module {{ $classes }}">
        <div class="module--half">
            @if($event->image)
                <img src="{{ str_replace('/s1600/', '/w256/', $event->image) }}"/>
            @endif
        </div>
        <div class="module--half">
            <h2>{{ $event->title }}</h2>
            @if($event->quote)
                <h3>
                    &ldquo;{{ $event->quote['text'] }}&rdquo;
                    @if(array_key_exists('by', $event->quote))
                        <span>&mdash; {{ $event->quote['by'] }}</span>
                    @endif
                </h3> 
            @endif
            <p>
                {!! str_replace('\n', '</p><p>', $event->description) !!}
            </p> 
            <a class="button" href="{{ $event->getUrl() }}" class="xhr" data-id="events-{{ str_slug($event->title) }}">Know More</a>
        </div>
    </div>
