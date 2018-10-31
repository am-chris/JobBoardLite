@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Post a Job</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Job Title <span class="required">*</span> (Up to 48 characters)</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description <span class="required">*</span> (Up to 3,000 characters)</label>
                            <textarea name="description" class="form-control" rows="10" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection