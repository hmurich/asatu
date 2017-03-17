@extends('layout')
@section('title', $title)

@section('top_block')
    @include('include.top_block_def')
@endsection

@section('content')
<div class="middle-icon position-absolute">
    @include('front.index.include.middle_icon')
</div>

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
