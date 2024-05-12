{{-- ===========CREATE Category (Popup button)============= --}}
<button type="button" class="btn btn-transparent" data-bs-toggle="modal" data-bs-target="#addCategory" id="addButton"  data-toggle="tooltip" title="Add Category">
    <i class="fa-solid fa-circle-plus fs-5" style="color: #2BB6A3"></i>
</button>

{{-- ===========End of CREATE Category (Popup button)======== --}}

<!-- ===========Modal to Create Category=============== -->
<div class="modal fade" id="addCategory" data-bs-backdrop="static" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <form id="ajaxForm">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- model title --}}
                    <h1 class="modal-title fs-5 fw-bold" id="model-title">Add Category</h1>
                    {{-- close button --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- category --}}
                    <div class="mb-3">
                        <label for="addCategory" class="form-label text-black">Category</label>
                        <input type="text" class="form-control" id="addCategory" name="name">
                        <span id="categoryError" class="text-danger"></span>
                    </div>
                    {{-- slug --}}
                    <div class="mb-3">
                        <label for="slug" class="form-label text-black">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug">
                        <span id="slugError" class="text-danger"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- save btn --}}
                    <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--======== End of Modal to Create Category===============  --}}
