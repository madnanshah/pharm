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
      <form action="store" method="POST">
         @csrf
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Type</label>
               <select name="type" class="form-control" aria-label=".form-select-lg example">
                  <option value=""></option>
                  @foreach ($types as $type)
                     <option value="{{ $type->id }}-{{ $type->name }}" {{ (old("type") == $type->id.'-'.$type->name ? "selected":"") }}>{{ $type->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="col">
               <label for="" class="form-label">Name</label>
               <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col">
               <label for="" class="form-label">Salt</label>
               <input type="text" name="salt" value="{{ old('salt') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Description</label>
               <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Grammage</label>
               <input type="text" name="grammage" value="{{ old('grammage') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col">
               <label for="" class="form-label">Controlled</label>
               <select name="is_controlled" class="form-control" aria-label=".form-select-lg example">
                  <option value="0" {{ (old("is_controlled") == "0" ? "selected":"") }}>No</option>
                  <option value="1" {{ (old("is_controlled") == "1" ? "selected":"") }}>Yes</option>
               </select>
            </div>
            <div class="col">
               <label for="" class="form-label">Manufacturer</label>
               <select name="manufacturer_id" class="form-control" aria-label=".form-select-lg example">
                  <option value=""></option>
                  @foreach ($manufacturers as $manufacturer)
                     <option value="{{ $manufacturer->id }}" {{ (old("manufacturer_id") == $manufacturer->id ? "selected":"") }}>{{ $manufacturer->name }}</option>
                  @endforeach
               </select>
            </div>
         </div>
         <div class="row">
            <div class="col">
               <label for="" class="form-label">Category</label>
               <select name="sub_category_id" class="form-control" aria-label=".form-select-lg example">
                  <option value=""></option>
                  @foreach ($categories as $category)
                     <option value="{{ $category->sub_category_id }}" {{ (old("sub_category_id") == $category->sub_category_id ? "selected":"") }}>{{ $category->category_name }} -> {{ $category->sub_category_name }}</option>
                     {{-- <option value="{{ $category->sub_category_id }}">{{ $category->category_name }} -> {{ $category->sub_category_name }}</option> --}}
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