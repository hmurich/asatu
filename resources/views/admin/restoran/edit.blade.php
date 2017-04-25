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
            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @if (!$item)
                    <div class="admin-edit-card__item">
                        <div class="admin-edit-card__item-left">
                            Email:
                        </div>
                        <div class="admin-edit-card__item__right">
                            <input type="email" name='email' placeholder="Email" required="">
                        </div>
                    </div>
                    <div class="admin-edit-card__item">
                        <div class="admin-edit-card__item-left">
                            Пароль:
                        </div>
                        <div class="admin-edit-card__item__right">
                            <input type="password" name='password' placeholder="Пароль" required="">
                        </div>
                    </div>
                @endif
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Город:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <select name="city_id" required="">
                            <option value="">город</option>
                            @foreach ($ar_city as $id=>$name)
                                @if ($item && $item->city_id == $id)
                                    <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                                @else
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endif
                            @endforeach
						</select>
    				</div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Время работы (начало):
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="time" name='betin_time' value='{{ $item ? $item->betin_time : null }}' placeholder="Время работы (начало)" required="">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Время работы (окончания):
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="time" name='end_time' value='{{ $item ? $item->end_time : null }}' placeholder="Время работы (окончания)" required="">
                    </div>
                </div>

                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Название заведения:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='name' value='{{ $item ? $item->name : null }}' placeholder="Название заведения" required="">
                    </div>
                </div>

                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Название заведения:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='name' value='{{ $item ? $item->name : null }}' placeholder="Название заведения" required="">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Адресс:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[address]' value='{{ $r_data ? $r_data->address : null }}' placeholder="Адресс" required="">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Кухня:
                    </div>
                    <div class="admin-edit-card__item__right">
                        @foreach ($ar_kitchen as $id=>$name)
                            <div class="admin-edit-card__checkbox">
                                @if (isset($kitchens) && count($kitchens) > 1 && isset($kitchens[$id]))
                                    <input type="checkbox" name='kitchen[]' class="checkbox" id="kitchen_{{ $id }}" value='{{ $id }}' checked='checked'>
                                @else
                                    <input type="checkbox" name='kitchen[]' class="checkbox" id="kitchen_{{ $id }}" value='{{ $id }}' >
                                @endif
                                <label for="kitchen_{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Главное фото
                    </div>
                    <div class="admin-edit-card__item__right">
                        <div class="admin-edit-card__input-file">
                            <input type="file" id="main_photo" class="input-file" name='photo'>
                            <label for="main_photo"  class="name-file">Выберите файл</label>
                        </div>
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Логотип
                    </div>
                    <div class="admin-edit-card__item__right">
                        <div class="admin-edit-card__input-file">
                            <input type="file" id="logo" class="input-file" name='logo'>
                            <label for="logo"  class="name-file">Выберите файл</label>
                        </div>
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Онлайн оплата
                    </div>
                    <div class="admin-edit-card__item__right">
                        @foreach ($ar_boolen_view as $id=>$name)
                            <div class="admin-edit-card__checkbox">
                                @if ($item && $item->epay == $id)
                                    <input type="radio" name="epay" class="checkbox" value='{{ $id }}' id="epay_{{ $id }}" checked>
                                @else
                                    <input type="radio" name="epay" class="checkbox" value='{{ $id }}' id="epay_{{ $id }}" >
                                @endif
                                <label for="epay_{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Gold
                    </div>
                    <div class="admin-edit-card__item__right">
                        @foreach ($ar_boolen_view as $id=>$name)
                            <div class="admin-edit-card__checkbox">
                                @if ($item && $item->is_gold == $id)
                                    <input type="radio" name="is_gold" class="checkbox" value='{{ $id }}' id="is_gold_{{ $id }}" checked>
                                @else
                                    <input type="radio" name="is_gold" class="checkbox" value='{{ $id }}' id="is_gold_{{ $id }}" >
                                @endif
                                <label for="is_gold_{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Platinum
                    </div>
                    <div class="admin-edit-card__item__right">
                        @foreach ($ar_boolen_view as $id=>$name)
                            <div class="admin-edit-card__checkbox">
                                @if ($item && $item->is_platinum == $id)
                                    <input type="radio" name="is_platinum" class="checkbox" value='{{ $id }}' id="is_platinum_{{ $id }}" checked>
                                @else
                                    <input type="radio" name="is_platinum" class="checkbox" value='{{ $id }}' id="is_platinum_{{ $id }}" >
                                @endif
                                <label for="is_platinum_{{ $id }}">{{ $name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Минимальная цена:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[min_price]' value='{{ $r_data ? $r_data->min_price : null }}' placeholder="Минимальная цена" required="">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Контакты:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[contacts]' value='{{ $r_data ? $r_data->contacts : null }}' placeholder="Контакты" required="">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Ф.И.О директора:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[director_name]' value='{{ $r_data ? $r_data->director_name : null }}' placeholder="Ф.И.О директора" required="">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Контакты директора:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[director_contacts]' value='{{ $r_data ? $r_data->director_contacts : null }}' required="" placeholder="Контакты директора">
                    </div>
                </div>

                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Время работы:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[for_admin_work_time]' value='{{ $r_data ? $r_data->for_admin_work_time : null }}' required="" placeholder="Время работы">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Менеджер:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[for_admin_manager]' value='{{ $r_data ? $r_data->for_admin_manager : null }}' required="" placeholder="Менеджер">
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Процент/Тенге:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <select name="data[for_admin_select]" required="">
                            <option value="">Процент/Тенге</option>
                            @foreach ($ar_for_admin_select as $id=>$name)
                                @if ($r_data && $r_data->for_admin_select == $id)
                                    <option value="{{ $id }}" selected="selected">{{ $name }}</option>
                                @else
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Количество:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <input type="text" name='data[for_admin_count]' value='{{ $r_data ? $r_data->for_admin_count : null }}' required="" placeholder="Количество">
                    </div>
                </div>
                <!--
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Краткое описание:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <textarea name='data[short_note]' placeholder='Краткий текст' class='js_redactor'>{{ $r_data ? $r_data->short_note : null }}</textarea>
                    </div>
                </div>
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        Полное описание:
                    </div>
                    <div class="admin-edit-card__item__right">
                        <textarea name='data[note]' placeholder='Краткий текст' class='js_redactor'>{{ $r_data ? $r_data->note : null }}</textarea>
                    </div>
                </div>
                -->


                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="admin-edit-card__item">
                    <div class="admin-edit-card__item-left">
                        <button class="button">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
