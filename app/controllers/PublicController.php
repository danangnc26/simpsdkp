<?php

class PublicController extends \CoreController {


	protected $layout = 'layout.visitor_layout';

	public function layout()
	{
		return $this->layout;
	}

	/**
	 * Display a listing of the resource.
	 * GET /public
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.public.home');
	}

	public function getDataKapal()
	{
		$data = MasterTypeKapal::with(['kapalpengawas' => function($q){
					$q->with('material');
				}])->get();
		$this->layout()->content = View::make('page.public.data.kapal_pengawas')->with(['data' => $data]);
	}

	public function getBukuKapal()
	{
		$data1 = MasterTypeKapal::with(['kapalpengawas' => function($q){$q->with('material');}])->get();
		$data2 = KapalPengawasModel::all();
		$pdf = PDF::loadView('output.kapal_pengawas.buku', ['data1' => $data1, 'data2' => $data2])->setPaper('a4')->setOrientation('portrait');
		return $pdf->stream('kapal_pengawas.pdf');
		// return View::make('output.kapal_pengawas.buku')->with(['data1' => $data1, 'data2' => $data2]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /public/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /public
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /public/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function findIt($opt = '', $str = '')
	{
		// return CMSKategoriModel::with('post')->where($opt, '=', $str)->get();	

		return CMSPostModel::whereHas('kategori', function($q) use ($str){
					$q->where('cms_tb_kategori.nama_kategori', '=', $str);
				})->with('kategori')->paginate(5);
	}

	public function category($category, $sub_category = null)
	{
		if($sub_category == null){
			$f = $category;
		}else{
			$f = $sub_category;
		}
		$content = $this->findIt('nama_kategori', Lib::replaceString($f, true));
		// $try1 = $this->findIt('nama_kategori', Lib::replaceString($category));
		// if(empty($try1) && count($try1) == 0){
		// 	$try2 = $this->findIt('kategori_utama', Lib::replaceString($category));
		// 	if(empty($try2) && count($try2) == 0){
		// 		$content = null;
		// 	}else{
		// 		$content = $try2;
		// 	}
		// }else{
		// 	$content = $try1;
		// }

		// if(empty($content) && count($content) == 0){

		// }else{
			
  //           foreach($content as $val_con){
		// 		$k_2 = [];
  //               foreach($val_con->kategori as $val_kat){
	 //                if($val_kat->kategori_utama == null){
	 //                }else{
	 //                $k_2[] = '<h2>'.$val_kat->nama_kategori.'</h2>';
	 //                $k_2[] =  '<small>';
	 //                $k_2[] = '<a href="#">Home</a>';
	 //               	$k_2[] = '>> ';
	 //                $k_2[] = '<a href="'.route('public.visitor.showCategory', Lib::replaceString($val_kat->nama_kategori)).'">'.$val_kat->nama_kategori.'</a>';
	 //                $k_2[] = '</small>';
	 //            	}
	 //            }
  //           }
		// }

		$this->layout()->content = View::make('page.public.category')->with(['content' => $content, 'main' => $category, 'sub' => $sub_category]);
	}

	public function show($nama_artikel)
	{
		$artikel = CMSPostModel::with('kategori', 'label', 'lampiran')->where('judul_post', '=', Lib::replaceString($nama_artikel, true))->get();
		$this->layout()->content = View::make('page.public.content')->with(['data_artikel' => $artikel]);

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /public/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /public/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /public/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}