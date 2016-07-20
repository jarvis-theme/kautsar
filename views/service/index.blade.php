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
							<h3 class="product-name">{{short_description($bestproduk->nama,50)}}</h3>
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
					<h1>Artikel Terbaru</h1>
				</div>
				<ul id="tab-lates-news">
					@foreach(list_blog(3) as $blog)
					<li>
						<a href="{{blog_url($blog)}}">
							<div class="best-selling">
								<h3>{{short_description($blog->judul,26)}}</h3>
							</div>
						</a>
						<p>{{short_description($blog->isi,134)}}<a href="{{blog_url($blog)}}" class="more-read">Selengkapnya</a></p>
						<span class="date">{{waktuTgl($blog->created_at)}}</span>
					</li>
					@endforeach
				</ul>
			</div>
			@endif

			@foreach(vertical_banner() as $banners)
			<div class="banner-left">
				<a href="{{url($banners->url)}}">
					{{HTML::image(banner_image_url($banners->gambar), 'Info Promo',array('width'=>'270','height'=>'388','class'=>'img-responsive'))}}
				</a>
			</div>
			@endforeach
		</div>
		<div class="col-sm-9">
			<div class="product-categories">
				<article class="col-xs-12 col-md-12 col-lg-12 backwhite tos">
					<h4>Kebijakan Layanan</h4>
					<p>{{$service->tos}}</p>
				</article>
				<article class="col-xs-12 col-md-12 col-lg-12 backwhite tos">
					<h4>Kebijakan Pengembalian</h4>
					<p>{{$service->refund}}</p>
				</article>
				<article class="col-xs-12 col-md-12 col-lg-12 backwhite tos">
					<h4>Kebijakan Privasi</h4>
					<p>{{$service->privacy}}</p>
				</article>
			</div>
		</div>
	</div>
</div>