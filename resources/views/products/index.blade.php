@extends('layouts.layout')
@section('title', 'Products')


@section('content')
   <div class="container">
      <div class="row">
      <div class="col">
         <h2 class="mb-4">Products</h2>
      </div>
      <div class="col">
         <button class="float-right btn btn-primary" onclick="location.href='{{ url('products/add') }}'">Add</button>
      </div>
      </div>
   </div>
   <table class="table table-bordered yajra-datatable">
      <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Salt</th>
            <th>Menufacturer</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
      </tbody>
   </table>
@stop