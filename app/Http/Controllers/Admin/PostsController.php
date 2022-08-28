<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Multipic;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostsController extends BaseController
{
    protected $base_route = 'admin.posts';
    protected $view_path = 'admin.posts';
    protected $panel = 'Posts';
    protected $folder_path;
    protected $model;


    public function __construct()
    {
        $this->model = new Posts();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'posts' . DIRECTORY_SEPARATOR;
    }

    public function index()
    {
        $posts = $this->model::all();
        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('posts'));
    }


    public function create()
    {
        $category = Category::all();
        return view(parent::loadDefaultDataToView($this->view_path . '.create'), compact('category'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $posts = $this->model;

        $validatedData = $request->validate(
            [
                'title' => 'required|max:1000',
                'description' => 'required',
                'cover' => 'required|max:12288|mimes:jpg,jpeg,png',
            ],
            [
                'title.required' => 'Provide title for the post.',
                'title.max' => 'Title length exceed.',
                'description.max' => 'Too long description.',
                'cover.required' => 'Please provide any image.',
                'cover.max' => 'Too large file.',
                'cover.mimes' => 'Image must be in jpg png or jpeg format.',
            ]
        );

        $posts->title = $request->input('title');
        $posts->category_id = $request->input('category_id');
        $posts->description = $request->input('description');
        $posts->status = $request->input('status') == TRUE ? '1' : '0';
        $posts->feature = $request->input('feature') == TRUE ? '1' : '0';
        $posts->url = $request->input('url');
        $posts->slug = Str::slug($request->title);


        if ($request->hasfile('cover')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($this->folder_path, $filename);
            $posts->cover = $filename;
        }
        $posts->save();

        // $post_imgs = $request->file('image');

        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $img) {
                $filename = $img->getClientOriginalName();
                $img->storeAs('public/image/multipic', $filename);
                $imgData = new Multipic;
                $imgData->posts_id = $posts->id;
                $imgData->image = $filename;

                $imgData->save();
            }
        }

        // dd('Outside has file case');


        $request->session()->flash('success_message', $this->panel . ' successfully added.');
        return redirect()->route($this->base_route);
    }


    public function edit($id)
    {
        $posts = $this->model::find($id);
        $category = Category::latest()->select('id', 'title')->get();
        return view(parent::loadDefaultDataToView($this->view_path . '.edit'), compact('posts', 'category'));
    }


    public function update(Request $request, $id)
    {
        $posts = $this->model::find($id);
        $posts->title = $request->input('title');
        $posts->category_id = $request->input('category_id');
        $posts->description = $request->input('description');
        $posts->status = $request->input('status') == TRUE ? '1' : '0';
        $posts->feature = $request->input('feature') == TRUE ? '1' : '0';
        $posts->url = $request->input('url');
        $posts->slug = Str::slug($request->title);

        $validatedData = $request->validate(
            [
                'title' => 'required|max:1000',
                'description' => 'required',
                'cover' => 'sometimes|max:12288|mimes:jpg,jpeg,png',
                'image' => 'sometimes',
            ],
            [
                'title.required' => 'Provide title for the post.',
                'title.max' => 'Title length exceed.',
                'description.max' => 'Too long description.',
                'cover.required' => 'Please provide any image.',
                'cover.max' => 'Too large file.',
                'cover.mimes' => 'Image must be in jpg png or jpeg format.',
            ]
        );

        if ($request->hasfile('cover')) {
            $destination = $this->folder_path . $posts->cover;
            if (file_exists($destination)) {
                unlink($destination);
            }

            if ($request->hasfile('cover')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('cover');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move($this->folder_path, $filename);
                $posts->cover = $filename;
            }
        }
        $posts->update();

        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $img) {
                $filename = $img->getClientOriginalName();
                $img->storeAs('public/image/multipic', $filename);
                $imgData = new Multipic;
                $imgData->posts_id = $posts->id;
                $imgData->image = $filename;

                $imgData->save();
            }
        }

        $request->session()->flash('updated_message', $this->panel . ' successfully updated.');
        return redirect()->route($this->base_route);
    }


    public function destroy(Request $request, $id)
    {
        $posts = $this->model::find($id);

        $destination = $this->folder_path . $posts->cover;

        if (file_exists($destination)) {
            unlink($destination);
        }

        $posts->delete();

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }

    public function destroy_image($img_id)
    {
        $images = Multipic::findOrFail($img_id);
        if (File::exists('storage/image/multipic/' . $images->image)) {
            File::delete('storage/image/multipic/' . $images->image);
        }

        Multipic::find($img_id)->delete();
        return back();
    }
}
