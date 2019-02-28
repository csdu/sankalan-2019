@php 
$person = $page->getPersonByKey($key);
@endphp
<!-- todo : designation is undefined -->
<div class="credit">
    <div class="avatar-container">
        <img src="{{ $person->image ?? "{$page->baseUrl}/assets/images/one.svg" }}" alt="{{ $person->name }}" class="avatar">
    </div>
    <h4 class="credit-name"> {{ $person->name }} </h4>
    @if(!empty($designation))
        <h5 class="credit-type">{{ $designation }}</h5>
    @endif
    <div class="social-links">
        @foreach($person->urls as $type => $url)
        <a href="{{ $url }}" target="_blank" rel="noopener" 
            title="{{$person->name}} @ {{ $url }}" 
            data-id="team-{{ $key }}"
            class="link {{ $type }}">
            @include('_partials.svg.'.$type, ['classes' => ''])    
        </a>
        @endforeach
    </div>
</div>