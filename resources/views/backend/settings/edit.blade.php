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

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ayarları Düzenle</div>
                </div>
                <div class="card-body">
                    <form action="{{route('settings.update', ['id'=>$editSettings->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($editSettings->type=="file")
                        <div class="form-group">
                        <label for="settings"><b>{{$editSettings->description}} Seç</b></label>
                        <input type="file" class="form-control">
                        </div>
                        @endif

                            <div class="form-group">

                                @if($editSettings->type=="text")d
                                    <label for="settings"><b>{{$editSettings->description}}</b></label>
                                <input type="text" name="{{$editSettings->value}}" class="form-control" value="{{$editSettings->value}}">
                                @endif
                                    @if($editSettings->type=="textarea")
                                        <label for="settings"><b>{{$editSettings->description}}</b></label>
                                        <textarea name="{{$editSettings->value}}" type="text" class="form-control">{{$editSettings->value}}</textarea>
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
