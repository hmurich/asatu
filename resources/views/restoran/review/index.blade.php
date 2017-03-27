@extends('restoran.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
	<div class="admin-edit-card add-promo-kod">
		<div class="admin-edit-card__title">
			{{ $title }}
		</div>
        @foreach ($review as $r)
    		<div class="reviews-item">
                <div class="reviews-item__head">
                    {{ $r->name }}
                    <div class="reviews-item__date">
                        {{ $r->created }}
                    </div>
                </div>
                <p> {!! $r->note !!} </p>
                @if ($r->relAnswer)
                    <div class="button js-button">Ответ</div>
                    <div class="js-reviews-otevet">
                        <div class="reviews-otevet__text-area">
                            <textarea name="note" id="" placeholder='Сообщение' required="">{!! $r->relAnswer->note !!}</textarea>
                        </div>
                        <div class="button js-button-otmena">Отмена</div>
                    </div>
                @else
                    <div class="button js-button">Ответить</div>
                    <div class="js-reviews-otevet">
                        <form action="{{ action('Restoran\ReviewController@postAnswer') }}" method="post">
                            <div class="reviews-otevet__text-area">
                                <textarea name="note" id="" placeholder='Сообщение' required=""></textarea>
                            </div>
                            <input type='hidden' name='parent_id' value="{{ $r->id }}">
                            <div class="button js-button-otmena">Отмена</div>
                            <button class="button">
                                Ответить
                            </button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                @endif
    		</div>
        @endforeach
    </div>
</div>


@endsection
