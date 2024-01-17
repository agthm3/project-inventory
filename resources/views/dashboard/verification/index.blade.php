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
                                        <tr>
                                            <td>Air Conditioner</td>
                                            <td>2308237</td>
                                            <td>Apr 20,2018</td>
                                            <td>
                                                <span class="badge badge-danger">Pending</span>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary"><input type="file" />Delivery
                                                    Documentation</span>
                                            </td>
                                            <td>
                                                <span>
                                                    <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                        data-placement="top" title="Edit"><i
                                                            class="fa fa-check color-muted"></i>
                                                    </a>
                                                    <a href="javascript:void()" data-toggle="tooltip" data-placement="top"
                                                        title="Close"><i class="fa fa-close color-danger"></i></a>
                                                </span>
                                            </td>
                                        </tr>
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
