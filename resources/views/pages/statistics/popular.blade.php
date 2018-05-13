<ol class="custom-scroll px-3 py-2" style="max-height: 260px; overflow-y: scroll;">
  @foreach($topStories as $id => $count)
  <li class="d-flex justify-content-between">
    <span>{{\App\Story::find($id)->title}}</span>
    <span>{{$count}}</span>
  </li>
  @endforeach
</ol>