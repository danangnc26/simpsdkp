<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>SIMPSDKP</title>
	<style type="text/css">
	body{
		font-family: 'sans-serif';
	}
	h2.main-head{
		font-size: 17px;
		text-align: center;
	}
	h3.sub-head{
		font-size: 15px;
	}

	table{
		font-size: 12px;
		border-collapse: collapse;
		border: 1px solid #000;
		width: 100%;
	}
	tr, td, th{
		border: 1px solid #000;
	}
	thead th{
		background-color: #a0bef0;
		text-transform: uppercase;
	}
	tfoot th{
		background-color: #a0bef0;
	}

	table.statistik-kapal td{
		font-size: 12px;
	}

	table.all-ship td{
		font-size: 12px;
		padding: 5px;
	}
	table.persebaran1 td{
		font-size: 12px;
		padding: 5px;
	}
	table.persebaran2 td{
		font-size: 12px;
		padding: 5px;
	}
	.page-break {
	    page-break-after: always;
	}
	table.persebaran1 tr:last-child td {
	 	border-bottom: none;
	}
	table.persebaran2 tr:last-child {
	 	border-bottom: none;
	}

	</style>
</head>
<body>

	<h2 class="main-head">KINERJA PENGAWASAN SUMBER DAYA KELAUTAN DAN PERIKANAN</h2>
	<h3 class="sub-head">2.1 Peningkatan Sarana Dan Prasarana Pengawasan</h3>
	<h3 class="sub-head">2.1.1 Kapal Pengawas Perikanan</h3>
	<?php
	if(empty($data1)){

	}else{
		$d1 = [];
		foreach ($data1 as $key => $value1) {
			$d3_temp = [];
			$d5 = [];
									// $d2 = [];
			foreach ($value1->kapalpengawas as $value2) {
				$d5[] = $value2->panjang_loa;
				if($value1->id_type_kapal == $value2->id_type_kapal){
					$d3_temp[] = $value2->material->nama_material;
					$d2[] = ['nama_material' => $value2->material->nama_material, 'id_type_kapal' => $value2->id_type_kapal];
					$d2['nm'] = $value2->material->nama_material;

				}
			}
			$d3 = array_unique($d3_temp);
			$d4 = array_count_values($d3_temp);

			$d1[$value1->id_type_kapal] = ['nama_type_kapal' => $value1->nama_type_kapal, 'id_type_kapal' => $value1->id_type_kapal, 'nama_material' => $d3, 'jumlah_kapal' => $d4, 'ukuran' => $d5];
									// foreach ($d1 as $ky => $rn) {
									// 	$rn[$ky]['nama_material'] = $rn[$ky][0];
									// 	unset($rn[$ky][0]);
									// }
		}
	}
	?>
	<table class="statistik-kapal">
		<thead>
			<tr>
				<th width="20">NO.</th>
				<th>TYPE KAPAL</th>
				<th>MATERIAL</th>
				<th>UKURAN ( METER )</th>
				<th>JUMLAH ( UNIT )</th>
			</tr>
		</thead>
		<tbody>
			<!--  -->
			<?php $jml_kpl = []; ?>
			@if(empty($d1))
			@else
			<?php $n = 1; ?>
			@foreach($d1 as $key => $v1)
			<?php $n2 = $n++; ?>
			@if(count($v1['nama_material']) >= 1)

			@foreach($v1['nama_material'] as $m)
			<tr>
				<td align="center">{{$n2}}</td>
				<td >KP. {{$v1['nama_type_kapal']}}</td>
				<td>
					{{$m}}
				</td>
				<td align="center"><?php
					$fs = array_sum($v1['ukuran']);
					$dv = array_sum($v1['jumlah_kapal']);
					$fn = $fs / $dv;
					echo round($fn);
					?>
				</td>
				<td align="center">
					@foreach($v1['jumlah_kapal'] as $k => $j)
					@if($k == $m)
					<?php $jml_kpl[] = $j ?>
					{{$j}}
					@endif
					@endforeach
				</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td align="center">{{$n2}}</td>
				<td>KP. {{$v1['nama_type_kapal']}}</td>
				<td>
					-
				</td>
				<td align="center">-</td>
				<td align="center">
					-
				</td>
			</tr>
			@endif
			@endforeach
			@endif
			<!--  -->
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL</th>
				<th id="total">{{array_sum($jml_kpl)}}</th>
			</tr>
		</tfoot>
	</table>

