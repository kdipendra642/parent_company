<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\Models\Pages;
use Illuminate\Support\Str;


class PagesController extends BaseController
{
    protected $base_route = 'admin.pages';
    protected $view_path = 'admin.pages';
    protected $panel = 'Pages';
    protected $folder_path;
    protected $model;


    public function __construct() {
        $this->model = new Pages();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR;
        
    }
   
    public function index()
    {
        $pages = $this->model::all();
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('pages'));
    }

   
    public function create()
    {
        return view(parent::loadDefaultDataToView($this->view_path.'.create'));
    }

   
    public function store(Request $request)
    {
        // dd($request->all());
        $pages = $this->model;

        $validatedData = $request->validate([
            'title' => 'required|max:1000',
            'sub_title' => 'max:1000',
            'description' => 'required',
            'cover' => 'required|max:12288|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Provide title for the post.',
            'title.max' => 'Title length exceed.',
            'sub_title' => 'Sub title too long.',
            'description' => 'This field is required.',
            'cover.required' => 'Please provide any image.',
            'cover.max' => 'Too large file.',
            'cover.mimes' => 'Image must be in jpg, png or jpeg format.',
        ]);

        $pages->title = $request->input('title');
        $pages->sub_title = $request->input('sub_title');
        $pages->description = $request->input('description');
        $pages->status = $request->input('status') == TRUE ? '1' : '0';
        $pages->feature = $request->input('feature') == TRUE ? '1' : '0';
        $pages->url = $request->input('url');
        $pages->slug = Str::slug($request->title);

        if ($request->hasfile('cover')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $pages->cover = $filename;
        }
        $pages->save();
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

   
    public function edit($id)
    {
        $pages = $this->model::find($id);
        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('pages'));
    }

   
    public function update(Request $request, $id)
    {
        $pages = $this->model::find($id);

        $pages->title = $request->input('title');
        $pages->sub_title = $request->input('sub_title');
        $pages->description = $request->input('description');
        $pages->status = $request->input('status') == TRUE ? '1' : '0';
        $pages->feature = $request->input('feature') == TRUE ? '1' : '0';
        $pages->url = $request->input('url');
        $pages->slug = Str::slug($request->title);

        $validatedData = $request->validate([
            'title' => 'required|max:1000',
            'sub_title' => 'max:1000',
            'description' => 'required',
            'cover' => 'sometimes|max:12288|mimes:jpg,jpeg,png',
        ],
        [
            'title.required' => 'Provide title for the post.',
            'title.max' => 'Title length exceed.',
            'sub_title' => 'Sub title too long.',
            'description' => 'This field is required.',
            'cover.required' => 'Please provide any image.',
            'cover.max' => 'Too large file.',
            'cover.mimes' => 'Image must be in jpg, png or jpeg format.',
        ]);

        if($request->hasfile('cover')) {
            $destination = $this->folder_path.$pages->cover;
            if(file_exists($destination)){
                unlink($destination);
            }

            if ($request->hasfile('cover')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('cover');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $pages->cover = $filename;
            }
        }
        $pages->update();

        $request->session()->flash('updated_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }

   
    public function destroy(Request $request, $id)
    {
        $pages = $this->model::find($id);

        $destination = $this->folder_path.$pages->cover;
        
        if(file_exists($destination)){
            unlink($destination);
        }

        $pages->delete();

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }
}
