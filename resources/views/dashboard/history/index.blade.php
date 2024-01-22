@extends('layouts.app')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">Your business dashboard template</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Inventori</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">Request History</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Request History</h4>
                            <form action="">
                                <input id="name" type="text" class="form-control input-default"
                                    placeholder="Search" />
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">PO Number</th>
                                            <th scope="col">Request Date</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allRequestHistory as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->ponumber }}</td>
                                                <td>{{ $item->requestdate }}</td>
                                                <td></td>
                                                <td>
                                                    {{ Str::title($item->status) }}
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
