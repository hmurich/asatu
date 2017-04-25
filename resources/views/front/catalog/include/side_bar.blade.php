<div class="side-bar__show button">
    {{ $translator->getTrans('filter') }}
</div>
<div class="side-bar">
    <form action="" class="form">
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                Кухни:
            </div>
            <div class="side-bar-box">
                @foreach ($ar_kitchen as $id=>$name)
                    <div class="side-bar-box__item">
                        @if (isset($ar_input['kitchen']) && in_array($id, $ar_input['kitchen']))
                            <input type="checkbox" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}" checked="">
                        @else
                            <input type="checkbox" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}">
                        @endif

                        <label for="kitchen_{{ $id }}">{{ $translator->getTrans('sys_directory_name_'.$id) }}</label>
                    </div>

                @endforeach
                <div class="side-bar-box__item-search">
                   <input type="text" placeholder="Поиск блюда..." name='k_name' value="{{ (isset($ar_input["k_name"]) ? $ar_input["k_name"] : null) }}" />
                </div>
            </div>
        </div>

        <div class="side-bar-item">
            <div class="side-bar-item__title">
                Мин.сумма заказа:
            </div>
            <div class="side-bar-form">
                <div class="side-bar-box">
                    <div id="slider-range"></div>
                    <input type="hidden" id="amount" name='amount_price'  style="border:0; color:#f6931f; font-weight:bold;"
                        value='{{ (isset($ar_input["amount"]) ? $ar_input["amount"] : null) }}'>

                    <div class="min-price"></div>
                    <div class="max-price"></div>

                </div>
            </div>
        </div>
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                {{ $translator->getTrans('krit') }}:
            </div>
            <div  class="side-bar-box">
                <div class="side-bar-box__item">
                    <input type="checkbox" id="new" name='restoran_new' value="1" {{ (isset($ar_input["restoran_new"]) ? "checked" : null) }}>
                    <label for="new">{{ $translator->getTrans('new') }}</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" name='restoran_new_promo' id="promokod" {{ (isset($ar_input["restoran_new_promo"]) ? "checked" : null) }}>
                    <label for="promokod" >{{ $translator->getTrans('with_promo') }}</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" name='restoran_free' id="free" {{ (isset($ar_input["restoran_free"]) ? "checked" : null) }}>
                    <label for="free">{{ $translator->getTrans('free_delivery') }}</label>
                </div>
                <div class="side-bar-box__item">

                </div>
            </div>
            <div class="side-bar-item-button--container">



                <button class="button">
                    применить
                </button>
            </div>
        </div>
    </form>
</div>
