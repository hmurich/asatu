@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="admin-content__body">
    <div class="side-bar full-wight">
        @include('admin.restoran.include.menu', ['item'=>$item])
    </div>
    <div class="restaurants-box full-wight">
        <div class="admin-edit-card">
            <div class="admin-edit-card__title">
                {{ $title }}
            </div>
            <form action="{{ $action }}" method="POST" >
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Наименование точки:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='name' value='{{ ($location ? $location->name : null) }}' />
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Адресс:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='address' value='{{ ($location ? $location->address : null) }}' />
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Широта:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='lng' id='lng'  value='{{ ($location ? $location->lng : null) }}' />
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Долгота:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='lat' id='lat' value='{{ ($location ? $location->lat : null) }}' />
                    </div>
                </div>

                <div id="map" style="width:100%; height:500px" class='js_map_field_main' data-city_center="{{ $city->sys_key }}"></div>

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
