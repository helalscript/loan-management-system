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

    public function updateHeroSection(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'button_text' => 'nullable|string|max:255',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        // ]);
        $validatedData = $this->validateRequest($request);
        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::HeroSection->value)
                ->first();

            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'hero_section',
                    time() . '_' . getFileName($request->file('image'))
                );
            }

            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::HeroSection->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.home_page.hero_section.create')
                ->with('success', 'Services Overview Updated Successfully');
        } catch (\Exception $e) {
            Log::error("HomePageController::updateHeroSection " . $e->getMessage());
            return redirect()->route('cms.home_page.hero_section.create')
                ->with('error', 'Services Overview Not Updated');
        }
    }
    public function getAboutUs()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::AboutUs->value)
            ->first();

        return view('backend.layouts.cms.home_page.about_us.create', compact('data'));
    }

    public function updateAboutUs(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'button_text' => 'nullable|string|max:255',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        // ]);
        $validatedData = $this->validateRequest($request);
        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::AboutUs->value)
                ->first();

            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'about_us',
                    time() . '_' . getFileName($request->file('image'))
                );
            }

            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::AboutUs->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.home_page.about_us_section.create')
                ->with('success', 'Services Overview Updated Successfully');
        } catch (\Exception $e) {
            Log::error("HomePageController::updateAboutUs " . $e->getMessage());
            return redirect()->route('cms.home_page.about_us_section.create')
                ->with('error', 'Services Overview Not Updated');
        }
    }
    public function getQuickRateCheck()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::QuickRateCheck->value)
            ->first();

        return view('backend.layouts.cms.home_page.quick_rate_check.create', compact('data'));
    }

    public function updateQuickRateCheck(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'sub_title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            
        //     'button_text' => 'nullable|string|max:255',
        // ]);

        $validatedData = $this->validateRequest($request);
        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::QuickRateCheck->value)
                ->first();
            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'services_overview',
                    time() . '_' . getFileName($request->file('image'))
                );
            }
            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::QuickRateCheck->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.home_page.quick_rate_check_section.create')
                ->with('success', 'Work Process Updated Successfully');
        } catch (\Exception $e) {
            Log::error("HomePageController::updateWorkProcess " . $e->getMessage());
            return redirect()->route('cms.home_page.quick_rate_check_section.create')
                ->with('error', 'Work Process Not Updated');
        }
    }

    public function getFaq()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::FaqContainer->value)
            ->first();

        return view('backend.layouts.cms.home_page.faq.create', compact('data'));
    }

    public function updateFaq(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'sub_title' => 'nullable|string|max:255',
        // ]);
        $validatedData = $this->validateRequest($request);
        CMS::updateOrCreate(
            [
                'page' => Page::HomePage->value,
                'section' => Section::FaqContainer->value,
            ],
            $validatedData
        );

        return redirect()->back()
            ->with('success', 'FAQ Updated Successfully');
    }

    

    public function getCustomText()
    {
        $data = CMS::where('page', Page::HomePage->value)
            ->where('section', Section::CustomText->value)
            ->first();
        return view('backend.layouts.cms.home_page.custom_text.create', compact('data'));
    }

    public function updateCustomText(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'sub_title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        // ]);

        $validatedData = $this->validateRequest($request);
        try {
            $data = CMS::where('page', Page::HomePage->value)
                ->where('section', Section::CustomText->value)
                ->first();
            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'services_overview',
                    time() . '_' . getFileName($request->file('image'))
                );
            }
            CMS::updateOrCreate(
                [
                    'page' => Page::HomePage->value,
                    'section' => Section::CustomText->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.home_page.custom_text_section.create')
                ->with('success', 'Work Process Updated Successfully');
        } catch (\Exception $e) {
            Log::error("HomePageController::updateCustomText " . $e->getMessage());
            return redirect()->route('cms.home_page.custom_text_section.create')
                ->with('error', 'Work Process Not Updated');
        }
    }

    // ================= Helper Functions =================
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sub_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'tags' => 'nullable|json',
            'button_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);
    }

    private function handleFileUpload(Request $request, $data, $folder)
    {
        $validatedData = $request->only(['title', 'sub_title', 'description', 'sub_description']);

        if ($request->hasFile('image')) {
            if ($data && $data->image && file_exists(public_path($data->image))) {
                Helper::fileDelete(public_path($data->image));
            }
            $validatedData['image'] = Helper::fileUpload(
                $request->file('image'),
                $folder,
                time() . '_' . getFileName($request->file('image'))
            );
        }

        return $validatedData;
    }

}
