@extends('layouts.app')

@section('content')
    {{-- @dd($requestmaterial) --}}
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">History > <span class="text-primary">{{ $requestmaterial->name }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="get">
                                    @csrf
                                    <table
                                        class="table table-bordered table-striped verticle-middle table-responsive-sm text-primary font-weight-bold">

                                        <tbody>
                                            <tr>
                                                <td>Dokumentasi Pengiriman</td>
                                                <td><img src="{{ url('storage/' . $requestmaterial->image) }}"
                                                        height="500px" alt=""></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>{{ $requestmaterial->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Requeset Date</td>
                                                <td>{{ $requestmaterial->requestdate }}</td>
                                            </tr>
                                            <tr>
                                                <td>Requestor</td>
                                                <td>{{ $requestmaterial->requestor }}</td>
                                            </tr>
                                            <tr>
                                                <td>Department</td>
                                                <td>{{ $requestmaterial->department }}</td>
                                            </tr>
                                            <tr>
                                                <td>PO Number</td>
                                                <td><span>{{ $requestmaterial->ponumber }}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Notes</td>
                                                <td>{{ $requestmaterial->notes }}</td>
                                            </tr>
                                            <tr>
                                                <td>From</td>
                                                <td>{{ $requestmaterial->from_note }}</td>
                                            </tr>
                                            <tr>
                                                <td>To</td>
                                                <td>{{ $requestmaterial->to_note }}</td>
                                            </tr>
                                            <tr>
                                                <td>Quantity</td>
                                                <td>{{ $requestmaterial->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Number</td>
                                                <td>{{ $requestmaterial->vehiclenumber }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>{{ $requestmaterial->status }}</td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
