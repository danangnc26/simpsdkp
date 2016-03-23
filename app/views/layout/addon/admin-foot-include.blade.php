{{HTML::script('assets/global/scripts/custom.js')}}

{{--HTML::style('assets/global/plugins/datatables/media/css/jquery.dataTables.css')--}}
{{HTML::style('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
{{HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.js')}}
{{HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}
{{HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}
{{HTML::script('assets/global/plugins/datatables/media/js/fnReloadAjax.js')}}

<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{HTML::script('assets/global/plugins/jquery-ui/jquery-ui.min.js')}}
{{HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}
{{HTML::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}
{{HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js')}}
{{HTML::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
<!-- END CORE PLUGINS -->




{{HTML::script('assets/global/scripts/metronic.js')}}
{{HTML::script('assets/admin/layout4/scripts/layout.js')}}
{{HTML::script('assets/global/plugins/select2/select2.min.js')}}


{{HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}
{{HTML::script('assets/admin/pages/scripts/components-pickers.js')}}
{{HTML::script('assets/admin/pages/scripts/components-dropdowns.js')}}

{{HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}
{{HTML::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}



@if(Route::currentRouteName() == 'admin.dashboard')
<!-- CHART -->
{{HTML::script('assets/global/plugins/amcharts/amcharts/amcharts.js')}}
{{HTML::script('assets/global/plugins/amcharts/amcharts/serial.js')}}
{{HTML::script('assets/global/plugins/amcharts/amcharts/pie.js')}}
{{HTML::script('assets/global/plugins/amcharts/amcharts/themes/light.js')}}

{{--HTML::script('assets/global/plugins/amcharts/amcharts/radar.js')--}}
{{--HTML::script('assets/global/plugins/amcharts/amcharts/themes/patterns.js')--}}
{{--HTML::script('assets/global/plugins/amcharts/amcharts/themes/chalk.js')--}}
{{--HTML::script('assets/global/plugins/amcharts/ammap/ammap.js')--}}
{{--HTML::script('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')--}}
{{--HTML::script('assets/global/plugins/amcharts/amstockcharts/amstock.js')--}}
<!-- CHART -->
@endif


<script>
$(document).ready(function() {    
	Metronic.init(); // init metronic core componets
	Layout.init(); // init layout
	ComponentsPickers.init();

   $('#data-menu').attr('class', 'active');
});
</script>
