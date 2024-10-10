<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $categoryReposite;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryReposite = $categoryRepository;
    }

    public function index(){
        $category = $this->categoryReposite->getCategory();
        return view('dashboard.category.index', compact('category'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image_cate')){
            $data['image_cate'] = Common::uploadFile($request->file('image_cate'), 'dashboard/assets/img/category');
        }

        $this->categoryReposite->create($data);
        return redirect('dashboard/category');
    }

    public function update($idCate)
    {
        $category = $this->categoryReposite->find($idCate);
        return view('dashboard.category.update', compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $category = $this->categoryReposite->find($id);
        $data = $request->all();

        if($request->hasFile('image_cate')){
            $data['image_cate'] = Common::uploadFile($request->file('image_cate'), 'dashboard/assets/img/category');
            $file_old = $request->input('file_old');
            if ($file_old && Storage::disk('public')->exists($file_old)){
                Storage::disk('public')->delete($file_old);
            }
        }else{
            $data['image_cate'] = $category->image_cate;
        }

        $this->categoryReposite->update($data, $id);

        return redirect('dashboard/category/update/' . $id)->with('messageUpdate', 'Thành Công Rồi');
    }

    public function delete($id)
    {
        $category = $this->categoryReposite->find($id);

        if ($category){
            $image = $category->image_cate;

            $this->categoryReposite->delete($id);

            if ($image != ""){
                Storage::disk('public')->delete($image);
            }
        }
        return redirect()->back()->with('message' ,'Success Confirm');
    }
}
