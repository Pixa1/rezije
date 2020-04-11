@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">Režije</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Pojedinačno
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                    <canvas id="myChart2" ></canvas>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Ukupno
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                {{-- <div id="area-example"></div> --}}
                <canvas id="myChart" ></canvas>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
            Ukupno za platiti (Struja,Voda,Komunalije)
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Datum</th>
                              <th>Bero</th>
                              <th>Jura</th>
                              <th>Pixa</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($records as $record)
                        <tr>
                          <td>{{ucfirst($record->date->format('m.Y'))}}</td>
                          <td>{{$record->Bero}} Kn</td>
                          <td>{{$record->Jura}} Kn</td>
                          <td>{{$record->Pixa}} Kn</td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
  <div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
          Ukupno
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mjesec</th>
                            <th>Struja</th>
                            <th>Voda</th>
                            <th>Komunalije</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($records as $record)
                      <tr>
                        <td>{{ucfirst($record->date->format('m.Y'))}}</td>
                        <td>{{$record->Struja}} Kn</td>
                        <td>{{$record->Voda}} Kn</td>
                        <td>{{$record->Komunal}} Kn</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.row -->
</div>

@section('scripts')
<script>
    var data = @json($graphdata);
    console.log(data);
    var ctx = document.getElementById('myChart');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data:data,
        options:{
            scales: {
                yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Kn'
                }
                }]
            }
        }
    });
    var data2=@json($graphdata2);
    var ctx = document.getElementById('myChart2');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data:data2,
        options:{
            scales: {
                yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Kn'
                }
                }]
            }
        }
    });

        </script>
@endsection
@endsection
