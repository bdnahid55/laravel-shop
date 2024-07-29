@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Category')
@section('content')
    {{-- main content --}}

      <!-- EditCategoryModal Modal Start-->
  <div class="modal fade" id="EditCategoryModal" tabindex="-1" aria-labelledby="EditCategoryModalTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditCategoryModalTitle">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <ul id="updateform_errorlist"></ul>

        <input type="hidden" id="edit_category_id">

        <div class="form-group mb-2">
          <label for="name">Category Name</label>
          <input type="text" class="name form-control" id="edit_name" placeholder="Category name">
        </div>

        <div class="form-group mb-2">
          <label for="slug">Category slug</label>
          <input type="text" class="slug form-control" id="edit_slug" placeholder="Category slug">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_category">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- EditCategoryModal Modal End-->


<!-- DeleteCategoryModal Modal Start-->
<div class="modal fade" id="DeleteCategoryModal" tabindex="-1" aria-labelledby="DeleteCategoryModalTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteCategoryModalTitle">Delete Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <input type="hidden" id="delete_category_id">
        <h3>Are you sure? You want to delete this data?</h3>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_category_btn">Yes Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- DeleteCategoryModal Modal End-->


<!-- AddCategoryModal Modal Start-->
<div class="modal fade" id="AddCategoryModal" tabindex="-1" aria-labelledby="AddCategoryModalTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddCategoryModalTitle">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <ul id="saveform_errorlist"></ul>

        <div class="form-group mb-2">
          <label for="name">Category Name</label>
          <input type="text" name="name" class="name form-control" placeholder="Category name">
        </div>

        <div class="form-group mb-2">
          <label for="slug">Category slug</label>
          <input type="text" name="slug" class="slug form-control" placeholder="Category slug">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_category">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- AddCategoryModal Modal End-->


    <div class="row clearfix">
        <div class="col-md-12 mb-30">
            <div id="success_message"></div>
            <div class="card">
                <div class="card-header">
                    <h4>Category Data
                        <a href="" data-bs-toggle="modal" data-bs-target="#AddCategoryModal"
                            class="btn btn-primary float-end btn-sm">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')
    <script>
        $(document).ready(function () {

          // fetch category
          fetchcategory();

          function fetchcategory() {
            $.ajax({
              type: "GET",
              url: "/admin/category/fetch-categorys",
              dataType: "json",
              success: function (response) {
                // console.log(response.categorys);
                $('tbody').html("");
                $.each(response.categorys, function (key, item) {
                  $('tbody').append('<tr>\
                      <td>'+ item.id + '</td>\
                      <td>'+ item.name + '</td>\
                      <td>'+ item.slug + '</td>\
                      <td>\
                        <button type="button" value="'+ item.id + '" class="edit_category btn btn-primary btn-sm">Edit</button>\
                        <button type="button" value="'+ item.id + '" class="delete_category btn btn-danger btn-sm">Delete</button>\
                      </td>\
                    </tr>');
                });
              }
            });
          }


          // edit category
          $(document).on('click', '.edit_category', function (e) {
            e.preventDefault();
            var category_id = $(this).val();
            // console.log(category_id);
            $('#EditCategoryModal').modal('show');
            $.ajax({
              type: "GET",
              url: "/admin/category/edit-category/" + category_id,
              dataType: "json",
              success: function (response) {
                // console.log(response);
                if (response.status == 404) {
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-danger');
                  $('#success_message').text(response.message);
                }
                else {
                  $('#edit_name').val(response.category.name);
                  $('#edit_slug').val(response.category.slug);
                  $('#edit_category_id').val(category_id);
                }
              }
            });

          });

          // delete category
          $(document).on('click', '.delete_category', function (e) {
            e.preventDefault();
            var category_id = $(this).val();
            // console.log(category_id);
            $('#delete_category_id').val(category_id);
            $('#DeleteCategoryModal').modal('show');
          });

          $(document).on('click', '.delete_category_btn', function (e) {
            e.preventDefault();
            $(this).text("Deleting");

            var category_id = $('#delete_category_id').val();
            // console.log(category_id);
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              type: "DELETE",
              url: "/admin/category/delete-category/" + category_id,
              success: function (response) {
                console.log(response);
                $('#success_message').html("");
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#DeleteCategoryModal').modal('hide');
                $('.delete_category_btn').text("Yes Delete");
                fetchcategory();
              }
            });

          });



          // update category
          $(document).on('click', '.update_category', function (e) {
            e.preventDefault();

            $(this).text("Updating");

            var category_id = $('#edit_category_id').val();
            var data = {
                'name': $('#edit_name').val(),
                'slug': $('#edit_slug').val(),
            }
            // console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
              type: "PUT",
              url: "/admin/category/update-category/" + category_id,
              data: data,
              dataType: "json",
              success: function (response) {
                // console.log(response);
                if (response.status == 400) {
                  $('#updateform_errorlist').html("");
                  $('#updateform_errorlist').addClass('alert alert-danger');
                  $.each(response.errors, function (key, err_values) {
                    $('#updateform_errorlist').append('<li>' + err_values + '</li>');
                  });
                  $('.update_category').text("Update");
                } else if (response.status == 404) {
                  $('#updateform_errorlist').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('.update_category').text("Update");
                } else {
                  $('#updateform_errorlist').html("");
                  $('#success_message').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('#EditCategoryModal').modal('hide');
                  $('.update_category').text("Update");
                  fetchcategory();
                }
              }
            });

          });


          // add category
          $(document).on('click', '.add_category', function (e) {
            e.preventDefault();

            var modal = $('#AddCategoryModal');
            var data = {
                'name': modal.find('.name').val(),
                'slug': modal.find('.slug').val(),
            }

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              type: "POST",
              url: "/admin/category/categories",
              data: data,
              dataType: "json",
              success: function (response) {
                // console.log(response);
                if (response.status == 400) {
                  $('#saveform_errorlist').html("");
                  $('#saveform_errorlist').addClass('alert alert-danger');
                  $.each(response.errors, function (key, err_values) {
                    $('#saveform_errorlist').append('<li>' + err_values + '</li>');
                  });
                }
                else {
                  $('#saveform_errorlist').html("");
                  $('#success_message').addClass('alert alert-success');
                  $('#success_message').text(response.message);
                  $('#AddCategoryModal').modal('hide');
                  $('#AddCategoryModal').find('input').val("");
                  fetchcategory();
                }
              }
            });

          });

        });

      </script>
    @endpush
