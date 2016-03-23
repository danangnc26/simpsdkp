@if(empty($data))
	@else
	@foreach($data as $value)
		<div class="row">
			<div class="col-md-6">
				<img class="t_img" src="{{$value->image}}" style="width:100%;">
			</div>
			<div class="col-md-6">
				<a href="{{route('admin.upt.satker.edit', 'id_upt='.Request::get('id_upt'))}}" class="btn btn-sm green pull-right ubah-satker">
						<i class="fa fa-edit"></i> Edit Data Satker
				</a>
				<table class="cst" border="0" width="100%">
					<tr>
						<th>Nama Satker</th>
						<td>:</td>
						<td>
							{{$value->nama_satker}}
						</td>
					</tr>
					<tr>
						<th>Kepala Satker</th>
						<td>:</td>
						<td>
							{{$value->kepala_satker}}
						</td>
					</tr>
					<tr>
						<th>No. Telp</th>
						<td>:</td>
						<td>
							{{$value->no_telp_satker}}
						</td>
					</tr>
					<tr>
						<th>E-mail</th>
						<td>:</td>
						<td>
							{{$value->email_satker}}
						</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>:</td>
						<td>
							{{$value->alamat_satker}}
						</td>
					</tr>
					
				</table>
				
			</div>
		</div>
	</div>
	@endforeach
	@endif