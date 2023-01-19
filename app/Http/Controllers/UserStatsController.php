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
        $result = $this->userStatsService->getStatsService($request);


       return  response()->json(
            [
            "error" => false,
            "data" => $result,
            "code" => 200
                         ]
        );
    }
}