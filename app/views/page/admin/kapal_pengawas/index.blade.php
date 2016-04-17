@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-ship font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Data Kapal</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-12">
				<!-- <a href="{{route('admin.upt.create')}}">
					<button type="button" class="btn green">
						<i class="fa fa-plus"></i> Tambah UPT Baru 
					</button>
				</a> -->
				<button id="input-kapal-pengawas" href="{{route('admin.upt.kapal_pengawas.input')}}" class="btn blue btn-sm"><i class="fa fa-plus"></i> Tambah Kapal Pengawas</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
					<!--BEGIN TABS-->
				<div class="portlet-title tabbable-line">
					<div class="caption caption-md">
						<i class="icon-globe theme-font-color hide"></i>
							<!-- <span class="caption-subject theme-font-color bold uppercase">Feeds</span> -->
					</div>
					<ul class="nav nav-tabs">
						<li class="active">
							<a id="tb_satker" href="#tab_1_1" data-toggle="tab">
								<i class="fa fa-home"></i>
								REKAP KAPAL
							</a>
						</li>
						<li>
							<a id="tb_satker" href="#tab_1_2" data-toggle="tab">
								<i class="fa fa-home"></i>
								DATA SEMUA KAPAL
							</a>
						</li>
						<li>
							<a id="tb_satker" href="#tab_1_3" data-toggle="tab">
								<i class="fa fa-home"></i>
								TYPE KAPAL
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1_1">
						<div id="satker" style="margin-top:20px;">
							
									<div class="load-an1"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><small>Processing...</small></div>
							
						</div>
					</div>
				</div>
				<!--END TABS-->
			</div>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#satker').load("{{route('admin.kapal_pengawas.rekap')}}");
				});
				// $('#tb_satker').click(function(){
				// 	$("#satker").load("{{route('admin.upt.satker.table', 'id_upt='.Request::get('id_upt'))}}");
				// 	$("#pos").empty();
				// 	$("#sarana").empty();
				// 	$("#speedboat").empty();
				// 	$("#kapal_pengawas").empty();
				// });
			</script>
		</div>
		</div>
	</div>
</div>
@stop