<form method="POST" action="{{ route('category.update',encrypt($category->id)) }}">
    <div class="form-group">
        @csrf
        @method('PUT')
        <label>Category Name</label>
        <input type="text" class="form-control" name="nama" value="{{ $category->nama }}">
        <small class="form-text text-muted">Input category name</small><br>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    
</form>