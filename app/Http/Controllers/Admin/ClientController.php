<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;

class ClientController extends BaseController
{
    protected $base_route = 'admin.client';
    protected $view_path = 'admin.client';
    protected $panel = 'Client';
    protected $folder_path;
    protected $model;
    // protected $prefix_path_image = '/image/client/';


    public function __construct() {
        $this->model = new Client();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'client' . DIRECTORY_SEPARATOR;
        
    }
   
    public function index()
    {
        $client = $this->model::all();
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('client'));
    }

   
    public function create()
    {
        return view(parent::loadDefaultDataToView($this->view_path.'.create'));
    }

   
    public function store(Request $request)
    {
        $client = $this->model;

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|max:5120|mimes:jpg,svg,png,jpeg',
        ],
        [
            'title.required' => 'Please provide title for the client.',
            'title.max' => 'Title length exceed.',
            'image.required' => 'Image is required.',
            'image.max' => 'Image size too large.',
            'image.mimes' => 'Image must be in jpg, png, jpeg or svg.',
        ]);

        $client->title = $request->input('title');
        $client->url = $request->input('url');
        $client->status = $request->input('status') == TRUE ? '1' : '0';

        if ($request->hasfile('image')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $client->image = $filename;
        }

        $client->save();
        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }

   
    public function edit($id)
    {
        $client = $this->model::find($id);
        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('client'));
    }

   
    public function update(Request $request, $id)
    {
        $client = $this->model::find($id);

        $client->title = $request->input('title');
        $client->url = $request->input('url');
        $client->status = $request->input('status') == TRUE ? '1' : '0';

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'sometimes|max:5120|mimes:jpg,svg,png,jpeg',
        ],
        [
            'title.required' => 'Please provide title for the client.',
            'title.max' => 'Title length exceed.',
            'image.required' => 'Image is required.',
            'image.max' => 'Image size too large.',
            'image.mimes' => 'Image must be in jpg, png, jpeg or svg.',
        ]);

        if($request->hasfile('image')) {
            $destination = $this->folder_path.$client->image;
            if(file_exists($destination)){
                unlink($destination);
            }

            if ($request->hasfile('image')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $client->image = $filename;
            }
        }

        $client->update();

        $request->session()->flash('updated_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }

   
    public function destroy(Request $request, $id)
    {
        $client = $this->model::find($id);
        $destination = $this->folder_path.$client->image;
        
        if(file_exists($destination)){
            unlink($destination);
        }

        $client->delete();

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }
}
