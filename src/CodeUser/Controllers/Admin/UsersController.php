<?php

namespace CodePress\CodeUser\Controllers;

use CodePress\CodeUser\Repository\UserRepositoryInterface;
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
    
    public function __construct(ResponseFactory $response, UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->response = $response;
    }
    
    public function index()
    {
        $users = $this->repository->all();
        return $this->response->view('codeuser::index', compact('users'));
    }
    
    public function show(int $id)
    {
        $user = $this->repository->find($id);
        return $this->response->view('codeuser::show', compact('user'));
    }
    
    public function create()
    {
        return $this->response->view('codeuser::create');
    }
    
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        
        return redirect()->route('admin.users.index');
    }
    
    public function edit(int $id)
    {
        $user = $this->repository->find($id);
        return $this->response->view('codeuser::edit', compact('user'));
    }
    
    public function update(int $id, Request $request)
    {
        $this->repository->update($request->all(), $id);
        
        return redirect()->route('admin.users.index');
    }
    
    public function destroy(int $id)
    {
        $this->repository->find($id)->delete();
        return redirect()->route('admin.users.index');
    }
}