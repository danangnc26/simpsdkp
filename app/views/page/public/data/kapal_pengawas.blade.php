@section('content')
<!--========================================================
                              CONTENT
    =========================================================-->

    <main>
        <section class="well2 bg-alt">
            <div class="container">
                <div class="row">
                	<div class="col-md-8">
                		<div class="row">
                			<div class="col-md-12">
                				<h2>Data Kapal Pengawas</h2>
                				<small>
		 		                <a href="{{route('public.visitor.home')}}">Home</a>
		 		               	>> 
		 		               	<a href="#">Kategori</a>
		 		               	>> </small>
		 		            </div>
		 		        </div>
		 		        <div class="row">
                			<div class="col-md-12">
			                	<?php
										if(empty($data)){

										}else{
											$d1 = [];
											foreach ($data as $key => $value1) {
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
										// var_dump($d1);
										?>
										<style type="text/css">
										th{
											text-align: center;
										}
										</style>
										<table class="table table-bordered table-striped table-condensed flip-content">
										<tr>
											<th>No.</th>
											<th>Type Kapal</th>
											<th>Material</th>
											<th>Ukuran ( Meter )</th>
											<th>Unit</th>
										</tr>
										
										@if(empty($d1))
										@else
										<?php $n = 1; ?>
										@foreach($d1 as $key => $v1)
											<?php $n2 = $n++; ?>
											@if(count($v1['nama_material']) >= 1)
											
											@foreach($v1['nama_material'] as $m)
											<tr>
												<td >{{$n2}}</td>
												<td >
													<a href="#">
														{{$v1['nama_type_kapal']}}
													</a>
												</td>
												<td>
													{{$m}}
												</td>
												<td><?php
													$fs = array_sum($v1['ukuran']);
													$dv = array_sum($v1['jumlah_kapal']);
													$fn = $fs / $dv;
													echo round($fn);
													?>
												</td>
												<td name="ttl[]">
													@foreach($v1['jumlah_kapal'] as $k => $j)
													@if($k == $m)
													{{$j}}
													@endif
													@endforeach
												</td>
											</tr>
											@endforeach
											@else
											<tr>
												<td>{{$n2}}</td>
												<td>{{$v1['nama_type_kapal']}}</td>
												<td>
													-
												</td>
												<td></td>
												<td>
													-
												</td>
											</tr>
											@endif
										@endforeach
										@endif
										<tfoot>
											<tr>
												<th colspan="4">TOTAL</th>
												<th id="total"></th>
											</tr>
										</tfoot>
										</table>
										<script type="text/javascript">
										var a = $("td[name='ttl[]']").map(function(){return $(this).text();}).get();
										var sum = 0;
										$.each(a, function(index, value) {
											sum += Number(value);
										});
										$("th#total").text(sum);
									</script>
                			</div>
                		</div>
                	</div>
                	<div class="col-md-4" >
                		@include('page.public.addon.sidebar')
                	</div>
                </div>
            </div>
        </section>

        

    </main>

@stop