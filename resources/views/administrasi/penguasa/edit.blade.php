<form method="POST" action="{{ route('user.update', encrypt($user->id)) }}">
    <div class="form-group">
        @method('PUT')
        @csrf
        <label id="test">New Password</label>
        <input type="password" class="form-control" name="password" id="password">
        <small class="form-text text-muted">Input your employee password</small>
        <label>Confirm New Password</label>
        <input type="password" class="form-control" name="confirm_password" id="confirm_password">
        <small class="form-text text-muted">Confirm your employee password</small>
        <small id="txtWarning" class="text-danger"></small>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    </div>
</form>