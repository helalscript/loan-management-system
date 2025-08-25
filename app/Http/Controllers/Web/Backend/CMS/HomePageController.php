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

    public function getWelcomeSection()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::WelcomeSection->value)
            ->first();
        return view('backend.layouts.cms.home_page.welcome_section.create', compact('data'));
    }
    public function updateWelcomeSection(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            // 'description' => 'required|string|max:1000',
            'sub_description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::WelcomeSection->value)
                ->first();
            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'trust_section', time() . '_' . getFileName($request->file('image')));
            }
           
            // Update or create the CMS entry for the trust section
            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::WelcomeSection->value,
                ],
                $validatedData
            );
            return redirect()->route('cms.home_page.welcome_section.create')->with('success', 'Trust Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("HomePageController::updateTrustSection" . $e->getMessage());
            return redirect()->route('cms.home_page.welcome_section.create')->with('error', 'Trust Section not Updated Successfully');
        }

    }
    public function getEmployer()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::EmployerSection->value)
            ->first();
        return view('backend.layouts.cms.home_page.employer_section.create', compact('data'));
    }
    public function updateEmployer(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            // 'description' => 'required|string|max:1000',
            'sub_description' => 'required|string|max:1000',
            'button_text' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::EmployerSection->value)
                ->first();
            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'trust_section', time() . '_' . getFileName($request->file('image')));
            }
            // Update or create the CMS entry for the trust section
            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::EmployerSection->value,
                ],
                $validatedData
            );
            return redirect()->route('cms.home_page.employer_section.create')->with('success', 'Trust Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("HomePageController::updateTrustSection" . $e->getMessage());
            return redirect()->route('cms.home_page.employer_section.create')->with('error', 'Trust Section not Updated Successfully');
        }

    }

    public function getJobSeeker()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::JobSeekersSection->value)
            ->first();
        return view('backend.layouts.cms.home_page.job_seeker_section.create', compact('data'));
    }
    public function updateJobSeeker(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            // 'description' => 'required|string|max:1000',
            'sub_description' => 'required|string|max:1000',
            'button_text' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::JobSeekersSection->value)
                ->first();
            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'trust_section', time() . '_' . getFileName($request->file('image')));
            }
            // Update or create the CMS entry for the trust section
            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::JobSeekersSection->value,
                ],
                $validatedData
            );
            return redirect()->route('cms.home_page.job_seeker_section.create')->with('success', 'Trust Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("HomePageController::updateTrustSection" . $e->getMessage());
            return redirect()->route('cms.home_page.job_seeker_section.create')->with('error', 'Trust Section not Updated Successfully');
        }

    }
 
}
