<?php

class CustomerController extends BaseController {

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
		$customers = Customer::all();
		
		//load the view and pass the genre
		return View::make('customers.index')
			->with('customers', $customers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$validator = Validator::make(Input::all(), Customer::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('customers/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$customer = new Customer;
			$customer->fname       		= Input::get('fname');
			$customer->lname 			= Input::get('lname');
			$customer->street 			= Input::get('street');
			$customer->city 			= Input::get('city');
			$customer->state 			= Input::get('state');
			$customer->zip 				= Input::get('zip');
			$customer->email 	 		= Input::get('email');
			$customer->phone 			= Input::get('phone');
			$customer->show_id			= Input::get('show_id');
			
			$customer->save();
		
			// redirect
			Session::flash('message', 'Successfully created '.$customer->fname.' '.$customer->lname.'!');
			return Redirect::to('customers');
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
        return View::make('customers.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // get the customer
		$customer = Customer::find($id);

		// customer the edit form and pass the nerd
		return View::make('customers.edit')
			->with('customer', $customer);
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
		$validator = Validator::make(Input::all(), Customer::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('customers/'.$id.'/edit')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$customer = Customer::find($id);
			$customer->fname       		= Input::get('fname');
			$customer->lname 			= Input::get('lname');
			$customer->street 			= Input::get('street');
			$customer->city 			= Input::get('city');
			$customer->state 			= Input::get('state');
			$customer->zip 				= Input::get('zip');
			$customer->email 	 		= Input::get('email');
			$customer->phone 			= Input::get('phone');
			$customer->show_id			= Input::get('show_id');
			
			$customer->save();
		
			// redirect
			Session::flash('message', 'Successfully updated '.$customer->fname.' '.$customer->lname.'!');
			return Redirect::to('customers');
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
