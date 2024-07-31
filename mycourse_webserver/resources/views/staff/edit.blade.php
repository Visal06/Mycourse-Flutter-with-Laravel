@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Adjust Staff</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('staff.update', $data->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to update this staff?')">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" name="txtname" value="{{ $data->name }}" />
                                    <label for="inputFirstName">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="sex" name="txtsex">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ old('txtsex', $data->sex) == 'Male' ? 'selected' : '' }}>
                                            Male</option>
                                        <option value="Female"
                                            {{ old('txtsex', $data->sex) == 'Female' ? 'selected' : '' }}>Female</option>
                                        <!-- Add more options if needed -->
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="position" name="txtposition">
                                        <option value="">Select Position</option>
                                        <option value="ceo"
                                            {{ old('txtposition', $data->position) == 'ceo' ? 'selected' : '' }}>CEO
                                        </option>
                                        <option value="manager"
                                            {{ old('txtposition', $data->position) == 'manager' ? 'selected' : '' }}>Manager
                                        </option>
                                        <option value="HR/Admin"
                                            {{ old('txtposition', $data->position) == 'HR/Admin' ? 'selected' : '' }}>
                                            HR/Admin</option>
                                        <option value="IT"
                                            {{ old('txtposition', $data->position) == 'IT' ? 'selected' : '' }}>IT</option>
                                        <option value="finance"
                                            {{ old('txtposition', $data->position) == 'finance' ? 'selected' : '' }}>Finance
                                        </option>
                                        <option value="sales"
                                            {{ old('txtposition', $data->position) == 'sales' ? 'selected' : '' }}>Sales
                                        </option>
                                        <option value="marketing"
                                            {{ old('txtposition', $data->position) == 'marketing' ? 'selected' : '' }}>
                                            Marketing</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="date"
                                        placeholder="Enter your last name" name="dtpstart"
                                        value="{{ $data->start_date }}" />
                                    <label for="inputLastName">Start Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" type="text"
                                        placeholder="Create a password" name="txtphone" value="{{ $data->phone }}" />
                                    <label for="inputPassword">Phone</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPasswordConfirm" type="text"
                                        placeholder="Confirm password" name="txtaddress" value="{{ $data->address }}" />
                                    <label for="inputPasswordConfirm">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                {{-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> --}}
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('staff.index') }}">Back to list</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection()
