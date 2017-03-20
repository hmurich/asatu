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
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Наименование точки:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='title'  placeholder="Наименование точки">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Адресс:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='cost_item' placeholder="Цена">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Широта:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='cost_item' placeholder="Цена">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Долгота:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='cost_item' placeholder="Цена">
                    </div>
                </div>
                
                <div id="map" style="width:100%; height:500px"></div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        <button class="button">
                            Добавить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table border="1">
	    <tr>
	        <th>id</th>
	        <th>Кухня</th>
	        <th>Название блюда</th>
	        <th>Цена</th>
            <th>Фото</th>
            <th>Создан</th>
	        <th></th>
	    </tr>
        @foreach($items as $i)
    	    <tr>
    	        <td>{{ $i->id }}</td>
    	        <td>
                    @if (isset($ar_all_kitchen[$i->cat_id]))
                        {{ $ar_all_kitchen[$i->cat_id] }}
                    @else
                        не указано
                    @endif
                </td>
    	        <td>{{ $i->title }}</td>
    	        <td>{{ $i->cost_item }}</td>
                <td>
                    @if ($i->photo)
                        <a href='{{ $i->photo }}' target="_blank">
                            <img src="{{ $i->photo }}" style='max-width: 110px;' />
                        </a>
                    @else
                        не указано
                    @endif
                </td>
                <td>{{ $i->created_at }}</td>
    	        <td>
                    <a href="{{ action("Admin\Restoran\MenuController@getDelete", $i->id) }}" class="table-item delete delete-icon">
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

@endsection
