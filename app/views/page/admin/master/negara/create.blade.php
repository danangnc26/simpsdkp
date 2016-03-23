<div class="ajax-text-and-image white-popup-block" style="width:500px;">
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 0em">
			<h3>Tambah Negara</h3>
			<hr>
			{{Form::open(['route' => 'admin.master.negara.save', 'files' => true , 'method' => 'post', 'id' => 'frm-create-negara'])}}
			<div class="form-group">
				<label>Nama negara : </label>
				{{Form::text('nama_negara', null, ['class' => 'form-control', 'id' => 'nama_negara', 'required' => ''])}}
			</div>
			<div class="form-group">
				<label>Bendera negara : </label>
				{{Form::file('bendera_negara', ['id' => 'bendera_negara', 'class' => 'form-control', 'required' => ''])}}
			</div>
			<div class="form-group">
				<button class="btn green"><i class="fa fa-save"></i> Simpan</button>
				<button type="button" onclick="$.magnificPopup.close()" class="btn red"><i class="fa fa-close"></i> Keluar</button>
			</div>
			{{Form::close()}}
			<script type="text/javascript">
				$('#frm-create-negara').submit(function(event){
					event.preventDefault();

					var formData = new FormData(this);

			        $.ajax({
			            type:'POST',
			            url: $(this).attr('action'),
			            data:formData,
			            cache:false,
			            contentType: false,
			            processData: false,
			            success:function(e){
			                 tbl_negara.fnReloadAjax();
							alert(e.msg);
							$.magnificPopup.close();
			            },
			            error: function(data){
			                console.log("error");
			                // console.log(data);
			            }
			        });
				});
			</script>
		</div>
	</div>
</div>