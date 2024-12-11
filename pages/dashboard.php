<?php
onlyAuth();
$user_id = auth()->id;
$all = $conn->query("SELECT * FROM tasks WHERE user_id = '$user_id' ORDER BY  due_date ASC");

$new = $conn->query("SELECT * FROM tasks WHERE status = 'new' AND user_id = '$user_id' ");
$completed = $conn->query("SELECT * FROM tasks WHERE status = 'completed'  AND user_id = '$user_id' ");
$inprogress = $conn->query("SELECT * FROM tasks WHERE status = 'inprogress'  AND user_id = '$user_id' ");
$canceled = $conn->query("SELECT * FROM tasks WHERE status = 'canceled'  AND user_id = '$user_id' ");


$stat = [
    'all' => $all->num_rows,
    'new' => $new->num_rows,
    'completed' => $completed->num_rows,
    'canceled' => $canceled->num_rows,
    'inprogress' => $inprogress->num_rows,
];
$selectedTask = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $selectedTask = $conn->query("SELECT * FROM tasks WHERE  id='$id' AND user_id='$user_id'")
        ->fetch_object();
}


$notifs = $conn->query("SELECT * FROM notifications WHERE user_id = '$user_id' ORDER BY due_date DESC");

?>
<div class="wrapper">
    <!-- ========== Topbar Start ========== -->
    <?= component('top-nav', ['notifs' => $notifs]) ?>
    <!-- ========== Topbar End ========== -->

    <!-- ========== Left Sidebar Start ========== -->
    <!-- <?= component('sidebar') ?> -->
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <?= component('task/stat', $stat) ?>
                <div class="row ">

                    <div class="col-12 ">

                        <center>
                            <?= component('task/chart', $stat) ?>
                        </center>

                    </div>
                    <div id="taskDetail"></div>

                    <?php if (!empty($selectedTask) && $selectedTask != null) { ?>
                        <div class="col-12">
                            <?= component('task/detail', ['task' => $selectedTask]) ?>
                        </div>
                    <?php } ?>
                    <div class="col-12 ">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="header-title">Tasks</h4>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty(get_flash('error')) || !empty(get_flash('success'))) { ?>
                                <div class="mt-3 p-2">
                                    <?= flash_success() ?>
                                </div>
                            <?php } ?>
                            <div class="card-header bg-light-lighten border-top border-bottom border-light py-1 text-center">
                                <p class="m-0"><b><?= $completed->num_rows ?></b> Tasks completed out of <?= $all->num_rows ?></p>
                            </div>
                            <div class="card-body pt-2">
                                <div class="table-responsive">
                                    <?= component('task/table', [
                                        'data' => $all->fetch_all(MYSQLI_ASSOC)
                                    ]) ?>
                                </div> <!-- end table-responsive-->

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
                <div class="row">
                    <div class="col-12">
                        <?= component('calendar') ?>
                    </div>
                </div>
            </div> <!-- container -->

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>

<!-- MODAL -->
<div id="createTaskModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Create New Task
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <?= component('task/create') ?>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>