 <!-- project card -->
 <div class="card d-block">
     <div class="card-body">
         <div class="d-flex justify-content-between align-items-center mb-2">
             <h3 class="mt-0"><?= ucwords($task->name) ?></h3>
         </div>
         <div class="badge text-bg-<?= statusColor($task->status)  ?> mb-3"><?= $task->status ?></div>

         <h5>Task Description:</h5>

         <p><?= nl2br(htmlspecialchars($task->description)) ?></p>


         <div class="row">
             <div class="col-md-4">
                 <div class="mb-4">
                     <h5>Created At</h5>
                     <p><?= formatDate($task->created_at, 'd M Y') ?> <small class="text-muted"><?= formatDate($task->created_at, 'H:i A') ?></small></p>
                 </div>
             </div>
             <div class="col-md-4">
                 <div class="mb-4">
                     <h5>Due Date</h5>
                     <p><?= formatDate($task->due_date, 'd M Y') ?> <small class="text-muted"><?= formatDate($task->due_date, 'H:i A') ?></small></p>

                 </div>
             </div>
             <div class="col-md-4">
                 <div class="mb-4">
                     <h5>Priority</h5>
                     <p><b class="text-<?= priorityColor($task->priority) ?>"><?= strtoupper($task->priority) ?></b></p>
                 </div>
             </div>
         </div>

     </div> <!-- end card-body-->

 </div> <!-- end card-->