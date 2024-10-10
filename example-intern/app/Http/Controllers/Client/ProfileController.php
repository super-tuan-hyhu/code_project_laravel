<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\address\AddressRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $userRepository;
    protected $userAddressRepository;
    public function __construct(UserRepositoryInterface $userRepository,
                                AddressRepositoryInterface $userAddressRepository)
    {
        $this->userRepository = $userRepository;
        $this->userAddressRepository = $userAddressRepository;
    }
    public function index()
    {
        $id = Auth::id();
        $address = $this->userAddressRepository->getAddressUser($id);
        return view('client.profile.index', compact('address'));
    }

    public function update(Request $request, $id)
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
        return redirect()->back()->with([
           'message' => 'Update Profile Success'
        ]);
    }

    public function changePass(Request $request)
    {
        if (!Hash::check($request->passOld, Auth::user()->password)){
            return redirect()->back()->with(['message' => 'The current password is incorrect']);
        }elseif ($request->pass_confirm != $request->passNew){
            return redirect()->back()->with(['message' => 'The current password is incorrect']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->pass_confirm),
        ]);

        return redirect()->back()->with([
            'message' => 'Update Password Success',
        ]);
    }

    // change address client
    public function changeAddress(Request $request, $id)
    {
        $address = $this->userAddressRepository->find($id);
        $data = $request->all();

        // check is_default
        if ($request->has('is_default') && $request->input('is_default') == 1){
            $this->userAddressRepository->where('id_user', Auth::id())
                                        ->where('id_address', '!=' , $address->id_address);
        }
    }
}
