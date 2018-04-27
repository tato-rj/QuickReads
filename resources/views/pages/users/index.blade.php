@extends('app')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
  @component('components/breadcrumb')
    Users
    @slot('description')Data from the users
    @endslot
  @endcomponent
<p class="m-4">The total number of users is <strong>{{$users->count()}}</strong></p>
<div id="accordion">
	@foreach($users as $user)
  <div class="card">
    <div class="card-header cursor-pointer bg-white d-flex justify-content-between align-items-center" id="headingOne" data-toggle="collapse" data-target="#user-{{$user->id}}" aria-expanded="true" aria-controls="user-{{$user->id}}">
      <p class="mb-0">
          <strong>{{$user->fullName}}</strong><span class="ml-2 badge badge-light text-muted">{{$user->stories_count}} {{ str_plural('story', $user->stories_count) }}</span>
      </p>
      <p class="m-0 text-muted">joined on {{$user->created_at->toFormattedDateString()}}</p>
    </div>

    <div id="user-{{$user->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      	<div class="d-flex align-items-center">
      		<div class="border mx-2 px-3 py-2 rounded">
      			<p class="m-0 text-muted"><strong>Email</strong></p>
      			<p class="m-0">{{$user->email}}</p>
      		</div>
      		<div class="border mx-2 px-3 py-2 rounded">
      			<p class="m-0 text-muted"><strong>Country</strong></p>
      			<p class="m-0">{{locale_get_display_region($user->locale)}}</p>
      		</div>
      		<div class="border mx-2 px-3 py-2 rounded">
      			<p class="m-0 text-muted"><strong>Gender</strong></p>
      			<p class="m-0">{{ucfirst($user->gender)}}</p>
      		</div>
      		<div class="border mx-2 px-3 py-2 fb-picture rounded position-relative">
      			<p class="m-0 text-muted"><strong>Facebook ID</strong></p>
      			<p class="m-0 image" style="color: #2093a5">{{$user->facebook_id}}</p>
      			<img class="position-absolute rounded"
      				style="top: 70px; right: 0; width: 100%; display: none; -webkit-box-shadow: 2px 2px 19px 0px rgba(184,184,184,0.49);
-moz-box-shadow: 2px 2px 19px 0px rgba(184,184,184,0.49);
box-shadow: 2px 2px 19px 0px rgba(184,184,184,0.49); z-index: 1000" 
      				src="{{$user->profilePicture}}">
      		</div>
      	</div>
      	<div class="p-2">
      		@foreach($user->stories as $story)
      		<div class="d-flex justify-content-between align-items-center p-2 mt-1 bg-light">
      			<p class="m-0" style="color: #2093a5"><strong>{{$story->title}}</strong></p>
      			<p class="m-0 text-muted">downloaded on {{$story->created_at->toFormattedDateString()}}</p>
      		</div>
      		@endforeach
      	</div>
      </div>
    </div>
  </div>

  @endforeach
</div>

  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
$('.fb-picture .image').on('mouseover', function() {
	$(this).parent().find('img').fadeIn('fast');
});
$('.fb-picture .image').on('mouseleave', function() {
	$(this).parent().find('img').fadeOut('fast');
});
</script>
@endsection
