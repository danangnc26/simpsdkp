@section('content')

<div class="row">
	<div class="col-md-6">		
		<div class="portlet box red">
				@include('page.admin.master.alat_tangkap.index')
		</div>
	</div>

	<div class="col-md-6">
		<div class="portlet box green">
				@include('page.admin.master.material.index')
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">		
		<div class="portlet box yellow">
				@include('page.admin.master.sarana.index')
		</div>
	</div>

	<div class="col-md-6">
		<div class="portlet box blue">
				@include('page.admin.master.negara.index')
		</div>
	</div>
</div>




<script type="text/javascript">
	$('#create-alat-tangkap, #create-material, #create-sarana, #create-negara').magnificPopup({
	  type: 'ajax'
	});
</script>
@stop