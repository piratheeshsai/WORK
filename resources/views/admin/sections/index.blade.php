@extends('admin.layouts.master')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Sections, Subsections, and Departments</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($sections as $section)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">{{ $section->name }}</h5>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $section->id }}" aria-expanded="false" aria-controls="collapse{{ $section->id }}">
                                            Toggle
                                        </button>
                                    </div>
                                    <div id="collapse{{ $section->id }}" class="collapse">
                                        <div class="card-body">
                                            <h6>Subsections</h6>
                                            <ul class="list-group mb-3">
                                                @foreach ($section->subsections as $subsection)
                                                    <li class="list-group-item">
                                                        <strong>{{ $subsection->name }}</strong>
                                                        <br> Section Head: {{ $subsection->section_head }}
                                                        <br> Departments:
                                                        <ul>
                                                            @foreach ($subsection->departments as $department)
                                                                <li>{{ $department->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
