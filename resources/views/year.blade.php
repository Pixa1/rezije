@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              Podaci {{$id}}
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
                          <td>{{$record->date->localeMonth}}</td>
                          <td>{{$record->VK}} m3</td>
                          <td>{{$record->VP}} m3</td>
                          <td>{{$record->SK}} KW</td>
                          <td>{{$record->SP}} KW</td>

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