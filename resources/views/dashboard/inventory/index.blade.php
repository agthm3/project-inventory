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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Stock</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Inventori</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Inventori</h4>
                            <form action="{{ route('inventory.index') }}" method="GET">
                                <div class="row mb-3">
                                    <!-- Filter PO Number -->
                                    <div class="col-lg-3">
                                        <input class="form-control" list="poNumbersList" name="filter_ponumber"
                                            placeholder="Search PO Number" value="{{ request()->filter_ponumber }}">
                                        <datalist id="poNumbersList">
                                            @foreach ($uniquePoNumbers as $poNumber)
                                                <option value="{{ $poNumber }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Request Date -->
                                    <div class="col-lg-3">
                                        <input class="form-control" list="requestDatesList" name="filter_request_date"
                                            placeholder="Search Request Date" value="{{ request()->filter_request_date }}">
                                        <datalist id="requestDatesList">
                                            @foreach ($uniqueRequestDates as $date)
                                                <option value="{{ $date }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Name -->
                                    <div class="col-lg-3 mt-2">
                                        <input class="form-control" list="namesList" name="filter_name"
                                            placeholder="Search User" value="{{ request()->filter_name }}">
                                        <datalist id="namesList">
                                            @foreach ($uniqueNames as $name)
                                                <option value="{{ $name }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Received By -->
                                    <div class="col-lg-3">
                                        <input class="form-control" list="receivedByList" name="filter_receivedby"
                                            placeholder="Search Received By" value="{{ request()->filter_receivedby }}">
                                        <datalist id="receivedByList">
                                            @foreach ($uniqueReceivedby as $receivedby)
                                                <option value="{{ $receivedby }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Storage Location -->
                                    <div class="col-lg-3">
                                        <input class="form-control" list="storageLocationsList"
                                            name="filter_storagelocation" placeholder="Search Storage Location"
                                            value="{{ request()->filter_storagelocation }}">
                                        <datalist id="storageLocationsList">
                                            @foreach ($uniqueStoragelocation as $storagelocation)
                                                <option value="{{ $storagelocation }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Vehicle Number -->
                                    <div class="col-lg-3">
                                        <input class="form-control" list="vehicleNumbersList" name="uniqueVehiclenumber"
                                            placeholder="Search Vehicle Number"
                                            value="{{ request()->uniqueVehiclenumber }}">
                                        <datalist id="vehicleNumbersList">
                                            @foreach ($uniqueVehiclenumber as $vehiclenumber)
                                                <option value="{{ $vehiclenumber }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Supplier -->
                                    <div class="col-lg-3 mt-2">
                                        <input class="form-control" list="suppliersList" name="uniqueSupplier"
                                            placeholder="Search Supplier" value="{{ request()->uniqueSupplier }}">
                                        <datalist id="supplie rsList">
                                            @foreach ($uniqueSupplier as $supplier)
                                                <option value="{{ $supplier }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <!-- Filter Remark -->
                                    <div class="col-lg-3">
                                        <input class="form-control" list="remarksList" name="uniqueRemark"
                                            placeholder="Search Remark" value="{{ request()->uniqueRemark }}">
                                        <datalist id="remarksList">
                                            @foreach ($uniqueRemark as $remark)
                                                <option value="{{ $remark }}"></option>
                                            @endforeach
                                        </datalist>
                                    </div>
                                </div>

                                <!-- Search Term -->
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" class="form-control input-default" name="search_term"
                                            placeholder="Search" value="{{ request()->search_term }}" />
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Reset
                                            Filters</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm text-primary">
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
                                                <td>
                                                    <span
                                                        class="badge {{ $item->quantity < 50 ? 'badge-danger' : ($item->quantity <= 80 ? 'badge-warning' : 'badge-success') }}">
                                                        {{ $item->quantity }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('inventory.show', $item) }}"
                                                        class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        Detail
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
        </div>
    </div>
@endsection
