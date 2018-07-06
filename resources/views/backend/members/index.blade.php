@extends('layouts.backend.app')

@section('content')

    <div class="container my-5 ">
        <div class="row">
            <div class="col-12 p-4 form-div">

                @include('layouts.backend.components.alert.alert')

                @component('layouts.backend.components.index_header')
                  @slot('create') true @endslot
                  @slot('edit') false @endslot
                  @slot('url_create') {{ route('admin.members.create') }} @endslot
                  @slot('url_back') {{ route('admin.dashboard') }} @endslot
                @endcomponent

                <table id="datatable" class="table table-striped table-bordered responsive display" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ trans('datatable.members.no') }}</th>
                                <th>{{ trans('datatable.members.name') }}</th>
                                <th>{{ trans('datatable.members.contact_no') }}</th>
                                <th>{{ trans('datatable.members.joining_date') }}</th>
                                <th>{{ trans('datatable.members.edit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td class="datatable-iteration">{{ $loop->iteration }}</td>
                                    <td>{{ $member->ename }}</td>
                                    <td>{{ $member->contact_no }}</td>
                                    <td>{{ $member->joining_date }}</td>
                                    <td class="datatable-editbar">
                                        <div class="d-flex justify-content-center flex-nowrap">
                                            <div class="mr-3">
                                                <a href="{{ route('admin.members.edit', $member->id) }}" title="編輯">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="mr-3">
                                                <a href="{{ route('admin.members.show', $member->id) }}" title="檢視">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="">
                                                <a href="" class="toggle-delete" role="{{ $member->id }}" title="刪除">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                {{ Form::open(['method' => 'DELETE', 'route' => ['admin.members.destroy', $member->id]]) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-delete', 'id' => $member->id,  'style' => 'display:none']) }}
                                                {{ Form::close() }}
                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>


                <div class="d-flex flex-row-reverse align-items-center mt-4">
                    <div class="d-flex flex-row p-2 align-self-center">
                       <a href="{{ asset('storage/excel/members.xlsx') }}"> 
                            <img src="{{ asset('images/extension_logo/xlsx.png') }}" class="mb-1" style="width:25px; height:25px;text-decoration: none;">
                            <span>{{ trans('global.buttons.download-excel') }}</span> 
                        </a>
                    </div>
                </div>
                

            </div>
        </div>
    </div>

@endsection