@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__item-left">
	<div class="info-card">
		<div class="info-card__item">
			Ф.И.О. заказчика: <span>Аубакир Абу Бакир</span>
		</div>
		<div class="info-card__item">
			Номер телефона: 	 <span>+7 (777) 777-77-77</span>
		</div>
		<div class="info-card__item">
			Email:  <span>Abubakir@mail.ru</span>
		</div>
		<div class="info-card__item">
			ID заказа:  <span>ID732674323</span>
		</div>
	</div>
	<div class="info-card">
		<div class="table-container">
			<table border="1">
			    <tr>
			        <th>	Название блюд</th>
			        <th>Стоимость</th>
			        <th>Кол-тво</th>
			        <th>Сумма</th>
			        <th></th>

			    </tr>
			    <tr>
			        <td>Пепероне с сыром, 10см</td>
			        <td>2.700тг</td>
			        <td>1</td>
			        <td>2.700 тг</td>
			        <td>
			        	<a href="" class="table-item edit edit-icon">
						</a>
					</td>
			    </tr>
			    <tr>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			    </tr>
			    <tr>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			    </tr>
			    <tr>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>

			    </tr>
			</table>
		</div>
	</div>
	<div class="info-card">
		<div class="info-card__item">
			Приборов для персон: <span>2</span>
		</div>
		<div class="info-card__item">
			Промо-код:  <span>Отсутствует</span>
		</div>
		<div class="info-card__item">
			Доставка:   <span> Бесплатно</span>
		</div>
		<div class="info-card__item">
			Итоговая сумма:  <span>9.900тг</span>
		</div>
	</div>
	<div class="info-card">
		<div class="info-card__item">
			Время заказа: <span> 23.02.2017, 13:39</span>
		</div>
		<div class="info-card__item">
			Время ожидания доставки:  <span>23.02.2017, 14:40</span>
		</div>
	</div>
	<div class="info-card">
		<div class="info-card__item">
			Адрес клиента:  <span> г. Астана, Абылай-Хана, дом 16, подъезд #4, квартира 67</span>
		</div>
		<div class="info-card__item">
			Контакты клиента:  <span>+7 (771) 352-74-93</span>
		</div>
		<div class="info-card__item">
			Способ оплаты:   <span> Наличным курьеру</span>
		</div>
		<div class="info-card__item">
			Комментарии клиента:    <span>Желательно подвезти к 15:00 по времени. Спасибо :)</span>
		</div>
	</div>
</div>
<div class="admin-content__item-right">
	<div class="info-card">
		<div class="info-card__item">
			Контакты ресторана:   <span>+7 (7172) 35-34-35</span>
		</div>
		<div class="info-card__item">
			Ф.И.О. руководителя: <span>Шалимов Аскар Тулагерович</span>
		</div>
		<div class="info-card__item">
			Контакты руководителя:   <span> +7 (701) 323-11-44, namemail@gmail.com</span>
		</div>
		<div class="info-card__item">
			Комментарии клиента:   <span>Желательно подвезти к 15:00 по времени. Спасибо :)</span>
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
		<div class="info-card__item">
			23.02.2017 ; 13:19:    <span>2</span>
		</div>
		<div class="info-card__item">
			23.02.2017 ; 13:19:  <span>1</span>
		</div>
		<div class="info-card__item">
			23.02.2017 ; 13:19:   <span>6</span>
		</div>
		<div class="info-card__item">
			23.02.2017 ; 13:19:  <span>3</span>
		</div>
	</div>
</div>


@endsection
