@extends('layouts.app')

@section('content')


@include('management.form')

        <div id="errorMessages" class="alert alert-danger hide"></div>

        <button type="button" id="submitFormButton" class="btn btn-primary m-2 w-25" data-table="users">
          حفظ البيانات
        </button>


        @include('modals.successEdit')

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        @include('js.edit')

@endsection
