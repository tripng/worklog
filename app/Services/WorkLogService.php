<?php 
namespace App\Services;

use App\Models\WorkLog;
use Illuminate\Support\Collection;

interface WorkLogService{
    function workLogGroup(int $id):Collection;
    function totalTimeProject($date,$start_time,$end_time):int;
    function getTotalTimeDay($date):int;
    function getLogGroupByMonth($id);
    function getWorkLogById($id):Collection;
}