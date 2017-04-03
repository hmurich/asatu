<div class="side-bar__show button">
    Фильтр
</div>
<div class="side-bar">
    <form action="" class="form">
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                блюдо:
            </div>
            <div class="side-bar-box">
                @foreach ($ar_kitchen as $id=>$name)
                    <div class="side-bar-box__item">
                        @if (isset($ar_input['kitchen']) && in_array($id, $ar_input['kitchen']))
                            <input type="checkbox" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}" checked="">
                        @else
                            <input type="checkbox" name='kitchen[]' id="kitchen_{{ $id }}" value="{{ $id }}">
                        @endif

                        <label for="kitchen_{{ $id }}">{{ $name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                сумма заказа:
            </div>
            <div class="side-bar-form">
                <div class="side-bar-box">
                    <div id="slider-range"></div>
                    <input type="hidden" id="amount" name='amount_price' readonly style="border:0; color:#f6931f; font-weight:bold;"
                        value='{{ (isset($ar_input["amount"]) ? $ar_input["amount"] : null) }}'>

                    <div class="min-price"></div>
                    <div class="max-price"></div>

                </div>
            </div>
        </div>
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                критерии:
            </div>
            <div  class="side-bar-box">
                <div class="side-bar-box__item">
                    <input type="checkbox" id="new" name='restoran_new' value="1" {{ (isset($ar_input["restoran_new"]) ? "checked" : null) }}>
                    <label for="new">Новые</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" name='restoran_new_promo' id="promokod" {{ (isset($ar_input["restoran_new_promo"]) ? "checked" : null) }}>
                    <label for="promokod" >С промокодом</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" name='restoran_free' id="free" {{ (isset($ar_input["restoran_free"]) ? "checked" : null) }}>
                    <label for="free">Бесплатная доставка</label>
                </div>
            </div>
            <div class="side-bar-item-button--container">
                <button class="button">
                    показать
                </button>
            </div>
        </div>
    </form>
</div>
