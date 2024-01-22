@extends('layouts.app')

@section('content')
    {{-- @dd($allVerification) --}}
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
                            <a href="javascript:void(0)">Request</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">Verification Pending</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Verification & Delivery Pending</h4>
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
                                            <th scope="col">Status</th>
                                            <th scope="col">Documentation</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allVerification as $item)
                                            <tr>
                                                <form action="{{ route('verification.action', $item->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->ponumber }}</td>
                                                    <td>{{ $item->requestdate }}</td>
                                                    <td><span class="badge badge-danger">{{ $item->status }}</span></td>
                                                    <td>
                                                        <input type="file" name="documentation" required />
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="action" value="confirm"
                                                            class="btn btn-success">Konfirmasi</button>
                                                        <button type="submit" name="action" value="reject"
                                                            class="btn btn-danger">Tolak</button>
                                                    </td>
                                                </form>
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
