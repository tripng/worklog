@extends('layouts.app')
@section('title','Worklogs')
@section('content')
<div class="container">
    {{-- <input type="time"> --}}
    @include('components.title',['heading'=>'Work Log'])

    <div class="row d-flex justify-content-center">
        <div class="col-9">
            <x-card-log />
        </div>
    </div>
    {{-- <button class="simplepicker-btn">Show Picker</button> --}}
</div>
@endsection