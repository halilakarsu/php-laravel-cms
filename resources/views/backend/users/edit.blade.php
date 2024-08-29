@extends('backend.layout')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Kullanıcılar</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Kullanıcılar</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Kullanıcı Düzenle</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Kullanıcı Düzenleme Formu</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form method="POST" action="{{route('user.update',$userEdit->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email2">Yüklü Görsel</label><br>
                                                <img width="30%" src="/backend/images/users/{{$userEdit->user_file}}" alt="{{$userEdit->user_slug}}">
                                              @method('put');
                                            </div>
                                        <div class="form-group">
                                            <label for="email2">Yeni Görsel Ekle</label>
                                            <input type="file" class="form-control" name="user_file" placeholder="Sayfa Resmi Seçiniz">
                                            <small  class="form-text text-muted">Yükleyeceğiniz resim 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Ad Soyad</label>
                                            <input type="text" class="form-control" name="name" id="email2" value="{{$userEdit->name}}">
                                        </div>
                                            <div class="form-group">
                                                <label for="email2">Şifre</label>
                                                <input type="text" class="form-control" name="password" id="email2" value="Lütfen yeni şifre giriniz.">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Durum</label>
                                                <select class="form-control"  name="user_status">
                                                    <option {{ $userEdit->user_status==0 ?"selected" : "" }} value="0">Pasif</option>
                                                    <option {{ $userEdit->user_status==1 ?"selected" : "" }} value="1">Aktif</option>
                                                </select>
                                            </div>
                                      <input type="hidden" name="oldFile" value="{{$userEdit->user_file}}">
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{route('page.index')}}" class="btn btn-danger">Cancel</a>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
