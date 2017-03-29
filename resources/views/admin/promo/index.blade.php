@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<div class="table-container">
		<table border="1">
		    <tr>
                <th>Активен</th>
		        <th>Промокод</th>
		        <th>Тип</th>
		        <th>Применим</th>
                <th>Кол-во</th>
		        <th>
                    <a href="{{ action('Admin\PromoController@getItem') }}" class="button zaka-list-button">
		        		Создать
					</a>
                </th>
		    </tr>
            @foreach ($items as $p)
                <tr>
                    <td>{{ $ar_boolean[$p->active] }}</td>
                    <td>{{ $p->promo_key }}</td>
                    <td>{{ $p->count_sale_name }}</td>
                    <td>
                        @if ($p->to_all)
                            Все заведения
                        @elseif (!isset($ar_restoran[$p->restoran_id]))
                            Не существующий ресторан
                        @else
                            {{ $ar_restoran[$p->restoran_id] }}
                        @endif
                    </td>
                    <td>{{ $p->count_use_name }}</td>
                    <td>
                        <a href="{{ action('Admin\PromoController@getItem', $p->id) }}" class="button zaka-list-button">
                            Редактирование
                        </a>
                    </td>
                </tr>
            @endforeach
		</table>
	</div>
</div>

@endsection
