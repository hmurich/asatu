@extends('layout')

@section('title', $title)

@section('top_block')
    @include('front.index.include.top_block')
@endsection

@section('content')
<div class="middle-icon">
    @include('front.index.include.middle_icon')
</div>

<div class="index-card-container">
    <div class="index-card-container__inner">
        <div class="title">
            <h2 class="title-item">полезная информация</h2>
        </div>
        <ul class="index-card-list">
            <li>
                <div class="index-card-item">
                    <div class="index-card-item__img">
                        <img src="img/helpful.jpg" alt="">
                    </div>
                    <a href="" class="index-card-item__title">
                        Название статьи
                    </a>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях</p>
                </div>
            </li>
            <li>
                <div class="index-card-item">
                    <div class="index-card-item__img">
                        <img src="img/helpful.jpg" alt="">
                    </div>
                    <a href="" class="index-card-item__title">
                        Название статьи
                    </a>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях</p>
                </div>
            </li>
            <li>
                <div class="index-card-item">
                    <div class="index-card-item__img">
                        <img src="img/helpful.jpg" alt="">
                    </div>
                    <a href="" class="index-card-item__title">
                        Название статьи
                    </a>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="index-card-container__inner">
        <div class="title">
            <h2 class="title-item">полезная информация</h2>
        </div>
        <ul class="index-card-list">
            <li>
                <div class="index-card-item">
                    <div class="index-card-item__img">
                        <img src="img/helpful.jpg" alt="">
                    </div>
                    <a href="" class="index-card-item__title">
                        Название статьи
                    </a>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях</p>
                </div>
            </li>
            <li>
                <div class="index-card-item">
                    <div class="index-card-item__img">
                        <img src="img/helpful.jpg" alt="">
                    </div>
                    <a href="" class="index-card-item__title">
                        Название статьи
                    </a>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях</p>
                </div>
            </li>
            <li>
                <div class="index-card-item">
                    <div class="index-card-item__img">
                        <img src="img/helpful.jpg" alt="">
                    </div>
                    <a href="" class="index-card-item__title">
                        Название статьи
                    </a>
                    <p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях</p>
                </div>
            </li>
        </ul>

        <div class="index-seo-text">
            @include('front.index.include.about')
        </div>
    </div>
</div>

<div id="overlay"></div>
@endsection
