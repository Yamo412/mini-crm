<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Check if the request is an AJAX call from DataTables
    if ($request->ajax()) {
        $companies = Company::select(['id', 'name', 'logo']);

        return datatables()->of($companies)
            ->addColumn('logo', function ($company) {
                if ($company->logo) {
                    return '<img src="' . asset('storage/' . $company->logo) . '" alt="Company Logo" style="width: 50px; height: auto;">';
                }
                return 'N/A';
            })
            ->addColumn('actions', function ($company) {
                return '<a href="' . route('companies.edit', $company->id) . '" class="btn btn-primary">Edit</a>
                        <form action="' . route('companies.destroy', $company->id) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>';
            })
            ->rawColumns(['logo', 'actions']) // Ensure HTML is rendered correctly
            ->make(true);
    }

    return view('companies.index');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=100,min_height=100', // Updated dimensions
    ], [
        'logo.dimensions' => 'The logo must be at least 100x100 pixels.',
    ]);

    $company = new Company();
    $company->name = $request->name;

    // Handle logo upload
    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public');
        $company->logo = $path;
    }

    $company->save();

    return redirect()->route('companies.index')->with('success', 'Company added successfully!');
}



    /**
     * Show the form for editing the specified comapny.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company->fill($request->all());

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
        }

        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
    }
}
