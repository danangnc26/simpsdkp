<!--BEGIN TABS-->
	<div class="portlet-title tabbable-line">
		<div class="caption caption-md">
			<i class="icon-globe theme-font-color hide"></i>
				<!-- <span class="caption-subject theme-font-color bold uppercase">Feeds</span> -->
		</div>
		<ul class="nav nav-tabs">
			<li class="active">
				<a id="tb_sarana" href="#tab_1_3" data-toggle="tab">
					<i class="fa fa-laptop"></i>
					Sarana
				</a>
			</li>
			<li>
				<a id="tb_speedboat" href="#tab_1_4" data-toggle="tab">
					<i class="fa fa-ship"></i>
					Speedboat
				</a>
			</li>
			<li>
				<a id="tb_kapal_pengawas" href="#tab_1_5" data-toggle="tab">
					<i class="fa fa-ship"></i>
					Kapal Pengawas
				</a>
			</li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="tab_1_3">
			<div id="sarana">
				Loading
			</div>
		</div>
		<div class="tab-pane" id="tab_1_4">
			<div id="speedboat">
				Loading
			</div>
		</div>
		<div class="tab-pane" id="tab_1_5">
			<div id="kapal_pengawas">
				Loading
			</div>
		</div>
	</div>
	<!--END TABS-->
</div>
<script type="text/javascript">
	$(".ubah-pos").magnificPopup({
		type: "ajax"
	});
	$(document).ready(function(){
		$("#sarana").load("{{route('admin.upt.sarana.table', 'id_upt='.Request::get('id_upt'))}}");
	});
	$('#tb_sarana').click(function(){
		$("#sarana").load("{{route('admin.upt.sarana.table', 'id_upt='.Request::get('id_upt'))}}");
		$("#satker").empty();
		$("#pos").empty();
		$("#speedboat").empty();
		$("#kapal_pengawas").empty();
	});
	$('#tb_speedboat').click(function(){
		$("#speedboat").load("{{route('admin.upt.speedboat.table', 'id_upt='.Request::get('id_upt'))}}");
		$("#satker").empty();
		$("#pos").empty();
		$("#sarana").empty();
		$("#kapal_pengawas").empty();
	});
	$('#tb_kapal_pengawas').click(function(){
		$("#kapal_pengawas").load("{{route('admin.upt.kapal_pengawas.table', 'id_upt='.Request::get('id_upt'))}}");
		$("#satker").empty();
		$("#pos").empty();
		$("#sarana").empty();
		$("#speedboat").empty();
	});
</script>