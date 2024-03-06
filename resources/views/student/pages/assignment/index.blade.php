@extends('student.dashboard')
@section('content')
@section('title','Assignment')
@section('title_page','All Assigmnet')
<div class="container">
    <div class="card">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
        <div class="card-header">
            <a href="{{ route('assgnment.create') }}" class="btn btn-primary float-end">Go To Assigmnet</a>
        </div>
        <div class="card-body">

        </div>
    </div>
</div>
@endsection
