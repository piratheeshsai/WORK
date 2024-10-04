@extends('admin.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h6>Create Section</h6>
            <form action="{{ route('admin.sections.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create Section</button>
            </form>
        </div>
    </div>
</div>
@endsection
