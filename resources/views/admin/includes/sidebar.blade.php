<div id="sidebar"  class="nav-collapse ">
<!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <li>
            <a class="{{ 'dashboard' == request()->path() ? 'active' : '' }}" href="/dashboard">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sub-menu  ">
            <a href="javascript:;" class="{{ ( (request()->is('admin/category*')) || (request()->is('admin/posts*')) || (request()->is('admin/pages*')) ) ? 'active open ' : '' }}">
                <i class="fa fa-rocket"></i>
                <span>Contents</span>
            </a>
            <ul class="sub">
                <li class="{{ 'admin/category' == request()->path() ? 'active' : '' }}"><a  href="{{ route('admin.category') }}" > <i class="fa fa-list-alt"></i>  Category</a></li>
            </ul>
            <ul class="sub">
                <li class="{{ 'admin/posts' == request()->path() ? 'active' : '' }}"><a  href="{{ route('admin.posts') }}" > <i class="fa fa-book"></i>  Posts</a></li>
            </ul>
            <ul class="sub">
                <li class="{{ 'admin/pages' == request()->path() ? 'active' : '' }}"><a  href="{{ route('admin.pages') }}" > <i class="fa fa-file-o"></i>  Pages</a></li>
            </ul>
           
        </li>
        <li class="sub-menu  ">
            <a href="javascript:;" class="{{ ((request()->is('admin/banner*')) || (request()->is('admin/client*')))  ? 'active open ' : '' }}">
                <i class="fa fa-shopping-cart"></i>
                <span>Accessories</span>
            </a>
            <ul class="sub">
                <li class="{{ 'admin/banner' == request()->path() ? 'active' : '' }}"><a  href="{{ route('admin.banner') }}" > <i class="fa fa-arrows-h"></i>  Sliders</a></li>
                <li class="{{ 'admin/client' == request()->path() ? 'active' : '' }}"><a  href="{{ route('admin.client') }}" > <i class="fa fa-user-md"></i>  Clients</a></li>
            </ul>
           
        </li>
        <li class="sub-menu ">
            <a href="javascript:;" class="{{ ((request()->is('admin/register*')) || (request()->is('admin/staff*')))  ? 'active open ' : '' }}">
                <i class="fa fa-users"></i>
                <span>Users and Staffs</span>
            </a>
            <ul class="sub" >
                <li class="{{ 'admin/register' == request()->path() ? 'active' : '' }}"><a href="{{ route('admin.register') }}"><i class="fa fa-user"></i><span>Users</span></a></li>
            </ul>
            <ul class="sub" >
                <li class="{{ 'admin/staff' == request()->path() ? 'active' : '' }}"><a href="{{ route('admin.staff') }}"><i class="fa fa-users"></i><span>Staffs</span></a></li>
            </ul>
        </li>
        <li>
            <a class="{{ 'admin/gallery' == request()->path() ? 'active' : '' }}" href="{{ route('admin.gallery') }}">
                <i class="fa fa-picture-o"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li>
            <a class="{{ 'admin/contact' == request()->path() ? 'active' : '' }}" href="{{ route('admin.contact') }}">
                <i class="fa fa-mobile"></i>
                <span>Messages</span>
            </a>
        </li>
        <li>
            <a class="{{ 'admin/menus' == request()->path() ? 'active' : '' }}" href="{{ route('admin.menus') }}">
                <i class="fa fa-bars"></i>
                <span>Menus</span>
            </a>
        </li>
        <li>
            <a class="{{ 'admin/settings' == request()->path() ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                <i class="fa fa-gears"></i>
                <span>Settings</span>
            </a>
        </li>

    </ul>
       
<!-- sidebar menu end-->
</div>