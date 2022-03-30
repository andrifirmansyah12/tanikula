<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationCategory;

class EducationController extends Controller
{
    public function index() {
		$educations = Education::with('education_category')->get();
		return view('pages.edukasi.index', compact('educations'));
	}

    public function show(Education $education)
    {
        $education = $education;
        return view('pages.edukasi.detail', compact('$education'));
    }
}
