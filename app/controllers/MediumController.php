<?php

class MediumController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//get all the mediums
		$mediums = Medium::all();
		
		//load the view and pass the artobjs
		return View::make('mediums.index')
			->with('mediums', $mediums);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load a form to make an artobj
		return View::make('mediums.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$validator = Validator::make(Input::all(), Medium::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('mediums/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$medium = new Medium;
			$medium->name       		= Input::get('name');
			$medium->description		= Input::get('description');
			$medium->characteristics 	= Input::get('characteristics');
			
			$medium->save();
		
			// redirect
			Session::flash('message', 'Successfully created '.$medium->name.'!');
			return Redirect::to('mediums');
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