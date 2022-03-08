<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Str;


class CategoryController extends BaseController
{
    protected $base_route = 'admin.category';
    protected $view_path = 'admin.category';
    protected $panel = 'Category';
    protected $folder_path;
    protected $model;


    public function __construct() {
        $this->model = new Category();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR;
        
    }
   
    public function index()
    {
        $category = $this->model::all();
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('category'));
    }

   
    public function create()
    {
        return view(parent::loadDefaultDataToView($this->view_path.'.create'));
    }

   
    public function store(Request $request)
    {
        $category = $this->model;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:500',
            'image' => 'max:12288|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please provide title for the category.',
            'title.max' => 'Title length exceed.',
            'description.max' => 'Too long description.',
            'image.mimes' => 'mimes:jpg,jpeg,png',
            'image.max' => 'Image too large',
        ]);

        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->slug = Str::slug($request->title);

        if ($request->hasfile('image')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $category->image = $filename;
        }

        $category->save();
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

   
    public function edit($id)
    {
        $category = $this->model::find($id);
        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('category'));
    }

   
    public function update(Request $request, $id)
    {
        $category = $this->model::find($id);
        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->slug = Str::slug($request->title);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:500',
            'image' => 'sometimes|max:12288|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Please provide title for the banner.',
            'title.max' => 'Title length exceed.',
            'description.max' => 'Too long description.',
        ]);

        if($request->hasfile('image')) {
            $destination = $this->folder_path.$category->image;
            if(file_exists($destination)){
                unlink($destination);
            }

            if ($request->hasfile('image')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $category->image = $filename;
            }
        }
       
        $category->update();

        $request->session()->flash('updated_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }

   
    public function destroy(Request $request, $id)
    {
        $category = $this->model::find($id);

        $category->delete();

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }
}
