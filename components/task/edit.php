<form class="p-2" method="POST" action="/process/updateTask.php">

    <input type="hidden" name="user_id" value="<?= auth()->id ?>" readonly>
    <input type="hidden" name="task_id" value="<?= $id ?>" readonly>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="task-title" class="form-label">Name / Title</label>
                <input type="text" class="form-control form-control-light" name="name" placeholder="Enter title" required value="<?= $name ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="task-priority2" class="form-label">Priority</label>
                <select class="form-select form-control-light" name="priority">
                    <option
                        <?= $priority == 'low' ? 'selected' : '' ?>
                        value="low">Low</option>
                    <option
                        <?= $priority == 'medium' ? 'selected' : '' ?>
                        value="medium">Medium</option>
                    <option
                        <?= $priority == 'high' ? 'selected' : '' ?>
                        value="high">High</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="task-priority2" class="form-label">Status</label>
                <select class="form-select form-control-light" name="status">
                    <option <?= $status == 'new' ? 'selected' : '' ?> value="new">New</option>
                    <option <?= $status == 'inprogress' ? 'selected' : '' ?> value="inprogress">In Progress</option>
                    <option <?= $status == 'canceled' ? 'selected' : '' ?> value="canceled">Canceled</option>
                    <option <?= $status == 'completed' ? 'selected' : '' ?> value="completed">Completed</option>

                </select>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="task-description" class="form-label">Description</label>
        <textarea class="form-control form-control-light" name="description" rows="3"> <?= $description ?></textarea>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="task-priority" class="form-label">Due Date</label>
                <input type="datetime-local" class="form-control form-control-light" required name="due_date" value="<?= $due_date ?>">
            </div>
        </div>
    </div>

    <div class="text-end">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>