@props(['days','total','date'])
<div>
    <div class="card mt-5 text-center border-0 pb-3">
        <div class="card-header border-0 fw-bold" id="title-card-dashboard">{{\Carbon\Carbon::parse($date)->format('Y
            M')}}</div>
        <div class="card-body">
            <h5 class="card-title">{{$total}} <span class="separator">/</span> <span class="number">{{$days}}</span>
            </h5>
        </div>
    </div>
</div>