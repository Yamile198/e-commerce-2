@extends('layouts.app')

@section('title', 'Aviso de Privacidad | Sabores en Casa')

@section('content')
    <!-- BREADCRUMB SECTION START -->
    <div class="ul-breadcrumb">
        <div class="wow animate__fadeInUp">
            <h2 class="ul-breadcrumb-title">Aviso de Privacidad</h2>
            <div class="ul-breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <span class="separator">/</span>
                <span class="current-page">Aviso de Privacidad</span>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB SECTION END -->

    @include('partials.aviso-legal')
@endsection
