<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Services\UserStatsService;

class UserStatsController extends Controller
{
    protected $userStatsService;

    public function __construct(UserStatsService $userStatsService)
    {
        $this->userStatsService = $userStatsService;
    }


    public function __invoke(Request $request)
    {
        $data = $this->userStatsService->getStatsService($request);

       return  response()->json(
            [
            "error" => false,
            "data" => [
                'full_name' => "{ $data->first_name } { $data->last_name } ",
                'total_views' => $data->views,
                'total_clicks' => $data->clicks,
                'total_conversions' =>  $data->conversions,
                'cr' => round(($data->conversions / $data->clicks) * 100,2),
                'last_date' => $data->date,
            ],
            "code" => 200
                 ]
        );
    }
}