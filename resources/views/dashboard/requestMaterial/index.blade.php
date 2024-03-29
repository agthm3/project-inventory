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
                            <a href="javascript:void(0)">Request</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript:void(0)">Request Material</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Request Material</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">

                                <form action="{{ route('requestmaterial.store') }}" method="post" class="text-primary">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    @csrf
                                    {{-- name --}}
                                    <div class="form-group">
                                        <label for="inputDataName" class="mt-2">Name</label>

                                        <select id="inputDataName" class="form-control" name="name">
                                            <option value="">Select Material</option>
                                            @foreach ($inputDataNames as $inputDataName)
                                                <option value="{{ $inputDataName->name }}">{{ $inputDataName->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    {{-- ponumber --}}
                                    <label for="po-number" class="mt-2">PO Number</label>
                                    <input id="po-number" type="number" name="ponumber"
                                        class="form-control input-default" />
                                    {{-- request quantity --}}
                                    <label for="quantity" class="mt-2">Quantity</label>
                                    <p>Jumlah yang tampil adalah stok yang dimiliki, harap jangan melakukan request lebih
                                        dari stok.</p>
                                    <input id="quantity" name="quantity" type="number"
                                        class="form-control input-default" />
                                    {{-- user --}}
                                    <label for="requestor" class="mt-2">User</label>
                                    <input id="requestor" type="text" name="user"
                                        class="form-control input-default" />
                                    {{-- request data --}}
                                    <label for="request-date" class="mt-2">Request Date</label>
                                    <input id="request-date" name="requestdate" type="date"
                                        class="form-control input-default" />

                                    {{-- requestor --}}
                                    <label for="requestor" class="mt-2">Requestor</label>
                                    <input id="requestor" type="text" name="requestor"
                                        class="form-control input-default" />
                                    {{-- department --}}
                                    <label for="department" class="mt-2">Department</label>
                                    <input id="department" type="text" name="department"
                                        class="form-control input-default" />
                                    {{-- notes --}}
                                    <label for="" class="mt-2">Notes</label>
                                    <textarea class="form-control" rows="4" id="comment" name="notes"></textarea>
                                    {{-- from --}}
                                    <label for="from" class="mt-2">From</label>
                                    <input id="from" type="text" name="from_note"
                                        class="form-control input-default" />
                                    {{-- to --}}
                                    <label for="to" class="mt-2">To</label>
                                    <input id="to" name="to_note" type="text"
                                        class="form-control input-default" />
                                    {{-- vehicle number --}}
                                    <label for="vehicle-number" class="mt-2">Vehicle Number</label>
                                    <input id="vehicle-number" name="vehiclenumber" type="text"
                                        class="form-control input-default" />

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

    <script>
        $(document).ready(function() {
            // Muat nama-nama saat dokumen siap
            $.ajax({
                url: '/getAllNamesWithPoNumbers',
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var nameSelect = $('#inputDataName');
                    nameSelect.empty();
                    data.forEach(function(item) {
                        nameSelect.append($('<option>', {
                            value: item.label,
                            text: item.label
                        }));
                    });
                }
            });

            $('#inputDataName').on('change', function() {
                var selectedLabel = $(this).val();
                if (selectedLabel) {
                    $.ajax({
                        url: '/getAllNamesWithPoNumbers',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            data.forEach(function(item) {
                                if (item.label === selectedLabel) {
                                    $('#po-number').val(item.ponumber);
                                    $('#quantity').val(item.quantity);
                                    $('#user').val(item.user);
                                }
                            });
                        }
                    });
                }
            });

            $('#po-number').on('change', function() {
                var poNumber = $(this).val();
                if (poNumber) {
                    $.ajax({
                        url: '/getAllNamesWithPoNumbers',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            data.forEach(function(item) {
                                if (item.ponumber === poNumber) {
                                    $('#inputDataName').val(item.label);
                                    $('#quantity').val(item.quantity);
                                    $('#user').val(item.user);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>





@endsection
