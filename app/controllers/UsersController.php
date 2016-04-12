<?php

class UsersController extends \CoreController {

	public function __construct()
	{
		$this->user = new User();
	}
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout()->content = View::make('page.admin.users.index');
	}

	public function getDataUsers()
	{
		return Datatable::collection($this->user->all())
        ->showColumns('first_name', 'username', 'email')
        ->addColumn('activated', function($md){
        	return ($md->activated == 1) ? '<span class="btn btn-xs green">Aktif</span>' : '<span class="btn btn-xs red">Tidak Aktif</span>';
        })
        ->searchColumns('first_name', 'username', 'email')
        ->orderColumns('first_name')
        ->make();
	}

	public function getUserRole()
	{
		$user = Sentry::getUser();
		if($user != null){
			$role = $user->getGroups();
			foreach ($user->groups as $value) {
				$d['role_user'] = $value->func;
			}
			// $role_user = implode('', $d);
			return ($d['role_user'] == null) ? null : $d['role_user'];
		}
	}

	public function getUserPlaced()
	{
		
		return User::with($this->getUserRole())->where('id', '=', Sentry::getUser()->id)->get();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		// $users = new User();

		// $input = Input::all();

		// $users->username = $input['username'];
		// $users->password = Hash::make($input['password']);
		// $users->save();

		// if(Request::ajax()){
		// 	$input = Input::all();

		// 	$remember = (!empty($input['remember_me'])) ? true : false;

		// 	if(Auth::attempt(array('username' => $input['username'], 'password' => $input['password']), $remember))
		// 	{
		// 		$respon = ['status' => true, 'msg' => '', 'url' => route('welcome')];
		// 		return Response::json($respon);
		// 	}
		// }

		if(Request::ajax()){

			$input = Input::all();

			$remember = (!empty($input['remember_me'])) ? true : false;

			try
			{
			    // Login credentials
			    $credentials = array(
			        'username'		=> $input['username'],
			        'password'		=> $input['password'],
			    );

			    // Authenticate the user
			    Sentry::authenticateAndRemember($credentials, $remember);
			    $respon = ['status' => true, 'message' => '', 'url' => route('admin.dashboard')];
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    $respon = ['status' => false, 'message' => 'Username tidak boleh kosong.'];
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    $respon = ['status' => false, 'message' => 'Password tidak boleh kosong.'];
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    $respon = ['status' => false, 'message' => 'Password salah, coba lagi.'];
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    $respon = ['status' => false, 'message' => 'Akun tidak ditemukan.'];
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    $respon = ['status' => false, 'message' => 'Akun belum diaktifkan.'];
			}

			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    $respon = ['status' => false, 'message' => 'User is suspended.'];
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    $respon = ['status' => false, 'message' => 'Akun diblokir.'];
			}

			return Response::json($respon);

		}


	}

	public function register()
	{
		Sentry::register(array(
		    'username'    => 'admin',
		    'password' => 'admin',
		    'activated' => true
		));
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
			Sentry::logout();
			return Redirect::route('public.visitor.home');
	}

}