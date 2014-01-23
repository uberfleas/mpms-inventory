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
		// Prep Input::all() array for the two validation passes (one handled by Medium and one by Mediumchar)
		$master_array = MediumHelper::prepMediumArray(Input::all());

		//make a variable to hold fail messages
		$messages = '';
		//make a fail switch var
		$fail = false;

		// validate the medium sub-array
		$medium_validator = Validator::make($master_array['medium'], Medium::$rules);
		if ($medium_validator->fails()) {
			//collect messages and trigger fail state
			$messages .= $medium_validator->messages();
			$fail = true;
		}

		// validate each mediumchars set
		foreach ($master_array['mediumchars'] as $index => $value) {
			//make a validator name using the $index
			$validator_name = $index.'_mediumchars_validator';
			//validate the current value set
			$$validator_name = Validator::make($value, Mediumchar::$rules);
			if (${$validator_name}->fails()) {
				//collect messages and trigger a fail state
				$messages .= ${$validator_name}->messages();
				$fail = true;
			}
		}

		
		// process the validation
		if ($fail) {
			return Redirect::to('mediums/create')
				->with('message',$messages)
				->withInput(Input::all());
		} else {
			// start transaction
			DB::transaction(function() use ($master_array) {

				//first we insert into Medium
				$medium = new Medium;
				$medium->name       		= $master_array['medium']['name'];
				$medium->description		= $master_array['medium']['description'];
			
				$medium->save();

				//now we step through the array and insert each set into mediumchars
				foreach ($master_array['mediumchars'] as $index => $value) {
					$mediumchar_name = $index.'mediumchar';
					$$mediumchar_name = new Mediumchar;
					${$mediumchar_name}->name 			= $value['name'];
					${$mediumchar_name}->description 	= $value['description'];
					${$mediumchar_name}->example		= $value['example'];
					${$mediumchar_name}->medium_id 		= $medium->id;

					${$mediumchar_name}->save();
				}
			}); //transaction ended
		
			// redirect
			Session::flash('message', 'Successfully created a '.$master_array['medium']['name'].'!');
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