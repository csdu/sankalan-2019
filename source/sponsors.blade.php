@extends('_layouts.master')
@section('title', 'Sponsors | ')
@push('styles')
<style>
    h3.g {text-align:center; margin:16px auto;border-bottom: 3px solid #eeb81d;max-width:360px}
</style>
@endpush
@php
    $mobile = '9650361897';
    $email = 'sponsor@ducs.in';
@endphp
@section('content')
<div class="banner">
    <div class="banner-content">
        <h1 class="banner-subtitle">Sponsors</h1>
        <h2 class="banner-title">Thanks for the funds!</h2>
    </div>
</div>
<div class="content">
    @include('_partials.sponsors')
    <div class="section bg-white">
        <h2>Interested in sponsoring us?</h2>
        <h3>Reach us at:</h3>
        <a href="" class="button" href='mailto:' + email data-id="sponsor-email"> {{$email}}</a>
        <a class="button" href="tel:+91{{ $mobile }}" data-id="sponsor-phone"> Call {{$mobile}}</a>
    </div>
</div>
@endsection