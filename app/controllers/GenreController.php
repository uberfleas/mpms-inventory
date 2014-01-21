<?php

class GenreController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//
		//get all the genres
		$genres = Genre::all();
		
		//load the view and pass the genre
		return View::make('genres.index')
			->with('genres', $genres);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load a form to make an artobj
		return View::make('genres.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$validator = Validator::make(Input::all(), Genre::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('genres/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$genre = new Genre;
			$genre->name       		= Input::get('name');
			$genre->description		= Input::get('description');
			
			$genre->save();
		
			// redirect
			Session::flash('message', 'Successfully created '.$genre->name.'!');
			return Redirect::to('genres');
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