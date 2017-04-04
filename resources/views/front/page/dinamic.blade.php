@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')

<div class="index-card-container">
    <div class="index-card-container__inner">
        <div class="index-seo-text">
            <div class="title">
                <h2 class="title-item static-page">{{ $title }}</h2>
            </div>
            <div class="static-block">
            <div class="static-text">
             {!! $el->note_trans !!}
             </div>
            @if ($el->photo)
                <div class="static-img">
                    <img src="{{ $el->photo }}" alt="" style='width: 100%;'>
                </div>
            @endif
           </div>
        </div>
    </div>
</div>
@endsection
