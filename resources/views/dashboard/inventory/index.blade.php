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
                                <!-- Dropdown Filters -->
                                <div class="row mb-3">
                                    <!-- Filter PO Number -->
                                    <div class="col-lg-3">
                                        <select name="filter_ponumber" class="form-control">
                                            <option value="">Select PO Number</option>
                                            @foreach ($uniquePoNumbers as $poNumber)
                                                <option value="{{ $poNumber }}"
                                                    {{ request()->filter_ponumber == $poNumber ? 'selected' : '' }}>
                                                    {{ $poNumber }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Filter Request Date -->
                                    <div class="col-lg-3">
                                        <select name="filter_request_date" class="form-control">
                                            <option value="">Select Request Date</option>
                                            @foreach ($uniqueRequestDates as $date)
                                                <option value="{{ $date }}"
                                                    {{ request()->filter_request_date == $date ? 'selected' : '' }}>
                                                    {{ $date }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Filter Name -->
                                    <div class="col-lg-3">
                                        <select name="filter_name" class="form-control">
                                            <option value="">Select User</option>
                                            @foreach ($uniqueNames as $name)
                                                <option value="{{ $name }}"
                                                    {{ request()->filter_name == $name ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Filter Received By -->
                                    <div class="col-lg-3">
                                        <select name="filter_receivedby" class="form-control mt-2">
                                            <option value="">Select Received By</option>
                                            @foreach ($uniqueReceivedby as $receivedby)
                                                <option value="{{ $receivedby }}"
                                                    {{ request()->filter_receivedby == $receivedby ? 'selected' : '' }}>
                                                    {{ $receivedby }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Filter Storage Location -->
                                    <div class="col-lg-3">
                                        <select name="filter_storagelocation" class="form-control mt-2">
                                            <option value="">Select Storage Location</option>
                                            @foreach ($uniqueStoragelocation as $storagelocation)
                                                <option value="{{ $storagelocation }}"
                                                    {{ request()->filter_storagelocation == $storagelocation ? 'selected' : '' }}>
                                                    {{ $storagelocation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Filter Vehicle Number -->
                                    <div class="col-lg-3">
                                        <select name="uniqueVehiclenumber" class="form-control mt-2">
                                            <option value="">Select Vehicle Number</option>
                                            @foreach ($uniqueVehiclenumber as $vehiclenumber)
                                                <option value="{{ $vehiclenumber }}"
                                                    {{ request()->uniqueVehiclenumber == $vehiclenumber ? 'selected' : '' }}>
                                                    {{ $vehiclenumber }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Filter Supplier -->
                                    <div class="col-lg-3">
                                        <select name="uniqueSupplier" class="form-control mt-2">
                                            <option value="">Select Supplier</option>
                                            @foreach ($uniqueSupplier as $supplier)
                                                <option value="{{ $supplier }}"
                                                    {{ request()->uniqueSupplier == $supplier ? 'selected' : '' }}>
                                                    {{ $supplier }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Filter Remark -->
                                    <div class="col-lg-3">
                                        <select name="uniqueRemark" class="form-control mt-2">
                                            <option value="">Select Remark</option>
                                            @foreach ($uniqueRemark as $remark)
                                                <option value="{{ $remark }}"
                                                    {{ request()->uniqueRemark == $remark ? 'selected' : '' }}>
                                                    {{ $remark }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                                    <a href="{{ route('inventory.show', $item) }}" class="btn btn-primary"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
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
