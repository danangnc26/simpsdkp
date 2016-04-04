<?php

class CMSPostController extends \CoreController {

	public function __construct()
	{

		$this->post = new CMSPostModel();
		$this->delete_post	= "'".route('admin.cms.post.delete', 'id=')."'";

	}

	/**
	 * Display a listing of the resource.
	 * GET /cms
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.cms.pos.index');
	}

	public function getPostDataTable()
	{
		return Datatable::collection($this->post->with('kategori')->get())
		// ->setRowId(function($row)
		// {
		// 	// for ($i=0; $i < count($row); $i++) { 
		// 	// 	return 'row_'.$i++;
		// 	// }
		// 	return count($row);
		// })
		->addColumn('act', function($act){
        	return '<input type="checkbox" value="1" name="post_check[]"/>';
        })
        ->addColumn('judul_post', function($jdl){
        	$id = "'".$this->encrypt($jdl->id_post)."'";
        	$judul = $jdl->judul_post;
        	$status = ($jdl->status_post == 1) ? '' : ' - <small><i>Draft</i></small>';
        	$menu = '<br>
        			 <div style="display:none" class="mn">
        			 <small> 
        			 <button type="button" style="font-size:0.86em; margin-right:0px;" onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_post.')" class="btn btn-xs cst-transparent tt-edit"><i class="fa fa-edit"></i></button>
        			 <button type="button" style="font-size:0.86em; margin-right:0px;" onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_post.')" class="btn btn-xs cst-transparent tt-hapus"><i class="fa fa-trash"></i></button>
        			 <button type="button" style="font-size:0.86em; margin-right:0px;" onclick="hapus('.$id.','.$this->confirm_delete.', '.$this->delete_post.')" class="btn btn-xs cst-transparent tt-hapus"><i class="fa fa-eye"></i></button>
        			 </small>
        			 </div>';
        	return $judul.$status.$menu;
        })
        ->addColumn('author', function($aut){
        	return $aut->author->first_name;
        })
        ->addColumn('kategori', function($kat){
        	foreach ($kat->kategori as $key => $value) {
        		$k[] = $value->nama_kategori;
        	}
        	return '<small>'.implode(', ', $k).'</small>';
        })
        ->addColumn('label', function($lbl){
        	return 'Label';
        })
        ->addColumn('tanggal', function($tgl){
        	return ($tgl->status_post == 1) ? '<small>Dipublikasikan pada<br> '.Carbon::parse($tgl->tanggal_insert)->format('d/m/Y').'</small>' : '';
        })
        ->searchColumns('judul_post')
        ->orderColumns('judul_post')
        ->make();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cms/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$kategori = CMSKategoriModel::all();
		$this->layout()->content = View::make('page.cms.pos.create')->with(['kategori' => $kategori]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cms
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){

			$input = Input::all();

			$this->post->user_id		= Sentry::getUser()->id;
			$this->post->judul_post 	= $input['judul_pos'];
			$this->post->content_post 	= $input['content'];
			$this->post->tanggal_insert	= $input['tanggal'];
			$this->post->status_post 	= $input['status'];
			$this->post->updated_at 	= null;
			$this->post->save();
			$pos_id = $this->post->id_post;


			$k = json_decode($input['kategori_pos']);
			foreach ($k as $key => $kt) {
				$d[] = ['id_kategori' => $kt];
			}
			
			$this->post->kategori()->attach($d);

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	public function uploadImg()
	{
		if(Request::ajax())
		{
			$nm = $this->createImage(Input::file('gambar'), false, 'media');
			$respon = ['status' => true, 'msg' => $this->input_success, 'img_dir' => asset("/uploaded_images/media/".$nm)];

			return Response::json($respon);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /cms/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /cms/{id}/edit
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
	 * PUT /cms/{id}
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
	 * DELETE /cms/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){
			$id = $this->decrypt(Request::get('id'));
			$delete = $this->post->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}
	}

}