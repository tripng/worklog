@props(['cities'])

<div>
    <div class="modal fade" id="addWorklog" tabindex="-1" aria-labelledby="addWorklogLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('worklog.store')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h1 class="modal-title fs-5 fw-bold" id="addWorklogLabel">Add Worklog</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="workDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="workDate" name="date"
                                    max="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="startTime" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="startTime" name="start_time">
                            </div>
                            <div class="col-md-6">
                                <label for="endTime" class="form-label" min="06:00">End Time</label>
                                <input type="time" class="form-control" id="endTime" name="end_time">
                            </div>
                            <div class="col-md-12">
                                <label for="project" class="form-label">Project</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Select City" name="city">
                                <datalist id="datalistOptions">
                                    @foreach ($cities as $code=>$city)
                                    <option value="{{$city}}">{{$code}}</option>
                                    @endforeach
                                    <option value="San Francisco">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-add border-0"><span><i
                                    class="bi bi-folder-plus"></i></span> Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>