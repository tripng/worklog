@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<div class="container">
    <div class="mb-3">
        @include('components.title',['heading'=>'Dashboard'])
    </div>
    <div class="row">
        @foreach ($logWorksInMonth as $date=>$log)
        <div class="col-3">
            <x-card-dashboard :days="$log['total_days']" :total="$log['total']" :date="$date" />
        </div>
        @endforeach
    </div>
</div>
@endsection