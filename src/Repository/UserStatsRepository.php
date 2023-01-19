<?php
namespace Src\Repository;



use App\Models\UserStats;

class UserStatsRepository
{

    public function getStats($payload)
    {
        $dateFrom = $payload->dateFrom;
        $dateTo = $payload->dateTo;
        $totalClicks = $payload->totalClicks;

        return UserStats::getStats($dateFrom, $dateTo, $totalClicks);
    }
}