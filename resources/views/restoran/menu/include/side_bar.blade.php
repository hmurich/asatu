<div class="side-bar">
    <form action="" class="form" method="get">
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
                <div class="side-bar-box__item-search">
                    <input type="text" name='name' placeholder="Поиск блюда..." value="{{ (isset($ar_input['name']) ? $ar_input['name'] : null) }}">
                </div>

                <br />
                <div class="side-bar-box__item">
                    <button class="button ">
                        Фильтр
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>
