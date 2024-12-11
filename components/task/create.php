<form class="p-2" method="POST" action="/process/createTask.php">

    <input type="hidden" name="user_id" value="<?= auth()->id ?>" readonly>

    <div class="row">
        <div class="col-md-8">
            <div class="mb-3">
                <label for="task-title" class="form-label">Name / Title</label>
                <input type="text" class="form-control form-control-light" name="name" placeholder="Enter title" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="task-priority2" class="form-label">Priority</label>
                <select class="form-select form-control-light" name="priority">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option selected value="high">High</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="task-description" class="form-label">Description</label>
        <textarea class="form-control form-control-light" name="description" rows="3"></textarea>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="task-priority" class="form-label">Due Date</label>
                <input type="datetime-local" class="form-control form-control-light" required name="due_date">
            </div>
        </div>
    </div>

    <div class="text-end">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>