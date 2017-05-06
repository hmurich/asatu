<div id="modal_change_address" class="modal_div"> <!-- скрытый див с уникальным id = modal1 -->
    <span class="modal_close"></span>
     <div class="modal_div__mask">

    <form  action="{{ action('Front\CatalogController@postAddress') }}" method="post" >
        <img src="/img/modal-logo.png">
         <div class="form-modal-min-title">
            {{ $translator->getTrans('change_address') }}
            </div>
        <div class="form-modal">
            <div class="modal-input__container ">
                <select name="city_id" class='js_find_address_city_id' required="">
                  
                    @foreach ($ar_city as $id=>$name)
                        <option value="{{ $id }}">{{ $translator->getTrans('sys_directory_name_'.$id) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-input__container ">
                <input type="text" name='address' class="js_find_address" required="" placeholder="{{ $translator->getTrans('street') }}" />
                <input type='hidden' name='lat' class='js_find_address_lat' />
                <input type='hidden' name='lng' class='js_find_address_lng' />
            </div>
            <button class="modal-button button js_find_address_submit">
                {{ $translator->getTrans('change') }}
            </button>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
    </form>
    </div>
</div>
