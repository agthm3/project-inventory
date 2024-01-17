@extends('layouts.app')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Element</span>
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
                                <form>
                                    <label for="name" class="mt-2">Name</label>
                                    <input id="name" type="text" class="form-control input-default"
                                        name="name" />
                                    <label for="request-date" class="mt-2">Request Date</label>
                                    <input id="request-date" type="date" name="request-date"
                                        class="form-control input-default" />

                                    <label for="requestor" class="mt-2">Requestor</label>
                                    <input id="requestor" type="text" class="form-control input-default" />
                                    <label for="department" class="mt-2">Department</label>
                                    <input id="department" type="text" class="form-control input-default" />
                                    <label for="po-number" class="mt-2">PO Number</label>
                                    <input id="po-number" type="number" name="po-number"
                                        class="form-control input-default" />
                                    <label for="" class="mt-2">Notes</label>
                                    <textarea class="form-control" rows="4" id="comment" name="notes"></textarea>
                                    <label for="from" class="mt-2">From</label>
                                    <input id="from" type="text" name="from-name"
                                        class="form-control input-default" />
                                    <label for="to" class="mt-2">To</label>
                                    <input id="to" name="to-name" type="text"
                                        class="form-control input-default" />
                                    <label for="vehicle-number" class="mt-2">Vehicle Number</label>
                                    <input id="vehicle-number" name="vehicle-number" type="text"
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
@endsection
