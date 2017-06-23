@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')
    <?php
    $img = $restoran->photo ? $restoran->photo : '/img/restaurant-big.jpg';
    ?>

    <section class="parallax-window" id="short" data-parallax="scroll" data-image-src="<?=$img?>" data-natural-width="1170" data-natural-height="250">
        <div id="subheader">
            <div id="sub_content" class="zoomIn">
                <h1>{{ $restoran->name }}</h1>
                <div class="rating">{!! $restoran->generateHtmlStar() !!} (<small><a>{{ $restoran->raiting }}/5</a></small>)</div>
            </div><!-- End sub_content -->
        </div><!-- End subheader -->
    </section><!-- End section -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('front.restoran.include.top_info')
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-3">
                <p><a href="/catalog/list" class="btn_side">Вернуться к поиску</a></p>
                <div class="box_style_1">@include('front.restoran.include.nav')</div>
            </div>
            <div class="col-md-9">
                <ul class="reviews-item__container">
                    @foreach ($items as $i)
                        <li class="reviews-item">
                            <div class="reviews-item__head">
                                {{ $i->name }}
                                <div class="reviews-item__date">
                                    {{ $i->created }}
                                </div>
                            </div>
                            <p>
                                {!! $i->note !!}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
