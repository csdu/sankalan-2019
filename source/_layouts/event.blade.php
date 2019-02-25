@extends('_layouts.master')
@section('title', "$page->title | ")
@section('content')
<div class="banner {{ $classes }}">
    <div class="banner-content" style="min-height: 250px;min-height: calc(256px + 3em);">
        <h2 class="banner-title event-title">{{ $page->title }}</h2>
        <div class="image">
            <img src="{{ str_replace('/s1600/', '/w256/', $page->image) }}" alt="{{ $page->title }}"/>
        </div>
        <div class="banner-text">
            @if($page->quote)
            <blockquote class="event-quote">
                <p>&ldquo;{!! $page->quote['text'] !!}&rdquo;</p>
                @if(array_key_exists('by', $page->quote))
                <span>&mdash; {{ $page->quote['by'] }}</span>
                @endif
            </blockquote>
            @endif
            <p>
                {!! str_replace('\n', '</p><p>', $page->description) !!}
            </p> 
        </div>
    </div>
</div>
<div class="content">
    <div class="section event-page">
        @if($page->story && !$page->rounds)
            <div class="story event-round">
                <p>{!! str_replace('\n', '</p><p>', $page->story) !!}</p>
                <p></p> &nbsp;
            </div>
        @endif
        @if($page->rounds)
            <div class="event-info">
                @include('_partials.events-info.' . ($page->lang ?? 'py'), ['teamSize' => $page->teamSize])
            </div>
            @foreach($page->rounds as $index => $round)
            <div class="event-round">
                <h3>Round #{{ $index + 1 }}</h3>
                <p>{!! str_replace('\n', '</p><p>', $round) !!}</p> 
            </div>
            @endforeach
        @endif
    </div>
    <div class="section bg-white event-details">
        @if($page->story && $page->rounds)
            <div class="story">
                <p>{!! str_replace('\n', '</p><p>', $page->story) !!}</p>
                <p></p> &nbsp;
            </div>
        @endif
        <h3>Further Details</h3>
        @hasSection('event-details')
            @yield('event-details')
        @else
            <p>Nothing more mentioned yet. Check back soon</p> 
        @endif

        @if($page->reg !== 0)
        <a class="button" rel="noopener" href="{{ $page->baseUrl }}/register/" data-id="register-{{ str_slug($page->title) }}">Register</a>
        @endif
        @if($page->fbpage)
          <a class="button" href="{{ $page->fbpage }}" data-id="fb-ev-{{ str_slug($page->title) }}">Facebook Event Page</a>
        @endif
    </div>
</div>
@endsection