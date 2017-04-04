@extends('layout')

@section('title', $title)
@section('header_class', 'video-header')

@section('top_block')
    @include('front.index.include.top_block')
	<div class="middle-icon position-absolute">
		@include('front.index.include.middle_icon')
	</div>
@endsection

@section('content')


<div class="index-card-container">
    <div class="index-card-container__inner index-inform">
        <div class="title">
            <h2 class="title-item">{{ $translator->getTrans('helpfull_info') }}</h2>
        </div>
        <ul class="index-card-list">
            @foreach ($help_article as $a)
                <li>
                    <div class="index-card-item">
                        @if ($a->photo)
                            <div class="index-card-item__img">
                                <img src="{{ $a->photo }}" alt="" style='width: 100%;'>
                            </div>
                        @else
                            <div class="index-card-item__img">
                                <img src="/img/helpful.jpg" alt="">
                            </div>
                        @endif
                        <a href="/show/{{ $a->alias }}" class="index-card-item__title">
                            {{ $a->title_trans }}
                        </a>
                        {!! $a->short_note_trans !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="index-card-container__inner index-inform">
        <div class="title">
            <h2 class="title-item">{{ $translator->getTrans('news') }}</h2>
        </div>
        <ul class="index-card-list">
            @foreach ($news as $a)
                <li>
                    <div class="index-card-item">
                        @if ($a->photo)
                            <div class="index-card-item__img">
                                <img src="{{ $a->photo }}" alt="" style='width: 100%;'>
                            </div>
                        @else
                            <div class="index-card-item__img">
                                <img src="/img/helpful.jpg" alt="">
                            </div>
                        @endif
                        <a href="/show/{{ $a->alias }}" class="index-card-item__title">
                            {{ $a->title_trans }}
                        </a>
                        {!! $a->short_note_trans !!}
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="index-seo-text">
            @include('front.index.include.about')
        </div>
    </div>
    <div class="index-banner">
                <div class="index-card-container__inner">
                    <div class="index-banner__text">
                        Какой то текст
                    </div>
                    <div class="index-banner__text">
                        8 777 485 99 48
                    </div>
                </div>
            </div>
            <div class="index-card-container__inner"> 
                <div class="index-soc-seti__container">
                    <div class="index-soc-seti">
                        <span>Мы в социальных сетях</span>
                        <ul class="soc-seti-list">
                            <li>
                        <a href="" >
                            <img src="img/vk.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="img/face.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="img/insta.png" alt="">
                        </a>
                    </li>
                        </ul>
                    </div>
                </div>
            </div>
</div>


@endsection
