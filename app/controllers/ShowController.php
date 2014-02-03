<?php

class ShowController extends BaseController {

	/**
     * Instantiate a new CustomerController instance.
     */
    public function __construct()
    {
        $this->beforeFilter('auth.basic');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //get all the shows
		$shows = Show::all();
		
		//load the view and pass the genre
		return View::make('shows.index')
			->with('shows', $shows);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('shows.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$validator = Validator::make(Input::all(), Show::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('shows/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$show = new Show;
			$show->name       		= Input::get('name');
			$show->city 			= Input::get('city');
			$show->state 			= Input::get('state');
			$show->start_date 		= Input::get('start_date');
			$show->end_date 		= Input::get('end_date');
			
			$show->save();
		
			// redirect
			Session::flash('message', 'Successfully created '.$show->name.'!');
			return Redirect::to('shows');
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
        return View::make('shows.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // get the show
		$show = Show::find($id);

		// show the edit form and pass the nerd
		return View::make('shows.edit')
			->with('show', $show);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		$validator = Validator::make(Input::all(), Show::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('shows/'.$id.'/edit')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$show = Show::find($id);
			$show->name       		= Input::get('name');
			$show->city 			= Input::get('city');
			$show->state 			= Input::get('state');
			$show->start_date 		= Input::get('start_date');
			$show->end_date 		= Input::get('end_date');
			
			$show->save();
		
			// redirect
			Session::flash('message', 'Successfully updated '.$show->name.'!');
			return Redirect::to('shows/');
		}
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
