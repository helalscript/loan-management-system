<?php

namespace App\Http\Controllers\API\V1\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\DynamicPage;
use App\Models\Faq;
use App\Models\SystemSetting;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StateLicensingPageController extends Controller
{
    public function getHeroSection()
    {
        try {
            $data = CMS::where('page', Page::StateLicensingPage)
                ->where('section', Section::HeroSection)
                ->select('id', 'title', 'button_text', 'image')
                ->where('status', 'active')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("StateLicensingPageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getPageContentSectionSection()
    {
        try {
            $section = CMS::where([
                ['page', Page::StateLicensingPage],
                ['section', Section::PageContentSection],
                ['status', 'active']
            ])
                ->select('id', 'title')
                ->first();

            $contents = CMS::where([
                ['page', Page::StateLicensingPage],
                ['section', Section::PageContentSectionContent],
                ['status', 'active']
            ])
                ->select('id', 'title', 'description')
                ->get();

            // Use Laravel Collection to pass data
            $data = collect([
                'id' => $section->id,
                'section_title' => $section->title,
                'contents' => $contents,
            ]);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("StateLicensingPageController::getFeatureSection - " . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
}
