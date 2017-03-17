<div class="header-inner js-header-inner">
    <div class="header-slogan">
        {{ $translator->getTrans('gave_with_love') }}
    </div>
    <div class="header-form">
        <form action="">
            <div class="header-form__item">
                <select name="" id="">
                    <option value="">{{ $translator->getTrans('city') }}</option>
                    @foreach ($ar_city as $id=>$name)
                        <option value="{{ $id }}">{{ $translator->getTrans('sys_directory_name_'.$id) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="header-form__item">
                <input type="text" placeholder="{{ $translator->getTrans('street') }}">
            </div>
            <div class="header-form__item">
                <button class="button">
                    {{ $translator->getTrans('want_eat') }}
                </button>
            </div>
        </form>
    </div>
</div>

<div class="video-container">
    <video autoplay loop poster="video/intro-4.jpg">
       <source src="video/1.mp4" type='video/mp4"'>
       <source src="video/2.webm" type='video/webm'>
    </video>
</div>
