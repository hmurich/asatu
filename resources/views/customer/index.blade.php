@extends('layout')
@section('title', $title)

@section('top_block')
    @include('customer.include.top_block')
@endsection

@section('content')
<div class="middle-icon position-absolute">
    @include('front.index.include.middle_icon')
</div>
<div class="container">
	<div class="container-inner">
		<div class="admin-content">
			<div class="admin-content__top">
				<ul class="admin-nav">
					<li>
						<a href="">Инфо  </a>
					</li>
					<li><a href="">Редактировать</a></li>
					<li><a href="">Отзывы</a></li>
					<li><a href="">Баланс</a></li>
				</ul>
			</div>
			<div class="admin-edit-card">
					<div class="admin-edit-card__title">
						Мусрепов Танат
					</div>
					<div class="admin-edit-card__item">
						<span>E-mail:</span> asd@mail.ru
					</div>
					<div class="admin-edit-card__item">
						<span>Адрес:</span> Улица там
					</div>
					<div class="admin-edit-card__item">
						<span>Телефон:</span> 8777777777777777777777777777777
					</div>
					<div class="admin-edit-card__item">
							<a href="" class="button ">
								Редактировать
							</a>
							<a href="" class="button l-cab-button">
								Заказы
							</a>
					</div>
					<a href="" class="link">Введите банковскую карточку что бы получить 1000 тг бонус</a>

					<div class="admin-edit-card__title">
						Заказы
					</div>
					<div class="table-container">
						<table border="1">
						    <tr>
						        <th>Ресторан</th>
						        <th>Адрес</th>
						        <th>Блюда</th>
						        <th>Время оформления</th>
						        <th>Статус</th>
						    </tr>
                            @foreach ($orders as $o)
    						    <tr>
    						        <td>{{ $o->sys_key }}</td>
    						        <td>{{ $o->relCustomer->full_adress }}</td>
    						        <td>
                                        <?php $ar_meals = array(); ?>
                                        @foreach ($o->relItems as $i)
                                            <?php $ar_meals[] = $i->relMenu->title; ?>
                                        @endforeach
                                        {{ implode(", ", $ar_meals) }}
                                    </td>
    						        <td>{{ $o->duration }}</td>
    						        <td>{{ $ar_status[$o->status_id] }}</td>
    						    </tr>
                            @endforeach
                        </table>
					</div>
			</div>
		</div>
	</div>
</div>

@endsection
