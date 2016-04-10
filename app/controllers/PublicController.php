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
		$this->layout()->content = View::make('page.public.content');
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

	public function category($category)
	{
		$content = $this->findIt('nama_kategori', Lib::replaceString($category, true));
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
		
		$this->layout()->content = View::make('page.public.category')->with(['content' => $content]);
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