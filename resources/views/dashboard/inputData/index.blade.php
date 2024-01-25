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
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)">Stock</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">Input Data</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Data Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('inputdata.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- name --}}
                                    <label for="name" class="mt-2 text-primary">Name</label>
                                    <input id="name" name="name" type="text"
                                        class="form-control input-default" />
                                    {{-- verification date --}}
                                    <label for="verification-date" class="mt-2 text-primary">Verification Date</label>
                                    <input id="verification-date" name="verificationdate" type="date"
                                        class="form-control input-default" />
                                    {{-- po number --}}
                                    <label for="po-number" class="mt-2 text-primary">PO Number</label>
                                    <input id="po-number" type="number" name="ponumber"
                                        class="form-control input-default" />
                                    {{-- deskripsi --}}
                                    <label for="" class="mt-2 text-primary">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="4" id="comment"></textarea>
                                    {{-- quantity --}}
                                    <label for="quantity" class="mt-2 text-primary">Quantity</label>
                                    <input id="quantity" type="number" name="quantity"
                                        class="form-control input-default" />
                                    {{-- received by --}}
                                    <label for="received" class="mt-2 text-primary">Received By</label>
                                    <input id="received" type="text" name="receivedby"
                                        class="form-control input-default" />
                                    {{-- user --}}
                                    <label for="user" class="mt-2 text-primary">User</label>
                                    <input id="user" type="text" name="user"
                                        class="form-control input-default" />
                                    {{-- storage location --}}
                                    <label for="storage-location" class="mt-2 text-primary">Storage Location</label>
                                    <input id="storage-location" name="storagelocation" type="text"
                                        class="form-control input-default" />
                                    {{-- vehicle-number --}}
                                    <label for="vehicle-number" class="mt-2 text-primary">Vehicle Number</label>
                                    <input id="vehicle-number" name="vehiclenumber" type="text"
                                        class="form-control input-default" />
                                    {{-- supplier --}}
                                    <label for="supplier" class="mt-2 text-primary">Supplier</label>
                                    <input id="supplier" name="supplier" type="text"
                                        class="form-control input-default" />
                                    {{-- remark --}}
                                    <label for="remark" class="mt-2 text-primary">Remark</label>
                                    <input id="remark" type="text" name="remark"
                                        class="form-control input-default" />
                                    {{-- material documentattion --}}
                                    <label for="" class="mt-3 text-primary">Material Received Documentation</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-primary">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                accept="image/png, image/gif, image/jpeg" />
                                            <label class="custom-file-label text-primary">Choose Image Only</label>
                                        </div>
                                    </div>
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
