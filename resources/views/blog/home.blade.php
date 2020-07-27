@extends('blog/template')
@section('recomend')
@php

$data['keyword'] = null;
$title = 'Home';
$author = \App\user::where('id', 1)->first();

@endphp
<section class="site-section pt-5 pb-5">
	<div class="container">
		<div>
			<div class="row">
				<div class="col-md-12">
					<!-- default slider -->
					<div class="owl-carousel owl-theme home-slider">
						@foreach($data['dipajang'] as $postPajangan)
						<div>
							<a href="{{ url('blog/'.$postPajangan->id) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset('storage/'.$postPajangan->thumbnail) }}'); ">
								<div class="text half-to-full">
									<span class="category mb-5">{{ \App\categorie::where('id', \App\blog::where('id', $postPajangan->id)->first()->categories)->first()->categori }}</span>
									<div class="post-meta">
										
										<span class="author mr-2"><img src="{{ asset('storage/'.\App\user::where('id', \App\blog::where('id', $postPajangan->id)->first()->author)->first()->profil_image) }}" alt="Colorlib"> {{ \App\user::where('id', \App\blog::where('id', $postPajangan->id)->first()->author)->first()->name }}</span>&bullet;
										<span class="mr-2">
											@php
											echo date('d M, Y', strtotime($postPajangan->updated_at))
											@endphp
										</span>&bullet;
										<span class="ml-2"><span class="fa fa-eye"></span> {{ $postPajangan->views }}</span>
										
									</div>
									<h3>{{ $postPajangan->title }}</h3>
									<p>
										{!!
										implode(" ", array_slice(explode(" ", \App\blog::where('id', $postPajangan->id)->first()->body), 0, 14))
										!!}...
									</p></p>
								</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('latestPost')
<section class="site-section py-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="mb-4">Latest Posts</h2>
			</div>
		</div>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row">
					@foreach($data['article'] as $articles)
					<div class="col-md-6">
						<a href="{{ url('blog/'.$articles->id) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
							<img src="{{ asset('storage/'.$articles->thumbnail) }}" alt="Image placeholder">
							<div class="blog-content-body">
								<div class="post-meta">
									<span class="author mr-2"><img src="{{ asset('storage/'.\App\user::where('id', \App\blog::where('id', $articles->id)->first()->author)->first()->profil_image) }}" alt="Colorlib"> {{ \App\user::where('id', \App\blog::where('id', $articles->id)->first()->author)->first()->name }}</span>&bullet;
									<span class="mr-2">
										@php echo date('d M Y', strtotime($articles->updated_at)) ; @endphp
									</span> &bullet;
									<span class="ml-2"><span class="fa fa-eye"></span> {{ $articles->views }}</span>
								</div>
								<h2>{{ $articles->title }}</h2>
							</div>
						</a>
					</div>
					@endforeach
				</div>
				
				
			</div>
			@endsection
			@section('sidebar2')
			<div class="col-md-12 col-lg-4 sidebar">
				<div class="sidebar-box search-form-wrap">
					<form method="POST" action="{{ route('search') }}" class="search-form">
						@csrf
						<div class="form-group"><span class="icon fa fa-search"></span>
						<input name="searchTitle" type="text" class="form-control" id="s" placeholder="Cari apa?">
					</div>
				</form>
				
				<!-- END sidebar-box -->
				<div class="sidebar-box">
					<h3 class="heading">Post Populer</h3>
					<div class="post-entry-sidebar">
						<ul>
							@foreach($data['popularPost'] as $popPost)
							<li>
								<a href="{{ url('blog/'.$popPost->id) }}">
									<img src="{{ asset('storage/'.$popPost->thumbnail) }}" alt="Image placeholder" class="mr-4">
									<div class="text">
										<h4>{{ $popPost->title }}</h4>
										<div class="post-meta">
											<span class="mr-2">
												@php
												echo date('j M Y', strtotime($popPost->updated_at)).' <i class="fa fa-eye"></i> '.$popPost->views;
												@endphp
											</span>
										</div>
									</div>
								</a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<!-- END sidebar-box -->
				<div class="sidebar-box">
					<h3 class="heading">Categories</h3>
					<ul class="categories">
						@foreach($data['categories'] as $categories)
						<li><a href="{{ url('blog/categories/'.$categories->id) }}">{{ $categories->categori }}<span>{{$categories->post}}</span></a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<!-- END sidebar -->
		</div>
	</div>
</section>
@endsection