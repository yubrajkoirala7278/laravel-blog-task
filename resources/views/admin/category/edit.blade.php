<!-- ===========Modal to Update Category=============== -->
<div class="modal fade" id="editCategory" data-bs-backdrop="static" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="ajaxFormUpdate">
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    {{-- model title --}}
                    <h1 class="modal-title fs-5 fw-bold" id="model-title">Edit Category</h1>
                    {{-- close button --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- get the current slug on edit --}}
                    <input type="hidden" name="category_slug" id="category_slug">
                    {{-- category --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="updateCategory" name="name">
                        <span id="categoryUpdateError" class="text-danger"></span>
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="updateSlug" name="slug">
                        <span id="slugUpdateError" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- save btn --}}
                    <button type="button" class="btn btn-primary" id="updateBtn">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--======== End of Modal to Create Category===============  --}}