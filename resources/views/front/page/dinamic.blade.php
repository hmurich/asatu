@extends('layout')
@section('title', $title)

@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')

<div class="index-card-container">
    <div class="index-card-container__inner">
        <div class="index-seo-text">
            <div class="title">
                <h2 class="title-item">{{ $title }}</h2>
            </div>
            @if ($el->photo)
                <div>
                    <img src="{{ $el->photo }}" alt="" style='width: 100%;'>
                </div>
            @endif
            {!! $el->note_trans !!}
        </div>
    </div>
</div>
@endsection
