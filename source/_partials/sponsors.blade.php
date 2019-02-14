<div>
    @foreach($page->sponsors as $category => $sponsors)
        @include('_partials.sponsors-list', [
            'title' => title_case(str_replace("_"," ","{$category} partner")),
            'sponsors' => $sponsors,
        ])
    @endforeach
</div>