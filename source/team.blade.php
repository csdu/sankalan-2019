@extends('_layouts.master')
@section('title', 'Team | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h1 class="banner-subtitle"></h1>
        <h2 class="banner-title">Our Team</h2> 
        <p>Sankalan won't be possible without its passionate team.</p>
    </div>
</div>

<div class="content">
    <div class="section" style="color: #fff; background-color: rgba(0, 0, 0, 0.3);">
        <h3>The Panel</h3>
        <div class="credits">
            @include('_partials.people-credit', [
                'designation' => 'President', 
                'key' => 'jatin-rohilla'
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'Vice President', 
                'key' => 'random' 
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'General Secretary', 
                'key' => 'random' 
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'Joint Secretary', 
                'key' => 'random' 
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'Treasurer', 
                'key' => 'random' 
            ])
        </div>
        
        <h3>Developer Team</h3>
        <div class="credits">
            @include('_partials.people-credit', [
                'designation' => 'Web Developer', 
                'key' => 'ruman-saleem',
            ])
        </div>
        <br>
        <h3>Graphic Designers</h3>
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
        </div>
        <br>
        <h3>Content Managers</h3>
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
        </div>
        <br>
        <h3>Sponsorship Team</h3> 
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
            @include('_partials.people-credit', ['key' => 'random'])
        </div>
    </div>
</div>
@endsection