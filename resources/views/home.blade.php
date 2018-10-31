@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($jobs->chunk(4) as $chunk)
        <div class="row">
            @foreach ($chunk as $job)
                <div class="col-lg-3 col-md-6">
                    <div class="job-masonry media mb-3">
                        <div class="media-body">
                            @if ($job->created_at > \Carbon\Carbon::now()->subHours(24))
                                <div class="new-job-banner">New - {{ $job->created_at->diffForHumans() }}</div>
                            @endif
                            <div class="px-2">
                                <a href="{{ route('jobs.show', $job->slug) }}" class="text-dark">
                                    <h5 class="text-center">{{ $job->name }}</h5>
                                </a>
                                <p>{!! nl2br(e($job->description)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
