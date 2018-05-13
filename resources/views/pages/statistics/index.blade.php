@extends('app')

@section('content')

<div class="content-wrapper">
  <div class="container-fluid">
  @component('components/breadcrumb', ['description' => 'Data from users behavior'])
    Statistics
  @endcomponent
    <div class="row mt-5">
      <div class="col-12 mx-auto mb-4">
        <h4 class="mb-4 text-center"><strong>Flow of users over time</strong></h4>
        <div id="carouselRecords" class="carousel carousel-fade">
          <div class="select-btn-group btn-group btn-group-sm mb-4">
            <button data-target="#carouselRecords" data-slide-to="0" class="btn btn-blue">Daily</button>
            <button data-target="#carouselRecords" data-slide-to="1"  class="btn btn-light">Monthly</button>
            <button data-target="#carouselRecords" data-slide-to="2"  class="btn btn-light">Yearly</button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <canvas id="day-chart" 
                  data-records="{{json_encode($dailySignups)}}" height="100"></canvas>
            </div>

            <div class="carousel-item">
              <canvas id="month-chart" 
                  data-records="{{json_encode($monthlySignups)}}" height="100"></canvas>
            </div>

            <div class="carousel-item">
              <canvas id="year-chart" 
                  data-records="{{json_encode($yearlySignups)}}" height="100"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-lg-4 col-md-4 col-sm-6 col-12">
        <h4 class="mb-4 text-center"><strong>Top stories</strong></h4>
        <ul>
          @foreach($topStories as $id => $count)
          <li class="d-flex justify-content-between">
            <span>{{\App\Story::find($id)->title}}</span>
            <span>{{$count}}</span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
$('.select-btn-group .btn').on('click', function() {
  $(this).siblings().removeClass('btn-blue').addClass('btn-light');
  $(this).removeClass('btn-light').addClass('btn-blue');
});

createChart = function(type) {
  var chart = document.getElementById(type+"-chart");
  var ctx = chart.getContext('2d');
  var activeRecords = JSON.parse(chart.getAttribute('data-records'));

  var activeData = [];
  var fields = [];

  for (var i = 0;i < activeRecords.length; i++) {
    if (type == 'day') {
        fields.push(activeRecords[i].month+" "+activeRecords[i].day);
    } else if (type == 'month') {
      fields.push(activeRecords[i].month);
    } else {
      fields.push(activeRecords[i].year);
    }

    activeData.push(activeRecords[i].count);
  }

  console.log(activeRecords.length);

  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: fields,
          datasets: [
          {
              label: 'New users',
              data: activeData,
              pointBackgroundColor: 'rgba(255, 99, 132, 0.2)',
              pointBorderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              borderColor: 'rgba(255,99,132,1)',
              borderWidth: 1
          }
      ]},
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                      beginAtZero: true,
                      callback: function(value, index, values) {
                          if (Math.floor(value) === value) {
                              return value;
                          }
                      }
                  }
              }]
          }
      }
  }); 
}

createChart('day');
createChart('month');
createChart('year');
</script>
@endsection
