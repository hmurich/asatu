@extends('restoran.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    @include('restoran.menu.include.side_bar')

	<div class="restaurants-box">
		<ul class="product-list">
            @foreach ($menu as $m)
                <li>
                    <div class="product-item">
                        <div class="product-item__img">
                            @if ($m->photo)
                                <img src="{{ $m->photo }}" alt="">
                            @else
                                <img src="img/restaurant.jpg" alt="" />
                            @endif
                        </div>
                        <div class="product-item__name">
                            {{ $m->title }}
                        </div>
                        <div class="product-item__price">
                            Цена: <span>{{ $m->cost_item }}тг</span>
                        </div>
                        <div class="product-item__des">
                            {!! $m->note !!}
                        </div>
                        <a href='{{ action('Restoran\MenuController@getOpen', [$m->id]) }}'>
                            <button class="button {{ ($m->is_active ? 'stop' : null) }} ">
                                {{ ($m->is_active ? 'Стоп лист' : 'Старт лист') }}
                            </button>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
	</div>

</div>


@endsection
