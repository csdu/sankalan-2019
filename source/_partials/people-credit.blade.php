@php 
$person = $page->getPersonByKey($key);
@endphp

<div class="credit">
    <div>
        @if($type)
        <p>
            <strong>{{ $type }}:</strong>
        </p>
        @endif
        <p>{{ $person->name }}</p> 
    </div>
    <div class="avatar">
        @php
            $image = $person->image ? str_replace("/s1600/", "/w56-h56-p/", $person->image) : "{$page->baseUrl}/assets/images/one.svg";
        @endphp

        @if($person->url)
            <a href="{{ $person->url }}" 
                target="_blank" rel="noopener" 
                title="{{$person->name}} @ {{ $person->url }}" 
                data-id="team-{{ $key }}">
                <img src="{{ $image }}" alt="{{ $person->name }}" class="avatar">
            </a>
            <img class="link" 
            src="{{ $page->baseUrl }}/assets/images/{{ str_contains($person->url, 'github.com') ? 'github-icon.svg' : 'fb-icon-white.svg' }}">
        @else
            <img src="{{ $image }}" alt="{{ $person->image }}" class="avatar">
        @endif
    </div>
</div>