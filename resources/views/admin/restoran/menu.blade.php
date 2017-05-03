@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="side-bar full-wight">
        @include('admin.restoran.include.menu', ['item'=>$item])
    </div>
    <div class="restaurants-box full-wight" >
        <div class="admin-edit-card" >
			<div class="add-food">
				<div class="add-food__top">
					<a href="{{ action('Admin\MenuTypeController@getEdit') }}" class="button add-food__button">
                        Создать критерии
                    </a>
					<a href="{{ action('Admin\Restoran\MenuController@getAdd', $item->id) }}" class="button add-food__button">
                        Добавить блюдо
                    </a>
					<div class="add-food__top--filter">
                        <form action="" method="get">
    						<div class="add-food__top--filter__item">
    							<select name="cat_id" id="">
    								<option value="0">Критерии</option>
                                    @foreach ($ar_menu_type as $id=>$name)
                                        @if (isset($ar_input['cat_id']) && $id == $ar_input['cat_id'])
                                            <option value="{{ $id }}" selected="">{{ $name }}</option>
                                        @else
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endif
                                    @endforeach
    							</select>
    						</div>
    						<div class="add-food__top--filter__item">
    							<input  type="text" name='title'
                                        placeholder="Название блюдо"
                                        value="{{ (isset($ar_input['title']) ? $ar_input['title'] : null)  }}">
    						</div>
    						<div class="add-food__top--filter__item">
    							<button class="button">Поиск</button>
    						</div>
                        </form>
					</div>
				</div>
			</div>
			<div class="table-container add-food__form">
				<table border="1">
				    <tbody>
                        <tr>
					        <th>Название</th>
					        <th>Название блюдо</th>
					        <th>Цена</th>
					        <th>Описание</th>
					        <th>фото</th>
					        <th>Статус</th>
					    </tr>
                        @foreach($items as $i)
                            <tr>
                                <form action="{{ action('Admin\Restoran\MenuController@postItem', array($item->id, $i->id)) }}"
                                        method="POST" enctype="multipart/form-data">
        					        <td>
            					        <select name="cat_id" required="">
                                           @foreach ($ar_menu_type as $id=>$name)
                                                @if ($id == $i->cat_id)
                                                    <option value="{{ $id }}" selected="">{{ $name }}</option>
                                                @else
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endif
                                           @endforeach
            					        </select>
        					        </td>
        					        <td>
                                        <input name='title' type="text" class="food-add-input" placeholder="Название блюдо" value="{{ $i->title }}">
                                    </td>
        					        <td>
                                        <input name='cost_item' type="text" class="food-add-input food-add-input--price" placeholder="Цена"  value="{{ $i->cost_item }}">
                                    </td>
        					        <td>
                                        <textarea name="note" id="" placeholder="Описание">{{ $i->note }}</textarea>
                                    </td>
        					        <td>
                                        @if ($i->photo)
                                            <a href='{{ $i->photo }}' target="_blank">
                                                <img src="{{ $i->photo }}" style='max-width: 110px;' />
                                            </a>
                                        @else
                                            не указано
                                        @endif

        								<div class="food-add__input-file">
            								<input type="file" name='photo' id="foto{{ $i->id }}" class="input-file">
            								<label for="foto{{ $i->id }}" class="name-file">Выберите файл</label>
            							</div>
        					        </td>
        					        <td>
        								<a href="{{ action("Admin\Restoran\MenuController@getDelete", $i->id) }}" class="delete-icon">x</a>
        								<a href="{{ action("Admin\Restoran\MenuController@getOpen", $i->id) }}" class="stop"></a>
        								<button class="save"></button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        					        </td>
        					   </form>
                             </tr>
                        @endforeach
				    </tbody>
                </table>
			</div>
		</div>
    </div>
    {!! $items->appends(Input::all())->render() !!}
</div>

@endsection
