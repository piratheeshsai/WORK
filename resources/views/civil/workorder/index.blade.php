@extends('civil.component.master')

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
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Work
                                            Order Number</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                            Work Type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">
                                            Priority</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-1">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-1">
                                            Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($workOrders as $workOrder)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ $workOrder->id }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $workOrder->work_type }}</p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">{{ $workOrder->priority }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="me-2 text-xs font-weight-bold"></span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                            style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="text-sm font-weight-bold mb-0">{{ $workOrder->created_at->format('Y-m-d') }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <a href="{{ route('civil.workorder.show', ['workOrder' => urlencode($workOrder->id)]) }}"
                                                class=" font-weight-bold" data-toggle="tooltip" title="Edit user">
                                                <span class="badge badge-sm bg-gradient-success">View</span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    {{-- <tbody>
        @foreach($workOrders as $workOrder)
            <tr>
                <td>
                    <div class="d-flex px-3">
                        <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $workOrder->id }}</h6> <!-- Work Order Number -->
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-sm font-weight-bold mb-0">{{ $workOrder->work_type }}</p> <!-- Work Type -->
                </td>
                <td>
                    <span class="text-xs font-weight-bold">{{ ucfirst($workOrder->priority) }}</span> <!-- Priority -->
                </td>
                <td class="align-middle text-center">
                    <span class="text-xs font-weight-bold">{{ $workOrder->status }}</span> <!-- Status -->
                </td>
                <td class="align-middle">
                    <p class="text-sm font-weight-bold mb-0">{{ $workOrder->created_at->format('Y-m-d') }}</p> <!-- Date -->
                </td>
                <td>
                    <button class="btn btn-link text-secondary mb-0">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody> --}}
