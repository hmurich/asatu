<div class="header-inner ">
  <!--   <div class="header-slogan">
        {{ $translator->getTrans('gave_with_love') }}
    </div> -->
    <div class="header-form">
        <form action="{{ action('Front\CatalogController@postAddress') }}" method="post">
            <div class="header-form__item">
                <select name="city_id" class='js_find_address_city_id' required="">
                    <!-- <option value="0">{{ $translator->getTrans('city') }}</option> -->
                    @foreach ($ar_city as $id=>$name)
                        <option value="{{ $id }}">{{ $translator->getTrans('sys_directory_name_'.$id) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="header-form__item" >
                <input type="text" name='address' class="js_find_address" required="" placeholder="{{ $translator->getTrans('street') }}" />
                <input type='hidden' name='lat' class='js_find_address_lat' />
                <input type='hidden' name='lng' class='js_find_address_lng' />
            </div>
            <div class="header-form__item ">
                <button class="button js_find_address_submit">
                    {{ $translator->getTrans('want_eat') }}
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</div>

<div class="video-container">

</div>
