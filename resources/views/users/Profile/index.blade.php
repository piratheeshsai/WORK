@extends('tamplate.master')

@section('content')
    <div class="contents">
        <div class="container mt-5">
            <div class="row gutters">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" id="Name"
                                        value="{{ old('Name', $user->name) }}" >
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">User ID</label>
                                        <input type="url" class="form-control" id="userID"
                                        value="{{ old('userID', $user->userID) }}" >

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                        value="{{ old('email', optional($userDetails)->email) }}"
                                        placeholder="{{ optional($userDetails)->email ? '' : 'Enter your email' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone"
                                        value="{{ old('phone', optional($userDetails)->PhoneNumber ? '+94' . optional($userDetails)->PhoneNumber : '+1 ') }}"
                                        placeholder="{{ optional($userDetails)->PhoneNumber ? '' : 'Enter your PhoneNumber' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Employee Number</label>
                                        <input type="text" class="form-control" id="Employee-Number"
                                        value="{{ old('Employee-Number', optional($userDetails)->EmployeeId) }}"
                                        placeholder="{{ optional($userDetails)->EmployeeId ? '' : 'Enter your Employee Number' }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary mb-3">Section Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    {{-- <div class="form-group"> --}}
                                        <label for="section" class="form-label">Section</label>
                                        <select class="form-select" id="section" required>
                                            <option value="" disabled selected>Select Section</option>
                                            @foreach ($section as $sec)
                                                <option value="{{ $sec->id }}">{{ $sec->name }}</option>
                                            @endforeach
                                        </select>
                                    {{-- </div> --}}
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" id="subsectionsContainer" style="display: none;">
                                    <label for="subsections" class="form-label">Subsection</label>
                                    <select class="form-select" id="subsections" required>
                                        <option value="" disabled selected>Select Subsection</option>
                                    </select>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" id="departmentsContainer" style="display: none;">
                                    <label for="departments" class="form-label">Department</label>
                                    <select class="form-select" id="departments" required>
                                        <option value="" disabled selected>Select Department</option>
                                    </select>
                                </div>

                                <!-- Make sure only one of the submit buttons has the ID "submit" -->


                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="zIp">Administrator</label>
                                        <input type="text" class="form-control" id="section_head" placeholder="Administrator" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
