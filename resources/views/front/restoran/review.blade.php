@extends('layout')
@section('title', $title)

@section('top_block')
    @include('include.top_block_def')
@endsection

@section('content')
<div class="middle-icon position-absolute">
    @include('front.index.include.middle_icon')
</div>
<div class="container">
    <div class="container-inner">
        <div class="restaurant">
            @include('front.restoran.include.top_info')
        </div>
        <div class="admin-content__top">@include('front.restoran.include.nav')</div>

        @include('front.restoran.include.side_bar_review')

        <div class="restaurants-box">
			<ul class="reviews-item__container">
				<li class="reviews-item">
					<div class="reviews-item__head">
					Имя Фамилия
						<div class="reviews-item__date">
							24.04.2017
						</div>
					</div>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores mollitia aliquid et molestias nesciunt quae, exercitationem totam cum commodi eaque! Reprehenderit quibusdam, error accusantium eveniet veritatis nesciunt voluptatibus dolor cupiditate.

					</p>
				</li>
				<li class="reviews-item">
					<div class="reviews-item__head">
					Имя Фамилия
						<div class="reviews-item__date">
							24.04.2017
						</div>
					</div>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores mollitia aliquid et molestias nesciunt quae, exercitationem totam cum commodi eaque! Reprehenderit quibusdam, error accusantium eveniet veritatis nesciunt voluptatibus dolor cupiditate.

					</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, perferendis? Inventore impedit culpa asperiores perspiciatis, minima eligendi libero eum labore aliquid officiis maxime molestias repellat itaque deserunt expedita, recusandae assumenda?</p>
					<p>Velit, maxime dicta voluptates amet aliquam doloremque qui, optio fugiat omnis recusandae, modi. Quia a unde sit impedit culpa voluptatibus non ipsum eos, qui excepturi? Numquam reprehenderit quidem, cupiditate sint.</p>
					<p>Dolores minima reiciendis optio officiis aspernatur impedit esse assumenda exercitationem, magnam, eos ad beatae velit molestias iusto sunt facilis debitis aliquam iure officia soluta quam tempora atque sequi consequatur. Aperiam.</p>
					<p>Neque adipisci tempore, vero impedit culpa porro aut ratione magnam. Eligendi ex ipsa, fuga similique qui, maxime vero illo minus eos libero magni dolore aut reiciendis distinctio. Natus, praesentium at!</p>
					<p>Quasi autem molestiae ab maxime architecto. Sequi cupiditate, quibusdam cumque similique officia alias veniam consequatur, iste corrupti ea ratione, fugit aperiam earum quae enim odio et assumenda! Repudiandae dicta, in!</p>
				</li>
				<li class="reviews-item">
					<div class="reviews-item__head">
					Имя Фамилия
						<div class="reviews-item__date">
							24.04.2017
						</div>
					</div>
					<p>
					   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores mollitia aliquid et molestias nesciunt quae, exercitationem totam cum commodi eaque! Reprehenderit quibusdam, error accusantium eveniet veritatis nesciunt voluptatibus dolor cupiditate.

					</p>
				</li>
			</ul>
		</div>
    </div>
</div>



@endsection
