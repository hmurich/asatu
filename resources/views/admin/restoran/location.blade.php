@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="side-bar">
        @include('admin.restoran.include.menu', ['item'=>$item])
    </div>
    <div class="restaurants-box">
        <div class="admin-edit-card">
            <div class="admin-edit-card__title">
                {{ $title }}
            </div>
            <table border="1">
        	    <tr>
        	        <th>id</th>
        	        <th>Наименование</th>
        	        <th>Адресс</th>
        	        <th>Кол-во зон</th>
        	        <th>
                        <a href="{{ action("Admin\Restoran\LocationController@getItem", $item->id) }}" class="table-item add add-icon">
                            +
                        </a>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
            	        <td>{{ $i->name }}</td>
            	        <td>{{ $i->address }}</td>
            	        <td>{{ $i->relArea()->count() }}</td>
            	        <td>
                            <a href="{{ action("Admin\Restoran\AreaController@getList", array($item->id, $i->id)) }}" class="table-item edit edit-icon">
                                зоны доставки
            				</a>
                            <a href="{{ action("Admin\Restoran\LocationController@getItem", array($item->id, $i->id)) }}" class="table-item edit edit-icon">
                                edit
            				</a>
                            <a href="{{ action("Admin\Restoran\LocationController@getDelete", $i->id) }}" class="table-item delete delete-icon">
                                X
            				</a>
            			</td>
            	    </tr>
                @endforeach
                <tr>
                    <td colspan=12>{!! $items->appends(Input::all())->render() !!}</td>
                </tr>
            </table>
        </div>
    </div>

</div>

@endsection
