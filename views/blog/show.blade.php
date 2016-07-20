<div class="container blogs">
	<div class="row mp">
		<div class="col-sm-4 col-md-3">
			@if(count(list_blog_category()) > 0)
			<div class="navigation-left">
				<div class="header-left-section title-category">
					<h1>Kategori</h1>
				</div>
				<ul id="side-category">
				@foreach(list_blog_category() as $kat)
					@if(!empty($kat->nama))
					<span class="underline"><a href="{{blog_category_url($kat)}}">{{$kat->nama}}</a></span>&nbsp;&nbsp;
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
					@foreach(best_seller(3) as $bestproduk)
					<li>
						<a href="{{product_url($bestproduk)}}">
							<div class="best-selling">
								{{HTML::image(product_image_url($bestproduk->gambar1,'thumb'), $bestproduk->nama)}}
							</div>
							<h3 class="product-name">{{short_description($bestproduk->nama,25)}}</h3>
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
					@foreach(list_blog(3,@$blog_category) as $blogs)
					<li>
						<a href="{{blog_url($blogs)}}">
							<div class="best-selling">
								<h3>{{shortDescription($blogs->judul,26)}}</h3>
							</div>
						</a>
						<p>
							{{shortDescription($blogs->isi,50)}}
							<a href="{{blog_url($blogs)}}" class="more-read">Baca Selengkapnya →</a>
						</p>
						<span class="date">{{waktuTgl($blogs->created_at)}}</span>
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
			<div class="single-page backwhite">
				<div class="row">
					<article class="col-lg-12 detailblog">
						<h3>{{$detailblog->judul}}</h3>
						<p>
							<small><i class="fa fa-calendar"></i> {{waktuTgl($detailblog->created_at)}}</small>&nbsp;&nbsp;
							@if(!empty($detailblog->kategori->nama))
							<span class="date-post"><i class="fa fa-tags"></i> <a href="{{blog_category_url(@$detailblog->kategori)}}">{{@$detailblog->kategori->nama}}</a></span>
							@endif
						</p>
						<p>{{$detailblog->isi}}</p>
					</article>
				</div>
				<hr>
				<div class="navigate comments clearfix">
					@if(isset($prev))
					<div class="pull-left"><a href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
					@else
					<div class="pull-right"></div>
					@endif
					@if(isset($next))
					<div class="pull-right">
						<a class="pull-right" href="{{$next->slug}}">Selanjutnya &rarr;</a>
					</div>
					@else
					<div class="pull-right"></div>
					@endif
				</div>
				<hr>
				<div>
					{{$fbscript}}
					{{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}}
				</div>
			</div>
		</div>
	</div>
</div>