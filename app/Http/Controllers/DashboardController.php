<?php

namespace App\Http\Controllers;

use App\Services\WorkLogService;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private WorkLogService $workLogService;
    public function __construct(WorkLogService $workLogService) {
        $this->workLogService = $workLogService;
    }
    public function __invoke(Request $request)
    {
        $id = Auth::user()->id;
        $logWorksInMonth = $this->workLogService->getLogGroupByMonth($id);
        return view('pages.dashboard',[
            'logWorksInMonth' => $logWorksInMonth,
        ]);
    }
}
