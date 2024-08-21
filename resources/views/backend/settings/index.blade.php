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
            <div class="page-category">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-primary text-light">
                                <tr>
                                    <th>Açıklama</th>
                                    <th>İçerik</th>
                                    <th>Anahtar Değer</th>
                                    <th>İşlemler</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataSettings as $key)
                                <tr>
                                    <th class="bg-primary text-light" scope="row">{{$key['description']}}</th>
                                    <td>{{$key['key']}}</td>
                                    <td>{{$key['value']}}</td>
                                    <td>{{$key['sort']}}</td>

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
    @endsection
