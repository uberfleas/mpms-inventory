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
		// Prep Input::all() array for the two validation passes (one handled by Artobj, one by Artobjchar, one by pivot table artobj_genre)
		$master_array = ArtobjHelper::prepArtobjArray(Input::all());

		//make a variable to hold fail messages
		$messages = '';
		//make a fail switch var
		$fail = false;

		// validate the artobj sub-array
		$artobj_validator = Validator::make($master_array['artobj'], Artobj::$rules);
		if ($artobj_validator->fails()) {
			//collect messages and trigger fail state
			$messages .= $artobj_validator->messages();
			$fail = true;
		}

		// validate each mediumchars set
		foreach ($master_array['artobjchars'] as $char_id => $value) {
			$validate_array = array (
				'mediumchar_id' => $char_id,
				'value' => $value
			);
			//make a validator name using the $index
			$validator_name = $char_id.'_artobjchars_validator';
			//validate the current value set
			$$validator_name = Validator::make($validate_array, Artobjchar::$rules);
			if (${$validator_name}->fails()) {
				//collect messages and trigger a fail state
				$messages .= ${$validator_name}->messages();
				$fail = true;
			}
		}

		//no validation necessary for the genres since it's just entering id's in a pivot table

		// process the validation
		if ($fail) {
			return Redirect::to('artobjs/create')
				->with('message',$messages)
				->withInput(Input::all());
		} else {
			// start transaction
			DB::transaction(function() use ($master_array) {

				//first we insert into artobjs
				$artobj = new Artobj;
				$artobj->name       		= $master_array['artobj']['name'];
				$artobj->tagline			= $master_array['artobj']['tagline'];
				$artobj->medium_id 			= $master_array['artobj']['medium_id'];
				$artobj->date_completed		= $master_array['artobj']['date_completed'];
				$artobj->commission_id		= 0;
			
				$artobj->save();

				//now we step through the array and insert each set into mediumchars
				foreach ($master_array['artobjchars'] as $char_id => $value) {
					$artobjchar_name = $char_id.'artobjchar';
					$$artobjchar_name = new Artobjchar;
					${$artobjchar_name}->value 			= $value;
					${$artobjchar_name}->mediumchar_id 	= $char_id;
					${$artobjchar_name}->artobj_id		= $artobj->id;

					${$artobjchar_name}->save();
				}

				//now we add all genres to the pivot table
				foreach ($master_array['genre'] as $genre_id) {
					$artobj_pivot_name = $genre_id.'intoartobj';
					$$artobj_pivot_name = Artobj::find($artobj->id);
					${$artobj_pivot_name}->genre()->attach($genre_id);
				}
				
			}); //transaction ended
		
			// redirect
			Session::flash('message', 'Successfully created a '.$master_array['artobj']['name'].'!');
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