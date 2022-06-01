<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationCategory;

class EducationController extends Controller
{
    public function index() {
        $categories = EducationCategory::where('is_active', '=', 1)->get();
        $educations = Education::join('education_categories', 'education.category_education_id', '=', 'education_categories.id')
                    ->join('users', 'education.user_id', '=', 'users.id')
                    ->where('education_categories.is_active', '=', 1)
                    ->orderBy('education.updated_at', 'desc')
                    ->get();
        $educations = Education::with('education_category', 'user')->latest()->filter(request(['kategori-edukasi', 'diposting-oleh', 'pencarian']))
                    ->paginate(6)->withQueryString();
        $educationsMore = Education::join('education_categories', 'education.category_education_id', '=', 'education_categories.id')
                    ->join('users', 'education.user_id', '=', 'users.id')
                    ->where('education_categories.is_active', '=', 1)
                    ->orderByRaw('RAND()')
                    ->take(3)
                    ->get();
		return view('pages.edukasi.index', compact('educations', 'categories', 'educationsMore'));
	}

    public function show(Education $education)
    {
        return view('pages.edukasi.detail', [
            'education' => $education,
            'educationsMore' => Education::join('education_categories', 'education.category_education_id', '=', 'education_categories.id')
                    ->join('users', 'education.user_id', '=', 'users.id')
                    ->where('education_categories.is_active', '=', 1)
                    ->orderByRaw('RAND()')
                    ->take(3)
                    ->get(),
            'categories' => EducationCategory::where('is_active', '=', 1)->get()
        ]);
    }

    public function autocomplete(Request $request)
    {
        return Education::select('title')
        ->where('title', 'like', "%{$request->term}%")
        ->pluck('title');
    }
}
