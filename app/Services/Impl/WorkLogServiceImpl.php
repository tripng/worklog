<?php 
namespace App\Services\Impl;

use App\Models\WorkLog;
use App\Services\WorkLogService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class WorkLogServiceImpl implements WorkLogService{
    function workLogGroup(int $id): Collection{
        $worklogs = $this->getWorkLogById($id);
        $groupByDate = $worklogs->groupBy(function($item){
            return $item['date'];
        })->map(function($groupByDate){
            $total = $groupByDate->sum(function($item){
                return $item['total_time'];
            });
            return ['days' => $groupByDate, 'total' => $total];
        });
        return $groupByDate; 
    }
    function totalTimeProject($date,$start_time,$end_time): int
    {
        $start_work = "{$date} {$start_time}";
        $end_work = "{$date} {$end_time}";
        $date_start_work = Carbon::parse($start_work);
        $date_end_work = Carbon::parse($end_work);
        $total_time_second = $date_start_work->diffInSeconds($date_end_work);
        return $total_time_second;
    }
    function getTotalTimeDay($date): int
    {
        $getWorklogDay = WorkLog::select(WorkLog::raw('SUM(total_time) as total_time'))->where('date',$date)->first();
        return (int) $getWorklogDay->total_time;
    }
    function getLogGroupByMonth($id): Collection{
        $work_logs = $this->getWorkLogById($id);
        $work_log_group_by_month = $work_logs->groupBy(function ($item) {
            return Carbon::parse($item['date'])->format('Y-m');
        })->map(function($work_log,$key){
            $total = $work_log->sum(function($item){
                return $item['total_time'];
            });
            $yearMonth = explode('-', $key);
            $totalDaysInMonth = Carbon::create($yearMonth[0], $yearMonth[1], 1)->daysInMonth;
            return ['month' => $work_log, 'total' => $total/28800,'total_days'=>$totalDaysInMonth];
        });
        return $work_log_group_by_month;
    }
    function getWorkLogById($id):Collection{
        $worklogs = WorkLog::where('user_id',$id)->orderBy('created_at','desc')->get();
        return $worklogs;
    }
}

