{{-- @extends('admin.layouts.master')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h6>Edit Section</h6>
            <form action="{{ route('admin.sections.update', $section->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Section Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $section->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Section</button>
            </form>
        </div>
    </div>
</div>
@endsection --}}
