<?php
// get persentage
?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="header-title">Task Status</h4>
    </div>

    <div class="card-body pt-0 d-flex justify-content-center align-items-center">
        <div class="mt-3 mb-4 chartjs-chart" style="height: 240px; width: 100%; max-width: 400px;">
            <canvas id="taskChart"></canvas>
        </div>
    </div> <!-- end card body -->

</div> <!-- end card -->


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('taskChart');
    const stat = [<?= $new  ?>, <?= $completed ?>, <?= $inprogress ?>, <?= $canceled ?>];;
    const data = {
        labels: [
            'New',
            'Completed',
            'InProgres',
            'Canceled',
        ],

        datasets: [{
            data: stat,
            backgroundColor: [
                '#727cf5', // New - Blue
                '#0acf97', // Completed - Green
                '#ffbc00', // InProgress - Yellow/Orange
                '#fa5c7c' // Canceled - Red
            ],
            hoverOffset: 4
        }]
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: false
                }
            }
        }
    });
</script>