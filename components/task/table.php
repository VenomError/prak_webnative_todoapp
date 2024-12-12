<table class="table table-centered table-nowrap table-hover mb-0" id="taskListTable">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $task) { ?>
            <tr>
                <td>
                    <div class="mb-1">
                        <?php if ($task['status'] != 'completed') { ?>
                            <form action="/process/updateCompletedTask.php" method="POST">
                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                <input type="hidden" name="status" value="completed">

                                <button type="submit" class="btn btn-sm btn-success" title="mark completed"
                                    data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="klik ini untuk menandai task completed">
                                    <i class="mdi mdi-check"></i>
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="mb-1">
                        <?php if ($task['status'] != 'canceled') { ?>
                            <form action="/process/updateCompletedTask.php" method="POST">
                                <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                <input type="hidden" name="status" value="canceled">
                                <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="klik ini untuk cancel task" title="canceled task">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </form>
                        <?php } ?>
                    </div>
                </td>
                <td>
                    <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body"><?= ucwords($task['name']) ?></a></h5>
                    <span class="text-muted font-13"><?= dueDateCalculate($task['due_date']) ?></span>
                </td>
                <td>
                    <span class="text-muted font-13">Status</span> <br />
                    <span class="badge badge-<?= statusColor($task['status']) ?>-lighten"><?= $task['status'] ?></span>
                </td>
                <td>
                    <span class="text-muted font-13">Priority</span> <br />
                    <span class="badge badge-<?= priorityColor($task['priority']) ?>-lighten"><?= $task['priority'] ?></span>
                </td>
                <td>
                    <span class="text-muted font-13">Created</span>
                    <h5 class="font-14 mt-1 fw-normal"><?= formatDate($task['created_at'], 'd-m-y h:ia') ?></h5>
                </td>
                <td>
                    <span class="text-muted font-13">Due Date</span>
                    <h5 class="font-14 mt-1 fw-normal"><?= formatDate($task['due_date'], 'd-m-y h:ia') ?></h5>
                </td>
                <td>
                    <span class="text-muted font-13">Total time spend</span>
                    <h5 class="font-14 mt-1 fw-normal"><?= getTotalTimeSpent($task['created_at']) ?></h5>
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-light" title="view task"
                            data-bs-toggle="modal" data-bs-target="#detailModalTask<?= $task['id'] ?>">
                            <i class="mdi mdi-eye"></i>
                        </button>
                        <button data-bs-toggle="modal" data-bs-target="#editModalTask<?= $task['id'] ?>" class="btn btn-sm btn-light" title="edit task">
                            <i class="mdi mdi-square-edit-outline"></i>
                        </button>
                        <form action="/process/deleteTask.php" method="POST">
                            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                            <button class="btn btn-sm btn-light" title="delete task">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form>
                    </div>
                </td>


                <!-- MODAL -->
                <div id="editModalTask<?= $task['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Edit Task
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <?= component('task/edit', [
                                    'id' => $task['id'],
                                    'name' => $task['name'],
                                    'priority' => $task['priority'],
                                    'status' => $task['status'],
                                    'description' => $task['description'],
                                    'due_date' => $task['due_date'],
                                ]) ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div>
                </div>

                <div id="detailModalTask<?= $task['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    Detail Task
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $selectedTask = null;
                                $id = $task['id'];
                                $user_id = auth()->id;
                                $selectedTask = $conn->query("SELECT * FROM tasks WHERE  id='$id' AND user_id='$user_id'")
                                    ->fetch_object();
                                ?>
                                <?php if (!empty($selectedTask) && $selectedTask != null) { ?>
                                    <div class="col-12">
                                        <?= component('task/detail', ['task' => $selectedTask]) ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div><!-- /.modal-content -->
                    </div>
                </div>
            </tr>
        <?php } ?>
    </tbody>
</table>