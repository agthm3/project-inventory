@extends('layouts.app')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back {{ Auth::user()->name }}!</h4>
                        <p class="mb-0">Your business management inventory</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Management Role</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">


                        <div class="card-body">
                            <div class="table-responsive">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif

                                <table id="inventoryTable"
                                    class="table table-bordered verticle-middle table-responsive-sm text-primary"
                                    border="1">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($AllUser as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->role }}</td>

                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                            Dropdown
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <form action="{{ route('managementrole.action') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="userId"
                                                                    value="{{ $item->id }}">
                                                                <button class="btn btn-submit dropdown-item" name="action"
                                                                    value="delete">Hapus</button>
                                                                @if ($item->role == 'user')
                                                                    <button name="action"
                                                                        class="btn btn-submit dropdown-item text-primary"
                                                                        value="makeAdmin">Jadikan
                                                                        <strong>Admin</strong></button>
                                                                @endif
                                                            </form>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
@endsection
