<?php
namespace App\Exports;

use App\Models\NewsletterEntry;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FormExports implements FromView
{
    public function view(): View
    {
        $entries= NewsletterEntry::get()->toArray();

        return view('excel', [
            'data' => $entries
        ]);
    }
}
