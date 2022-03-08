<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Mail;
use App\Mail\Message;


class ContactController extends Controller
{
    protected $base_route = 'admin.contact';
    protected $view_path = 'admin.contact';
    protected $panel = 'Messages';
    protected $folder_path;
    protected $model;


    public function __construct() {
        $this->model = new Contact();
    }

    public function index()
    {
        $contact = $this->model::all();   
        return view('admin.contact.index', compact('contact'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        $details = $this->model;
        $details->name = $request->input('name');
        $details->email = $request->input('email');
        $details->phone = $request->input('phone');
        $details->company = $request->input('company');
        $details->address = $request->input('address');
        $details->message = $request->input('message');
        $details->status = $request->input('status') == TRUE ? '1' : '0';

        $details->save();

        // $contact = 'Thank you for your message we will contact you soon.';

        Mail::to('kdipendra642@gmail.com')->send(new Message($details));
        return back()->with('success', 'Your message has been sent we will contact you soon.' );
        
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $contact = $this->model::find($id);
        return view($this->view_path.'.edit', compact('contact'));
    }

    
    public function update(Request $request, $id)
    {
        $contact = $this->model::find($id);
        $contact->status = $request->input('status') == TRUE ? '1' : '0';

        $contact->update();

        $request->session()->flash('updated_message', $this->panel . ' read.');
        return redirect()->route($this->base_route);
    }

   
    public function destroy(Request $request, $id)
    {
        $contact = $this->model::find($id);

        $contact->delete();

        $request->session()->flash('delete_message', $this->panel . ' successfully deleted.');
        return redirect()->route($this->base_route);
    }
}
