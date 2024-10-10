<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Address;
use App\Repositories\address\AddressRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $userRepository;
    protected $addressRepository;
    public function __construct(UserRepositoryInterface $userRepository,
                                AddressRepositoryInterface $addressRepository)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    public function index($id)
    {
        $user = $this->userRepository->find($id);
        $address = $this->addressRepository->getAddressUser($user->id);

        return view('dashboard.address.index', compact('user', 'address'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $data['is_default'] = $request->has('is_default') ? 1 : 0;

        $this->addressRepository->create($data);

        return redirect()->back()->with([
            'message' => 'Create Address Success'
        ]);
    }

    public function edit(Request $request, $id, $id_address)
    {
        $address = $this->addressRepository->find($id_address);
        $data = $request->all();

        // Kiểm tra các địa chỉ mặc định
        if ($request->has('is_default') && $request->input('is_default') == 1){
            Address::where('id_user', $id)->where('id_address', '!=' , $id_address)
                                    ->update(['is_default' => 0]);
        }

        $address->update($data);
        return redirect()->back()->with([
            'message' => 'Update Address Success'
        ]);
    }

    public function destroy($id, $id_address)
    {
        $address = $this->addressRepository->find($id_address);

        $address->delete();
        return redirect()->back()->with([
            'message' => 'Delete Address Success'
        ]);
    }
}
