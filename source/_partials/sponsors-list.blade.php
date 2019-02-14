<div class="section bg-white">
    <h3 class="g">{{ $title }}</h3>
    <div class="sponsors">
        @foreach($sponsors as $sponsor)
            @if($sponsor->link)
                <a href="{{ $sponsor->link }}" title="{{ $sponsor->name }}" target="_blank" rel="nofollow" data-id="sponsor-{{ str_slug($sponsor->name) }}">
                    <img src="{{ str_replace('/s1600/', '/h80/', $sponsor->image) }}" alt="{{ $sponsor->name }}"/>
                </a>
            @else
                <img src="{{ str_replace('/s1600/', '/h80/', $sponsor->image) }}" alt="{{ $sponsor->name }}" title="{{ $sponsor->name }}"/>
            @endif
        @endforeach
    </div>
</div>
<br>