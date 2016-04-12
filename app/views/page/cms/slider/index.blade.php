@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Slider</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-12">
					<button id="create-slider" href="{{route('admin.cms.slider.create')}}" type="button" class="btn green">
						<i class="fa fa-plus"></i> Buat Baru
					</button>
			</div>
		</div>
		<br>
		<div class="row">			
			<!--  -->
			<div id="dis-img">
				<div class="load-an1"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><small>Processing...</small></div>
			</div>
			<!--  -->
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		loadContent();
	})
	$('#create-slider').magnificPopup({
	  type: 'ajax'
	});
	function loadContent(){
		$('#dis-img').load("{{route('admin.cms.slider.data')}}");	
	}
</script>

@stop