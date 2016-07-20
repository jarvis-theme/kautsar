<div class="row no-rutter">
	<div class="col-sm-12">
		<div id="slides">
			<div class="bxslider">
				@foreach (slideshow() as $val)
				<li>
					@if(!empty($val->url))
					<a href="{{filter_link_url($val->url)}}" target="_blank">
					@else
					<a href="#">
					@endif
						{{HTML::image(slide_image_url($val->gambar), $val->title)}} 
					</a>
				</li>
				@endforeach
			</div>
			@if(slideshow()->count() > 1)
			<div class="outside">
				<div class="square-link prev-link">
					<a href="#" id="slider-prev"></a>
				</div>
				<div class="square-link next-link">
					<a href="#" id="slider-next"></a>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>