<?php

namespace App\Http\Controllers;

use App\Repositories\StatisticRepository;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    private StatisticRepository $statisticRepository;

    public function __construct(StatisticRepository $statisticRepository)
    {
        $this->statisticRepository = $statisticRepository;
    }

    public function index()
    {
        $statistics = $this->statisticRepository->getTopTenUsersWithHighestTaskCount();
        return view('statistics.index', compact('statistics'));
    }
}
