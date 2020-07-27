@extends('blog/template')
@section('blogContent')
@php

$article = $data['article'];
$categori = $data['categori'];
$author = $data['author'];
$title = $article->title;

@endphp
<section class="site-section py-lg">
	<div class="container">
		<div class="row blog-entries element-animate">
			<div class="col-md-12 col-lg-8 main-content">
				<img src="{{ asset('storage/'.$article->thumbnail) }}" alt="Image" class="img-fluid mb-5">
				<div class="post-meta">
					<span class="author mr-2"><img src="{{ asset('storage/'.$author->profil_image) }}" alt="Colorlib" class="mr-2"> {{$author->name}}</span>|
					<span class="mr-2">
						@php
						echo date('d M Y', strtotime($article->updated_at));
						@endphp
					</span>|
					<span class="ml-2">
						<span class="fa fa-eye"> {{ $article->views }}</span>
					</span>
				</div>
				<div class="mb-4"><h1>{{$article->title}}</h1></div>
				<a class="category mb-5" href="#">{{$categori->categori}}</a>
				<div class="post-content-body">
					{!!$article->body!!}
				</div>
				<div class="pt-5">
					<p>Kategori:  <a href="{{ url('blog/categories/'.$categori->id) }}"> {{$categori->categori}} </a></p>
					<p>Tags:
						@foreach($data['tags'] as $tag)
						<a href="{{ url('blog/search/'.$tag) }}" class="tags">#{{ $tag }}</a>
						@endforeach
					</p>
					
				</div>
			</div>
			@endsection
			
			@section('sidebar1')
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
				<div class="bio text-center">
					<img src="{{ asset('storage/'.$author->profil_image) }}" alt="Image Placeholder" class="img-fluid">
					<div class="bio-body">
						<h2>{{$author->name}}</h2>
						<p>{!!$author->description!!}</p>
						<p><a href="{{ url('about/person/'.$author->id) }}" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
						<p class="social">
							@if($author->facebook != null)
							<a href="{!! $author->facebook !!}"><span class="fa fa-facebook"></span></a>
							@endif
							@if($author->instagram != null)
							<a href="{!! $author->instagram !!}"><span class="fa fa-instagram"></span></a>
							@endif
							@if($author->twitter != null)
							<a href="{!! $author->twitter !!}"><span class="fa fa-twitter"></span></a>
							@endif
							@if($author->whatsapp != null)
							<a href="{!! $author->whatsapp !!}"><span class="fa fa-whatsapp"></span></a>
							@endif
							@if($author->github != null)
							<a href="{!! $author->github !!}"><span class="fa fa-github"></span></a>
							@endif
							@if($author->linkedin != null)
							<a href="{!! $author->linkedin !!}"><span class="fa fa-linkedin"></span></a>
							@endif
							@if($author->youtube != null)
							<a href="{!! $author->youtube !!}"><span class="fa fa-youtube"></span></a>
							@endif
							@if($author->owncv != null)
							<a href="{!! $author->owncv !!}"><span class="fa fa-link"></span></a>
							@endif
						</p>
					</div>
				</div>
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
			<!-- END sidebar-box -->
			<div class="sidebar-box">
				<h3 class="heading">Tags</h3>
				<ul class="tags">
					@foreach($data['tags'] as $tag)
					<li><a href="{{ url('blog/search/'.$tag) }}">{{$tag}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		<!-- END sidebar -->
	</div>
</div>
</section>
@endsection
@section('relatedPost')
<section class="py-5">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 class="mb-3 ">Related Post</h2>
		</div>
	</div>
	<div class="row">
		@foreach($data['relatedPost'] as $related)
		<div class="col-md-6 col-lg-4">
			<a href="{{ url('blog/'.$related->id)}}" class="a-block sm d-flex align-items-center height-md" style="background-image: url('{{ asset('storage/'.$related->thumbnail) }}'); ">
				<div class="text">
					<div class="post-meta">
						<span class="category">
							@php
							echo \App\categorie::where('id', \App\blog::where('id', $related->id)->first()->categories)->first()->categori;
							@endphp
						</span>
						<span class="mr-2">
							@php
							echo date('j-M-Y', strtotime($related->updated_at))
							@endphp
						</span> &bullet;
						<span class="ml-2"><span class="fa fa-eye"></span> {{ $related->views }}</span>
					</div>
					<h3>{{$related->title}}</h3>
				</div>
			</a>
		</div>
		@endforeach
	</div>
</div>
</section>
@endsection