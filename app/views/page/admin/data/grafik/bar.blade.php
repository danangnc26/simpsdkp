<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<div class="col-md-12" style="padding:0px;">
				<label>Tampilkan data dari tahun : </label>
			</div>
			<div class="col-md-3" style="padding:0px;">
				{{Form::select('tahun_awal', Lib::listTahun(), Carbon::now()->year - 6, ['id' => 'tahun_awal', 'class' => 'form-control'])}}	
			</div>
			<div class="col-md-1" style="text-align:center; font-size:1.5em; font-weight:bold">
				-
			</div>
			<div class="col-md-3" style="padding:0px;">
				{{Form::select('tahun_akhir', Lib::listTahun(), Carbon::now()->year, ['id' => 'tahun_akhir', 'class' => 'form-control'])}}	
			</div>
			<div class="col-md-3">
				<button class="btn green" id="tampil_bar">
					<i class="fa fa-eye"></i> Tampilkan
				</button>
			</div>
		</div>
	</div>
</div>

<hr>

<div id="chartBar" class="chart" style="height: 500px;"></div>
<script type="text/javascript">
$(document).ready(function(){
	diBar({{Carbon::now()->year - 6}},{{Carbon::now()->year}});
});
$('#tampil_bar').click(function(){
	var t_awal = $('select#tahun_awal').val(),
		t_akhir = $('select#tahun_akhir').val();

	diBar(t_awal, t_akhir);
});

function diBar(t_awal, t_akhir){
	// BAR
	$.getJSON('{{route('admin.grafik.bar.api')}}?tahun_awal=' + t_awal + '&tahun_akhir=' + t_akhir, function(data){


		var chart = AmCharts.makeChart( "chartBar", {
		  "type": "serial",
		  "addClassNames": true,
		  "theme": "light",
		  "autoMargins": false,
		  "marginLeft": 30,
		  "marginRight": 8,
		  "marginTop": 10,
		  "marginBottom": 26,
		  "balloon": {
		    "adjustBorderColor": false,
		    "horizontalPadding": 10,
		    "verticalPadding": 8,
		    "color": "#ffffff"
		  },

		  "dataProvider": data,
		  "valueAxes": [ {
		    "axisAlpha": 0,
		    "position": "left"
		  } ],
		  "startDuration": 1,
		  "graphs": [ {
		    "alphaField": "alpha",
		    "balloonText": "<span style='font-size:12px;'>[[title]] di tahun [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
		    "fillAlphas": 1,
		    "title": "Operasi",
		    "type": "column",
		    "valueField": "operasi",
		    "dashLengthField": "dashLengthColumn"
		  }, {
		    "id": "graph2",
		    "balloonText": "<span style='font-size:12px;'>[[title]] di tahun [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
		    "bullet": "round",
		    "lineThickness": 3,
		    "bulletSize": 7,
		    "bulletBorderAlpha": 1,
		    "bulletColor": "#FFFFFF",
		    "useLineColorForBulletBorder": true,
		    "bulletBorderThickness": 3,
		    "fillAlphas": 0,
		    "lineAlpha": 1,
		    "title": "Pelanggaran",
		    "valueField": "pelanggaran",
		    "dashLengthField": "dashLengthLine"
		  } ],
		  "categoryField": "tahun",
		  "categoryAxis": {
		    "gridPosition": "start",
		    "axisAlpha": 0,
		    "tickLength": 0
		  },
		  "export": {
		    "enabled": true
		  }
		} );
	});
}


</script>
<!-- "dataProvider": [ {
	    "year": 2009,
	    "operasi": 0,
	    "pelanggaran":0
	  }, {
	    "year": 2010,
	    "operasi": 0,
	    "pelanggaran":0
	  }, {
	    "year": 2011,
	    "operasi": 0,
	    "pelanggaran":0
	  }, {
	    "year": 2012,
	    "operasi": 0,
	    "pelanggaran":0
	  }, {
	    "year": 2013,
	    "operasi": 0,
	    "pelanggaran": 0,
	    "dashLengthLine": 0
	  }, {
	    "year": 2014,
	    "operasi": 34.1,
	    "pelanggaran": 0,
	    "dashLengthColumn": 0,
	    "alpha": 0.2,
	    "additional": "(projection)"
	  } ],
	  "valueAxes": [ {
	    "axisAlpha": 0,
	    "position": "left"
	  } ], -->