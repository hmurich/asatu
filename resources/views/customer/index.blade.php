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
		<div class="admin-content">
			<div class="admin-edit-card">
				<div class="admin-edit-card__title">
					{{ $customer->name }}
				</div>
				<div class="customer-edit-card-container">
					<div class="admin-edit-card__item">
						<span>E-mail:</span> {{ $customer->relUser->email }}
					</div>
					<div class="admin-edit-card__item">
						<span>Адрес:</span> {{ $customer->full_adress }}
					</div>
					<div class="admin-edit-card__item">
						<span>Телефон:</span> {{ $customer->phone }}
					</div>
					<div class="admin-edit-card__item button-customer">
						<a href="{{ action('Customer\CabinetController@getEdit') }}" class="button ">
							Редактировать
						</a>
					</div>
				</div>
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
					        <th>Оставить отзыв</th>
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
						        <td><a href="#">+</a></td>
						    </tr>
                        @endforeach
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
