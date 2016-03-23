<?php

class AdminGlobalController extends \CoreController {

	public function dashboard()
	{

		$this->layout()->content = View::make('page.admin.dashboard');

	}

	public function viewBar()
	{
		return View::make('page.admin.data.grafik.bar');
	}

	public function apiBar()
	{
		if(Request::ajax()){

			if(Request::get('tahun_awal') != null && Request::get('tahun_akhir') != null){
				$t_awal = Request::get('tahun_awal');
				$t_akhir = Request::get('tahun_akhir');	
			}else{
				$t_awal = Carbon::now()->year - 6;
				$t_akhir = Carbon::now()->year;	
			}
			
			
			$selisih = $t_akhir - $t_awal;
			for ($i=0; $i < $selisih+1; $i++) { 
				$tahun[] = $t_awal+$i;
			}

			$data = OperasiModel::whereBetween('tanggal', [$t_awal.'-01-01', date('Y-m-t', strtotime($t_akhir.'-12'))])->get();
			// $tahun = ['2011','2012','2013','2014','2015','2016'];
			foreach ($data as $key => $value) {
					$t = explode('-', $value->tanggal);
					$d2[] = $t[0];
			}
			$d3 = array_count_values($d2);
			foreach ($tahun as $v1) {
				$d[] = ['tahun' => $v1, 'operasi' => (in_array($v1, $d2)) ? $d3[$v1] : 0, 'pelanggaran' => 0];
				
			}
			
			return Response::json($d);
		}
	}

	public function viewPie()
	{
		return View::make('page.admin.data.grafik.pie');	
	}

}