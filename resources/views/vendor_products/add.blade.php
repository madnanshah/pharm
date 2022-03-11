@extends('layouts.layout')
@section('title', 'Add Vendor Product')


@section('content')
<div class="container">
   <div class="row">
   <div class="col">
      <h2 class="mb-4">Add Vendor Product</h2>
   </div>
   <div class="col">
      <button class="float-right btn btn-primary">Back</button>
   </div>
   </div>

   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif
   @if(session('status') == '1')
      <div class="alert alert-success alert-dismissible fade show">
         <strong>Success! </strong>Record added successfully.
      </div>
   @endif
   @if(session('status') == '0')
      <div class="alert alert-danger alert-dismissible fade show">
         <strong>Error! </strong>Record could not be added.
      </div>
   @endif
   <div class="container">
      <form action="../store" method="POST">
         @csrf
         <input type="hidden" name="product_id" value="{{$product->id}}">
         <div class="row">
            <div class="col">
               <P class="h5">{{$product->description}}</P>
            </div>
         </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Controlled</label>
               <select name="is_controlled" class="form-control" aria-label=".form-select-lg example">
                  <option value="">Select any</option>
                  <option value="0" {{ (old("is_controlled") == "0" ? "selected":"") }}>No</option>
                  <option value="1" {{ (old("is_controlled") == "1" ? "selected":"") }}>Yes</option>
               </select>
            </div>
            <div class="col">
               <label for="" class="form-label">Supplier</label>
               <select name="supplier_id" class="form-control" aria-label=".form-select-lg example">
                  <option value="">Select any</option>
                  @foreach ($suppliers as $supplier)
                     <option value="{{ $supplier->id }}" {{ (old("supplier_id") == $supplier->id ? "selected":"") }}>{{ $supplier->name }}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Verify data first!</label>
               <input type="submit" class="form-control">
            </div>
         </div>
      </form>
   </div>
</div>
@stop