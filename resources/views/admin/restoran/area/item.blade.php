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
            <form action="{{ $action }}" method="POST" >
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Индекс сортировки:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='sort_index' value='{{ ($area ? $area->sort_index : null) }}' />
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Стоимость:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='cost' value='{{ ($area ? $area->cost : null) }}' />
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Время доставки:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='delivery_time' value='{{ ($area ? $area->delivery_time : null) }}' />
                    </div>
                </div>

                <div    id="map_area"
                        style="width:100%; height:500px"
                        class='js_map_field_main'
                        data-city_center="{{ $location->lng }},{{ $location->lat }}"
                        data-coords="{{ $poly_coords }}" >
                </div>


                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Координаты:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <textarea name='coords' class='js_area_coords'>{{ ($area ? $area->coords : null) }}</textarea>
                    </div>
                </div>

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
</div>

@endsection
