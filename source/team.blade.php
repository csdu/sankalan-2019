@extends('_layouts.master')
@section('title', 'Team | ')
@section('content')
<div class="banner">
    <div class="banner-content">
        <h1 class="banner-subtitle"></h1>
        <h2 class="banner-title">Our Team</h2> 
        <p>Sankalan would not have been possible without its passionate team.</p>
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
                'key' => 'mohit-kandpal' 
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'General Secretary', 
                'key' => 'mohammed-sayeed' 
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'Joint Secretary', 
                'key' => 'harshul-kumar' 
            ])
            @include('_partials.people-credit', [ 
                'designation' => 'Treasurer', 
                'key' => 'ajay-kumar' 
            ])
        </div>
        
        <h3>Developer Team</h3>
        <div class="credits">
            @include('_partials.people-credit', [
                'designation' => 'Lead Developer', 
                'key' => 'ruman-saleem',
            ])
            @include('_partials.people-credit', [
                'key' => 'sahil-nishal',
            ])
            @include('_partials.people-credit', [
                'key' => 'vikash-prajapati',
            ])
            @include('_partials.people-credit', [
                'key' => 'megha-sundriyal',
            ])
            @include('_partials.people-credit', [
                'key' => 'abhishek-sen',
            ])
            @include('_partials.people-credit', [
                'key' => 'abhishek-kansal',
            ])
            @include('_partials.people-credit', [
                'key' => 'anuradha-aggarwal',
            ])
        </div>
        <br>
        <h3>Graphic Designers</h3>
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'nitin-thakur'])
            @include('_partials.people-credit', ['key' => 'manan-mehta'])
            @include('_partials.people-credit', ['key' => 'sunidhi'])
            @include('_partials.people-credit', ['key' => 'tanya-dua'])
            @include('_partials.people-credit', ['key' => 'jayant-dhawan'])
        </div>

        <br>
        <h3>Sponsorship Team</h3> 
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'anjali-bansal'])
            @include('_partials.people-credit', ['key' => 'rajni-dabas'])
            @include('_partials.people-credit', ['key' => 'atul-mittal'])
            @include('_partials.people-credit', ['key' => 'jayant-dhawan'])
        </div>
    </div>
</div>
@endsection