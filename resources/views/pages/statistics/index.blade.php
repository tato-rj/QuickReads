@extends('app')

@section('content')

<div class="content-wrapper pb-4">
  <div class="container-fluid">
  @component('components/breadcrumb', ['description' => 'Data from users behavior'])
    Statistics
  @endcomponent
    <div class="row mt-5">
      <div class="col-12 mx-auto mb-4">
        <h4 class="mb-4 text-center"><strong>Flow of users over time</strong></h4>
        @include('pages/statistics/users')
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <h4 class="mb-4 text-center"><strong>Top stories</strong></h4>
        @include('pages/statistics/popular')
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
