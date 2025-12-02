<?php

namespace Modules\Contact\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact::index');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function submitting(ContactRequest $request)
    {

        $data = $request->validated();
        // \Mail::to('mahmodaborakika2@gmail.com')->send(new ContactMail($data));
        $text = "Your Message Has Been Sent !";
        $thanks = "Thanks For Contacting Us";
        $route = 'contact.index';
        return view('contact::success', compact('text', 'thanks', 'route'));
    }
}
