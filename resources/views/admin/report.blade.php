@extends('admin.menus')
@section('report')
@php

$title = 'Reports';
$menu = \App\menu::where('link', request()->path())->first();

@endphp
<div class="col-12 ml-auto pt-5">

  @if($errors->any())
  <div class="alert alert-danger" role="alert">
    Input anda tidak memenuhi validasi kami <strong>Harap ulangi aksi tadi, dan input kebali</strong>
  </div>
  @endif
  @if(session('response'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {!!session('response')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {!!session('success')!!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  <div class="card mb-3">
    <div class="card-header">
      {!!$menu->icon!!}
      {{$menu->menu}}
    </div>
    <div class="card-body">
      <div style="min-width: 600px; max-height: 100%; overflow: hidden;">
        <canvas id="canvas"></canvas>
      </div>
      
      <div class="row">
        <div class="col-lg-6 cl-md-12"><button class="btn btn-primary mt-3" style="width: 100%">Total Views: <span class="badge badge-danger">{{ $data['totalViews'] }}</span></button></div>
        <div class="col-lg-6 cl-md-12"><button class="btn btn-primary mt-3" style="width: 100%">Total Post: <span class="badge badge-danger">{{ $data['totalPost'] }}</span></button></div>
      </div>  
      
    </div>
  <div class="card-footer small text-muted">Copyright &copy; 2020 Muhamad fajar anggara </div>
</div>
<script>
var config = {
  type: 'line',
  data: {
    labels: [
      '<?= date('D', mktime(0,0,0, date('m'),date('d')-6,date('Y'))) ?>', 
      '<?= date('D', mktime(0,0,0, date('m'),date('d')-5,date('Y'))) ?>', 
      '<?= date('D', mktime(0,0,0, date('m'),date('d')-4,date('Y'))) ?>', 
      '<?= date('D', mktime(0,0,0, date('m'),date('d')-3,date('Y'))) ?>', 
      '<?= date('D', mktime(0,0,0, date('m'),date('d')-2,date('Y'))) ?>', 
      '<?= date('D', mktime(0,0,0, date('m'),date('d')-1,date('Y'))) ?>', 
      'Today'
    ],
    datasets: [{
      label: 'Views',
      borderColor: window.chartColors.red,
      backgroundColor: window.chartColors.blue,
      data: [
        @foreach($data['r'] as $r)
        <?= $r ?>,
        @endforeach
      ],
    }]
  },
  options: {
    responsive: true,
    title: {
      display: true,
      text: 'Views baru baru ini'
    },
    tooltips: {
      mode: 'index',
    },
    hover: {
      mode: 'index'
    },
    scales: {
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Hari'
        }
      }],
      yAxes: [{
        stacked: true,
        scaleLabel: {
          display: true,
          labelString: 'Jumlah Views'
        }
      }]
    }
  }
};
window.onload = function() {
var ctx = document.getElementById('canvas').getContext('2d');
window.myLine = new Chart(ctx, config);
};
</script>
@endsection