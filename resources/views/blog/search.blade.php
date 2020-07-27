@extends('blog/template')
@section('search')
@php

$data['keyword'] = null;
$title = 'Cari';

@endphp
<section class="site-section pt-5">
	<div class="container">
		<div class="row mb-4">
			<div class="col-md-6">
				<h2 class="mb-4">Cari: @if($data['search'] == null) #{{$data['tags']}} @elseif($data['tags'] == null) {{$data['search']}} @endif</h2>
			</div>
		</div>
		<div class="row blog-entries">
			<div class="col-md-12 col-lg-8 main-content">
				<div class="row mb-5 mt-5">
					<div class="col-md-12">
						@foreach( $data['article'] as $article)
						<div class="post-entry-horzontal">
							<a href="{{ url('blog/'.$article->id)}}">
								<div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url({{asset('storage/'.$article->thumbnail)}});"></div>
								<span class="text">
									<div class="post-meta">
										<span class="author mr-2"><img src="{{ asset('storage/'.\App\user::where('id', \App\blog::where('id', $article->id)->first()->author)->first()->profil_image) }}" alt="Colorlib"> {{ \App\user::where('id', \App\blog::where('id', $article->id)->first()->author)->first()->name }}</span>&bullet;
										<span class="mr-2">
											{{ date('d M Y', strtotime($article->updated_at)) }}
										</span> &bullet;
										<span class="mr-2">{{ $title }}</span> &bullet;
										<span class="ml-2"><span class="fa fa-eye"></span> {{ $article->views }}</span>
									</div>
									<h2>{{ $article->title }}</h2>
								</span>
							</a>
						</div>
						@endforeach
					</div>
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
			</div>
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