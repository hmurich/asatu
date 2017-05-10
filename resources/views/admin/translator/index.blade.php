@extends('admin.layout')

@section('title', $title)

@section('content')

<div class="admin-content__body">
	<form action="" method='get' class="admin-search-form">
		<div class="admin-search-form__item input-search">
            <input type='text' name='filter[key]' value='{{ $ar_input["filter"]["key"] or null }}' placeholder="Системный код">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[trans_ru]' value='{{ $ar_input["filter"]["trans_ru"] or null }}' placeholder="Русский">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[trans_kz]' value='{{ $ar_input["filter"]["trans_kz"] or null }}' placeholder="Казахский">
		</div>
        <div class="admin-search-form__item input-search">
            <input type='text' name='filter[trans_en]' value='{{ $ar_input["filter"]["trans_en"] or null }}' placeholder="Английский">
		</div>
		<div class="admin-search-form__item button-search">
			<button class="button">приминить фильтр</button>
		</div>
	</form>
    <div class="table-container">
	<table border="1">
	    <tr>
	        <th>id</th>
	        <th>Системный код</th>
	        <th>Русский</th>
	        <th>Казахский</th>
            <th>Английский</th>
	        <th>
                <a href='{{ action("Admin\TranslateController@getEdit") }}'>+</a>
            </th>
	    </tr>
        @foreach($items as $i)
    	    <tr>
    	        <td>{{ $i->id }}</td>
    	        <td>{{ $i->key }}</td>
    	        <td>
                    @if ($i->trans_ru)
                        {{ $i->trans_ru }}
                    @else
                        нету
                    @endif
                </td>
                <td>
                    @if ($i->trans_kz)
                        {{ $i->trans_kz }}
                    @else
                        нету
                    @endif
                </td>
                <td>
                    @if ($i->trans_en)
                        {{ $i->trans_en }}
                    @else
                        нету
                    @endif
                </td>
    	        <td>
    	        	<a href="{{ action("Admin\TranslateController@getEdit", $i->id) }}" class="table-item edit edit-icon">
    				</a>
                    <a href="{{ action("Admin\TranslateController@getDelete", $i->id) }}" class="table-item delete delete-icon">
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
