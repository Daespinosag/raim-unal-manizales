<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\RolRepository;

class UserController extends Controller
{
  public $userRepository;

  public $rolRepository;

  public function __construct(
    UserRepository $userRepository,
    RolRepository $rolRepository
  )
  {
    $this->userRepository = $userRepository;
    $this->rolRepository = $rolRepository;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->OrderId();
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = $this->rolRepository->list();
        return view('admin.user.create')->with('rol', $rol);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=$this->userRepository->store($request->all());

        if ($user->id_rol == 1) {
           return redirect()->route('Admin.User.index');
        }else {
            return redirect()->route('Admin.FieldUser.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findRol($id);
        return view('admin.user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = $this->userRepository->findRol($id);
      $roles = $this->rolRepository->list();

      return view('admin.user.edit')
                    ->with('user', $user)
                    ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->updateUser($request->all(), $id);
        return view('admin.user.indexEdit')->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->destroy($id);
        return redirect()->route('Admin.User.index');
    }

    public function delete($id)
    {
        $user = $this->userRepository->findRol($id);
        return view('admin.user.destroy')->with('user', $user);
    }

    public function editAll($id)
    {
      $user =$this->userRepository->findNeed($id);
      return view('admin.user.indexEdit')->with('user', $user);
    }

    public function estilosEdit($id)
    {
      # code...
    }
    public function estilosCreate($id)
    {
      # code...
    }
    public function storeEstilosEdit(Resouce $resource)
    {
      # code...
    }
    public function storeEstilosCreate(Resouce $resource)
    {
      # code...
    }
    public function needEdit($id)
    {
      # code...
    }
    public function needCreate($id)
    {
      # code...
    }
    public function storeNeedEdit(Resouce $resource)
    {
      # code...
    }
    public function storeNeedCreate(Resouce $resource)
    {
      # code...
    }
}
