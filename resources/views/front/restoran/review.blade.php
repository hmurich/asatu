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

        @if (isset($sale) && sale)
            <div class="">
                @include('front.restoran.include.sale')
            </div>
        @endif

        <div class="admin-content__top">@include('front.restoran.include.nav')</div>

        <div class="restaurants-box full-width">
            @if ($auth->guest())
                <p class="autor-review">{{ $translator->getTrans('auth_to_coment') }}</p>
            @else
                <form action='{{ action('Front\Restoran\ReviewController@postList', $restoran->id) }}' method="post">
                    <input type='text' name='name' required="" placeholder="{{ $translator->getTrans('enter_name') }}"/> <br/>
                    <select name='raiting' required="">
                        <option value="">{{ $translator->getTrans('raiting') }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br/>
                    <textarea name='note' required="" placeholder="{{ $translator->getTrans('enter_review') }}"></textarea><br/>
                    <button class="button" >Отправить</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            @endif

            <br />
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
