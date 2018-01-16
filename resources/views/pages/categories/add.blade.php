@extends('app')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
  @component('components/breadcrumb')
    Categories
    @slot('description')Add a new category 
    @endslot
  @endcomponent
    <form method="POST" action="/categories" class="col-6 mx-auto my-4">
      {{csrf_field()}}
      {{-- Name --}}
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Category name">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-block btn-default">Add Category</button>
      </div>
      
    </form>   
  </div>
</div>

@endsection