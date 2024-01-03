@extends('master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ url('/admin/create_user') }}">
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>No.</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($item->profile)
                                                    <img
                                                        src="{{ asset('images').'/'.$item->profile }}"
                                                        class=" image img-thumbnail"
                                                        style="width: 50px; height: 50px"
                                                    >
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <span class="bg-warning" style="color: red">
                                                    {{ $item->permission }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('index_update_user').'?user_id='.$item->id }}">
                                                    <button>
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('index_confirm_delete').'?user_id='.$item->id }}">
                                                    <button>
                                                        <i class="text-danger far fa-trash-alt"></i>
                                                    </button>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
