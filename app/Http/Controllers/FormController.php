<?php

namespace App\Http\Controllers;

use App\Exports\FormExports;
use App\Models\FormEntry;
use App\Models\NewsletterEntry;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{

    function newsletterStore(Request $request){

        Session::flash('success','Thank you for your registering.');

        $formEntry = NewsletterEntry::create($request->except('_token'));

        if(!$formEntry)
            Session::flash('error','There was an error while saving. Please try again later.');

        return redirect()->back();
    }


    public function export()
    {
        return Excel::download(new FormExports(), 'test.xlsx');
    }


}
