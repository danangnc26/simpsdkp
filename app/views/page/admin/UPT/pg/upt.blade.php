@if(empty($data))
	@else
	@foreach($data as $value)
		<div class="row">
			<div class="col-md-6">
				<img class="t_img" src="{{asset('uploaded_images/upt/'.$value->image)}}" style="width:100%;">
			</div>
			<div class="col-md-6">
				<a href="{{route('admin.upt.edit', 'id_upt='.Request::get('id_upt'))}}" class="btn btn-sm green pull-right">
						<i class="fa fa-edit"></i> Edit Data UPT
				</a>
				<table class="cst" border="0" width="100%">
					<tr>
						<th>Nama UPT</th>
						<td>:</td>
						<td>
							{{$value->nama_upt}}
						</td>
					</tr>
					<tr>
						<th>Kepala UPT</th>
						<td>:</td>
						<td>
							{{$value->kepala_pangkalan}}
						</td>
					</tr>
					<tr>
						<th>No. Telp</th>
						<td>:</td>
						<td>
							{{$value->no_telp}}
						</td>
					</tr>
					<tr>
						<th>E-mail</th>
						<td>:</td>
						<td>
							{{$value->email}}
						</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>:</td>
						<td>
							{{$value->alamat}}
						</td>
					</tr>
					<tr>
						<th>Kota</th>
						<td>:</td>
						<td>
							{{$value->kotaUPT->nama_kota}}
						</td>
					</tr>
					<tr>
						<th>Provinsi</th>
						<td>:</td>
						<td>
							{{$value->kotaUPT->kotaProvinsi->nama_provinsi}}
						</td>
					</tr>
				</table>
				<div class="row">
					<div class="top-news col-md-5">
					<a href="javascript:;" class="btn red">
					<span>
					SDM </span>
					<em>Jumlah PPNS : 10 Orang</em>
					
					<i class="fa fa-users top-news-icon"></i>
					</a>
				</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endif