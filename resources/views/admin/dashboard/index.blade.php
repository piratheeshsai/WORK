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

 @section('contents')
     <div class="panal-bar">
         <div class="row-1">
             <h1>Work Orders</h1>
         </div>
         <div class="row-2">
             <a href="#" class="active">OverView</a>
             <a href="#">Work Orders</a>
             <a href="#">Pending</a>
             <a href="#">Completed</a>
         </div>
     </div>
     <div class="description">
         <div class="col-1">
             <div class="boxes-row">
                 <div class="balance-box">
                     <div class="subject-row">
                         <div class="text">
                             <h3>Total Work Orders</h3>
                             <h1>40 <sub>(Nos)</sub></h1>
                         </div>
                         <div class="icon">
                             <i class="fa-solid fa-arrow-up"></i>
                         </div>
                     </div>
                     <div class="progess-row">
                         <div class="subject">Progess</div>
                         <div class="Progress-bar">
                             <div class="progess-line" vaule="91%" style="max-width: 91%;"></div>
                         </div>
                     </div>
                 </div>
                 <div class="balance-box">
                     <div class="subject-row">
                         <div class="text">
                             <h3>Pending</h3>
                             <h1>20 <sub>(Nos)</sub></h1>
                         </div>
                         <div class="icon">
                             <i class="fa-solid fa-arrow-down"></i>
                         </div>
                     </div>
                     <div class="progess-row">
                         <div class="subject">Progess</div>
                         <div class="Progress-bar">
                             <div class="progess-line" vaule="73%" style="max-width: 73%;"></div>
                         </div>
                     </div>
                 </div>

             </div>
             <div class="chart">
                 <div class="chart-header">
                     <h2>Progress Analysis</h2>
                     <input type="month" class="date" value="2023-12">
                 </div>
                 <div class="chart-contents">
                     <section class="chart-grid">
                         <div class="grid-line" value="100%"></div>
                         <div class="grid-line" value="80%"></div>
                         <div class="grid-line" value="60%"></div>
                         <div class="grid-line" value="40%"></div>
                         <div class="grid-line" value="20%"></div>
                         <div class="grid-line" value="0%"></div>
                     </section>
                     <section class="chart-value-wrapper">
                         <div class="chart-value" style="max-height: 62%;"></div>
                         <div class="chart-value" style="max-height: 92%;"></div>
                         <div class="chart-value" style="max-height: 76%;"></div>
                         <div class="chart-value" style="max-height: 82%;"></div>
                         <div class="chart-value" style="max-height: 51%;"></div>
                         <div class="chart-value" style="max-height: 40%;"></div>
                     </section>
                     <section class="chart-labels">
                         <div>Jul</div>
                         <div>Aug</div>
                         <div>Sept</div>
                         <div>Oct</div>
                         <div>Nov</div>
                         <div>Dec</div>
                     </section>
                 </div>
             </div>
         </div>
     </div>
     </div>
     </div>
 @endsection
