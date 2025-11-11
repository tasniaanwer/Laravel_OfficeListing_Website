<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipOffice;
use App\Models\Office;

class InternshipController extends Controller
{
    public function index() {
      // route --> /internships/
      $internships = InternshipOffice::with('office')->orderBy('created_at', 'desc')->paginate(10);

      return view('internships.index', ['internships' => $internships]);
    }

    public function show(InternshipOffice $internship) {
      // route --> /internships/{id}
      $internship->load('office');

      return view('internships.show', ['internship' => $internship]);
    }

    public function create() {
      // route --> /internships/create
      $offices = Office::all();

      return view('internships.create', ['offices' => $offices]);
    }

    public function store(Request $request) {
      // --> /internships/ (POST)

      // Base validation for internship fields
      $rules = [
        'position' => 'required|string|max:255',
        'about' => 'required|string|min:20|max:1000',
        'office_select_option' => 'required|in:existing,new',
      ];

      // Additional validation based on office selection
      if ($request->office_select_option === 'existing') {
        $rules['office_id'] = 'required|exists:offices,id';
      } else {
        $rules['new_office_name'] = 'required|string|max:255';
        $rules['new_office_location'] = 'required|string|max:255';
        $rules['new_office_description'] = 'required|string|min:10|max:1000';
      }

      $validated = $request->validate($rules);

      // Handle office selection
      if ($request->office_select_option === 'existing') {
        $officeId = $validated['office_id'];
      } else {
        // Create new office
        $newOffice = Office::create([
          'name' => $validated['new_office_name'],
          'location' => $validated['new_office_location'],
          'description' => $validated['new_office_description'],
        ]);
        $officeId = $newOffice->id;
      }

      // Create internship
      InternshipOffice::create([
        'position' => $validated['position'],
        'about' => $validated['about'],
        'office_id' => $officeId,
      ]);

      return redirect()->route('internships.index')->with('success', 'Internship created!');
    }

    public function destroy(InternshipOffice $internship) {
      // --> /internships/{id} (DELETE)
      $internship->delete();

      return redirect()->route('internships.index')->with('success', 'Internship deleted!');
    }

    // edit() and update() for edit view and update requests
    // we won't be using these routes
}