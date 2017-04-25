@extends('layout')
@section('title', $title)
@section('body_class', 'second-page')
@section('header_class', 'second-page-header')

@section('top_panel')
    @include('include.top_panel_second')
@endsection

@section('content')
<div class="container">
    <div class="container-inner">
        <div class="restaurant">
            @include('front.restoran.include.top_info')
        </div>

        @if (isset($sale) && $sale)
            <div class="akci-second-page">
                @include('front.restoran.include.sale')
            </div>
        @endif

        <div class="admin-content__top">@include('front.restoran.include.nav')</div>

        <div class="restaurants-box full-width">

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
