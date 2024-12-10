 {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-4 flex space-x-4">
                <!-- Create User Button -->
                <a href="{{ route('admin.users.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create User
                </a>

                <!-- View Users Button -->
                <a href="{{ route('admin.users.index') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    View Users
                </a>

                <!-- Optionally, add more buttons for other actions -->
                <!-- Example Edit Users Button (Assuming you have a separate page for editing users) -->


                <!-- Example Delete Users Button (Not typically used as a button but for demonstration) -->


                </form>
            </div>
        </div>
    </div>
</x-app-layout> --}}


 {{-- @extends('admin.layouts.app')

@section('content')

@endsection --}}

 @extends('admin.layouts.master')

 @section('content')


<div class="container-fluid py-4">
    <div class="row">
        <!-- Summary Cards -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <p class="text-sm text-uppercase font-weight-bold">Total Work Orders</p>
                    <h5>{{ $totalWorkOrders }}</h5>   
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <p class="text-sm text-uppercase font-weight-bold">Pending</p>
                    <h5>{{ $pendingCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <p class="text-sm text-uppercase font-weight-bold">In Progress</p>
                    <h5>{{ $inProgressCount }}</h5>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <p class="text-sm text-uppercase font-weight-bold">Completed</p>
                    <h5>{{ $completedCount }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body" style="height: 350px;">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- LarapexCharts Script -->
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

 @endsection
