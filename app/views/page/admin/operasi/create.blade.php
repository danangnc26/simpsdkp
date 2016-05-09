@section('content')

<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-cogs font-green-sharp"></i>
			<span class="caption-subject font-green-sharp bold uppercase">Input Data Pelanggaran</span>
		</div>
	</div>
	<div class="portlet-body">
	<?php
$input = "[mod id=256]";
preg_match('~id=(.*?)]~', $input, $output);
var_dump($output);


$text = '[This] is a [test] string, [eat] my [shorts].';
// preg_match_all("/\[[^\]]*\]/", $text, $matches);
// var_dump($matches[0]);

preg_match_all("/".parse_shortcode(true)."/", $input, $matches);
var_dump($matches[1]);

preg_match('/mod\s+/', "mod id=256", $output2);
var_dump($output2[0]);
$row = preg_replace('/ .*$/', "", $output2[0]);
var_dump($row);
function parse_shortcode($bracket = false, $opt = null)
{
	$reg = "\[([^\]]*)\]";
	return $reg;
}
// echo reg();
// function reg(){
// 	// . "($tagregexp)"                     // 2: Shortcode name

// 	return
//           '\\['                              // Opening bracket
//         . '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
//         . '(?![\\w-])'                       // Not followed by word character or hyphen
//         . '('                                // 3: Unroll the loop: Inside the opening shortcode tag
//         .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
//         .     '(?:'
//         .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
//         .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
//         .     ')*?'
//         . ')'
//         . '(?:'
//         .     '(\\/)'                        // 4: Self closing tag ...
//         .     '\\]'                          // ... and closing bracket
//         . '|'
//         .     '\\]'                          // Closing bracket
//         .     '(?:'
//         .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
//         .             '[^\\[]*+'             // Not an opening bracket
//         .             '(?:'
//         .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
//         .                 '[^\\[]*+'         // Not an opening bracket
//         .             ')*+'
//         .         ')'
//         .         '\\[\\/\\2\\]'             // Closing shortcode tag
//         .     ')?'
//         . ')'
//         . '(\\]?)'; 
// }



