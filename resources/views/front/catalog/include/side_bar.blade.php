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
                <div class="side-bar-box__item">
                    <input type="checkbox" id="pizza">
                    <label for="pizza">Пицца (29)</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" id="sushi">
                    <label for="sushi">Суши (24)</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" id="burger">
                    <label for="burger">Бургеры и донеры (34)</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" id="shashlik" checked>
                    <label for="shashlik">Шашлыки (29)</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" id="wok">
                    <label for="wok">Wok Лапша (19)</label>
                </div>
            </div>
        </div>
        <div class="side-bar-item">
            <div class="side-bar-item__title">
                сумма заказа:
            </div>
            <div class="side-bar-form">
                <div class="side-bar-box">
                    <div id="slider-range"></div>
                    <input type="hidden" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">

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
                    <input type="checkbox" id="new">
                    <label for="new">Новые</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" id="promokod">
                    <label for="promokod">С промокодом</label>
                </div>
                <div class="side-bar-box__item">
                    <input type="checkbox" id="free">
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