<div class="page-break"></div>

	<h3 class="sub-head">DATA KAPAL</h3>
	<!-- DATA SEMUA KAPAL -->
	<table class="all-ship">
		<thead>
			<tr>
				<th width="20">NO.</th>
				<th colspan="2">NAMA KAPAL</th>
				<th>SPESIFIKASI</th>
			</tr>
		</thead>
		<tbody>
		@if(empty($data2))
		@else
		@foreach($data2 as $ki => $kapal)
			<tr>
				<td valign="top" align="center">{{$ki+1}}</td>
				<td width="150" valign="top" style="border-right:none">
					{{$kapal->nama_kapal_pengawas}}
				</td>
				<td width="150" valign="top" style="border-left:none">
					<img src="<?php echo public_path().'/uploaded_images/kapal_pengawas/'.$kapal->image; ?>" width="200">
				</td>
				<td valign="top">
					<ul style="padding-left:20px; margin-top:0px; font-size:0.9em">
						<li>
						Panjang (LOA) : {{$kapal->panjang_loa}} m
						</li>
						<li>
						Panjang antara (LBP) : {{$kapal->panjang_lbp}} m
						</li>
						<li>
						Lebar ( B ) : {{$kapal->lebar}} m
						</li>
						<li>
						Tinggi ( H ) : {{$kapal->tinggi}} m
						</li>
						@if($kapal->sarat != null)
						<li>
						Sarat ( T ) : {{$kapal->sarat}} m
						</li>
						@endif
						<li>
						Kecepatan Maks : {{$kapal->kecepatan_max}} knot
						</li>
						<li>
						Jumlah ABK : {{$kapal->jml_abk}} orang
						</li>
						<li>
						Material : {{$kapal->material->nama_material}}
						</li>
						<li>
							Daya Mesin :
							<ol style="padding-left:15px;">
								<li>
								Main Engine : {{$kapal->daya_mesin_1}} HP 
								</li>
								<li>
								Auxelary Engine : {{$kapal->daya_mesin_2}} HP
								</li>
							</ol>
						</li>
					</ul>
				</td>
			</tr>
		@endforeach
		@endif
		</tbody>
	</table>

<div class="page-break"></div>

	<h3 class="sub-head">Peta Sebaran Kapal Pengawas Perikanan</h3>
	<?php
		if(empty($data2)){

		}else{
			
			foreach ($data2 as $p1) {
				if($p1->nama_posisi != null){
					if($p1->kotaKapal->kotaProvinsi->wilayah == 'T'){
						$p_r[] = $p1->nama_posisi;			
					}
					if($p1->kotaKapal->kotaProvinsi->wilayah == 'B'){
						$p_l[] = $p1->nama_posisi;			
					}
				}
					$p_t[] = ['nama_kapal' => $p1->nama_kapal_pengawas, 'wilayah' => $p1->kotaKapal->kotaProvinsi->wilayah, 'posisi' => $p1->nama_posisi];
			}
			$q_r_t = array_unique($p_r);			
			$q_l_t = array_unique($p_l);
		}
	?>
	<img src="<?php echo public_path().'/uploaded_images'; ?>/staticmap.jpg" style="width:100%">
	<table class="persebaran">
		<thead>
			<tr>
				<th colspan="2">WILAYAH BARAT</th>
				<th colspan="2">WILAYAH TIMUR</th>
			</tr>
			<tr>
				<th>POSISI</th>
				<th>NAMA KAPAL</th>
				<th>POSISI</th>
				<th>NAMA KAPAL</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="2" style="padding:0px">
					<table class="persebaran1" border="0" style="border-left:none; border-bottom:none; border-right:none; border-top:none">
							@if(empty($data2))
							@else
							@foreach($q_l_t as $vp1)
							<tr>
								<td style="border-bottom:1px solid #000; border-right:1px solid #000" valign="top" style="border-left:none;">{{$vp1}}</td>
								<td style="border-bottom:1px solid #000">
									@foreach($p_t as $k_l)
										@if($k_l['posisi'] == $vp1)
											<ul style="padding-left:20px; margin-top:0px; font-size:0.8em">
												<li>KP. {{$k_l['nama_kapal']}}</li>
											</ul>
										@endif
									@endforeach
								</td>
							</tr>
							@endforeach
							@endif
					</table>		
				</td>
				<td class="persebaran2" colspan="2" style="padding:0px">
					<table border="0" style="border-left:none; border-bottom:none; border-right:none; border-top:none">
							@if(empty($data2))
							@else
							@foreach($q_r_t as $vp2)
							<tr>
								<td valign="top" style="border-bottom:1px solid #000; border-right:1px solid #000">{{$vp2}}</td>
								<td style="border-bottom:1px solid #000">
									@foreach($p_t as $k_r)
										@if($k_r['posisi'] == $vp2)
											<ul style="padding-left:20px; margin-top:0px; font-size:0.8em">
												<li>KP. {{$k_r['nama_kapal']}}</li>
											</ul>
										@endif
									@endforeach
								</td>
							</tr>
							@endforeach
							@endif
					</table>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>