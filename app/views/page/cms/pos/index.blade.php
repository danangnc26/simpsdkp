@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Pos</span>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-12">
				<style type="text/css">
				.table-scrollable{
					border:none;
					/*border-color: #fff;*/
				}
				</style>
				<a href="{{route('admin.cms.post.create')}}">
					<button type="button" class="btn green">
						<i class="fa fa-plus"></i> Buat Baru
					</button>
				</a>
				<br>
				<br>
				{{ Datatable::table()
				->setId('tbl_post')
				->setClass('table table-striped table-hover')
			    ->addColumn('<input type="checkbox" value="1" name="post_check[]"/>', 'Judul',  'Author', 'Kategori', 'Label', 'Tanggal')
			    ->setOptions(
					array(
						'aoColumns' => 
							array(
								array('bSortable' => false, 'width' => 10), 
								null, 
								null, 
								array('bSortable' => false, 'width' => '14%'), 
								array('bSortable' => false, 'width' => '16%'), 
								array('bSortable' => false, 'width' => '13%'), 
							),
							'order' => 
								array(
									array(1, 'asc')
							    ),
							'lengthMenu' =>
								array(
									array(10, 50, 100, -1),
									array(10, 50, 100, 'All')
								)
					)
				)
				->setCallbacks(
					'fnDrawCallback', 'function ( oSettings ) {
						cst_tooltip();
						Metronic.init();

						$( "tbody tr" ).hover(
						 function() {
						    $(this).find("div.mn").show();
						  }, function() {
						    $(this).find("div.mn").hide();
						  }
						);

					}'
				)
			    ->setUrl(route('admin.cms.post.api.all'))
			    ->render() }}
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
			
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function hapus(a, b, c){
		if(confirm(b)){
			$.get(c + a, function(d){
				tbl_post.fnReloadAjax();
				alert(d.msg);
			});
		}
	}
</script>
@stop