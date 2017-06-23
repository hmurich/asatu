<img src="/new/img/video_fix.png" alt="" class="header-video--media" data-video-src="/new/video/intro" data-teaser-source="/new/video/intro" data-provider="html5" data-video-width="1920" data-video-height="960">
<div id="hero_video">
    <div id="sub_content">
        <h1>{{ $translator->getTrans('gave_with_love') }}</h1>
       
        <div id="custom-search-input">
            <form action="{{ action('Front\CatalogController@postAddress') }}" method="post">
                <div class="form-inline">
                    <div class="form-group">
                       <div class="container_input">
					<input type="text" name="city" placeholder="Город" class="first">
					<input type="text" name="address" placeholder="Адрес">
				</div>
				<div class="submit">
					<a href="#">
						<p>Доставка</p>
					</a>
				</div>
				<div class="or">
					<p>или</p>
				</div>
				<div class="submit">
					<a href="#">
						<p>Самовывоз</p>
					</a>
				</div>
                    </div>
                   
                </div>
            </form>
        </div>
    </div><!-- End sub_content -->
</div>
