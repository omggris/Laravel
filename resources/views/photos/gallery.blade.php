@extends('layouts.app')
@section('content')
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> Gallery</h4>
            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
        </div>
    </div>
    <div class="breadcrumb-line">
        <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
        <ul class="breadcrumb">
            <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active"><i class=" icon-images3 position-left"></i> Gallery</li>
            <?php $i = 0;?>
            @foreach ($photos as $row)
            @if($i == 0)
            <li class="active"><i class="icon-user position-left"></i> {{ $row->name}}</li>
            @endif
            <?php $i++;?>
            @endforeach
        </ul>
        <ul class="breadcrumb-elements">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="disabled"><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li class="disabled"><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li class="disabled"><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="disabled"></li>
                    <li class="disabled"><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
@if (count($photos) > 0)
<div class="content clearfix">
    <?php $i = 1 ;?>
    @foreach ($photos as $row)
    @if ($i%4 == 1)
    <div class="row">
        @endif
        <div class="col-lg-3 col-sm-6">
            <div class="thumbnail">
                <div class="thumb">
                    <img src="/{{ $row->images}}" alt="{{ $row->id}}">
                    <div class="caption-overflow">
                        <span>
                            <a href="{{ $row->images}}" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                            <a href="/photo/{{ $row->id}}" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-link2"></i></a>
                        </span>
                    </div>
                </div>
                <div class="caption">
                    <h6 class="no-margin-top text-semibold">
                        <a href="/photo/{{ $row->id}}" class="text-default">
                            @if (strlen($row->photos_title) >= 17)
                            {{ substr($row->photos_title, 0, 17)}}...
                            @else
                            {{ substr($row->photos_title, 0, 17)}}
                            @endif
                        </a> 
                        <a href="{{ $row->images}}" class="text-muted" download="{{md5(microtime() . rand(0, 9999)).$row->photos_title}}"><i class="icon-download pull-right"></i></a>
                    </h6>
                    {{$row->description}}
                </div>
            </div>
        </div>
        @if ($i%4 == 0)
    </div>
    @endif
    <?php $i++;?>
    @endforeach
    @if ($i%4 == 0)
</div>
@endif
<div class="row">
    <center>
        {!! $photos->render() !!}
    </center>
</div>
@endif
@endsection