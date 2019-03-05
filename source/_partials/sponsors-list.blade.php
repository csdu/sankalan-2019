<div class="section bg-white">
    <h3 class="g">{{ $sponsors_list->title }}</h3>
    <div class="sponsors">
        @foreach($sponsors_list->sponsors as $sponsor)
        <div class="sponsor{{ $sponsor->is_large ? ' large' : '' }}">
            <img src="/assets/images/sponsors/{{ $sponsor['image'] }}"
                alt="{{ $sponsor['name'] }}" 
                title="{{ $sponsor['name'] }}"/>
        </div>
        @endforeach
    </div>
</div>
<br>