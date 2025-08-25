<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class HomePageController extends Controller
{
    public function getHeroSection()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::HeroSection->value)
            ->first();
        return view('backend.layouts.cms.home_page.hero_section.create', compact('data'));
    }
    public function updateHerosection(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::HeroSection->value)
                ->first();

            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'hero_section', time() . '_' . getFileName($request->file('image')));
            }
            // Update or create the CMS entry for the hero section
            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::HeroSection->value,
                ],
                $validatedData
            );
            return redirect()->route('cms.home_page.hero_section.create')->with('success', 'Hero Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("HomePageController::updateHeroSection" . $e->getMessage());
            return redirect()->route('cms.home_page.hero_section.create')->with('error', 'Hero Section not Updated Successfully');
        }
    }
// ================= HOME PAGE =================
public function getServicesOverview()
{
    $data = CMS::where('page', Page::HomePage->value)
        ->where('section', Section::ServicesOverview->value)
        ->first();

    return view('backend.layouts.cms.home_page.services_overview.create', compact('data'));
}

public function updateServicesOverview(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'nullable|string|max:255',
        'sub_title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'sub_description' => 'nullable|string',
        'button_text' => 'nullable|string|max:255',
        'link_url' => 'nullable|url',
    ]);

    try {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::ServicesOverview->value)
            ->first();

        if ($request->hasFile('image')) {
            if ($data && $data->image && file_exists(public_path($data->image))) {
                Helper::fileDelete(public_path($data->image));
            }
            $validatedData['image'] = Helper::fileUpload(
                $request->file('image'),
                'services_overview',
                time().'_'.getFileName($request->file('image'))
            );
        }

        CMS::updateOrCreate(
            [
                'page' => Page::HomePage->value,
                'section' => Section::ServicesOverview->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.home_page.services_overview_section.create')
            ->with('success', 'Services Overview Updated Successfully');
    } catch (\Exception $e) {
        Log::error("HomePageController::updateServicesOverview ".$e->getMessage());
        return redirect()->route('cms.home_page.services_overview_section.create')
            ->with('error', 'Services Overview Not Updated');
    }
}
public function getWorkProcess()
{
    $data = CMS::where('page', Page::HomePage->value)
        ->where('section', Section::WorkProcess->value)
        ->first();

    return view('backend.layouts.cms.home_page.work_process.create', compact('data'));
}

public function updateWorkProcess(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    CMS::updateOrCreate(
        [
            'page' => Page::HomePage->value,
            'section' => Section::WorkProcess->value,
        ],
        $validatedData
    );

    return redirect()->route('cms.home_page.work_process_section.create')
        ->with('success', 'Work Process Updated Successfully');
}
public function getFaq()
{
    $data = CMS::where('page', Page::HomePage->value)
        ->where('section', Section::Faq->value)
        ->first();

    return view('backend.layouts.cms.home_page.faq.create', compact('data'));
}

public function updateFaq(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|json', // for multiple questions/answers
    ]);

    CMS::updateOrCreate(
        [
            'page' => Page::HomePage->value,
            'section' => Section::Faq->value,
        ],
        $validatedData
    );

    return redirect()->route('cms.home_page.faq_section.create')
        ->with('success', 'FAQ Updated Successfully');
}
public function getTestimonials()
{
    $data = CMS::where('page', Page::HomePage->value)
        ->where('section', Section::Testimonials->value)
        ->first();

    return view('backend.layouts.cms.home_page.testimonials.create', compact('data'));
}

public function updateTestimonials(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|json', // store multiple testimonials
    ]);

    CMS::updateOrCreate(
        [
            'page' => Page::HomePage->value,
            'section' => Section::Testimonials->value,
        ],
        $validatedData
    );

    return redirect()->route('cms.home_page.testimonial_section.create')
        ->with('success', 'Testimonials Updated Successfully');
}

 
}
