<?php

use Illuminate\Support\MessageBag; //added by medium.com auth tutorial for loginaction

class UserController extends BaseController {

	/**
     * Instantiate a new CustomerController instance.
     */
    /*public function __construct()
    {
        $this->beforeFilter('auth.basic');
    }*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function loginAction()
    {	
    	$errors = new MessageBag();

    	if ($old = Input::old("errors"))
    	{
    		$errors = $old;
    	}

    	$data = array(
    		"errors" => $errors
    	);

        if (Input::server("REQUEST_METHOD") == "POST")
        {
        	$validator = Validator::make(Input::all(), array( 
        		"username" => "required", 
        		"password" => "required"
        	));

        	if ($validator->passes())
        	{
        		$credentials = array(
        			"username" => Input::get("username"),
        			"password" => Input::get("password")
        		);

        		if (Auth::attempt($credentials))
        		{
        			return Redirect::route("users");
        		}
        	}

        	$data["errors"] = new MessageBag(array(
        		"password" => array("Username and/or password invalid.")
        	));

        	$data["username"] = Input::get("username");

        	return Redirect::route("users/login")
        		->withInput($data);
        }
        return View::make("users.login", $data);
    }

	public function index()
	{
         //get all the shows
		$users = User::all();
		
		//load the view and pass the genre
		return View::make('users.index')
			->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$validator = Validator::make(Input::all(), User::$rules);
		
		// process the login
		if ($validator->fails()) {
			return Redirect::to('users/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$user = new User;
			$user->fname       		= Input::get('fname');
			$user->lname 			= Input::get('lname');
			$user->email 			= Input::get('email');
			$user->password 		= Hash::make(Input::get('password'));
			
			$user->save();
		
			// redirect
			Session::flash('message', 'Successfully created '.$user->fname.' '.$user->lname.'!');
			return Redirect::to('users');
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
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
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
