@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<form action="" method='get' class="admin-search-form">
		<div class="admin-search-form__item input-search">
            <input type='text' name='filter[id]' value='{{ $ar_input["filter"]["id"] or null }}' placeholder="id">
		</div>
        <div class="admin-search-form__item select-search">
			<select name="filter[restoran_id]">
				<option value="0">Ресторан</option>
                @foreach($ar_restoran as $id=>$name)
                    @if (isset($ar_input["filter"]["restoran_id"]) &&  $ar_input["filter"]["restoran_id"] == $id)
                        <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                    @else
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endif
                @endforeach
			</select>
		</div>
		<div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
	</form>
    <div class="table-container">
	<table border="1">
	    <tr>
	        <th>id</th>
            <th>Ресторан</th>
	        <th>Описание</th>
            <th>Создан</th>
	        <th>
                <a href='{{ action("Admin\SaleController@getEdit") }}'>+</a>
            </th>
	    </tr>
        @foreach($items as $i)
            @if (!isset($ar_restoran[$i->restoran_id]))
                <?php $i->delete(); continue; ?>
            @endif
    	    <tr>
    	        <td>{{ $i->id }}</td>
                <td>{{ $ar_restoran[$i->restoran_id] }}</td>
    	        <td>{!! $i->note !!}</td>
                <td>{{ $i->created_at }}</td>
    	        <td>
    	        	<a href="{{ action("Admin\SaleController@getEdit", $i->id) }}" class="table-item edit edit-icon">
    				</a>
                    <a href="{{ action("Admin\SaleController@getDelete", $i->id) }}" class="table-item delete delete-icon">
                        X
    				</a>
    			</td>
    	    </tr>
        @endforeach
    </table>
    </div>
	{!! $items->appends(Input::all())->render() !!}
</div>

@endsection
