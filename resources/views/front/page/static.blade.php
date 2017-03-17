@extends('layout')
@section('title', $title)
@section('content')
<div class="index-card-container">
    <div class="index-card-container__inner">
        <div class="index-seo-text">
            <div class="title">
                <h2 class="title-item">{{ $title }}</h2>
            </div>
            {!! $el->note_trans !!}
        </div>
    </div>
</div>
@endsection
