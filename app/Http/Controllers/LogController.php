<?php

namespace App\Http\Controllers;

use App\Services\WorkLogService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    private WorkLogService $workLogService;
    public function __construct(WorkLogService $workLogService) {
        $this->workLogService = $workLogService;
    }
    public function worklog():Response{
        $id = Auth::user()->id;
        $cities = \Indonesia::allCities();
        confirmDelete('Delete Data', 'Apakah anda yakin ingin menghapus log?');
        return response()->view('pages.worklogs',[
            'cities' => $cities->pluck('name','code'),
            'worklogs' => $this->workLogService->workLogGroup($id),
        ]);
    }
}
