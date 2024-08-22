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
                        <a href="#">Default Page</a>
                    </li>
                </ul>
            </div>
            <div class="page-category">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Açıklama</th>
                        <th>İçerik</th>
                        <th>Anahtar Değer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Açıklama</td>
                        <td>İçerik</td>
                        <td>Anahtar Değer</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    @endsection
