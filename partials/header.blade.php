<div class="row">
	<div class="col-md-12" style="padding: 0;">
		<div id="menus">
			<div id="hamburger-icon" class="btn-hamburger">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<ul id="menus-top-section">
			{{--*/ $i=0 /*--}}
			@foreach(main_menu()->link as $key=>$link)
				@if($i >= 0 && $i < 6)
				<li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
				@endif
				{{--*/ $i += 1 /*--}}
			@endforeach
				<li class="search-menu">
					<form action="{{url('search')}}" method="post" class="form-search">
						<input type="text" placeholder="Cari Produk" name="search" class="input-text" required>
						<button class="btn-search"><i class="fa fa-search"></i></button>
					</form>
					<br><br>
				</li>
			</ul>
		</div>
	</div>
</div>