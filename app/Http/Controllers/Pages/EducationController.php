<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationCategory;

class EducationController extends Controller
{
    public function index() {
        $categories = EducationCategory::all();
        $educationsMore = Education::orderByRaw('RAND()')->take(3)->get();
		$educations = Education::with('education_category', 'user')->latest()->paginate(6)->withQueryString();
		return view('pages.edukasi.index', compact('educations', 'categories', 'educationsMore'));
	}

    public function show(Education $education)
    {
        return view('pages.edukasi.detail', [
            'education' => $education,
            'educationsMore' => Education::orderByRaw('RAND()')->take(3)->get(),
            'categories' => EducationCategory::all()
        ]);
    }
}
