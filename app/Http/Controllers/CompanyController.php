<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::orderBy('created_at', 'desc')->first();

        return view('companies.index', compact('company'));
    }
}
