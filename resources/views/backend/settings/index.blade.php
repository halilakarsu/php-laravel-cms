@extends('backend.layout')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Anasayfa</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{route('admin.home')}}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('settings')}}">Ayarlar</a>
                    </li>


                </ul>
            </div>
            <div class="page-category">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-primary text-light">
                                <tr>
                                    <th>Açıklama</th>
                                    <th>İçerik</th>
                                    <th>Anahtar Değer</th>
                                    <th>Type</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>

                                <tbody id="sortable">
                                @foreach($dataSettings as $key)

                                <tr id="item-{{$key->id}}">
                                    <th class="sortable" scope="row">{{$key['description']}}</th>
                                    <td >{{$key->key}}</td>
                                    <td>{{$key->value}}</td>
                                    <td width="5px">{{$key->type}}</td>
                                    <td width="5px"><a href="javascript:void(0)"><i class="fa fa-trash-alt text-danger"></i></a>
                                    <a  href="javascript:void(0)"><i class="fa fa-edit text-primary ml-3"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>

    $(document).ready(function(){
      $.ajaxSetup(
          {
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
       $('#sortable').sortable({
          revert:true,
          handle:".sortable",
          stop:function (event,ui){
              var data= $(this).sortable('serialize');
              $.ajax({
                  type:"POST",
                  data:data,
                  url:"{{route('sortable')}}",
                  success:function (msg){
                      if(msg) {
                        alert("islem basarili");
                      } else {
                       alert("islem basarisiz.");
                      }
                  }
              });
          }
       });
       $('#sortable').disableSelection();
    });
    </script>

    @endsection
