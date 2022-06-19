<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\EducationCategory;
use App\Models\Farmer;
use App\Models\HistoryEducation;
use Illuminate\Support\Carbon;

class EducationController extends Controller
{
    public function index() {
        $categories = EducationCategory::where('is_active', '=', 1)->get();
        $educations = Education::with('historyEducation')
                    ->join('education_categories', 'education.category_education_id', '=', 'education_categories.id')
                    ->join('users', 'education.user_id', '=', 'users.id')
                    ->select('education.*', 'education_categories.name as name')
                    ->where('education_categories.is_active', '=', 1)
                    ->orderBy('education.updated_at', 'desc')
                    ->filter(request(['kategori-edukasi', 'diposting-oleh', 'pencarian']))
                    ->paginate(6)
                    ->withQueryString();
        $educationsMore = Education::with('historyEducation')
                    ->join('education_categories', 'education.category_education_id', '=', 'education_categories.id')
                    ->join('users', 'education.user_id', '=', 'users.id')
                    ->select('education.*', 'education_categories.name as name')
                    ->where('education_categories.is_active', '=', 1)
                    ->orderByRaw('RAND()')
                    ->take(3)
                    ->get();
		return view('pages.edukasi.index', compact('educations', 'categories', 'educationsMore'));
	}

    public function show(Education $education)
    {
        $farmer = Farmer::where('user_id', '=', auth()->user()->id)->get();
        foreach ($farmer as $data) {
            $education = Education::findOrFail($education->id);
            if ($education) {
                $checkHistory = HistoryEducation::where('education_id', $education->id)->exists();
                if (!$checkHistory) {
                    $historyEducation = new HistoryEducation();
                    $historyEducation->education_id = $education->id;
                    $historyEducation->farmer_id = $data->id;
                    $historyEducation->save();
                }
            }
        }

        return view('pages.edukasi.detail', [
            'education' => $education,
            'educationsMore' => Education::with('historyEducation')
                    ->join('education_categories', 'education.category_education_id', '=', 'education_categories.id')
                    ->join('users', 'education.user_id', '=', 'users.id')
                    ->select('education.*', 'education_categories.name as name')
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
