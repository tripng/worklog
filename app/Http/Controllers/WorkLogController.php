<?php

namespace App\Http\Controllers;

use App\Models\WorkLog;
use App\Services\WorkLogService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WorkLogController extends Controller
{
    private WorkLogService $workLogService;
    public function __construct(WorkLogService $workLogService) {
        $this->workLogService = $workLogService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = Validator::make($request->only('date','start_time','end_time','city'),[
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'city' => ['required',Rule::exists('indonesia_cities', 'name')],
        ]);
        if ($validated->fails()) {
            alert()->error('Error',$validated->messages()->all()[0]);
            return back()->withInput();
        }
        
        // Total waktu/project----------------------------------
        $total_time_project = $this->workLogService->totalTimeProject($request->input('date'),$request->input('start_time'),$request->input('end_time'));

        // Jika Lebih 8 Jam------------------------------------------------
        $total = $this->workLogService->getTotalTimeDay($request->input('date'));
        $total += $total_time_project;
        if($total > 28800){
            alert()->error('Error',"Time exceeds daily maximum");
            return back()->withInput();
        }

        WorkLog::create([
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'total_time' => $total_time_project,
            'city' => $request->city,
        ]);
        alert()->success('Berhasil', 'Worklog Berhasil Ditambahkan');
        return redirect()->route('page.worklog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $log = WorkLog::findOrFail($id);
        alert()->success('Berhasil',"Log {$log->date} Telah Dihapus");
        WorkLog::Where('id',$id)->delete();
        return back();
    }
}