// $input = "[mod id=256]";
// preg_match('/\modid.*=.(.*).\]/', $input, $output);
// var_dump($output);
// // $input = 'Fname Lname[fname@urmail.com]';
// // preg_match('~[(.*?)>]~', $input, $output);
// // var_dump($output);
?>
				{{Form::open(['route' => 'admin.operasi.save', 'id' => 'saveOperasi', 'files' => true, 'method' => 'post'])}}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<!-- <label>Pangkalan Kapal: </label> -->
								</div>
								<div class="col-md-4">
									<label>
									<input type="radio" id="upt" name="opt_pangkalan" value="u"> UPT
									</label>		
								</div>
								<div class="col-md-4">
									<label>
									<input type="radio" id="satker" name="opt_pangkalan" value="s"> Satker
									</label>	
								</div>
								<div class="col-md-4">
									<label>
									<input type="radio" id="pos" name="opt_pangkalan" value="p"> Pos
									</label>	
								</div>
								
								<div class="col-md-12" id="upt_select" style="display:none; margin-top:10px;">
									{{Form::select('upt', Lib::getListUPT(), null, ['id' => 'upt', 'class' => 'form-control select2me'])}}
								</div>
								<div class="col-md-12" id="satker_select" style="display:none; margin-top:10px;">
									{{Form::select('satker', Lib::getListSatker(), null, ['id' => 'satker', 'class' => 'form-control select2me'])}}
								</div>
								<div class="col-md-12" id="pos_select" style="display:none; margin-top:10px;">
									{{Form::select('pos', Lib::getListPos(), null, ['id' => 'pos', 'class' => 'form-control select2me'])}}
								</div>
							</div>
							
						</div>
						<script type="text/javascript">
						$('input[name=opt_pangkalan]').change(function(){
							if($(this).val() == 'u'){
								$('#upt_select').show();
								$('#satker_select').hide();
								$('#pos_select').hide();
							}
							if($(this).val() == 's'){
								$('#satker_select').show();
								$('#upt_select').hide();
								$('#pos_select').hide();
							}
							if($(this).val() == 'p'){
								$('#pos_select').show();
								$('#upt_select').hide();
								$('#satker_select').hide();
							}
						});
						</script>
						<div class="form-group">
							<label>Tanggal : </label>
							<div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
							{{Form::text('tanggal', null, ['id' => 'tanggal', 'class' => 'form-control', 'form-control', 'readonly' => '', 'required' => '', 'placeholder' => 'Tanggal Pelaksanaan'])}}
							<span class="input-group-btn">
							<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
							</span>
							</div>
						</div>	
						<div class="form-group">
							<label>Status : </label><br>
							<div class="row">
								<div class="col-md-3">
								<label>
								<input type="radio" id="riksa" name="status" value="R"> Riksa
								</label>
								</div>
								<div class="col-md-3">
									<label>
									<input type="radio" id="tangkap" name="status" value="T"> Tangkap
									</label>	
								</div>
							</div>
						</div>
						<div class="form-group" id="tindakan_dr" style="display:none">
							<label>Rincian Tangkap : </label>
							{{Form::select('tindakan', ['' => '-- Pilih Rincian Tangkap --', 'AD' => 'Adhock / Kawal', 'TE' => 'Tenggelam', 'DI' => 'Dipulangkan'], null, ['id' => 'tindakan', 'class' => 'form-control select2me'])}}
						</div>

					</div>
					<div class="col-md-6">
						
						<div class="form-group">
							<label>Foto Kapal : </label>
							{{Form::file('foto_kapal', ['id' => 'foto_kapal', 'class' => 'form-control', 'required' => ''])}}<br>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>Nama Kapal ( Ukuran / GT ) : </label>
								</div>
								<div class="col-md-8">
									{{Form::text('nama_kapal', null, ['id' => 'nama_kapal', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Kapal', 'required' => ''])}}	
								</div>
								<div class="col-md-4">
									{{Form::text('ukuran_kapal', null, ['id' => 'ukuran_kapal', 'class' => 'form-control', 'placeholder' => 'Ukuran Kapal', 'required' => ''])}}	
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Kewarganegaraan / Kebangsaan / Bendera Kapal: </label>
							{{Form::select('bendera_negara', Lib::getListNegara(), null, ['id' => 'bendera_negara', 'class' => 'form-control select2me bendera_kapal_z', 'required' => ''])}}
						</div>
						<div class="tangkap" style="display:none">
							<div class="form-group">
								<label>Nama Tersangka : </label>
								{{Form::text('tersangka', null, ['id' => 'tersangka', 'class' => 'form-control', 'placeholder' => 'Tulis Nama Tersangka', 'required' => ''])}}
							</div>
							<div class="form-group">
								<label>Jumlah Awak Kapal : </label>
								{{Form::text('jumlah_awak', null, ['id' => 'jumlah_awak', 'class' => 'form-control', 'placeholder' => 'Tulis Jumlah Awak Kapal', 'required' => '', 'min' => '0'])}}
							</div>
							<div class="form-group">
								<label>Proses Hukum Saat Ini : </label>
								{{Form::text('proses_hukum', null, ['id' => 'proses_hukum', 'class' => 'form-control', 'placeholder' => 'Tulis Proses Hukum', 'required' => ''])}}
							</div>
							<div class="form-group">
								<label>Pelanggaran : </label>
								{{Form::text('pelanggaran', null, ['id' => 'pelanggaran', 'class' => 'form-control', 'placeholder' => 'Tulis Pelanggaran', 'required' => ''])}}
							</div>
							<div class="form-group">
								<label>Keterangan Pelanggaran : </label>
								{{Form::textarea('keterangan_pelanggaran', null, ['id' => 'keterangan_pelanggaran', 'class' => 'form-control', 'placeholder' => 'Tulis Keterangan Pelanggaran', 'required' => '','rows' => 4])}}
							</div>	

									
							
								
							<div class="form-group opt_tenggelam" style="display:none">
								<label>Pelaksana Penenggelaman: </label>
								{{Form::select('pelaksana_penenggelaman', ['' => '-- Pilih Pelaksana Penenggelaman --','TNI AL' => 'TNI AL', 'KKP' => 'KKP'], null, ['id' => 'pelaksana_penenggelaman', 'class' => 'form-control select2me', 'required' => ''])}}
							</div>	
						</div>					
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					<hr>
							<button class="btn green">
								<i class="fa fa-save"></i> Simpan 
							</button> 
							<a href="#">
								<button type="button" class="btn red">
									<i class="fa fa-close"></i> Kembali 
								</button> 
							</a>
							<button type="button" class="btn yellow" id="resetForm">
								<i class="fa fa-refresh"></i> Reset Form 
							</button>
					</div>
				</div>
				{{Form::close()}}						
		</div>
	</div>
	<!--END TABS-->
	</div>
</div>
<script type="text/javascript">
	$('select#tindakan').change(function(){
		if($('select#tindakan :selected').val() == 'TE'){
			$('.opt_tenggelam').show();
		}else{
			$('.opt_tenggelam').hide();
		}
	})

	$('#resetForm').click(function(){
            $('#saveOperasi')[0].reset();
            $('#tindakan_dr').hide();
            // $('input').filter(':radio').prop('checked', false);
            $('div.radio span').attr('class', '');
	});
	$('input[name=status]').change(function(){
		// if()
		if($(this).val() == 'T'){
			$('#tindakan_dr').show();
			$('.tangkap').show();
			$('select#tindakan').attr('required', '');
		}else{
			$('#tindakan_dr').hide();
			$('.tangkap').hide();
			$('select#tindakan').removeAttr('required');
		}
	});
	
	$('#saveOperasi').submit(function(event){
		event.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			type:'POST',
			url: $(this).attr('action'),
			data:formData,
			cache:false,
			contentType: false,
			processData: false,
			success:function(d){
					alert(d.msg);
					location.replace(d.url);
				// if(d.next == false){
				// 	alert(d.msg);
				// 	location.replace(d.url);
				// }else{
				// 	if(confirm(d.msg+' , Apakah anda ingin melanjutkan ke input data pelanggaran?')){
				// 		$('li#li_operasi').removeClass('active');
				// 		$('li#li_pelanggaran').addClass('active');
				// 		$('div#tb_pelanggaran').addClass('active');
				// 		$('div#tb_operasi').removeClass('active');	
				// 	}else{
				// 		location.replace(d.url);
				// 	}
					
				// }
			},
			error: function(data){
				// console.log("error");
			                // console.log(data);
			}
		});
	});

	
</script>
<!-- <div class="form-group">
							<label>Barang Bukti : </label>
							<div class="tes_bukti">
								<div class="row">
									<div class="col-md-6" style="padding-right:0px;">
										{{--Form::select('barang_bukti', Lib::getListAlatTangkap(),null, ['class' => 'form-control', 'id' => 'barang_bukti'])--}}
									</div>
									<div class="col-md-4" style="padding-right:0px;">
										{{--Form::number('jumlah_barang_bukti', null, ['class' => 'form-control', 'id' => 'jumlah_barang_bukti', 'min' => '0', 'placeholder' => 'Jumlah'])--}}
									</div>
									<div class="col-md-2" >
										<button class="btn btn-default">
										<i class="fa fa-remove"></i> 
										</button> 
									</div>
								</div>
							</div>
							<div class="tes"></div>
						</div>	
						<div class="form-group">
							<button id="tambah_bukti" class="btn blue">
									<i class="fa fa-plus"></i> Tambah Barang Bukti 
							</button> 
						</div> -->
						<script type="text/javascript">
							// $('#tambah_bukti').click(function(){
							// 	var a = '<div class="row" style="margin-top:5px;"><div class="col-md-6" style="padding-right:0px;">{{Form::select('barang_bukti', Lib::getListAlatTangkap(),null, ['class' => 'form-control', 'id' => 'barang_bukti'])}}</div><div class="col-md-4" style="padding-right:0px;"><input class="form-control" id="jumlah_barang_bukti" min="0" placeholder="Jumlah" name="jumlah_barang_bukti" type="number"></div><div class="col-md-2" ><button class="btn btn-default"><i class="fa fa-remove"></i> </button> </div></div>';
							// 	$('.tes').append(a);
							// });
						</script>
@stop