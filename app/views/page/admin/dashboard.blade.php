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
		<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
			<div class="visual">
				<i class="fa fa-ship"></i>
			</div>
			<div class="details">
				<div class="number">
					<span data-counter="counterup" data-value="1349">{{Lib::getJumlah('speedboat')}}</span>
				</div>
				<div class="desc"> Speedboat </div>
			</div>
		</a>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-v2 red" href="#">
			<div class="visual">
				<i class="fa fa-ship"></i>
			</div>
			<div class="details">
				<div class="number">
					<span data-counter="counterup" data-value="1349">{{Lib::getJumlah('kapal_pengawas')}}</span>
				</div>
				<div class="desc"> Kapal Pengawas </div>
			</div>
		</a>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-v2 green" href="#">
			<div class="visual">
				<i class="fa fa-home"></i>
			</div>
			<div class="details">
				<div class="number">
					<span data-counter="counterup" data-value="1349">{{Lib::getJumlah('upt')}}</span>
				</div>
				<div class="desc"> UPT </div>
			</div>
		</a>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-v2 purple" href="#">
			<div class="visual">
				<i class="fa fa-home"></i>
			</div>
			<div class="details">
				<div class="number">
					<span data-counter="counterup" data-value="1349">{{Lib::getJumlah('satker')}}</span>
				</div>
				<div class="desc"> Satker </div>
			</div>
		</a>
	</div>
	<!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
	</div> -->
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
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16342094.00398759!2d116.2875479870988!3d-0.28476132622620276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1458727941526" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>			
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