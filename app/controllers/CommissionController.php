<?php

class CommissionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //get all the shows
		$commissions = Commission::all();
		
		//load the view and pass the genre
		return View::make('commissions.index')
			->with('commissions', $commissions);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('commissions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$validator = Validator::make(Input::all(), Commission::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('commissions/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$commission = new commission;
			$commission->customer_id      	= Input::get('customer_id');
			$commission->start_date 		= Input::get('start_date');
			$commission->est_end_date 		= Input::get('est_end_date');
			$commission->estimate 			= Input::get('estimate');
			$commission->notes 	 			= Input::get('notes');
			$commission->sources  			= Input::get('sources');
			$commission->sale_status 		= Input::get('sale_status');
			$commission->show_id 	 		= Input::get('show_id');
			
			$commission->save();
		
			// redirect
			Session::flash('message', 'Successfully created the commission request!');
			return Redirect::to('commissions');
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
        return View::make('commissions.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('commissions.edit');
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
