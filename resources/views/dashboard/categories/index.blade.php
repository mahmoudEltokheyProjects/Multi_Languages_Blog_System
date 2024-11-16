@extends('dashboard.layouts.layout')

@section('body')
    

    <div class="container-fluid">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Striped Table
                </div>
                <div class="card-block">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('words.title')}}</th>
                                <th>{{__('words.parent')}}</th>
                                <th>{{__('words.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>





    {{-- delete --}}
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ Route('dashboard.category.delete') }}" method="POST">
                <div class="modal-content">

                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <p>{{ __('words.sure delete') }}</p>
                            @csrf
                            <input type="hidden" name="id" id="id">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">{{ __('words.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('words.delete') }} </button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- delete --}}
@endsection
@push('javascripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#table_id').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ Route('dashboard.category.all') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'parent',
                        name: 'parent'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
        $('#table_id tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script>
@endpush
