@extends('layout')
@section('title', $title)

@section('top_block')
    @include('include.top_block_def')
@endsection

@section('content')
<div class="middle-icon position-absolute">
    @include('front.index.include.middle_icon')
</div>
<div class="container">
    <div class="container-inner">
        <div class="restaurant">
            @include('front.restoran.include.top_info')
        </div>
        <div class="admin-content__top">@include('front.restoran.include.nav')</div>

        @include('front.restoran.include.side_bar_review')

        <div class="restaurants-box">
            @if ($auth->guest())
                <p>Авторизуйтесь для выставления рэйтинга</p>
            @else
                <form action='{{ action('Front\Restoran\ReviewController@postList', $restoran->id) }}' method="post">
                    <input type='text' name='name' required="" placeholder="Введите имя"/> <br/>
                    <select name='raiting' required="">
                        <option value="">Рэйтинг</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br/>
                    <textarea name='note' required="" placeholder="Введите отзыв"></textarea><br/>
                    <input type='submit' />
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
