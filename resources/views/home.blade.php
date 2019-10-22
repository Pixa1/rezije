@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              Podaci
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Datum</th>
                              <th>Voda kuća</th>
                              <th>Voda Pixa</th>
                              <th>Struja kuća</th>
                              <th>Struja Pixa</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($records as $record)
                        <tr>
                          <td>{{$record->Date}}</td>
                          <td>{{$record->VK}}</td>
                          <td>{{$record->VP}}</td>
                          <td>{{$record->SK}}</td>
                          <td>{{$record->SP}}</td>

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
@endsection