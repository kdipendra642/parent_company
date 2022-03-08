<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use App\Models\SiteSettings;


class SiteSettingsController extends BaseController
{
    protected $panel = 'SiteSettings';
    protected $view_path = 'admin.settings';
    protected $folder_path;
    protected $model;

    public function __construct() {
        $this->model = new SiteSettings();
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'sitesettings' . DIRECTORY_SEPARATOR;
        
    }
   
    public function index()
    {
        $general = DB::table('site_settings')->first();
        return view('admin.settings.general', compact('general'));
    }
    public function create()
    {
        return view($this->view_path.'.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        $general = $this->model;

        $general->site_name = $request->input('site_name');
        $general->site_title = $request->input('site_title');
        $general->site_description = $request->input('site_description');
        $general->meta_title = $request->input('meta_title');
        $general->social_profile_fb = $request->input('social_profile_fb');
        $general->social_profile_twitter = $request->input('social_profile_twitter');
        $general->social_profile_insta = $request->input('social_profile_insta');
        $general->social_profile_youtube = $request->input('social_profile_youtube');
        $general->social_profile_linkedin = $request->input('social_profile_linkedin');
        $general->contact_title = $request->input('contact_title');
        $general->contact_phone = $request->input('contact_phone');
        $general->contact_phone2 = $request->input('contact_phone2');
        $general->contact_email = $request->input('contact_email');
        $general->contact_email2 = $request->input('contact_email2');
        $general->address_title = $request->input('address_title');
        $general->address_1 = $request->input('address_1');
        $general->address_2 = $request->input('address_2');
        $general->about_title = $request->input('about_title');
        $general->about_sub_title = $request->input('about_sub_title');
        $general->about_description = $request->input('about_description');

        if ($request->hasfile('logo')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $general->logo = $filename;
        }

        if ($request->hasfile('favicon')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('favicon');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $general->favicon = $filename;
        }

        if ($request->hasfile('about_image')) {
            parent::createFolderIfNotExist($this->folder_path);
            $file = $request->file('about_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move($this->folder_path, $filename);
            $general->about_image = $filename;
        }


        $general->save();
        $request->session()->flash('success_message', 'General settings successfully added.');
        return redirect()->route('admin.settings');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        $general = $this->model::find($id);

        $general->site_name = $request->input('site_name');
        $general->site_title = $request->input('site_title');
        $general->site_description = $request->input('site_description');
        $general->meta_title = $request->input('meta_title');
        $general->social_profile_fb = $request->input('social_profile_fb');
        $general->social_profile_twitter = $request->input('social_profile_twitter');
        $general->social_profile_insta = $request->input('social_profile_insta');
        $general->social_profile_youtube = $request->input('social_profile_youtube');
        $general->social_profile_linkedin = $request->input('social_profile_linkedin');
        $general->contact_title = $request->input('contact_title');
        $general->contact_phone = $request->input('contact_phone');
        $general->contact_phone2 = $request->input('contact_phone2');
        $general->contact_email = $request->input('contact_email');
        $general->contact_email2 = $request->input('contact_email2');
        $general->address_title = $request->input('address_title');
        $general->address_1 = $request->input('address_1');
        $general->address_2 = $request->input('address_2');
        $general->about_title = $request->input('about_title');
        $general->about_sub_title = $request->input('about_sub_title');
        $general->about_description = $request->input('about_description');

        if($request->hasfile('logo')) {
            $destination = $this->folder_path.$general->logo;
            if(file_exists($destination)){
                unlink($destination);
            }
            if ($request->hasfile('logo')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $general->logo = $filename;
            }
        }

        if($request->hasfile('favicon')) {
            $destination = $this->folder_path.$general->favicon;
            if(file_exists($destination)){
                unlink($destination);
            }

            if ($request->hasfile('favicon')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('favicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $general->favicon = $filename;
            }
        }

        if($request->hasfile('about_image')) {
            $destination = $this->folder_path.$general->about_image;
            if(file_exists($destination)){
                unlink($destination);
            }

            if ($request->hasfile('about_image')) {
                parent::createFolderIfNotExist($this->folder_path);
                $file = $request->file('about_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move($this->folder_path, $filename);
                $general->about_image = $filename;
            }
        }


        $general->update();

        $request->session()->flash('success_message', 'General settings successfully updated.');
        return redirect()->route('admin.settings');


    }

    public function menu() {
        return view('admin.menus.menu');
    }

   
}
