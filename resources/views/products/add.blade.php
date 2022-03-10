@extends('layouts.layout')
@section('title', 'Add Product')


@section('content')
<div class="container">
   <div class="row">
   <div class="col">
      <h2 class="mb-4">Add Product</h2>
   </div>
   <div class="col">
      <button class="float-right btn btn-primary">Back</button>
   </div>
   </div>

   <div class="container">
      @if (isset($status) && $status)
         <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> :) | Record added successfully.
         </div>
      @elseif(isset($status) && !$status)
         <div class="alert alert-danger alert-dismissible fade show">
            <strong>Error!</strong> :( | Record could not be added.
         </div>
      @endif
      <form action="store" method="POST">
         @csrf
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Type</label>
               <select name="type" class="form-control" aria-label=".form-select-lg example">
                  <option selected>{{null}}</option>
                  <option value="Tab">Tab</option>
                  <option value="Cap">Cap</option>
                  <option value="Inj">Inj</option>
                  <option value="Syrup">Syrup</option>
               </select>
            </div>
            <div class="col">
               <label for="" class="form-label">Name</label>
               <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col">
               <label for="" class="form-label">Salt</label>
               <input type="text" name="salt" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Description</label>
               <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Grammage</label>
               <input type="text" name="grammage" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col">
               <label for="" class="form-label">Controlled</label>
               <select name="is_controlled" class="form-control" aria-label=".form-select-lg example">
                  <option value="0">No</option>
                  <option value="1">Yes</option>
               </select>
            </div>
            <div class="col">
               <label for="" class="form-label">Manufacturer</label>
               <select name="manufacturer" class="form-control" aria-label=".form-select-lg example">
                  <option value="Manufacturer 1">Manufacturer 1</option>
                  <option value="Manufacturer 2">Manufacturer 2</option>
                  <option value="Manufacturer 3">Manufacturer 3</option>
                  <option value="Manufacturer 4">Manufacturer 4</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Supplier</label>
               <select name="supplier_id" class="form-control" aria-label=".form-select-lg example">
                  @foreach ($suppliers as $supplier)
                     <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col">
               <label for="" class="form-label">Verify data first!</label>
               <input type="submit" class="form-control">
            </div>
         </div>
      </form>
   </div>
</div>
@stop