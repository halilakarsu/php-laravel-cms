@extends('backend.layout')
@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Blog</h4>
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
                            <a href="#">Blog</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Blog Düzenle</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Blog Detay Düzenleme Formu</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email2">Yüklü Görsel</label><br>
                                                <img width="30%" src="/backend/images/blogs/{{$blogEdit->blog_file}}" alt="{{$blogEdit->blog_slug}}">

                                            </div>
                                        <div class="form-group">
                                            <label for="email2">Yeni Görsel Ekle</label>
                                            <input type="file" class="form-control" name="blog_file" placeholder="Blog Resmi Seçiniz">
                                            <small  class="form-text text-muted">Yükleyeceğiniz resim 2MB boyutundan büyük olmamalıdır.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email2">Başlık</label>
                                            <input type="text" class="form-control" name="blog_title" id="email2" value="{{$blogEdit->blog_slug}}">
                                            </div>

                                        <div class="form-group">
                                            <label>Seo Link</label>
                                            <input type="text" class="form-control" name="blog_slug" value="{{$blogEdit->blog_slug}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Blog İçerik</label>
                                            <textarea class="form-control"  name="blog_content" >{{ $blogEdit->blog_content}}
                                            </textarea>
                                        </div>
                                            <div class="form-group">
                                                <label for="password">Durum</label>
                                                <select class="form-control"  name="blog_status">
                                                    <option {{ $blogEdit->blog_status==0 ?"selected" : "" }} value="0">Pasif</option>
                                                    <option {{ $blogEdit->blog_status==1 ?"selected" : "" }} value="1">Aktif</option>
                                                </select>

                                            </div>
                                      </div>
                                      <input type="hidden" name="oldFile" value="{{$blogEdit->blog_file}}">
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
