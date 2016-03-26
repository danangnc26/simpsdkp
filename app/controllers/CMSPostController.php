<?php

class CMSPostController extends \CoreController {

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
		//
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
	public function destroy($id)
	{
		//
	}

}