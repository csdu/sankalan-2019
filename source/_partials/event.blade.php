<div class="event-tile {{ $event->tag ? 'event-tag' : ''}} {{ $event->isover  ? 'event-ended-tag' : '' }}" data-tag="{{ $event->tag }}">
    <a href="{{ $event->getUrl() }}" class="xhr event-bg-link" data-id="events-{{ str_slug($event->title) }}">
        <img class="event-bg" src="{{ $page->baseUrl }}{{ $event->image }}" alt="{{ $event->title }}"/>
    </a>
    {{-- <div class="event-overlay ">
        <h2 class="event-title text-center">{{ $event->title }}</h2>
        <p class="event-desc">{!! str_replace('\n', '<br>', str_limit($event->description, 200, '...')) !!}</p>
        <a class="button text-center" href="{{ $event->getUrl() }}" class="xhr" data-id="events-{{ str_slug($event->title) }}">Know More</a>
    </div> --}}
</div>
