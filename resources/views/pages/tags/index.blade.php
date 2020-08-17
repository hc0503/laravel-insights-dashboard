@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            {{ trans('global.dashboard') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">@lang('global.tags')</li>
                </ol>
            </div>
            <h4 class="page-title">@lang('global.tags')</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-success mb-3" href="javascript:openCreateModal();">
                    <i class="fe-plus"></i> {{ trans('global.add') }} {{ trans('global.tag') }}
                </a>
                <table id="datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>{{ trans('cruds.permission.fields.id') }}</th>
                            <th>{{ trans('global.group') }}</th>
                            <th>{{ trans('global.tag') }}</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $key => $row)
                            <tr data-entry-id="{{ $row->id }}">
                                <td>
                                    {{ $row->id ?? '' }}
                                </td>
                                <td>
                                    {{ $row->group ?? '' }}
                                </td>
                                <td>
                                    {{ $row->tag ?? '' }}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="javascript:openEditModal(this);">
                                        <i class='fe-edit'></i>
                                        {{ trans('tags.edit') }}
                                    </a>
                                    <form action="{{ route('tags.destroy', $row->id) }}" method="POST" onclick="isConfirm(this)" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class='fe-trash'></i>
                                            @lang('global.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Create & Edit Modal for Data -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="data-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tag_group" class="control-label">@lang('global.group')</label>
                            {!! Form::select('tag_group', ["Global", "NIST", "MITER Att & Ck"], 0, ['id' => 'tag_group', 'class' => 'form-control']) !!}
                            <label for="tag" class="control-label mt-1">@lang('global.tag')</label>
                            <input type="text" required class="form-control" value="" id="tag">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">@lang('global.close')</button>
                <button type="button" class="btn btn-info waves-effect waves-light" onclick="saveData()">@lang('global.save')</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection
@push('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/dataTables.checkboxes.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush

@push('js')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-toast/jquery.toast.min.js') }}"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script>    
        $(document).ready(function(){
            $("#datatable").DataTable({
                scrollY: '60vh',
                scrollCollapse: true,
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                    $('.dataTables_scrollBody').css('min-height', '460px');
                    $('div.dataTables_scrollBody table tbody tr:last td').attr('style', 'border-bottom:solid 1px #8080805c;')
                },
                "order": [[ 0, "asc" ]]
            });
        });
        let openCreateModal = () => {
            $('.modal-title').text("{{ trans('global.add') }} {{ trans('global.tag') }}");
            $('#data-modal').modal({backdrop:'static',keyboard:false, show:true});
        }

        let openEditModal = (obj) => {
            $('.modal-title').text("{{ trans('global.edit') }} {{ trans('global.tag') }}");
            $('.modal-title').text("{{ trans('global.add') }} {{ trans('global.tag') }}");
        }

        $('#data-modal').on('shown.bs.modal', function () {
            $('input:text:visible:first', this).focus();
        }); 
    </script>
@endpush