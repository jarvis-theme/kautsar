<div class="container blogs">
	<div class="row mp">
		<div class="col-sm-3">
			<div class="navigation-left sidey">
				<ul id="category" class="sidenav">
				@foreach(list_category() as $side_menu)
					@if($side_menu->parent == '0')
					<li>
						<a href="{{category_url($side_menu)}}">{{$side_menu->nama}}</a>
						@if($side_menu->anak->count() != 0)
						<ul id="submenu-left">
							@foreach($side_menu->anak as $submenu)
							@if($submenu->parent == $side_menu->id)
							<li>
								<a href="{{category_url($submenu)}}" class="transparent">{{$submenu->nama}}</a>
								@if($submenu->anak->count() != 0)
								<ul>
									@foreach($submenu->anak as $submenu2)
									@if($submenu2->parent == $submenu->id)
									<li>
										<a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a>
									</li>
									@endif
									@endforeach
								</ul>
								@endif
							</li>
							@endif
							@endforeach
						</ul>
						@endif
					</li>
					@endif
				@endforeach
				</ul>
			</div>
			@if(count(best_seller()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Produk Terlaris</h1>
				</div>
				<ul id="tab-best-selling">
					@foreach(best_seller(3) as $bestproduk)
					<li>
						<a href="{{product_url($bestproduk)}}">
							<div class="best-selling">
								{{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), $bestproduk->nama)}}
							</div>
							<h3 class="product-name">{{short_description($bestproduk->nama,35)}}</h3>
							<h3 class="price">{{price($bestproduk->hargaJual)}}</h3>
						</a>
					</li>
					@endforeach
				</ul>
				<div class="link-more-news">
					<a href="{{url('produk')}}" class="btn btn-success">Lihat Semua</a>
				</div>
			</div>
			@endif
			@if(count(list_blog()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Lates News</h1>
				</div>
				<ul id="tab-lates-news">
					@foreach(list_blog(3,@$blog_category) as $blog)
					<li>
						<a href="{{blog_url($blog)}}">
							<div class="best-selling">
								<h3>{{short_description($blog->judul,26)}}</h3>
							</div>
						</a>
						<p>
							{{short_description($blog->isi,134)}}
							<a href="{{blog_url($blog)}}" class="more-read">Selengkapnya</a>
						</p>
						<span class="date">{{waktuTgl($blog->created_at)}}</span>
					</li>
					@endforeach
				</ul>
			</div>
			@endif

			@foreach(vertical_banner() as $banners)
			<div class="banner-left">
				<a href="{{url($banners->url)}}">
					{{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive adv-img'))}}
				</a>
			</div>
			@endforeach

			{{ Theme::partial('subscribe') }}
		</div>
		<div class="col-sm-9">
			<div class="single-page">
				<h1>Testimonial</h1>
				@foreach (list_testimonial() as $items)  
				<div class="quotes">
					<blockquote>
						{{$items->isi}}
					</blockquote>
					<p class="quote-person">~ {{$items->nama}} ~</p>
				</div>
				@endforeach
				<br>
				<div class="row">
					<div class="col-md-12">
						{{list_testimonial()->links()}}
					</div>
				</div>

				<div class="respond col-md-6">
					<h3 id="testitext">Buat Testimonial</h3>
					<form method="post" action="{{url('testimoni')}}" role="form">
						<div class="form-group">
							<label for="name">Nama</label>
							<input type="text" class="form-control" name="nama" id="name" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Testimonial</label>
							<textarea name="testimonial" class="form-control" rows="3" required></textarea>
						</div>
						<button class="btn btn-success" type="submit">Kirim Testimonial</button>
						<button class="btn btn-default" type="reset">Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>