<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="card rounded-0 shadow-none m-0 border-bottom border-light">
                            <div class="card-body text-center">
                                <i class="ri-task-line text-muted font-24"></i> <!-- Icon untuk Total Task -->
                                <h3><span><?= $all ?></span></h3>
                                <p class="text-muted font-15 mb-0">Total Task</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0 ">
                            <div class="card-body text-center">
                                <i class="ri-add-circle-line text-info font-24"></i> <!-- Icon untuk New Task -->
                                <h3 class="text-info"><span><?= $new ?></span></h3>
                                <p class="text-info font-15 mb-0">New Task</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0 border-start border-light">
                            <div class="card-body text-center">
                                <i class="ri-check-line text-success font-24"></i> <!-- Icon untuk Completed Task -->
                                <h3 class="text-success"><span><?= $completed ?></span></h3>
                                <p class="text-success font-15 mb-0">Completed Task</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0 border-start border-light">
                            <div class="card-body text-center">
                                <i class="ri-time-line text-primary font-24"></i> <!-- Icon untuk In-progress Task -->
                                <h3 class="text-primary"><span><?= $inprogress ?></span> </h3>
                                <p class="text-primary font-15 mb-0">In-progress Task</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card rounded-0 shadow-none m-0 border-start border-light">
                            <div class="card-body text-center">
                                <i class="ri-close-circle-line text-danger font-24"></i> <!-- Icon untuk Canceled Task -->
                                <h3 class="text-danger"><span><?= $canceled ?></span></h3>
                                <p class="text-danger font-15 mb-0">Canceled Task</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>