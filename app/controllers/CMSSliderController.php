<?php

class CMSSliderController extends \CoreController {


	public function __construct()
	{
		$this->slider = new CMSSliderModel();
	}
	/**
	 * Display a listing of the resource.
	 * GET /cmsslider
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.cms.slider.index');
	}

	public function data()
	{
		$data = $this->slider->all();
		return View::make('page.cms.slider.data')->with(['data' => $data]);
	}

	public function updStat()
	{
		if(Request::ajax()){

			$upd = $this->slider->find($this->decrypt(Request::get('id_slider')));

			$upd->is_used = Request::get('vl');
			$upd->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cmsslider/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('page.cms.slider.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cmsslider
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Request::ajax()){
			$input = Input::all();

			$this->slider->gambar_slider = $this->createImage($input['gambar_slider'], false, 'slider');
			$this->slider->keterangan = $input['keterangan'];
			$this->slider->is_used	  = $input['status'];
			$this->slider->save();

			$respon = ['status' => true, 'msg' => $this->input_success];

			return Response::json($respon);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /cmsslider/{id}
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
	 * GET /cmsslider/{id}/edit
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
	 * PUT /cmsslider/{id}
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
	 * DELETE /cmsslider/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		if(Request::ajax()){
			$id = $this->decrypt(Request::get('id_slider'));
			$delete = $this->slider->find($id);
			$delete->delete();
			return Response::json(['msg' => $this->delete_message]);
		}
	}

}