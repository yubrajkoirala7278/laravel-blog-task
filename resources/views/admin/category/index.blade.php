@extends('admin.layouts.master')
@section('content')
    <div class="bg-white">
        <div class="d-flex justify-content-between align-items-center text-danger px-4 pt-3">
            <h2 class="fs-5 fw-bold" style="color: #2BB6A3">Category</h2>
            @include('admin.category.create')
        </div>
        <div class="p-4">
            <table id="category-table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- edit category --}}
    @include('admin.category.edit')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // =====setup csrf token======
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // =====Reset form============
            $('#addButton').click(function() {
                $('#ajaxForm')[0].reset();
                $('#categoryError').html('');
                $('#slugError').html('');
            });

            // ========ADDING DATA TO DB(POST)=============//
            var createFormData = $('#ajaxForm')[0];
            $('#saveBtn').click(function() {

                // setting empty text on error message
                $('#categoryError').html('');
                $('#slugError').html('');
                // getting form data
                var formData = new FormData(createFormData);
                // console.log(formData);
                $.ajax({
                    url: "{{ route('category.store') }}",
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formData,

                    success: function(response) {
                        table.draw();
                        $('#addCategory').modal('hide');
                        $('#ajaxForm')[0].reset();
                        toastify().success(response.success);
                    },
                    error: function(error) {
                        let errorMessage = error.responseJSON.errors;
                        if (errorMessage) {
                            if (errorMessage.name) {
                                $('#categoryError').html(errorMessage.name[0]);
                            }
                            if (errorMessage.slug) {
                                $('#slugError').html(errorMessage.slug[0]);
                            }
                        } else {
                            toastify().error('Something went wrong');

                        }

                    }
                });
            });
            // ======================================================//

            // ===========READ DATA FROM DB(READ)====================//
            var table = $('#category-table').DataTable({
                "processing": true,
                "serverSide": true,
                "deferRender": true,
                "ordering": false,
                searchDelay: 3000,
                "ajax": {
                    url: "{{ route('category.index') }}",
                    type: 'GET',
                    dataType: 'JSON'
                },
                "columns": [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "lengthMenu": [
                    [10, 20, 50, -1],
                    [10, 20, 50, "All"]
                ],
                "pagingType": "simple_numbers"
            });
            // ===================================================================//

            // ================DELETE CATEGORY==============================//
            $('body').on('click', '.delButton', function() {
                let slug = $(this).data('slug');
                if (confirm('Are you sure you want to delete it')) {
                    $.ajax({
                        url: '{{ url('admin/category/', '') }}' + '/' + slug,
                        method: 'DELETE',
                        success: function(response) {
                            // refresh the table after delete
                            table.draw();
                            // display the delete success message
                            toastify().success(response.success);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
            // =====================================================================//

            // ============Fill Current Data to form while UPDATION================//
            let slug = '';
            $('body').on('click', '.editButton', function() {
                // get form slug
                slug = $(this).data('slug');

                $.ajax({
                    url: '{{ url('admin/category', '') }}' + '/' + slug + '/edit',
                    method: 'GET',
                    success: function(response) {
                        $('#editCategory').modal('show');
                        $('#updateCategory').val(response.name);
                        $('#updateSlug').val(response.slug);
                        $('#category_slug').val(response.slug);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            });
            // =============================================================//

            // =====UPDATING CATEGORY TO DB(UPDATE/PUT)===========================//
            var updateFormData = $('#ajaxFormUpdate')[0];
            $('#updateBtn').click(function() {
                // setting empty text on error message
                $('#categoryUpdateError').html('');
                $('#slugUpdateError').html('');
                // getting form data
                var formUpdateData = new FormData(updateFormData);
                $.ajax({
                    url: '{{ url('admin/category/', '') }}' + '/' + slug,
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    data: formUpdateData,

                    success: function(response) {
                        // reload the latest row after added
                        table.draw();
                        //    hide model if success
                        $('#editCategory').modal('hide');

                        // clear form after successfully submitting
                        $('#ajaxFormUpdate')[0].reset();

                        // display success message if form submitted
                        toastify().success(response.success);
                    },
                    error: function(error) {
                        let errorMessage = error.responseJSON.errors;
                        // displaying error message
                        if (errorMessage) {
                            if (errorMessage.title) {
                                $('#categoryUpdateError').html(errorMessage.title[0]);
                            }
                            if (errorMessage.slug) {
                                $('#slugUpdateError').html(errorMessage.slug[0]);
                            }
                        } else {
                            toastify().error('Something went wrong!');
                        }

                    }
                });
            });
            // ======================================================================//
        });
    </script>
    
@endsection
