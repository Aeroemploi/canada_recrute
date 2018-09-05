@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Template List
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Templates</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Templates</a></li>
            <li class="active">Templates List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="col-12">
                <div class="card panel-primary ">
                    <div class="card-heading">
                        <h4 class="card-title"> <i class="livicon" data-name="template" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Templates List
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-lg table-responsive-sm table-responsive-md">
                            <table class="table table-bordered width100" id="table">
                                <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Background Image</th>
                                    <th>Header Title Fr</th>
                                    <th>Header Title En</th>
                                    <th>Form Template</th>
                                    <th>Description Fr</th>
                                    <th>Description En</th>
                                    <th>Form Id</th>
                                    <th>Assign Value</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- row-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}" ></script>

    <script>
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('templates.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'background_image', name: 'background_image' },
                    { data: 'header_title_fr', name: 'header_title_fr' },
                    { data: 'header_title_en', name: 'header_title_en' },
                    { data: 'form_template', name: 'form_template' },
                    { data: 'description_fr', name: 'description_fr' },
                    { data: 'description_en', name: 'description_en' },
                    { data: 'assign_value', name: 'assign_value' },
                    { data: 'form_id', name: 'form_id' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );
        });

    </script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteLabel">Delete Template</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this Template? This operation is irreversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a  type="button" class="btn btn-danger Remove_square">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
        var $url_path = '{!! url('/') !!}';
        $('#delete_confirm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var $recipient = button.data('id');
            var modal = $(this)
            modal.find('.modal-footer a').prop("href",$url_path+"/templates/"+$recipient+"/delete");
        })
    </script>
@stop