<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Multipic;
use App\Models\Pages;
use App\Models\Client;
use App\Models\Posts;
use App\Models\Staff;
use App\Models\SiteSettings;
use Menu;

class SiteController extends Controller
{
    protected $banner;
    protected $category;
    protected $gallery;
    protected $multipic;
    protected $pages;
    protected $posts;
    protected $staff;
    protected $sitesetting;
    protected $client;

    public function __construct()
    {
        $this->banner = new Banner();
        $this->category = new Category();
        $this->gallery = new Gallery();
        $this->multipic = new Multipic();
        $this->pages = new Pages();
        $this->posts = new Posts();
        $this->staff = new Staff();
        $this->client = new Client();
        $this->sitesetting = new SiteSettings();
    }

    public function index()
    {
        $setting = $this->sitesetting->first();
        $banners = $this->banner::where('status', 1)->get();
        $cate = $this->category::where('status', 1)->take(6)->get();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $clients = $this->client::where('status', 1)->get();
        $galery = $this->gallery::take(6)->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.home', compact('setting', 'banners',  'clients', 'footerPosts', 'cate', 'public_menu', 'galery'));
    }

    public function about()
    {
        $setting =  $this->sitesetting->first();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $clients = $this->client::where('status', 1)->get();
        $staffs = $this->staff::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.about', compact('setting',  'footerPosts', 'clients', 'staffs', 'public_menu'));
    }

    public function introduction()
    {
        $setting =  $this->sitesetting->first();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.introduction', compact('setting', 'footerPosts', 'public_menu'));
    }

    public function gallery()
    {
        $setting =  $this->sitesetting->first();
        $galery = $this->gallery::all();
        $clients = $this->client::where('status', 1)->get();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.gallery', compact('setting', 'galery', 'clients', 'footerPosts', 'public_menu'));
    }

    public function news()
    {
        $setting =  $this->sitesetting->first();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $cate = $this->category::where('status', 1)->get();
        $galery = $this->gallery::take(6)->get();
        $page = $this->pages::where('status', 1)
            ->where('feature', 1)
            ->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.news', compact('setting', 'page', 'footerPosts', 'cate', 'galery',  'public_menu'));
    }

    public function viewPage($slug)
    {
        $setting =  $this->sitesetting->first();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $page = $this->pages::where('slug', $slug)->first();
        $cate = $this->category::where('status', 1)->get();
        $galery = $this->gallery::take(6)->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.viewPage', compact('setting', 'page', 'footerPosts', 'cate', 'galery', 'public_menu'));
    }

    public function contact()
    {
        $setting =  $this->sitesetting->first();
        $public_menu = Menu::getByName('default-menu');
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        return view('frontend.contact', compact('setting', 'footerPosts', 'public_menu'));
    }

    public function board()
    {
        $setting =  $this->sitesetting->first();
        $cate = $this->category::where('status', 1)->get();
        $staffs = $this->staff::where('status', 1)->get();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');
        return view('frontend.board', compact('setting', 'cate', 'staffs', 'footerPosts', 'public_menu'));
    }

    public function category()
    {
        $setting =  $this->sitesetting->first();
        $cate = $this->category::where('status', 1)->get();
        $post = $this->posts::all();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();

        $public_menu = Menu::getByName('default-menu');
        return view('frontend.category', compact('setting', 'post', 'cate', 'footerPosts', 'public_menu'));
    }

    public function allPosts()
    {
        $setting =  $this->sitesetting->first();
        $cate = $this->category::where('status', 1)->get();
        $post = $this->posts::where('status', 1)->get();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();

        $public_menu = Menu::getByName('default-menu');
        return view('frontend.allPosts', compact('setting', 'post', 'cate', 'footerPosts', 'public_menu'));
    }

    public function viewCategory($slug)
    {
        $setting =  $this->sitesetting->first();
        $cate = $this->category::all();
        $post = $this->posts::where('status', 1)->where('feature', 1)->get();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');
        if ($this->category::where('slug', $slug)->exists()) {
            $cate = $this->category::where('slug', $slug)->first();
            $post = $this->posts::where('category_id', $cate->id)->where('status', 1)->where('feature', 1)->get();
            return view('frontend.viewPosts', compact('setting', 'cate', 'post', 'footerPosts', 'public_menu'));
        } else {
            return view('frontend.category', compact('setting', 'cate', 'post', 'footerPosts', 'public_menu'));
        }
    }

    public function viewPosts($slug)
    {
        $setting =  $this->sitesetting->first();
        $cate = $this->category::all();
        $post = $this->posts::where('slug', $slug)->first();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');

        return view('frontend.posts', compact('cate', 'setting', 'post', 'footerPosts', 'public_menu'));
    }

    public function viewStaffs($slug)
    {
        $setting =  $this->sitesetting->first();
        $staffs = $this->staff::where('slug', $slug)->first();
        $footerPosts = $this->posts::where('feature', 1)->take(4)->get();
        $public_menu = Menu::getByName('default-menu');

        return view('frontend.viewStaffs', compact('footerPosts', 'setting', 'staffs', 'public_menu'));
    }
}
