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
                            <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        @endif
                    </ul>
                </div>
                <div class="card-body">
                    <form action="{{ route('jobs.update', $job->slug) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Job Title <span class="required">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $job->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Job Description <span class="required">*</span></label>
                            <textarea name="description" class="form-control" rows="10" required>{{ $job->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection