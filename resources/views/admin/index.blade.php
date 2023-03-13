@extends('layouts.admin')
@section('main')
    <div class="card">
        <div class="card-body">
            <h1>Home</h1>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
            {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
