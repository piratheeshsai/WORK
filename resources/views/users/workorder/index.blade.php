@extends('users.component.master')

@section('content')
<div class="container-fluid py-4">
    @if (session('success'))
<div id="success-alert" class="alert alert-success custom-alert">
    {{ session('success') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center pb-0">
                <h6>Work Orders</h6>


                <a href="{{ route('user.work.create') }}" class="btn bg-gradient-primary d-flex align-items-center">
                    <i class="fa-solid fa-folder-plus me-2"></i>
                    <span class="nav-link-text ms-1">Create Work Orders</span>
                </a>
            </div>


            </a>
            <div class="card-body px-0 pt-0 pb-2 ">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Work Order Number</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Complain</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Complain Type
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Priority</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Work Order Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>

@endsection
