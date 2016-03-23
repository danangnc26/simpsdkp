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

<div id="chartPie" class="chart" style="height: 500px;"></div>
<script type="text/javascript">
	
	// PIE
	var chart = AmCharts.makeChart("chartPie", {
            "type": "pie",
            "theme": "light",

            "fontFamily": 'Open Sans',
            
            "color":    '#888',

            "dataProvider": [{
                "country": "Lithuania",
                "litres": 501.9
            }, {
                "country": "Czech Republic",
                "litres": 301.9
            }, {
                "country": "Ireland",
                "litres": 201.1
            }, {
                "country": "Germany",
                "litres": 165.8
            }, {
                "country": "Australia",
                "litres": 139.9
            }, {
                "country": "Austria",
                "litres": 128.3
            }, {
                "country": "UK",
                "litres": 99
            }, {
                "country": "Belgium",
                "litres": 60
            }, {
                "country": "The Netherlands",
                "litres": 50
            }],
            "valueField": "litres",
            "titleField": "country",
            
        });

        $('#chartPie').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
</script>