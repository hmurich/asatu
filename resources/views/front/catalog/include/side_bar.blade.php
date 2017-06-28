<div id="filters_col">
    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">{{ $translator->getTrans('filter') }}<i class="icon-plus-1 pull-right"></i></a>
    <div class="collapse" id="collapseFilters">
        <form action="" class="form js_change_form_ajax">
            <div class="filter_type">
                <h6>Кухни:</h6>
                <ul>
                    @foreach ($ar_kitchen as $id=>$name)
                    <li><label>
                            @if (isset($ar_input['kitchen']) && in_array($id, $ar_input['kitchen']))
                                <input type="checkbox" class="icheck" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}" checked="">
                            @else
                                <input type="checkbox" class="icheck" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}">
                            @endif
                                {{ $translator->getTrans('sys_directory_name_'.$id) }}
                        </label></li>
                    @endforeach
                </ul>
            </div>
            <div class="filter_type">
				<h6>Рэйтинг</h6>
				<ul>
					<li>
                        <label class="">
                            <div class="icheckbox_square-grey" style="position: relative;">
                                <input {{ (isset($ar_input['ar_raiting']) && in_array(5, $ar_input['ar_raiting']) ? 'checked' : null) }} type="checkbox"
                                        name='ar_raiting[]' value="5" class="icheck" style="position: absolute; opacity: 0;" >
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            <span class="rating">
        					     <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
        					</span>
                        </label>
                    </li>
                    <li>
                        <label class="">
                            <div class="icheckbox_square-grey" style="position: relative;">
                                <input {{ (isset($ar_input['ar_raiting']) && in_array(4, $ar_input['ar_raiting']) ? 'checked' : null) }} type="checkbox"
                                        name='ar_raiting[]' value="4" class="icheck" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            <span class="rating">
        					     <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star "></i>
        					</span>
                        </label>
                    </li>
                    <li>
                        <label class="">
                            <div class="icheckbox_square-grey" style="position: relative;">
                                <input {{ (isset($ar_input['ar_raiting']) && in_array(3, $ar_input['ar_raiting']) ? 'checked' : null) }} type="checkbox"
                                        name='ar_raiting[]' value="3" class="icheck" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            <span class="rating">
        					     <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star "></i>
                                 <i class="icon_star "></i>
        					</span>
                        </label>
                    </li>
                    <li>
                        <label class="">
                            <div class="icheckbox_square-grey" style="position: relative;">
                                <input {{ (isset($ar_input['ar_raiting']) && in_array(2, $ar_input['ar_raiting']) ? 'checked' : null) }} type="checkbox"
                                        name='ar_raiting[]' value="2" class="icheck" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            <span class="rating">
        					     <i class="icon_star voted"></i>
                                 <i class="icon_star voted"></i>
                                 <i class="icon_star "></i>
                                 <i class="icon_star "></i>
                                 <i class="icon_star "></i>
        					</span>
                        </label>
                    </li>
                    <li>
                        <label class="">
                            <div class="icheckbox_square-grey" style="position: relative;">
                                <input {{ (isset($ar_input['ar_raiting']) && in_array(1, $ar_input['ar_raiting']) ? 'checked' : null) }} type="checkbox"
                                        name='ar_raiting[]' value="1" class="icheck" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            <span class="rating">
        					     <i class="icon_star voted"></i>
                                 <i class="icon_star "></i>
                                 <i class="icon_star "></i>
                                 <i class="icon_star "></i>
                                 <i class="icon_star "></i>
        					</span>
                        </label>
                    </li>
				</ul>
			</div>
            <div class="filter_type">
                <h6>Поиск блюд:</h6>
                <div class="side-bar-box">
                    <div class="side-bar-box__item-search">
                       <input type="text" placeholder="Введите блюдо.." name='k_name' value="{{ (isset($ar_input["k_name"]) ? $ar_input["k_name"] : null) }}" />
                        <button class="search-button"></button>
                    </div>
                </div>
            </div>
            <div class="filter_type">
                <h6>Мин.сумма заказа:</h6>
                <div class="side-bar-form">
                    <div class="side-bar-box">
                        <div id="slider-range"></div>
                        <input type="text" id="range" name='amount_price'
                            value='{{ (isset($ar_input["amount"]) ? $ar_input["amount"] : null) }}'>

                        <div class="min-price hide" style="display: none;"></div>
                        <div class="max-price hide" style="display: none;"></div>

                    </div>
                </div>
            </div>
            <div class="filter_type">
                <h6>{{ $translator->getTrans('krit') }}:</h6>
                <ul>
                    <li><label>
                            <input type="checkbox" id="new" class="icheck" name='restoran_new' value="1" {{ (isset($ar_input["restoran_new"]) ? "checked" : null) }}>
                            {{ $translator->getTrans('new') }}
                        </label></li>
                    <li>
                        <label>
                            <input type="checkbox" id="epay" class="icheck" name='epay' value="1" {{ (isset($ar_input["epay"]) ? "checked" : null) }}>
                            Оплата банкосвкой картой
                        </label>
                    </li>

                    <li><label>
                            <input type="checkbox" class="icheck" name='restoran_new_promo' id="promokod" {{ (isset($ar_input["restoran_new_promo"]) ? "checked" : null) }}>
                            {{ $translator->getTrans('with_promo') }}
                        </label></li>
                    <li><label>
                            <input type="checkbox" class="icheck" name='restoran_free' id="free" {{ (isset($ar_input["restoran_free"]) ? "checked" : null) }}>
                            {{ $translator->getTrans('free_delivery') }}
                        </label></li>
                </ul>
            </div>
            <div class="filter_type">
                <button class="btn btn-primary button">
                    применить
                </button>
            </div>
        </form>
    </div>
</div>
