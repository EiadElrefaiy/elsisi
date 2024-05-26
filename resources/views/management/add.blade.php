@extends('layouts.app')

@section('content')


@include('management.form')

<div id="errorMessages" class="alert alert-danger hide"></div>

<button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="users" data-view="management.index">
    حفظ البيانات
</button>


    @include('modals.successAdd')


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @include('js.create')


@endsection
