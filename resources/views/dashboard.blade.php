@extends('template.dashboard')

@section('dashboard')
    <div class="container d-flex gap-5 m-5">
        <div class="analysis">
            <p>Alumni Data</p>
            <p>{{ count($data['alumni']) }}</p>
        </div>
        <div class="analysis">
            <p>User Data</p>
            <p>{{ count($data['user']) }}</p>
        </div>
    </div>
@endsection
