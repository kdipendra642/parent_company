<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\BaseController;

class GalleryController extends BaseController
{
    protected $base_route = 'admin.gallery';
    protected $view_path = 'admin.gallery';
    protected $panel = 'Gallery';
    protected $folder_path;
    protected $model;


    public function __construct() {
        $this->model = new Gallery();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR;
        
    }
   
    public function index()
    {
        $gallery = Gallery::all();
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('gallery'));
    }

   
    public function create()
    {
        return view(parent::loadDefaultDataToView($this->view_path.'.create'));
    }

   
    public function store(Request $request)
    {
        if($request->hasfile('image')){
            foreach ($request->file('image') as $img) {
                $filename = $img->getClientOriginalName();
                $img->storeAs('public/image/gallery', $filename);
                $imgData = new Gallery();
                $imgData->image = $filename;
                $imgData->save();
            }
        }

        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }
   
    public function destroy($img_id)
    {
         $images = Gallery::findOrFail($img_id);
         if (File::exists('storage/image/gallery/'.$images->image)) {
            File::delete('storage/image/gallery/'.$images->image);
        }

        Gallery::find($img_id)->delete();
       return back();
    }
}
