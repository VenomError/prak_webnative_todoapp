<div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="m-0 font-16 fw-semibold"> Notification</h6>
        </div>
        <div class="col-auto">
            <form action="/process/deleteAllNotif.php" method="post">
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <small>Clear All</small>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="px-2" style="max-height: 300px;" data-simplebar>
    <?php foreach ($notifs->fetch_all(MYSQLI_ASSOC) as $notif) {  ?>
        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
            <div class="card-body">
                <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="notify-icon bg-danger">
                            <i class="mdi mdi-clock-remove"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 text-truncate ms-2">
                        <h5 class="noti-item-title fw-semibold font-14"><?= $notif['title'] ?> <small class="fw-normal text-muted ms-1"><?= dueDateCalculate($notif['due_date'], '', 'hari lalu') ?></small></h5>
                        <small class="noti-item-subtitle text-muted"><?= $notif['content'] ?></small>
                    </div>
                </div>
            </div>
        </a>
    <?php } ?>
</div>