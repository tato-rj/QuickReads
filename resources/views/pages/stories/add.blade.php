@extends('app')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
  @component('components/breadcrumb')
    Stories
    @slot('description')Add a new story 
    @endslot
  @endcomponent
    <form method="POST" action="/stories" class="col-6 mx-auto my-4">
      {{csrf_field()}}
      {{-- Title --}}
      <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Title">
      </div>
      {{-- Summary --}}
      <div class="form-group">
        <textarea class="form-control" rows="4" name="summary" placeholder="Summary"></textarea>
      </div>
      {{-- Content --}}
      <div class="form-group">
        <textarea class="form-control" rows="12" name="content" placeholder="Content"></textarea>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            {{-- Reading Time --}}
            <input type="text" class="form-control" name="reading_time" maxlength="2" placeholder="Reading time">
          </div>
          <div class="form-group">
            {{-- Author --}}
            <select name="author_id" class="form-control">
              <option selected>Author</option>
              @foreach($authors as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {{-- Category --}}
            <select name="category_id" class="form-control">
              <option selected>Category</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            {{-- Cost --}}
            <select name="cost" class="form-control">
              <option selected>Cost</option>
              <option value="Free">Free</option>
              <option value="1">1 Coin</option>
              <option value="2">2 Coins</option>
              <option value="5">5 Coins</option>
            </select>
          </div>
        </div>
        <div class="col-6">
          <div id="upload-box" class="card">
            <input type="file" id="image" style="display:none;" />
            <img class="card-img-top" id="cover-img" src="{{ asset('images/no-image.png') }}" alt="Not an image">
            <div class="card-body text-center">
              <button type="button" id="upload-button" class="btn btn-default"><i class="fa fa-cloud-upload mr-1" aria-hidden="true"></i>Upload</button>
            </div>
          </div>         
        </div>
      </div>
      <div class="text-center my-5">
        <button type="submit" class="btn btn-block btn-default">Add Story</button>
      </div>
      
    </form>   
  </div>
</div>

@endsection