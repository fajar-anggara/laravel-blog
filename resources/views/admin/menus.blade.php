@extends('admin.template')
@section('menu')
<div class="col-lg-2 col-md-5 col-sm-12 p-0" style="position: absolute; z-index: 1000">
	<div class="collapse" id="collapseExample">
		<ul class="list-group">
			@foreach($data['menu'] as $menu)
				@if(session('role') == 2)
					@if(request()->is($menu->link))
					<li class="list-group-item active">
						<a class="text-light" href="{{ url($menu->link) }}">
					@else
					<li class="list-group-item">
						<a href="{{ url($menu->link) }}">
					@endif
							{!!$menu->icon!!} {{$menu->menu}}
						</a>
					</li>
				@elseif(session('role') == 1)
					@if($menu->role == 2)

					@elseif($menu->role == 1)
						@if(request()->is($menu->link))
						<li class="list-group-item active">
							<a class="text-light" href="{{ url($menu->link) }}">
						@else
						<li class="list-group-item">
							<a href="{{ url($menu->link) }}">
						@endif
								{!!$menu->icon!!} {{$menu->menu}}
							</a>
						</li>
					@endif
				@endif
			@endforeach
			@if(session('role') == 2)
				@if(request()->is('admin/menu'))
				<li class="list-group-item active">
					<a class="text-light" href="{{url('admin/menu')}}"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
				@else
				<li class="list-group-item">
					<a href="{{url('admin/menu')}}"><i class="fa fa-bars" aria-hidden="true"></i> Menu</a>
				@endif
				</li>
			@else @endif
		</ul>
	</div>
</div>
@endsection