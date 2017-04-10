@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body full-wight">
    <div class="side-bar">
        @include('admin.restoran.include.menu', ['item'=>$item])
    </div>
    <div class="restaurants-box full-wight">
        <div class="admin-edit-card">
            <div class="admin-edit-card__title">
                {{ $title }}
            </div>

            @foreach ($items as $r)
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
                    @endif
        		</div>
            @endforeach


        </div>
    </div>
</div>

@endsection
