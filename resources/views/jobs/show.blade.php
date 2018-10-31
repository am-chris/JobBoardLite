@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title">{{ $job->name }}</div>
                    <ul class="list-inline mb-0">
                        @if (Auth::check() && Auth::user()->id == $job->user_id)
                            <a href="{{ route('jobs.edit', $job->slug) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                        @endif
                    </ul>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="description">Job Description</label>
                        <p class="form-control-static">{!! nl2br(e($job->description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection