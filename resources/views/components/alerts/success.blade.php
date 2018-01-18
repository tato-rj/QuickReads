@component('components/alerts/alert')
	@slot('alert')success
	@endslot
	@slot('message'){{$message}}
	@endslot
@endcomponent