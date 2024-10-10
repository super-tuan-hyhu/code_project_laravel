<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Personnel\PersonnelRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PersonnelController extends Controller
{
    protected $personnelRepository;
    public function __construct(PersonnelRepositoryInterface $personnelRepository)
    {
        $this->personnelRepository = $personnelRepository;
    }

    public function index()
    {
        $personnel = $this->personnelRepository->all();
        return view('dashboard.personnel.index', compact('personnel'));
    }



    public function create()
    {
        return view('dashboard.personnel.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if($request->hasFile('avatar')){
            $data['avatar'] = Common::uploadFile($request->file('avatar'), 'dashboard/assets/img/personnel');
        }

        $this->personnelRepository->create($data);

        return redirect('dashboard/personnel/')->with([
            'messageCreate' => 'Create Success',
        ]);
    }

    public function update($id)
    {
        $personnel = $this->personnelRepository->find($id);
        return view('dashboard.personnel.update', compact('personnel'));
    }

    public function edit(Request $request, $id)
    {
        $personnel = $this->personnelRepository->find($id);
        $data = $request->all();

        if($request->hasFile('avatar')){
            $data['avatar'] = Common::uploadFile($request->file('avatar'), 'dashboard/assets/img/personnel');

            $file_old = $request->input('file_old');
            if ($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }else{
            $data['avatar'] = $personnel->avatar;
        }

        $personnel->update($data);

        return redirect()->back()->with([
            'message' => 'Update Success'
        ]);
    }

    public function delete($id)
    {
        $personnel = $this->personnelRepository->find($id);
        $personnel->delete();

        return redirect()->back()->with([
            'message' => 'Disconnect Success'
        ]);
    }

    // Personnel Quit

    public function personnelQuit()
    {
        $personnel = $this->personnelRepository->getPersonnelQuit();
        return view('dashboard.personnel.personnelQuit', compact('personnel'));
    }

    public function restore($id)
    {
        $personnel = $this->personnelRepository->getPersonnelQuit()->find($id);

        $personnel->restore();

        return redirect()->back()->with([
            'message' => 'Connect Success'
        ]);
    }
}
