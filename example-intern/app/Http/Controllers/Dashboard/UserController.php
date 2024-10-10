<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->userRepository->all();
        return view('dashboard.users.index', compact('user'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if($request->hasFile('avatar')){
            $data['avatar'] = Common::uploadFile($request->file('avatar'), 'dashboard/assets/img/user');
        }
        $this->userRepository->create($data);

        return redirect('dashboard/user')->with([
           'messageCreate' => 'Create Success'
        ]);
    }

    public function update($id)
    {
        $user = $this->userRepository->find($id);
        return view('dashboard.users.update', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        $data = $request->all();
        if ($request->hasFile('avatar')){
            $data['avatar'] = Common::uploadFile($request->file('avatar'), 'dashboard/assets/img/user');

            $file_old = $request->input('file_old');
            if ($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }

        $user->update($data);
        return redirect('dashboard/user/update/'. $id )->with([
            'message' => 'Update Success'
        ]);
    }

    public function delete($id)
    {
        $user = $this->userRepository->find($id);

        $user->delete();

        return redirect()->back()->with([
            'message' => 'Disconnect Success'
        ]);
    }

    // client spam
    public function client()
    {
        $user = $this->userRepository->getClient();
        return view('dashboard.users.client', compact('user'));
    }

    public function restore($id)
    {
        $client = $this->userRepository->getClient()->find($id);
        $client->restore();
        return redirect()->back()->with([
            'message' => 'Connect Success'
        ]);
    }
}
