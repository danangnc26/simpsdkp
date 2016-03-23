@section('content')
<style type="text/css">
/*	#chartPie {
  width: 100%;
  height: 500px;
  font-size: 11px;
}

.amcharts-pie-slice {
  transform: scale(1);
  transform-origin: 50% 50%;
  transition-duration: 0.3s;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  cursor: pointer;
  box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
  transform: scale(1.1);
  filter: url(#shadow);
}		*/					
</style>

<!-- BEGIN PAGE CONTENT INNER -->
<div class="row margin-top-10">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-green-sharp">{{Lib::getJumlah('speedboat')}}</h3>
					<small>Speedboat</small>
				</div>
				<div class="icon">
					<i class="fa fa-ship"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-red-haze">{{Lib::getJumlah('kapal_pengawas')}}</h3>
					<small>Kapal Pengawas</small>
				</div>
				<div class="icon">
					<i class="fa fa-ship"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-blue-sharp">{{Lib::getJumlah('upt')}}</h3>
					<small>UPT</small>
				</div>
				<div class="icon">
					<i class="fa fa-home"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-purple-soft">{{Lib::getJumlah('satker')}}</h3>
					<small>Satker</small>
				</div>
				<div class="icon">
					<i class="fa fa-home"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat2">
			<div class="display">
				<div class="number">
					<h3 class="font-purple-soft">{{Lib::getJumlah('pos')}}</h3>
					<small>Pos</small>
				</div>
				<div class="icon">
					<i class="fa fa-home"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-sm-6">
		<div class="portlet light">
			<div class="portlet-title tabbable-line">
				<div class="caption caption-md">
					<i class="icon-globe theme-font-color hide"></i>
					<span class="caption-subject theme-font-color bold uppercase">Grafik Operasi & Pelanggaran</span>
				</div>
			</div>
			<div class="portlet-body">
				<div id="graf-bar"></div>
			</div>		
		</div>
	</div>
	<div class="col-md-6 col-sm-6">
		<div class="portlet light">
			<div class="portlet-title tabbable-line">
				<div class="caption caption-md">
					<i class="icon-globe theme-font-color hide"></i>
					<span class="caption-subject theme-font-color bold uppercase">Grafik Kapal yang di adhock</span>
				</div>
			</div>
			<div class="portlet-body">
				<div id="graf-pie"></div>				
			</div>		
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title tabbable-line">
				<div class="caption caption-md">
					<i class="icon-globe theme-font-color hide"></i>
					<span class="caption-subject theme-font-color bold uppercase">Pemetaan UPT, Satker & Pos</span>
				</div>
			</div>
			<div class="portlet-body">
							
			</div>		
		</div>
	</div>	
</div>
			<!-- END PAGE CONTENT INNER -->

<script type="text/javascript">
    $(document).ready(function(){
    	$('#graf-bar').load("{{route('admin.grafik.bar')}}");
    	$('#graf-pie').load("{{route('admin.grafik.pie')}}");
    });
</script>

@stop