@extends('backend.layout')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">

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
                                            <input type="file" class="form-control" name="user_file">
                                            <small  class="form-text text-muted">Yükleyeceğiniz görsel 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Ad Soyad</label>
                                            <input type="text" class="form-control" name="name"  value="{{$userEdit->name}}">
                                        </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control" name="email"  value="{{$userEdit->email}}">
                                            </div>
                                        <div class="form-group">
                                                <label>Şifre</label>
                                                <input type="text" class="form-control" name="password"  placeholder="Yeni şifre giriniz.">
                                            <small  class="form-text text-muted">Şifreyi değiştirmek istemiyorsanız boş bırakınız.</small>
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
                                <button type="submit" class="btn btn-success">Güncelle</button>
                                <a href="{{route('user.index')}}" class="btn btn-danger">İptal</a>
                            </div>
                                </form>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>

    @endsection
