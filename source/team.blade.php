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
    <div class="section" style="color:#fff;background-color: rgba(0,0,0,0.5)">
        <h2>The Panel</h2>
        <div class="credits">
            @include('_partials.people-credit', [
                'type' => 'President', 
                'key' => 'ashish-aggarwal'
            ])
            @include('_partials.people-credit', [
                'type' => 'Vice President', 
                'key' => 'mohit-kumar'
            ])
            @include('_partials.people-credit', [
                'type' => 'General Secretary', 
                'key' => 'puru-sharma'
            ])
            @include('_partials.people-credit', [
                'type' => 'Joint Secretary', 
                'key' => 'abhinav-kesarwani'
            ])
            @include('_partials.people-credit', [
                'type' => 'Treasurer', 
                'key' => 'ajay-jajoo'
            ])
        </div>
        <br>
        <h2>Developer Team</h2>
        <div class="credits">
            @include('_partials.people-credit', [
                'type' => 'Web Developer', 
                'key' => 'sudhanshu-vishnoi',
            ])
        </div>
        <br>
        <h2>Graphic Designers</h2>
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'somnath-saha'])
            @include('_partials.people-credit', ['key' => 'kirti-jain'])
            @include('_partials.people-credit', ['key' => 'vipin-kumar'])
            @include('_partials.people-credit', ['key' => 'shreshth-saxena'])
            @include('_partials.people-credit', ['key' => 'niloy-biswas'])
        </div>
        <br>
        <h2>Content Managers</h2>
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'pradipti-kayal'])
            @include('_partials.people-credit', ['key' => 'aashna-narula'])
            @include('_partials.people-credit', ['key' => 'sudhanshu-vishnoi'])
        </div>
        <br>
        <h2>Sponsorship Team</h2> 
        <div class="credits">
            @include('_partials.people-credit', ['key' => 'rajni-dabas'])
            @include('_partials.people-credit', ['key' => 'rahul-dewan'])
            @include('_partials.people-credit', ['key' => 'anjali-bansal'])
            @include('_partials.people-credit', ['key' => 'ajay-kumar'])
            @include('_partials.people-credit', ['key' => 'radha-verma'])
        </div>
        <br>
    </div>
</div>
@endsection