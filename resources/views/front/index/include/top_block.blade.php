<div class="header-inner js-header-inner">
    <div class="header-slogan">
        {{ $translator->getTrans('gave_with_love') }}
    </div>
    <div class="header-form">
        <form action="{{ action('Front\CatalogController@postAddress') }}" method="post">
            <div class="header-form__item">
                <select name="city_id" class='js_find_address_city_id' required="">
                    <option value="">{{ $translator->getTrans('city') }}</option>
                    @foreach ($ar_city as $id=>$name)
                        <option value="{{ $id }}">{{ $translator->getTrans('sys_directory_name_'.$id) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="header-form__item" >
                <input type="text" name='address' class="js_find_address" required="" placeholder="{{ $translator->getTrans('street') }}">
            </div>
            <div class="header-form__item">
                <button class="button">
                    {{ $translator->getTrans('want_eat') }}
                </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</div>

<div class="video-container">
    <video autoplay loop poster="video/intro-4.jpg">
       <source src="video/1.mp4" type='video/mp4"'>
       <source src="video/2.webm" type='video/webm'>
    </video>
</div>
