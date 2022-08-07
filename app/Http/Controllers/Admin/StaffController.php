<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Str;


class StaffController extends BaseController
{
    protected $base_route = 'admin.staff';
    protected $view_path = 'admin.staff';
    protected $panel = 'Staff';
    protected $folder_path;
    protected $model;


    public function __construct() {
        $this->model = new Staff();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'staff' . DIRECTORY_SEPARATOR;
        
    }
   
    public function index()
    {
        $staff = $this->model::all();
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('staff'));
    }

   
    public function create()
    {
        return view(parent::loadDefaultDataToView($this->view_path.'.create'));
    }

   
    public function store(Request $request)
    {
        $staff = $this->model;

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|max:12288|mimes:jpg,jpeg,png',
        ],
        [
            'name.required' => 'Please provide name for the staff.',
            'name.max' => 'Title length exceed.',
            'description.required' => 'Description required.',
            'designation.required' => 'designation required.',
            'image.required' => 'Image required',
            'image.max' => 'Too large file.',
            'image.mimes' => 'mimes:jpg,jpeg,png',
        ]);

        $staff->name = $request->input('name');
        $staff->designation = $request->input('designation');
        $staff->description = $request->input('description');
        $staff->status = $request->input('status') == TRUE ? '1' : '0';
        $staff->feature = $request->input('feature') == TRUE ? '1' : '0';
        $staff->slug = Str::slug($request->designation);

        if ($request->hasfile('image')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $staff->image = $filename;
        }

        $staff->save();
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

   
    public function edit($id)
    {
        $staff = $this->model::find($id);
        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('staff'));
    }

   
    public function update(Request $request, $id)
    {
        $staff = $this->model::find($id);

        $staff->name = $request->input('name');
        $staff->designation = $request->input('designation');
        $staff->description = $request->input('description');
        $staff->status = $request->input('status') == TRUE ? '1' : '0';
        $staff->feature = $request->input('feature') == TRUE ? '1' : '0';
        $staff->slug = Str::slug($request->designation);

        $validatedData = $request->validate([
           'name' => 'required|max:255',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'sometimes|max:12288|mimes:jpg,jpeg,png',
        ],
        [
            'name.required' => 'Please provide name for the staff.',
            'name.max' => 'Title length exceed.',
            'description.required' => 'Description required.',
            'designation.required' => 'designation required.',
            'image.max' => 'Too large file.',
            'image.mimes' => 'mimes:jpg,jpeg,png',
        ]);

        if($request->hasfile('image')) {
            $destination = $this->folder_path.$staff->image;
            if(file_exists($destination)){
                unlink($destination);
            }

            if ($request->hasfile('image')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $staff->image = $filename;
            }
        }
        $staff->update();

        $request->session()->flash('updated_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }

   
    public function destroy(Request $request, $id)
    {
        $staff = $this->model::find($id);

        $destination = $this->folder_path.$staff->image;
        
        if(file_exists($destination)){
            unlink($destination);
        }

        $staff->delete();

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }
}
