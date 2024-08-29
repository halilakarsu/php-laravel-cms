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
                            <a href="#">Kullanıcı Ekle</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Kullanıcı Oluşturma Formu</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                            <label for="email2">Resim Ekle</label>
                                            <input type="file" class="form-control" name="user_file">
                                            <small  class="form-text text-muted">Yükleyeceğiniz resim 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Ad Soyadı</label>
                                            <input type="text" class="form-control" name="name" id="email2" placeholder="Lütfen User Başlığı Giriniz">
                                            </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <input type="text" class="form-control" name="email" placeholder="Lütfen kullanıcı adı giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Şifre</label>
                                            <input type="password" class="form-control"  name="password" placeholder="Lütfen Şifrenizi giriniz.">

                                        </div>
                                            <div class="form-group">
                                                <label for="password">Durum</label>
                                                <select class="form-control"  name="user_status">
                                                    <option value="0">Pasif</option>
                                                    <option value="1">Aktif</option>
                                                </select>

                                            </div>
                                      </div>

                                    </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Kaydet</button>
                                <button class="btn btn-danger">İptal</button>
                            </div>
                                </form>
                        <</div>
                    </div
                </div>
            </div>
        </div>
    @endsection
