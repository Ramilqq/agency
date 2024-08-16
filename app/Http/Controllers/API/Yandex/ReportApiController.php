<?php

namespace App\Http\Controllers\API\Yandex;

use Biplane\YandexDirect\ConfigBuilder;
use Biplane\YandexDirect\Api\V5\Reports;
use Biplane\YandexDirect\ReportServiceFactory;

class ReportApiController extends BaseApiController
{

    public function testReport($compaign_id){

        $serviceFactory = new \Biplane\YandexDirect\ReportServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        

        $criteria = \Biplane\YandexDirect\Api\V5\Reports\SelectionCriteria::create()
        ->setFilter([
            'Filter' => [
                'Field' => 'CampaignId',
                'Operator' => 'IN',
                'Values' => $compaign_id,
                ]
        ]);

        $service = $serviceFactory->createService($config, Reports::class);
        $reportDefinition = \Biplane\YandexDirect\Api\V5\Reports\ReportDefinition::create()
        ->setSelectionCriteria($criteria)
        ->setFieldNames([
            "Date", "CampaignId", "Clicks", "Cost"
        ])
        ->setReportName('Actual Data')
        ->setReportType('CAMPAIGN_PERFORMANCE_REPORT')
        ->setDateRangeType('AUTO')
        ->setIncludeVAT('YES');


        $request = new \Biplane\YandexDirect\Api\V5\Reports\ReportRequest($reportDefinition);

        
        $dir = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '\public';
        //dd( $dir );
        $response = $service->get($request);
        

        //$path = Storage::putFile('photos', new File($response->getStream()));
        //dd($path);
        $data = $response->getAsString();
        
        $data = explode("\n", $data);
        $table = [];

        foreach($data as $key => $row){
            $table[$key] = explode("\t", $row);
        }

        //dd($table);
        return $table;
    }

    public function metrikReport($compaign_id){

        $serviceFactory = new \Biplane\YandexDirect\ReportServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        

        $criteria = \Biplane\YandexDirect\Api\V5\Reports\SelectionCriteria::create()
        ->setFilter([
            'Filter' => [
                'Field' => 'CampaignId',
                'Operator' => 'IN',
                'Values' => $compaign_id,
                ]
        ]);

        $orderBy = \Biplane\YandexDirect\Api\V5\Reports\OrderBy::create('Date', 'ASCENDING');
        
        $service = $serviceFactory->createService($config, Reports::class);
        $reportDefinition = \Biplane\YandexDirect\Api\V5\Reports\ReportDefinition::create()
        //->setSelectionCriteria($criteria)
        ->setFieldNames([
            "Date", "Clicks", "Impressions", "Conversions", "CostPerConversion", "GoalsRoi", "Revenue", "ConversionRate"
        ])
        ->setGoals([ '20002', '20003' ])
        ->setAttributionModels([ 'LSC' ])
        ->addOrderBy($orderBy)
        ->setReportName('Conversions')
        ->setReportType('ACCOUNT_PERFORMANCE_REPORT')
        ->setDateRangeType('LAST_5_DAYS')
        ->setIncludeVAT('YES');

        $request = new \Biplane\YandexDirect\Api\V5\Reports\ReportRequest($reportDefinition);
        
        $dir = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '\public';
        //dd( $dir );
        $response = $service->get($request);
        

        //$path = Storage::putFile('photos', new File($response->getStream()));
        //dd($path);
        $data = $response->getAsString();
        
        $data = explode("\n", $data);
        $table = [];

        foreach($data as $key => $row){
            $table[$key] = explode("\t", $row);
        }

        //dd($table);
        return $table;
    }

    public function githubReport($compaign_id){
        $serviceFactory = new ReportServiceFactory();

        $config = ConfigBuilder::create()
            ->useSandbox($this->test_mode)
            ->setAccessToken($this->test_token)
            ->setClientLogin($this->test_client_login)
            ->setLocale('ru')
            ->getConfig();
        $service = $serviceFactory->createService($config);
        
        $criteria = \Biplane\YandexDirect\Api\V5\Reports\SelectionCriteria::create()
        ->setFilter([
            'Filter' => [
                'Field' => 'CampaignId',
                'Operator' => 'IN',
                'Values' => $compaign_id,
                ]
        ]);

        $reportDefinition = Reports\ReportDefinition::create()
            ->setSelectionCriteria($criteria)
            ->setReportName('4 demo')
            ->setReportType(Reports\ReportTypeEnum::CAMPAIGN_PERFORMANCE_REPORT)
            ->setDateRangeType(Reports\DateRangeTypeEnum::LAST_30_DAYS)
            ->setFieldNames([
                //"Date", "Clicks", "Impressions", "Conversions", "CostPerConversion", "GoalsRoi", "Revenue", "ConversionRate"
                Reports\FieldEnum::DATE,
                Reports\FieldEnum::CAMPAIGN_ID,
                Reports\FieldEnum::CAMPAIGN_NAME,
                Reports\FieldEnum::IMPRESSIONS,
                Reports\FieldEnum::CLICKS,
                Reports\FieldEnum::COST,
                Reports\FieldEnum::GOALS_ROI,
            ])
            ->setIncludeVAT(false);
        
        $request = Reports\ReportRequestBuilder::create()
            ->setReportDefinition($reportDefinition)
            ->returnMoneyInMicros(false)
            ->skipReportHeader(false)
            ->getReportRequest();
        
        $result = $service->getReady($request);
        
        $data = $result->getAsString();

        $data = explode("\n", $data);
        $table = [];

        foreach($data as $key => $row){
            $table[$key] = explode("\t", $row);
        }
        return $table;
    }

}
