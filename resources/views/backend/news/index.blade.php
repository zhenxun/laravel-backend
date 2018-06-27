@extends('layouts.backend.app')

@section('content')

    <div class="container my-5 ">
        <div class="row">
            <div class="col-12 p-4 form-div">

                @include('layouts.backend.components.alert.alert')

                <div class="col-12 text-right mb-5 index-header-box px-0">
                    <div class="col-md-4 offset-md-8 px-0">
                        <div class="d-flex justify-content-end px-0">
                            <div class="mr-4">
                                <a href="{{ route('admin.news.create') }}"> 
                                    <i class="fa fa-plus"></i> 新增
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.dashboard') }}"> 
                                    <i class="fa fa-angle-left"></i> 回上一頁
                                </a>                                
                            </div>
                        </div>
                    </div>
                </div>

                <table id="datatable" class="table table-striped table-bordered responsive display" style="width:100%">
                        <thead>
                            <tr>
                                <th>序</th>
                                <th>標題</th>
                                <th>編輯</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $data)
                                <tr>
                                    <td class="datatable-iteration">{{ $loop->iteration }}</td>
                                    <td>{{ str_limit($data->title, 50) }}</td>
                                    <td class="datatable-editbar">
                                        <div class="d-flex justify-content-center flex-nowrap">
                                            <div class="mr-3">
                                                <a href="" title="編輯">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="mr-3">
                                                <a href="" title="檢視">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="">
                                                <a href="" title="刪除">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection