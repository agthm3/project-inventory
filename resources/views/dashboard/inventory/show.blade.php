@extends('layouts.app')

@section('content')
    {{-- @dd($inputData) --}}
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
                            <h4 class="card-title">Info Umum > <span class="text-primary">{{ $inputData->name }}</span></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('inputdata.edit', $inputData) }}" method="get">
                                    @csrf
                                    <table
                                        class="table table-bordered table-striped verticle-middle table-responsive-sm text-primary font-weight-bold">

                                        <tbody>
                                            <tr>
                                                <td>Foto</td>
                                                <td><img src="{{ url('storage/' . $inputData->image) }}" height="500px"
                                                        alt=""></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>{{ $inputData->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Verification Data</td>
                                                <td>{{ $inputData->verificationdate }}</td>
                                            </tr>
                                            <tr>
                                                <td>Po Number</td>
                                                <td>{{ $inputData->ponumber }}</td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td>{{ $inputData->deskripsi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Quantity</td>
                                                <td class=" bg-warning"><span>{{ $inputData->quantity }}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Received by</td>
                                                <td>{{ $inputData->receivedby }}</td>
                                            </tr>
                                            <tr>
                                                <td>User</td>
                                                <td>{{ $inputData->user }}</td>
                                            </tr>
                                            <tr>
                                                <td>Storage Location</td>
                                                <td>{{ $inputData->storagelocation }}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Number</td>
                                                <td>{{ $inputData->vehiclenumber }}</td>
                                            </tr>
                                            <tr>
                                                <td>Supplier</td>
                                                <td>{{ $inputData->supplier }}</td>
                                            </tr>
                                            <tr>
                                                <td>Remark</td>
                                                <td>{{ $inputData->remark }}</td>
                                            </tr>


                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary mt-2 col-xl-12 col-xxl-12">
                                        Edit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
