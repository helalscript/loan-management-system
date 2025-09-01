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

class ResourcesPageController extends Controller
{
    // ============== HERO SECTION ==============
    public function getHeroSection()
    {
        $data = CMS::where('page', Page::ResourcesPage->value)
            ->where('section', Section::HeroSection->value)
            ->first();

        return view('backend.layouts.cms.resources_page.hero_section.create', compact('data'));
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
            $data = CMS::where('page', Page::ResourcesPage->value)
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
                    'page' => Page::ResourcesPage->value,
                    'section' => Section::HeroSection->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.resources_page.hero_section.create')
                ->with('success', 'Services Overview Updated Successfully');
        } catch (\Exception $e) {
            Log::error("ResourcesPageController::updateHeroSection " . $e->getMessage());
            return redirect()->route('cms.resources_page.hero_section.create')
                ->with('error', 'Services Overview Not Updated');
        }
    }
    // ================= Loan Calculator =================
    // public function getLoanCalculator()
    // {
    //     $data = CMS::where('page', Page::ResourcesPage->value)
    //         ->where('section', Section::LoanCalculator->value)
    //         ->first();

    //     return view('backend.layouts.cms.resources_page.loan_calculator.create', compact('data'));
    // }

    // public function updateLoanCalculator(Request $request)
    // {
    //     $this->validateRequest($request);

    //     try {
    //         $data = CMS::where('page', Page::ResourcesPage->value)
    //             ->where('section', Section::LoanCalculator->value)
    //             ->first();

    //         $validatedData = $this->handleFileUpload($request, $data, 'resources_page');

    //         CMS::updateOrCreate(
    //             ['page' => Page::ResourcesPage->value, 'section' => Section::LoanCalculator->value],
    //             $validatedData
    //         );

    //         return redirect()->route('cms.resources_page.loan_calculator.create')
    //             ->with('success', 'Loan Calculator Section Updated Successfully');
    //     } catch (Exception $e) {
    //         Log::error("ResourcesPageController::updateLoanCalculator - " . $e->getMessage());
    //         return redirect()->route('cms.resources_page.loan_calculator.create')
    //             ->with('error', 'Loan Calculator Section Not Updated');
    //     }
    // }

    // ================= Ripe Credit Tracker Guide =================
    public function getRipeCreditTrackerGuide()
    {
        $data = CMS::where('page', Page::ResourcesPage->value)
            ->where('section', Section::RipeCreditTrackerGuide->value)
            ->first();

        return view('backend.layouts.cms.resources_page.ripe_credit_tracker_guide.create', compact('data'));
    }

    public function updateRipeCreditTrackerGuide(Request $request)
    {
        $this->validateRequest($request);

        try {
            $data = CMS::where('page', Page::ResourcesPage->value)
                ->where('section', Section::RipeCreditTrackerGuide->value)
                ->first();

            $validatedData = $this->handleFileUpload($request, $data, 'resources_page');

            CMS::updateOrCreate(
                ['page' => Page::ResourcesPage->value, 'section' => Section::RipeCreditTrackerGuide->value],
                $validatedData
            );

            return redirect()->route('cms.resources_page.ripe_credit_tracker_guide.create')
                ->with('success', 'Ripe Credit Tracker Guide Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("ResourcesPageController::updateRipeCreditTrackerGuide - " . $e->getMessage());
            return redirect()->route('cms.resources_page.ripe_credit_tracker_guide.create')
                ->with('error', 'Ripe Credit Tracker Guide Section Not Updated');
        }
    }

    // ================= Repayment Options =================
    public function getRepaymentOptions()
    {
        $data = CMS::where('page', Page::ResourcesPage->value)
            ->where('section', Section::RepaymentOptions->value)
            ->first();

        return view('backend.layouts.cms.resources_page.repayment_options.create', compact('data'));
    }

    public function updateRepaymentOptions(Request $request)
    {
        $validatedData = $this->validateRequest($request);

        try {
            $data = CMS::where('page', Page::ResourcesPage->value)
                ->where('section', Section::RepaymentOptions->value)
                ->first();

            CMS::updateOrCreate(
                ['page' => Page::ResourcesPage->value, 'section' => Section::RepaymentOptions->value],
                $validatedData
            );

            return redirect()->route('cms.resources_page.repayment_options.create')
                ->with('success', 'Repayment Options Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("ResourcesPageController::updateRepaymentOptions - " . $e->getMessage());
            return redirect()->route('cms.resources_page.repayment_options.create')
                ->with('error', 'Repayment Options Section Not Updated');
        }
    }

    // ================= Fees & Policies =================
    public function getFeesPolicies()
    {
        $data = CMS::where('page', Page::ResourcesPage->value)
            ->where('section', Section::FeesPolicies->value)
            ->first();

        return view('backend.layouts.cms.resources_page.fees_policies.create', compact('data'));
    }

    public function updateFeesPolicies(Request $request)
    {
        $this->validateRequest($request);

        try {
            $data = CMS::where('page', Page::ResourcesPage->value)
                ->where('section', Section::FeesPolicies->value)
                ->first();

            $validatedData = $this->handleFileUpload($request, $data, 'resources_page');

            CMS::updateOrCreate(
                ['page' => Page::ResourcesPage->value, 'section' => Section::FeesPolicies->value],
                $validatedData
            );

            return redirect()->route('cms.resources_page.fees_policies.create')
                ->with('success', 'Fees & Policies Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("ResourcesPageController::updateFeesPolicies - " . $e->getMessage());
            return redirect()->route('cms.resources_page.fees_policies.create')
                ->with('error', 'Fees & Policies Section Not Updated');
        }
    }

    // ================= Security & Privacy =================
    public function getSecurityPrivacy()
    {
        $data = CMS::where('page', Page::ResourcesPage->value)
            ->where('section', Section::SecurityPrivacy->value)
            ->first();

        return view('backend.layouts.cms.resources_page.security_privacy.create', compact('data'));
    }

    public function updateSecurityPrivacy(Request $request)
    {
        $this->validateRequest($request);

        try {
            $data = CMS::where('page', Page::ResourcesPage->value)
                ->where('section', Section::SecurityPrivacy->value)
                ->first();

            $validatedData = $this->handleFileUpload($request, $data, 'resources_page');

            CMS::updateOrCreate(
                ['page' => Page::ResourcesPage->value, 'section' => Section::SecurityPrivacy->value],
                $validatedData
            );

            return redirect()->route('cms.resources_page.security_privacy.create')
                ->with('success', 'Security & Privacy Section Updated Successfully');
        } catch (Exception $e) {
            Log::error("ResourcesPageController::updateSecurityPrivacy - " . $e->getMessage());
            return redirect()->route('cms.resources_page.security_privacy.create')
                ->with('error', 'Security & Privacy Section Not Updated');
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
        $validatedData = $request->only(['title', 'sub_title', 'description', 'sub_description', 'tags', 'button_text', 'link_url']);

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
