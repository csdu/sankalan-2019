
<div class="event-tile">
    @if($event->image)
    <img class="event-bg" src="{{ str_replace('/s1600/', '/w360/', $event->image) }}"/>
    @endif
    <div class="event-overlay {{ $event->tag ? 'event-tag' : ''}}" data-tag="{{ $event->tag }}">
        <h2 class="event-title text-center">{{ $event->title }}</h2>
        <p>{!! str_replace('\n', '<br>', str_limit($event->description, 300, '...')) !!}</p>
        <a class="button text-center" href="{{ $event->getUrl() }}" class="xhr" data-id="events-{{ str_slug($event->title) }}">Know More</a>
    </div>
</div>
