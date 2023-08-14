<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel">Edit ost</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-post-form" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="edit-post-id" value="">
                      <div class=" row mb-3">
                        <label class="form-label">Category</label>
                        <select class="categorySelect" name="category_id" id="edit-categorySelect" class="form-control" required>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="edit-name" class="form-control" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input type="text" id="edit-slug" class="form-control"  name="slug" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" id="edit-description" class="form-control" name="description"  required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <input type="text" id="edit-content" class="form-control" name="content" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
