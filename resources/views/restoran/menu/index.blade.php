@extends('restoran.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="side-bar">
		<form action="" class="form">
			<div class="side-bar-item">
				<div class="side-bar-item__title">
					блюдо:
				</div>
				<div class="side-bar-box">
					<div class="side-bar-box__item">
						<input type="checkbox" id="pizza">
						<label for="pizza">Пицца (29)</label>
					</div>
					<div class="side-bar-box__item">
						<input type="checkbox" id="sushi">
						<label for="sushi">Суши (24)</label>
					</div>
					<div class="side-bar-box__item">
						<input type="checkbox" id="burger">
						<label for="burger">Бургеры и донеры (34)</label>
					</div>
					<div class="side-bar-box__item">
						<input type="checkbox" id="shashlik" checked>
						<label for="shashlik">Шашлыки (29)</label>
					</div>
					<div class="side-bar-box__item">
						<input type="checkbox" id="wok">
						<label for="wok">Wok Лапша (19)</label>
					</div>
					<div class="side-bar-box__item-search">
						<input type="text" placeholder="Поиск блюда...">
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="restaurants-box">
		<ul class="product-list">
			<li>
				<div class="product-item">
					<div class="product-item__img">
						<img src="img/restaurant.jpg" alt="">
					</div>
					<div class="product-item__name">
						Название блюда
					</div>
					<div class="product-item__price">
						Цена: <span>5.000тг</span>
					</div>
					<div class="product-item__des">
						Состав: название, название, название, название, название, название.
					</div>
					<button class="button stop">
						Стоп лист
					</button>
				</div>
			</li>
			<li>
				<div class="product-item">
					<div class="product-item__img">
						<img src="img/restaurant.jpg" alt="">
					</div>
					<div class="product-item__name">
						Название блюда
					</div>
					<div class="product-item__price">
						Цена: <span>5.000тг</span>
					</div>
					<div class="product-item__des">
						Состав: название, название, название, название, название, название.
					</div>
					<button class="button stop">
						Стоп лист
					</button>
				</div>
			</li>
			<li>
				<div class="product-item">
					<div class="product-item__img">
						<img src="img/restaurant.jpg" alt="">
					</div>
					<div class="product-item__name">
						Название блюда
					</div>
					<div class="product-item__price">
						Цена: <span>5.000тг</span>
					</div>
					<div class="product-item__des">
						Состав: название, название, название, название, название, название.
					</div>
					<button class="button stop">
						Стоп лист
					</button>
				</div>
			</li>
			<li>
				<div class="product-item">
					<div class="product-item__img">
						<img src="img/restaurant.jpg" alt="">
					</div>
					<div class="product-item__name">
						Название блюда
					</div>
					<div class="product-item__price">
						Цена: <span>5.000тг</span>
					</div>
					<div class="product-item__des">
						Состав: название, название, название, название, название, название.
					</div>
					<button class="button stop">
						Стоп лист
					</button>
				</div>
			</li>
			<li>
				<div class="product-item">
					<div class="product-item__img">
						<img src="img/restaurant.jpg" alt="">
					</div>
					<div class="product-item__name">
						Название блюда
					</div>
					<div class="product-item__price">
						Цена: <span>5.000тг</span>
					</div>
					<div class="product-item__des">
						Состав: название, название, название, название, название, название.
					</div>
					<button class="button stop">
						Стоп лист
					</button>
				</div>
			</li>
			<li>
				<div class="product-item">
					<div class="product-item__img">
						<img src="img/restaurant.jpg" alt="">
					</div>
					<div class="product-item__name">
						Название блюда
					</div>
					<div class="product-item__price">
						Цена: <span>5.000тг</span>
					</div>
					<div class="product-item__des">
						Состав: название, название, название, название, название, название.
					</div>
					<button class="button stop">
						Стоп лист
					</button>
				</div>
			</li>
		</ul>
	</div>	

</div>


@endsection
