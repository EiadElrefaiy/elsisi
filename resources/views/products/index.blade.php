@extends('layouts.app')

@section('content')
<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25 hide" data-table="products"></button>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="card-title mb-2">المنتجات</h3>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text" style="padding: 9.5px;" id="basic-addon2"><i class="fas fa-search"></i></span>
                            </div>
                            <input id="searchInput" type="text" class="form-control" placeholder="بحث" aria-label="Recipient 's username" aria-describedby="basic-addon2" />
                        </div>
                    </div>
                    <div class="col-6 mt-2" dir="ltr">
                        <a href="{{ route('add', ['view' => 'products.add']) }}" style="padding: 3px 15px;" type="button" class="btn btn-success text-white ">
                            اضافة منتج &nbsp;<i class="mdi mdi-account-plus font-18"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">النوع</th>
                            <th scope="col">السعر</th>
                            <th scope="col">الكمية</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="customtable">
                        @foreach ($data as $item)
                        <tr id="dataRow_{{ $item->id }}">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }} ج</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <a style="color: #3e5569;" href="{{ route('edit', ['view' => 'products.edit','table' => 'products' , 'id' => $item->id]) }}"><i class="mdi mdi-grease-pencil"></i></a>&nbsp;&nbsp;
                                <a style="color: #3e5569;" href="javascript:void(0);" onclick="showConfirmDeleteModal('{{ $item->id }}', 'products')">
                                    <i class="mdi mdi-delete"></i>
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


@include('modals.confirmDelete')

@include('modals.successDelete')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@include('js.index')

<script>
    // Function to filter table rows based on search input
    function filterTableRows() {
        var query = $('#searchInput').val().trim().toLowerCase();
        $('.customtable tr').each(function() {
            var $row = $(this);
            if ($row.text().toLowerCase().indexOf(query) === -1) {
                $row.hide();
            } else {
                $row.show();
            }
        });
    }

    // Trigger filter function on any key press in the search input field
    $('#searchInput').on('keyup', function(e) {
        filterTableRows();
    });
</script>

@endsection
