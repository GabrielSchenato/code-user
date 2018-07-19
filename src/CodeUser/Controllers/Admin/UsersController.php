<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Controllers\Controller;
use CodePress\CodeUser\Repository\UserRepositoryInterface;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

/**
 * Description of UsersController
 *
 * @author gabriel
 */
class UsersController extends Controller
{

    private $response;
    private $repository;
    private $roleRepository;
    
    public function __construct(ResponseFactory $response, UserRepositoryInterface $repository, RoleRepositoryInterface $roleRepository)
    {
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
        $this->response = $response;
    }
    
    public function index()
    {
        $this->auth();
        $users = $this->repository->all();
        return $this->response->view('codeuser::admin.user.index', compact('users'));
    }
    
    public function show(int $id)
    {
        $this->auth();
        $user = $this->repository->find($id);
        return $this->response->view('codeuser::admin.user.show', compact('user'));
    }
    
    public function create()
    {
        $this->auth();
        $roles = $this->roleRepository->pluck('name', 'id');
        return $this->response->view('codeuser::admin.user.create', compact('roles'));
    }
    
    public function store(Request $request)
    {
        $this->auth();
        $user = $this->repository->create($request->all());
        $this->repository->addRoles($user->id, $request->get('roles'));
        return redirect()->route('admin.users.index');
    }
    
    public function edit(int $id)
    {
        $this->auth();
        $roles = $this->roleRepository->pluck('name', 'id');
        $user = $this->repository->find($id);
        return $this->response->view('codeuser::admin.user.edit', compact('user', 'roles'));
    }
    
    public function update(int $id, Request $request)
    {
        $this->auth();
        $data = $request->all();
        if(isset($data['password']))
        {
            unset($data['password']);
        }
        $user = $this->repository->update($data, $id);
        $this->repository->addRoles($user->id, $request->get('roles'));
        return redirect()->route('admin.users.index');
    }
    
    public function destroy(int $id)
    {
        $this->auth();
        $this->repository->find($id)->delete();
        return redirect()->route('admin.users.index');
    }
    
    private function auth()
    {
        $this->authorize('access_users');
    }
}
