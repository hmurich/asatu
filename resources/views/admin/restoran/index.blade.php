@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
    <form action="" method='get' class="admin-search-form add-form">
        <div class="admin-search-form__item select-search add-search">
			<select name="filter[city_id]">
				<option value="0">Город</option>
                @foreach($ar_city as $id=>$name)
                    @if (isset($ar_input["filter"]["city_id"]) &&  $ar_input["filter"]["city_id"] == $id)
                        <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                    @else
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endif
                @endforeach
			</select>
		</div>
		<div class="admin-search-form__item input-search">
			<input type='text' name='filter[name]' value='{{ $ar_input["filter"]["name"] or null }}' placeholder="Наименование">
		</div>
        <div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
        <div class="admin-search-form__item button-add">
			<a href="{{ action("Admin\Restoran\EditController@getItem") }}">
                <button type='button' class="button">Добавить  заведение</button>
            </a>
		</div>
	</form>

    <ul class="zaka-list">
        @foreach($items as $i)
    		<li>
    			<div class="zaka-list-name">
    				{{ $i->name }}
    			</div>
    			<a href="{{ action("Admin\Restoran\EditController@getItem", $i->id) }}" class="button zaka-list-button">
    				Редактировать
    			</a>
    		</li>
        @endforeach
	</ul>
</div>

@endsection
