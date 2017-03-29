@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__item-left">
	<div class="info-card">
		<div class="info-card__item">
			Ф.И.О. заказчика: <span>{{ $order->relCustomer->name }}</span>
		</div>
		<div class="info-card__item">
			Номер телефона: <span>{{ $order->relCustomer->phone }}</span>
		</div>
		<div class="info-card__item">
			Email: <span>{{ $order->relCustomer->relUser->email }}</span>
		</div>
		<div class="info-card__item">
			ID заказа: <span>{{ $order->sys_key	}}</span>
		</div>
	</div>
	<div class="info-card">
		<div class="table-container">
			<table border="1">
			    <tr>
			        <th>Название блюд</th>
			        <th>Стоимость</th>
			        <th>Кол-тво</th>
			        <th>Сумма</th>
			        <th></th>
			    </tr>
                @foreach ($order->relItems as $i)
                    <tr>
                        <td>{{ $i->relMenu->title }}</td>
                        <td>{{ $i->cost_item }} тг</td>
                        <td>{{ $i->count_item }}</td>
                        <td>{{ $i->cost_total }} тг</td>
                        <td>
                            <a href="" class="table-item edit edit-icon">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
		</div>
	</div>
	<div class="info-card">
		<div class="info-card__item">
			Приборов для персон: <span>{{ $order->count_person }}</span>
		</div>
		<div class="info-card__item">
			Промо-код:  <span>{{ ($order->promo_key ? $order->promo_key : 'Отсутствует') }}</span>
		</div>
		<div class="info-card__item">
			Доставка:   <span>{{ ($order->delivery_price ? $order->delivery_price.'тг' : 'Бесплатно') }} </span>
		</div>
		<div class="info-card__item">
			Итоговая сумма:  <span>{{ $order->total_sum }}тг</span>
		</div>
	</div>
	<div class="info-card">
		<div class="info-card__item">
			Время заказа: <span> {{ $order->created_at }}</span>
		</div>
		<div class="info-card__item">
			Время ожидания доставки:  <span>{{ $order->finish_at }}</span>
		</div>
	</div>
	<div class="info-card">
		<div class="info-card__item">
			Адрес клиента:  <span>{{ $order->relCustomer->full_adress }}</span>
		</div>
		<div class="info-card__item">
			Контакты клиента:  <span>{{ $order->relCustomer->phone }}</span>
		</div>
		<div class="info-card__item">
			Способ оплаты:   <span> Наличным курьеру</span>
		</div>
		<div class="info-card__item">
			Комментарии клиента: <span>{!! $order->note !!} </span>
		</div>
	</div>
</div>
<div class="admin-content__item-right">
	<div class="info-card">
		<div class="info-card__item">
			Контакты ресторана:   <span>{{ $order->relRestoran->relData->contacts }}</span>
		</div>
		<div class="info-card__item">
			Ф.И.О. руководителя: <span>{{ $order->relRestoran->relData->director_name }}</span>
		</div>
		<div class="info-card__item">
			Контакты руководителя:   <span>{{ $order->relRestoran->relData->director_contacts }}</span>
		</div>
		<div class="info-card__item">
			Комментарии клиента:   <span>{!! $order->note !!}</span>
		</div>
	</div>
	<div class="admin-content-button-conitaner">
		<a href="" class="button cancel">
			отменить
		</a>
		<a href="" class="button">
			сохранить
		</a>
	</div>
	<div class="info-card">
        @foreach ($order->relHistory()->orderBy('id', 'desc')->get() as $h)
    		<div class="info-card__item">
    			{{ $h->created_at }}:    <span>{{ $ar_status[$h->status_id] }}</span>
    		</div>
        @endforeach
	</div>
</div>


@endsection
