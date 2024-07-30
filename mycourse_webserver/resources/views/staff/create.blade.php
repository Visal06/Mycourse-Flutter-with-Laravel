@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create Staff</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('staff.store') }}" method="POST">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" type="text"
                                        placeholder="Enter stasff's name" name="txtname" required />
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="sex" name="txtsex" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <!-- Add more options if needed -->
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="position" name="txtposition" required>
                                        <option value="">Select Position</option>
                                        <option value="ceo">CEO</option>
                                        <option value="manager">Manager</option>
                                        <option value="HR/Admin">HR/Admin</option>
                                        <option value="IT">IT</option>
                                        <option value="finance">Finance</option>
                                        <option value="sales">Sales</option>
                                        <option value="marketing">Marketing</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="phone" type="number"
                                        placeholder="Enter staff phone number" name="txtphone" required />
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter staff address" name="txtaddress" required />
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" id="start-date" type="date"
                                        placeholder="Enter staff's start date" name="dtpstart" required />
                                    <label for="start-date">Start-Date</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Create Staff</button>
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
