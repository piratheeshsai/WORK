@extends('admin.layouts.master')

@section('content')

    {{-- <div class="container">
        <h1>Users</h1>
        <div class="mt-6 create align-right">
            <!-- Create User Button -->
            <a href="{{ route('admin.users.create') }}" class="custom-button">
                Create User
            </a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>User ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="clickable-row" data-href="{{ route('admin.users.show', $user->userID) }}">
                        <td>{{ $user->name }}</td>
                        {{-- <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->userID }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <!-- Display pagination links -->
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
--}}


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center pb-0">
            <h6>Users </h6>


            <a href="{{ route('admin.users.create') }}" class="btn bg-gradient-primary d-flex align-items-center">
                <i class="fa-solid fa-user-plus me-2"></i>

                <span class="nav-link-text ms-1">Create Users</span>
            </a>
          </div>


        </a>
          <div class="card-body px-0 pt-0 pb-2 ">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">section</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee ID</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          {{-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> --}}
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                          <p class="text-xs text-secondary mb-0">{{ optional($user->userDetails)->email ?? 'No Email' }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{ $user->role }}</p>
                      <p class="text-xs text-secondary mb-0">Organization</p>
                    </td>
                    {{-- bg-gradient-success --}}
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">{{ optional($user->userDetails)->subsection ?? 'Empty' }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ optional($user->userDetails)->EmployeeId ?? 'No ID' }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <a href="{{ route('admin.users.show', $user->userID) }}" class=" font-weight-bold" data-toggle="tooltip" title="Edit user">
                            <span class="badge badge-sm bg-gradient-success">View</span>
                          </a>
                    </td>
                  </tr>
                  @endforeach

            </tbody>

            </table>
            <div class="d-flex  justify-content-center">
                {{ $users->links() }}
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made with <i class="fa fa-heart"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>

@endsection
