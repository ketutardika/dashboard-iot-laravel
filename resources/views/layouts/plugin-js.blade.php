<!-- core:js -->
<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
<!-- endinject -->
<script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}" ></script>
<script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}" ></script>
<script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/template.js') }}"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard-dark.js') }}"></script>
<script src="{{ asset('assets/js/datepicker.js') }}"></script>

@if(Route::is('sensors.dashboard','dashboard','homedashboard'))
<?php $user_id = Auth::user()->id; ?>
@foreach(App\Models\Projects::where('user_id',$user_id)->where('isactive','1')->get() as $data)
<!-- HighCharts -->
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/highcharts-more.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
  <script type="text/javascript">

    //
    // Config
    //
    Highcharts.setOptions({
      global: {
        useUTC: false
      }
    });

    //
    // LIVE CHART
    //

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_1',
          backgroundColor: '#070d19',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/os/data/SUQUK9YM51/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;

                    chart.series[0].addPoint(eval(point[0]), true, shift);
                    chart.series[1].addPoint(eval(point[1]), true, shift);
                  },
                  cache: false
                });
              }, 1000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Temperature',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value}°C',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' °C'
          }

        }, {

          title: {
            text: 'Humidity',
            style: {
              color: 'darkred'
            }
          },
          labels: {
            format: '{value}%',
            style: {
              color: 'darkred'
            }
          },
          opposite: true

        }],
        /*
         yAxis: {
         minPadding: 0.2,
         maxPadding: 0.2,
         title: {
         text: 'Value',
         margin: 80
         }
         },*/
        series: [{
          name: 'Temperature',
          type: 'spline',
          tooltip: {
            valueSuffix: ' °C'
          },
          data: [],
          yAxis: 0,
        },
          {
            name: 'Humidity',
            type: 'spline',
            tooltip: {
              valueSuffix: ' %'
            },
            color: 'darkred',
            data: [],
            yAxis: 1,
          },]
      });
    });

    //
  </script>
  <script type="text/javascript">

    //
    // Config
    //
    Highcharts.setOptions({
      global: {
        useUTC: false
      }
    });

    //
    // LIVE CHART
    //

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_2',
          backgroundColor: '#070d19',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/os/data/SUQUK9YM51/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;

                    chart.series[0].addPoint(eval(point[0]), true, shift);
                    chart.series[1].addPoint(eval(point[1]), true, shift);
                  },
                  cache: false
                });
              }, 1000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Temperature',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value}°C',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' °C'
          }

        }, {

          title: {
            text: 'Humidity',
            style: {
              color: 'darkred'
            }
          },
          labels: {
            format: '{value}%',
            style: {
              color: 'darkred'
            }
          },
          opposite: true

        }],
        /*
         yAxis: {
         minPadding: 0.2,
         maxPadding: 0.2,
         title: {
         text: 'Value',
         margin: 80
         }
         },*/
        series: [{
          name: 'Temperature',
          type: 'spline',
          tooltip: {
            valueSuffix: ' °C'
          },
          data: [],
          yAxis: 0,
        },
          {
            name: 'Humidity',
            type: 'spline',
            tooltip: {
              valueSuffix: ' %'
            },
            color: 'darkred',
            data: [],
            yAxis: 1,
          },]
      });
    });

    //
  </script>
  <script type="text/javascript">

    //
    // Config
    //
    Highcharts.setOptions({
      global: {
        useUTC: false
      }
    });

    //
    // LIVE CHART
    //

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_3',
          backgroundColor: '#070d19',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/os/data/SUQUK9YM51/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;

                    chart.series[0].addPoint(eval(point[0]), true, shift);
                    chart.series[1].addPoint(eval(point[1]), true, shift);
                  },
                  cache: false
                });
              }, 1000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Live monitor'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Temperature',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value}°C',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' °C'
          }

        }, {

          title: {
            text: 'Humidity',
            style: {
              color: 'darkred'
            }
          },
          labels: {
            format: '{value}%',
            style: {
              color: 'darkred'
            }
          },
          opposite: true

        }],
        /*
         yAxis: {
         minPadding: 0.2,
         maxPadding: 0.2,
         title: {
         text: 'Value',
         margin: 80
         }
         },*/
        series: [{
          name: 'Temperature',
          type: 'spline',
          tooltip: {
            valueSuffix: ' °C'
          },
          data: [],
          yAxis: 0,
        },
          {
            name: 'Humidity',
            type: 'spline',
            tooltip: {
              valueSuffix: ' %'
            },
            color: 'darkred',
            data: [],
            yAxis: 1,
          },]
      });
    });

    //
  </script>
  @endforeach
  @endif

  @if(Route::is('sensors.datalog'))
<!-- HighCharts -->
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/highcharts-more.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script type="text/javascript">

    //
    // Config
    //
    Highcharts.setOptions({
      global: {
        useUTC: false
      }
    });

    //
    // LIVE CHART
    //

    $(document).ready(function() {
      var chart = new Highcharts.Chart({
        chart: {
          renderTo: 'live_container_datalog',
          backgroundColor: '#070d19',
          defaultSeriesType: 'spline',
          events: {
            load: function () {
              setInterval(function () {
                $.ajax({
                  url: '/os/data/{{ $datalog->unique_id }}/live',
                  success: function (point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20;

                    chart.series[0].addPoint(eval(point[0]), true, shift);
                  },
                  cache: false
                });
              }, 1000);
            }
          },
          zoomType: '',
        },
        title: {
          text: 'Live monitor last check {{ $datalog->last_check }}'
        },
        tooltip: {
          shared: true
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: [{
          title: {
            text: 'Temperature',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          labels: {
            format: '{value}°C',
            style: {
              color: Highcharts.getOptions().colors[0]
            }
          },
          tooltip: {
            valueSuffix: ' °C'
          }

        }, {

          title: {
            text: 'Humidity',
            style: {
              color: 'darkred'
            }
          },
          labels: {
            format: '{value}%',
            style: {
              color: 'darkred'
            }
          },
          opposite: true

        }],
        /*
         yAxis: {
         minPadding: 0.2,
         maxPadding: 0.2,
         title: {
         text: 'Value',
         margin: 80
         }
         },*/
        series: [{
          name: 'Temperature',
          type: 'spline',
          tooltip: {
            valueSuffix: ' °C'
          },
          color: 'darkred',
          data: [],
          yAxis: 0,
        },]
      });
    });

    //
  </script>
  @endif
  <script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var ex_id = $(this).data('id'); 

         if ( ex_id==1 ){
            if ($(this).prop('checked')== true  ) {
              $('.text-led-1').text("ON");
            } 
            else{
              $('.text-led-1').text("OFF");
            }
         }
         if ( ex_id==2 ){
           if ($(this).prop('checked')== true  ) {
              $('.text-led-2').text("ON");
            } 
            else{
              $('.text-led-2').text("OFF");
            }
         }
         if ( ex_id==3 ){
           if ($(this).prop('checked')== true  ) {
              $('.text-led-3').text("ON");
            } 
            else{
              $('.text-led-3').text("OFF");
            }
         }
         if ( ex_id==4 ){
           if ($(this).prop('checked')== true  ) {
              $('.text-led-4').text("ON");
            } 
            else{
              $('.text-led-4').text("OFF");
            }
         }

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '../os/ex/change/'+ ex_id +'/'+status,
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>