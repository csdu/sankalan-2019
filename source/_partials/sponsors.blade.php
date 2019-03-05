<div>
    @foreach($page->sponsors as $sponsors_list)
        @include('_partials.sponsors-list', [
            'sponsors_list' => $sponsors_list,
        ])
    @endforeach
</div>