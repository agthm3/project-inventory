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
                            <h4 class="card-title">Info Uddddmum > <span class="text-primary">{{ $inputData->name }}</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('inputdata.update', $inputData) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <table
                                        class="table table-bordered table-striped verticle-middle table-responsive-sm text-primary font-weight-bold">

                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td><img src="{{ url('storage/' . $inputData->image) }}" height="500px"
                                                        alt="">
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            value="{{ url('storage/' . $inputData->image) }}" name="image"
                                                            class="custom-file-input" />
                                                        <label class="custom-file-label">Choose file</label>
                                                    </div>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td><input type="text" name="name" value="{{ $inputData->name }}"
                                                        placeholder="{{ $inputData->name }}" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td>Verification Data</td>
                                                <td><input type="date" name="verificationdate"
                                                        value="{{ $inputData->verificationdate }}"
                                                        placeholder="{{ $inputData->verificationdate }}"
                                                        class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td>Po Number</td>
                                                <td><input type="text" name="ponumber" value="{{ $inputData->ponumber }}"
                                                        placeholder="{{ $inputData->ponumber }}" class="form-control"></td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td><input type="text" name="deskripsi"
                                                        value="{{ $inputData->deskripsi }}"
                                                        placeholder="{{ $inputData->deskripsi }}" class="form-control">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Quantity</td>
                                                <td><input type="text" name="quantity"
                                                        value="{{ $inputData->quantity }}"
                                                        placeholder="{{ $inputData->quantity }}" class="form-control"></td>

                                            </tr>
                                            <tr>
                                                <td>Received by</td>
                                                <td><input type="text" name="receivedby"
                                                        value="{{ $inputData->receivedby }}"
                                                        placeholder="{{ $inputData->receivedby }}" class="form-control">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>User</td>
                                                <td><input type="text" name="user" value="{{ $inputData->user }}"
                                                        placeholder="{{ $inputData->user }}" class="form-control"></td>

                                            </tr>
                                            <tr>
                                                <td>Storage Location</td>
                                                <td><input type="text" name="storagelocation"
                                                        value="{{ $inputData->storagelocation }}"
                                                        placeholder="{{ $inputData->storagelocation }}"
                                                        class="form-control"></td>

                                            </tr>
                                            <tr>
                                                <td>Vehicle Number</td>
                                                <td><input type="text" name="vehiclenumber"
                                                        value="{{ $inputData->vehiclenumber }}"
                                                        placeholder="{{ $inputData->vehiclenumber }}" class="form-control">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Supplier</td>
                                                <td><input type="text" name="supplier"
                                                        value="{{ $inputData->supplier }}"
                                                        placeholder="{{ $inputData->supplier }}" class="form-control"></td>

                                            </tr>
                                            <tr>
                                                <td>Remark</td>
                                                <td><input type="text" name="remark" value="{{ $inputData->remark }}"
                                                        placeholder="{{ $inputData->remark }}" class="form-control"></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary mt-2 col-xl-12 col-xxl-12">
                                        Save
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
