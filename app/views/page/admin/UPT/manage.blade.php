@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Kelola {{(Lib::uRole() == null) ? 'UPT' : Lib::uRole()}}</span>
		</div>
	</div>
	<div class="portlet-body">
	<style type="text/css">
		table.cst{
			font-size: 1.12em;
		}
		table.cst td,th{
			padding-right: 10px;
			padding-top: 10px;
		}
		img.t_img{
			border: 1px solid #606060;
			border-radius: 3px;
		}
	</style>
	@if(Lib::uRole() == 'upt')
		@include('page.admin.UPT.pg.upt',['data' => $data])
		@include('page.admin.UPT.pg.tab.upt')
	@elseif(Lib::uRole() == 'satker')
		@include('page.admin.UPT.pg.satker',['data' => $data])
		@include('page.admin.UPT.pg.tab.satker')
	@elseif(Lib::uRole() == 'pos')
		@include('page.admin.UPT.pg.pos',['data' => $data])
		@include('page.admin.UPT.pg.tab.pos')
	@else
		@include('page.admin.UPT.pg.upt',['data' => $data])
		@include('page.admin.UPT.pg.tab.upt')
	@endif
	
@stop