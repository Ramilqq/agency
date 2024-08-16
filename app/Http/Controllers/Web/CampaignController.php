<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\API\Yandex\AdGroupsApiController;
use App\Http\Controllers\API\Yandex\CampaignsApiController;
use App\Http\Controllers\API\Yandex\ReportApiController;
use App\Http\Controllers\Controller;

class CampaignController extends Controller
{
    public function index() {

        $campaigns = new CampaignsApiController;
        $campaigns = $campaigns->getCampaigns();
        
        //dd($campaigns);

        return view('web.compaigns', [
            'campaigns' => $campaigns
        ]);

    }

    public function show(int $id) {

        /*
        $report = new ReportApiController;
        //$report = $report->metrikReport($id);
        $report = $report->githubReport($id);

        dd($report);
        */

        $campaign = new CampaignsApiController;
        $campaign = $campaign->getCampaigns([$id]);

        $adGroups = new AdGroupsApiController;
        $adGroups = $adGroups->getAdGroups([$id]);

        $report = new ReportApiController;
        $report = $report->githubReport($id);

        return view('web.compaign', [
            'campaign' => $campaign[0],
            'data' => [
                [
                    'method' => 'GetCampaignsRequest',
                    'values' => $campaign,
                    'params' => [
                        'id' => $id
                    ]
                ],
                [
                    'method' => 'GetAdGroupsRequest',
                    'values' => $adGroups,
                    'params' => [
                        'id' => $id,
                    ]
                ]
            ],
            'report' => $report
        ]);

    }
}
