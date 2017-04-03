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
			<div class="admin-edit-card">
				<div class="admin-edit-card__title">
					{{ $customer->name }}
				</div>
				<div class="admin-edit-card__item">
					<span>E-mail:</span> {{ $customer->relUser->email }}
				</div>
				<div class="admin-edit-card__item">
					<span>Адрес:</span> {{ $customer->full_adress }}
				</div>
				<div class="admin-edit-card__item">
					<span>Телефон:</span> {{ $customer->phone }}
				</div>
				<div class="admin-edit-card__item">
					<a href="{{ action('Customer\CabinetController@getEdit') }}" class="button ">
						Редактировать
					</a>
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
