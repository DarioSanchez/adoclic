<?php

namespace Src\Services;

use Src\Repository\UserStatsRepository;

class UserStatsService
{
    protected $userStatsRepository;

    public function __construct(UserStatsRepository $userStatsRepository)
    {
        $this->userStatsRepository = $userStatsRepository;
    }

    public function getStatsService($payload)
    {
        return $this->userStatsRepository->getStats($payload);
    }


}