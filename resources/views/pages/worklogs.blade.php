@extends('layouts.app')
@section('title','Worklogs')
@section('content')
<div class="container">
    {{-- <input type="time"> --}}
    @include('components.title',['heading'=>'Work Log'])
    <div class="row d-flex justify-content-center">
        <button type="button" class="btn border col-2 mb-3" id="add-worklog" data-bs-toggle="modal"
            data-bs-target="#addWorklog">
            + Add Worklog
        </button>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-9">
            @foreach ($worklogs as $date => $worklog)
            <div class="row justify-content-between mt-5 mb-3">
                <h3 class="col-6 text-secondary">{{\Carbon\Carbon::parse($date)->format('Y M d')}}</h3>
                <h4 class="col-6 text-end fw-bold" id="total-work">
                    {{floor($worklog['total'] / 3600)}}/8 Jam</h4>
            </div>
            @foreach ($worklog['days'] as $day)
            <x-card-log :city="$day->city" :date="$day->date" :start="$day->start_time" :end="$day->end_time"
                :id="$day->id" :total="$day->total_time" />
            @endforeach
            @endforeach
        </div>
    </div>
    {{-- <button class="simplepicker-btn">Show Picker</button> --}}
</div>

<x-add-log-modal :cities="$cities" />
@endsection