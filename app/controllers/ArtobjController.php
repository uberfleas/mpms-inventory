<?php

class ArtobjController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the art objects
		$artobjs = Artobj::all();
		
		//load the view and pass the artobjs
		return View::make('artobjs.index')
			->with('artobjs', $artobjs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load a form to make an artobj
		return View::make('artobjs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       	=> 'required',
			'medium_id'  	=> 'required|numeric',
			'date_completed'	=> 'required|date_format:d-m-Y',
			'medium_values'	=> 'required',
			'commission_id'	=> 'numeric',
			'tagline'		=> 'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('artobjs/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$artobj = new Artobj;
			$artobj->name       		= Input::get('name');
			$artobj->medium_id		= Input::get('medium_id');
			$artobj->date_completed 	= Input::get('date_completed');
			$artobj->medium_values	= Input::get('medium_values');
			$artobj->commission_id	= Input::get('commission_id');
			$artobj->tagline			= Input::get('tagline');
			$artobj->save();
		
			// redirect
			Session::flash('message', 'Successfully created '.$artobj->name.'!');
			return Redirect::to('artobjs');
		}
	}

	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}