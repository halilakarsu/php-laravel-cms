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
                            <a href="{{route('slider.index')}}">Slider</a>
                        </li>
                    </ul>
                </div>
                <div align="right"><a href="{{route('slider.create')}}" class=" btn btn-xs btn-success">+Ekle</a></div>
                <div class="page-category">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="bg-primary text-light">
                                    <tr>
                                        <th>Görsel</th>
                                        <th>Başlık</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody id="sortable">
                                    @foreach($sliders as $key)
                                        <td width="10px" id="item-{{$key->id}}" class="sortable">
                                            <img width="150px" src="/backend/images/sliders/{{$key['slider_file']}}">
                                        </td>
                                            <td> {{$key['slider_title']}}</td>

                                            <td width="4px" >
                                                    <a href="javascript:void(0)"><i id="{{$key->id}}" class="fa fa-trash-alt text-danger"></i></a>
                                                <a  href="{{route('slider.edit',$key->id)}}"><i class="fa fa-edit text-primary ml-3"></i></a>
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
                            url:"{{route('slider.sortable')}}",
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
                    $.ajax({
                        type:"DELETE",
                        url:"slider/"+destroy_id,
                        success:function(msg){
                            if(msg){
                                $("#item-"+destroy_id).remove();
                                alertify.success("İşlem tamamlandı");
                        } else
                            alertify.error("İşlem tamamlanamadı.");
                        }
                    })

                    },
                    function(){
                        alertify.error('Silme işlemi iptal edildi.');
                    })
            });
        </script>
@endsection
