@extends('admin.layouts.app')
@section('dashboard')


<style>
    .new-customer-button{        
        margin-bottom: 25px;
        display: flex;
        justify-content: end;
    }
</style>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Customer List</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('layout._message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="new-customer-button">
                            <a href="{{url('admin/customer/add')}}" class="btn btn-primary">Add New Customer</a>
                        </h5>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Id:</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Contact No.</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Doctor Name</th>
                                    <th scope="col">Doctro Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Error</td>
                                    <td>0123456789</td>
                                    <td>Tya tala ko</td>
                                    <td>Dr. Sins</td>
                                    <td>Tya mathee ko</td>
                                    <td>delete</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection