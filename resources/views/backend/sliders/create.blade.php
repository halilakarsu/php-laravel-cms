@extends('backend.layout')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Slider</h4>
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
                            <a href="#">Slider</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Slider Ekle</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Slider Oluşturma Formu</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                            <label for="email2">Resim Ekle</label>
                                            <input type="file" class="form-control" name="slider_file" placeholder="Slider Slider Seçiniz">
                                            <small  class="form-text text-muted">Yükleyeceğiniz resim 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Başlık</label>
                                            <input type="text" class="form-control" name="slider_title" id="email2" placeholder="Lütfen Slider Başlığı Giriniz">
                                            </div>
                                        <div class="form-group">
                                            <label>Seo Link</label>
                                            <input type="text" class="form-control" name="slider_slug" placeholder="Lütfen seolink giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Slider İçerik</label>
                                            <textarea class="form-control"  name="slider_content" placeholder="Lütfen içerik giriniz.">
                                            </textarea>
                                        </div>
                                            <div class="form-group">
                                                <label for="password">Durum</label>
                                                <select class="form-control"  name="slider_status">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
