@extends('backend.layout')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Sayfalar</h4>
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
                            <a href="#">Sayfalar</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Sayfa Düzenle</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Sayfa Düzenleme Formu</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form method="POST" action="{{route('slider.update',$sliderEdit->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email2">Yüklü Görsel</label><br>
                                                <img width="30%" src="/backend/images/sliders/{{$sliderEdit->slider_file}}" alt="{{$sliderEdit->slider_slug}}">
                                              @method('put');
                                            </div>
                                        <div class="form-group">
                                            <label for="email2">Yeni Görsel Ekle</label>
                                            <input type="file" class="form-control" name="slider_file" placeholder="Sayfa Resmi Seçiniz">
                                            <small  class="form-text text-muted">Yükleyeceğiniz resim 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Başlık</label>
                                            <input type="text" class="form-control" name="slider_title" id="email2" value="{{$sliderEdit->slider_title}}">
                                            </div>

                                        <div class="form-group">
                                            <label>Seo Link</label>
                                            <input type="text" class="form-control" name="slider_slug" value="{{$sliderEdit->slider_slug}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Slider İçerik</label>
                                            <textarea class="form-control"  name="slider_content" >{{ $sliderEdit->slider_content}}
                                            </textarea>
                                        </div>
                                            <div class="form-group">
                                                <label for="password">Slider Url</label>
                                                <input class="form-control" type="text"  name="slider_url" >{{ $sliderEdit->slider_url}}
                                            </input>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Durum</label>
                                                <select class="form-control"  name="slider_status">
                                                    <option {{ $sliderEdit->slider_status==0 ?"selected" : "" }} value="0">Pasif</option>
                                                    <option {{ $sliderEdit->slider_status==1 ?"selected" : "" }} value="1">Aktif</option>
                                                </select>

                                            </div>
                                      </div>
                                      <input type="hidden" name="oldFile" value="{{$sliderEdit->slider_file}}">
                                     </div>

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
