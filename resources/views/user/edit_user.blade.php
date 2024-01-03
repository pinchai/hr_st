@extends('master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/admin/user') }}">User List</a></li>
                        <li class="breadcrumb-item active">Edit User Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('update_user') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">User Profile</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="formGroupExampleInput"
                                        name="profile"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="formGroupExampleInput2"
                                        placeholder="User name"
                                        name="name"
                                        value="{{ $data->name }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="Email"
                                        value="{{ $data->email }}"
                                    >

                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Phone</label>
                                    <input
                                        type="number"
                                        name="phone"
                                        class="form-control"
                                        id="formGroupExampleInput2"
                                        placeholder="Another input placeholder"
                                        value="{{ $data->phone }}"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        id="Password"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="permission">Role</label>
                                    <select
                                        id="permission"
                                        name="permission"
                                        class="form-control"
                                    >
                                        <option value="admin" {{ $data->permission == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="hr" {{ $data->permission == 'hr' ? 'selected' : '' }}>HR</option>
                                        <option value="employee" {{ $data->permission == 'employee' ? 'selected' : '' }}>Employee</option>
                                    </select>
                                </div>
                                <input type="reset" class="btn btn-danger" value="Cancel">
                                <input type="submit" class="btn btn-primary float-right" value="Update">
                            </form>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
