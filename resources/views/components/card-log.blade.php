@props(['city','start','end','date','id','total'])
<div>
    <div class="card mb-3 border-0 ps-5 pe-2 py-2 card-log" style="">
        <div class="row g-0">
            <div class="col-md-4 text-center my-auto">
                <h5 class="card-city">{{$city}}</h5>
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title">{{\Carbon\Carbon::parse($date)->format('d M Y')}}</h5>
                    {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in
                        to
                        additional content. This content is a little bit longer.</p> --}}
                    <p class="card-text my-0"><small class="text-body-secondary">Start Time : <b>{{$start}}</b> |
                            End
                            Time :
                            <b>{{$end}}</b> |
                            Total <b> {{\Carbon\Carbon::createFromTimestamp($total)->format('H:i')}}</b></small></p>
                    {{-- <p class="card-text my-0"><small class="text-body-secondary">End Time : 12:00 </small></p>
                    --}}
                    {{-- <p class="card-text my-0"><small class="text-body-secondary">4 Jam</small></p> --}}
                </div>
            </div>
            <div class="col-md-1 text-end">
                <a type="button" href="{{route('worklog.destroy',$id)}}" class="btn-close" aria-label="Close"
                    data-confirm-delete="true"></a>
            </div>
        </div>
    </div>
</div>