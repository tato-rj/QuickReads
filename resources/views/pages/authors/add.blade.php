@extends('app')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
  @component('components/breadcrumb')
    Authors
    @slot('description')Add a new author 
    @endslot
  @endcomponent
    <form method="POST" action="/authors" class="col-6 mx-auto my-4">
      {{csrf_field()}}
      {{-- Name --}}
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Full name">
      </div>
      {{-- Life --}}
      <div class="form-group">
        <textarea class="form-control" rows="4" name="life" placeholder="Life's summary"></textarea>
      </div>
      {{-- Dates --}}
      <div class="form-row">
        <div class="col-auto">
          <input class="form-control" type="text" size="6" maxlength="4" name="born_in" placeholder="Year born">
        </div>
        <div class="col-auto">
          <input class="form-control" type="text" size="6" maxlength="4" name="died_in" placeholder="Year died">
        </div>
      </div>

      <div class="text-center my-5">
        <button type="submit" class="btn btn-block btn-default">Add Author</button>
      </div>
      
    </form>   
  </div>
</div>

@endsection