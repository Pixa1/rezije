@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-lg-12">
        <h1 class="page-header">Podaci</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                Podaci (Voda,Struja)
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th>Datum</th>
                                  <th>Voda Kuća</th>
                                  <th>Voda Pixa</th>
                                  <th>Struja Kuća</th>
                                  <th>Struja Pixa</th>
                                  <th>Struja Jura</th>
                                  <th>Struja Tata</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($records as $record)
                            <tr>
                              <td>{{ucfirst($record->date->monthName)}}</td>
                              <td>{{$record->VK}} m3</td>
                              <td>{{$record->VP}} m3</td>
                              <td>{{$record->SK}} KW</td>
                              <td>{{$record->SP}} KW</td>
                              <td>{{$record->SJ}} KW</td>
                              <td>{{$record->ST}} KW</td>
                              <td>
                                    @foreach ($record->getAttributes() as $key => $value)
                                        @if ($value == null)
                                            <div class="btn-group btn-group-sm border-1">
                                                    <a href="javascript:void(0)" class="btn btn-info" id="edit-record" data-id="{{ $record->id }}"><i class="fa fa-edit fa-fw"></i> Uredi</a>
                                            </div>
                                            @break
                                        @endif
                                    
                                    @endforeach
                                
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                    @auth
                    <div class="btn-group btn-group-sm border-1">
                        <a href="javascript:void(0)" class="btn btn-info" id="new-record" data-id="{{ $record->id }}"><i class="fa fa-edit fa-fw"></i> Dodaj novi zapis</a>
                    </div>
                    @endAuth
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>

    <!-- /.row -->
    </div>
@include('partials.edit')
@include('partials.create')
        </div>
@section('scripts')
<script>

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (localStorage.getItem('result')) {
        switch (localStorage.getItem('result')) {
            case 'success':
                toastr.success(localStorage.getItem('message'));
                break;

        }
        localStorage.clear();
    }
    function getDateFormatted(date) {
        var k = date;
        var dt = new Date(k);
        var yr = dt.getYear() + 1900;
        var mn = dt.getMonth() + 1;
        return dt.getDate() + "." + mn + "." + yr ;

    }
    /*  When user click dodaj novi zapis */
    $('#new-record').click(function () {

        $('#ajax-create-modal').modal('show');
        var id = $(this).data("id");
        
    });

    $('#edit-record').click(function () {

        $('#ajax-crud-modal').modal('show');
        var id = $(this).data("id");
       
        $.get('ajax/' + id +'/edit', function (data) {
            $('#Date').val(getDateFormatted(data.date));
            $('#id').val(data.id);
            $('#VK').val(data.VK);
            $('#VP').val(data.VP);
            $('#SK').val(data.SK);
            $('#SP').val(data.SP);
            $('#SJ').val(data.SJ);
            $('#ST').val(data.ST);

        })
    });
 

   $('#btn-save').click(function () {
        var myform = document.getElementById("userForm");
        var data = $(myform).serialize();
        $.ajax({
            type:'POST',
            url:'/ajax',
            dataType: 'JSON',
            data:data,
            success: function(data) {
                localStorage.setItem('result', 'success');
                localStorage.setItem('title', 'Uspjeh');
                localStorage.setItem('message', 'Uspješno unesen podatak');
                //toastr.success('Uspješno unesen podatak', 'Uspjeh')
                location.reload(); // then reload the page.(3)

                setTimeout(function(){// wait for 5 secs(2)
                }, 1200); 
            },
            error: function (data) {
                toastr.error('Krivo uneseni podaci, pokušajte ponovo','Greška')
            }
        });
        $('#ajax-crud-modal').modal('hide');
   });
   $('#btn-create').click(function () {
        var myform = document.getElementById("createForm");
        var data = $(myform).serialize();
        $.ajax({
            type:'POST',
            url:'/store',
            dataType: 'JSON',
            data:data,
            success: function(data) {
                localStorage.setItem('result', 'success');
                localStorage.setItem('title', 'Uspjeh');
                localStorage.setItem('message', 'Uspješno unesen podatak');
                //toastr.success('Uspješno unesen podatak', 'Uspjeh')
                location.reload(); // then reload the page.(3)

                setTimeout(function(){// wait for 5 secs(2)
                }, 1200); 
            },
            error: function (data) {
                toastr.error('Krivo uneseni podaci, pokušajte ponovo','Greška')
            }
        });
        $('#ajax-crud-modal').modal('hide');
   });
  });
 

   
</script>
@endsection

@endsection