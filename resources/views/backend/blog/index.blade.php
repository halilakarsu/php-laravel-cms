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
                        <a href="{{route('blog.index')}}">Blog</a>
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
                                    <td >@if($key->type=="file")
                                        <img width="50px" height="50px" src="/backend/images/settings/{{$key->value}}" alt="">
                                         @else
                                            {{$key->value}}
                                        @endif</td>
                                    <td width="5px">{{$key->key}}</td>
                                    <td width="5px">{{$key->type}}</td>

                                    <td width="5px">
                                        @if($key->delete==1)
                                        <a href="javascript:void(0)"><i id="{{$key->id}}" class="fa fa-trash-alt text-danger"></i></a>
                                        @endif
                                    <a  href="{{route('settings.edit',['id'=>$key->id])}}"><i class="fa fa-edit text-primary ml-3"></i></a>

                                    </td>
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
                        alertify.success("islem basarili");
                      } else {
                       alertify.error("islem basarisiz.");
                      }
                  }
              });
          }
       });
       $('#sortable').disableSelection();
    });
    $(".fa-trash-alt").click(function(){
            destroy_id=$(this).attr('id');
            alertify.confirm('Lütfen Silme İşlemini Onaylayın','Bu işlem bir daha geri alınmayacaktır',
             function () {
                location.href="admin/settings/delete/"+destroy_id;
             },
                function(){
                    alertify.error('Silme işlemi iptal edildi.');
                })
    });
    </script>

    @endsection
