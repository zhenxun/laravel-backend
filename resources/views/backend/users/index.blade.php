@extends('layouts.backend.app')

@section('content')

    <div class="container my-5 ">
        <div class="row">
            <div class="col-12 p-4 form-div">

                @include('layouts.backend.components.alert.alert')

                @component('layouts.backend.components.index_header')
                  @slot('create') true @endslot
                  @slot('edit') false @endslot
                  @slot('url_create') {{ route('admin.users.create') }} @endslot
                  @slot('url_back') {{ route('admin.dashboard') }} @endslot
                @endcomponent

                <table id="datatable" class="table table-striped table-bordered responsive display" style="width:100%">
                    <thead>
                        <tr>
                            <th>序</th>
                            <th>姓名</th>
                            <th>電子郵件</th>
                            <th>權限</th>
                            <th>狀態</th>
                            <th>編輯</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td class="datatable-iteration">{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                  @switch($admin['role']->role)
                                    @case('1')
                                      超級管理員
                                      @break
                                    @case('2')
                                      中階管理員
                                      @break
                                    @default
                                      普通管理員
                                      @break
                                  @endswitch
                                </td>
                                <td>
                                  @if($admin->status == '1')
                                    <i class="fa fa-check"></i>
                                  @else
                                    <i class="fa fa-times"></i>
                                  @endif
                                </td>
                                <td class="datatable-editbar">
                                    <div class="d-flex justify-content-center flex-nowrap">
                                        <div class="mr-3">
                                            <a href="{{ route('admin.users.edit', $admin->id) }}" title="編輯">
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
