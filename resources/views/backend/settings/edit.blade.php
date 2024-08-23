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
                        <a href="{{route('settings.index')}}">Ayarlar</a>
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ayarları Düzenle</div>
                </div>
                <div class="card-body">

                    <form action="{{route('settings.update', ['id'=>$editSettings->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($editSettings->type=="file")
                            <label for="settings"><b>Yüklü {{$editSettings->description}}</b></label><br><br>
                            <img width="150px" height="150px" src="/backend/images/settings/{{$editSettings->value}}" alt="">
                        <div class="form-group">
                        <label for="settings"><b>{{$editSettings->description}} Değiştir</b></label>
                        <input type="file" required name="value" class="form-control">
                        </div>
                         <input type="hidden" name="oldFile" value="{{$editSettings->value}}">
                        @endif

                            <div class="form-group">

                                @if($editSettings->type=="text")
                                    <label for="settings"><b>{{$editSettings->description}}</b></label>
                                <input type="text" name="value" class="form-control" value="{{$editSettings->value}}">
                                @endif
                                    @if($editSettings->type=="textarea")
                                        <label for="settings"><b>{{$editSettings->description}}</b></label>
                                        <textarea name="value" type="text" class="form-control">{{$editSettings->value}}</textarea>
                                    @endif


                                <br>
                                <div align="right" class="box-footer">
                                    <button type="submit" class="btn btn-success">Düzenle</button>
                                </div>
                            </div>


                    </div>
            </div>
        </div>
    </div>
</div>
    @endsection
