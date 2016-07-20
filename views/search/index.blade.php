<div class="container blogs">
	<div class="row mp">
		<div class="col-sm-4 col-md-3">
			@if(count(list_category()) > 0)
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
			@endif
			@if(count(best_seller()) > 0)
			<div class="left-section">
				<div class="header-left-section">
					<h1>Produk Terlaris</h1>
				</div>
				<ul id="tab-best-selling">
					@foreach(best_seller(3) as $bestproduk )
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
					{{HTML::image(banner_image_url($banners->gambar),'Info Promo',array('class'=>'img-responsive'))}}
				</a>
			</div>
			@endforeach
		</div>
		<div class="col-sm-8 col-md-9">
			<div class="product-categories">
				@if($jumlahCari != 0)
					@if(count($hasilpro) > 0)
					<div class="row np">
						@foreach($hasilpro as $produks)
						<div class="col-xs-6 col-sm-6 col-md-4">
							<div class="product-categories-list">
								{{HTML::image(product_image_url($produks->gambar1,'medium'), $produks->nama)}}
								<div class="tab-title">
									<h3 class="title">{{short_description($produks->nama,22)}}</h3>
									<h3 class="price">{{price($produks->hargaJual)}}</h3>
								</div>
								<span class="caption-product-list fade-caption">
									<h3>{{short_description($produks->nama,22)}}</h3>
									<h2>{{price($produks->hargaJual)}}</h2>
									<p>{{short_description($produks->deskripsi,130)}}</p>
									<a href="{{product_url($produks)}}" class="btn-chart">Lihat Produk</a>
								</span>
							</div>
						</div>
						@endforeach
					</div>
					@endif
					@if(count($hasilhal) > 0 || count($hasilblog) > 0)
						@foreach($hasilhal as $hal)
						<article class="col-lg-12 detailblog" id="articleblog">
							<a href="{{url('halaman/'.$hal->slug)}}">
								<h3 class="searchblog">{{$hal->judul}}</h3>
							</a>
							<p>
								{{short_description($hal->isi,300)}}<br>
								<a href="{{url('halaman/'.$hal->slug)}}" class="theme">Baca Selengkapnya →</a>
							</p>
						</article>
						@endforeach
						@foreach($hasilblog as $blog_result)  
						<article class="col-lg-12" id="articleblog">
							<a href="{{blog_url($blog_result)}}">
								<h3 class="searchblog">{{$blog_result->judul}}</h3>
							</a>
							<p id="blogtag">
								<small><i class="fa fa-calendar"></i> {{waktuTgl($blog_result->updated_at)}}</small>&nbsp;&nbsp;
								<span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$blog_result->kategori)}}">{{@$blog_result->kategori->nama}}</a></span>
							</p>
							<p>
								{{short_description($blog_result->isi,300)}}<br>
								<a href="{{blog_url($blog_result)}}" class="theme">Baca Selengkapnya →</a>
							</p>
							<hr>
						</article>
						@endforeach 
					@endif
				@else
				<article class="text-center"><i>Hasil pencarian tidak ditemukan</i></article>
				@endif
			</div>
		</div>
	</div>
</div>