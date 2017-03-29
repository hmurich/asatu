@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<div class="admin-edit-card add-promo-kod">
		<div class="admin-edit-card__title">
			{{ $title }}
		</div>
        <form action="{{ $action }}" method="post">
            <div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				Активен
    			</div>
    			<div class="admin-edit-card__item__right">
                    <select name="active" >
                        @foreach ($ar_boolean as $id=>$name)
                            @if ($item && $item->active == $id)
                                <option value="{{ $id }}" selected="">{{ $name }}</option>
                            @else
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endif
                        @endforeach
                    </select>
    			</div>
    		</div>
            <div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				Применим
    			</div>
    			<div class="admin-edit-card__item__right">
                    <select name="restoran_id" >
                        @if ($item && $item->to_all)
                            <option value="0" selected="">Все заведения</option>
                        @else
                            <option value="0">Все заведения</option>
                        @endif

                        @foreach ($ar_restoran as $id=>$name)
                            @if ($item && $item->restoran_id == $id)
                                <option value="{{ $id }}" selected="">{{ $name }}</option>
                            @else
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endif
                        @endforeach
                    </select>
    			</div>
    		</div>
            <div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				Тип
    			</div>
    			<div class="admin-edit-card__item__right">
                    <select name="is_percent">
                        @if ($item)
                            @if ($item->is_percent)
                                <option value="1" selected="">Процент</option>
                                <option value="0">Сумма</option>
                            @else
                                <option value="1" >Процент</option>
                                <option value="0" selected="">Сумма</option>
                            @endif
                        @else
                            <option value="1">Процент</option>
                            <option value="0">Сумма</option>
                        @endif
    				</select>
    			</div>
    		</div>
            <div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				Скидка
    			</div>
    			<div class="admin-edit-card__item__right">
    				<input type="text" name='count_sale' placeholder="Процент или число(в зависимости от типа)" required="" value="{{ ($item ? $item->count_sale : null) }}">
    			</div>
    		</div>

    		<div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				Промокод
    			</div>
    			<div class="admin-edit-card__item__right">
    				<input type="text" name='promo_key' placeholder="Промокод" value="{{ ($item ? $item->promo_key : null) }}" required="">
    			</div>
    		</div>

            <div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				Кол-во
    			</div>
    			<div class="admin-edit-card__item__right">
    				<input type="text" name='count_use' placeholder="Укажите 0, для неограниченного использования" required="" value="{{ ($item ? $item->count_use : null) }}">
    			</div>
    		</div>

    		<div class="admin-edit-card__item">
    			<div class="admin-edit-card__item-left">
    				<button class="button">
    					Сохранить
    				</button>
    			</div>
    		</div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
	</div>
</div>

@endsection
