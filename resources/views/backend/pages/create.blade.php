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
                            <a href="#">Sayfa Ekle</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Yeni Sayfa Oluşturma Formu</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form method="post" action="{{route('page.store')}}" enctype="multipart/form-data">
                                            @csrf
                                        <div class="form-group">
                                            <label for="email2">Resim Ekle</label>
                                            <input type="file" class="form-control" name="page_file" placeholder="Sayfa Resmi Seçiniz">
                                            <small  class="form-text text-muted">Yükleyeceğiniz resim 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Başlık</label>
                                            <input type="text" class="form-control" name="page_title" id="email2" placeholder="Lütfen Sayfa Başlığı Giriniz">
                                            </div>

                                        <div class="form-group">
                                            <label>Seo Link</label>
                                            <input type="text" class="form-control" name="page_slug" placeholder="Lütfen seolink giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Sayfa İçerik</label>
                                            <textarea class="form-control"  name="page_content" placeholder="Lütfen içerik giriniz.">
                                            </textarea>
                                        </div>
                                            <div class="form-group">
                                                <label for="password">Durum</label>
                                                <select class="form-control"  name="page_status">
                                                    <option value="0">Pasif</option>
                                                    <option value="1">Aktif</option>
                                                </select>

                                            </div>
                                      </div>

                                    </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button class="btn btn-danger">Cancel</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
