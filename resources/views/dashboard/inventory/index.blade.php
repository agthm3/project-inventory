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
                            <a href="javascript:void(0)">Daftar Inventori</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Inventori</h4>
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
                                            <th scope="col">Verification Date</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allInventory as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->ponumber }}</td>
                                                <td>{{ $item->verificationdate }}</td>
                                                <td> <span
                                                        class="badge 
                {{ $item->quantity < 50 ? 'badge-danger' : ($item->quantity <= 80 ? 'badge-warning' : 'badge-success') }}">
                                                        {{ $item->quantity }}
                                                    </span></td>
                                                <td>
                                                    <span>
                                                        <a href="{{ route('inventory.show', $item) }}" class="mr-4"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Edit"><button class="btn btn-primary">Detail</button>
                                                        </a>

                                                    </span>
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
