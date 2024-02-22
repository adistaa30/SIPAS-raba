       </div>
    </div>
</div>

<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <!-- <p>2024</p> -->
                    </div>
                    <div class="float-end">
                        <!-- <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="">taa</a></p> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url()?>assets/template/assets/js/bootstrap.js"></script>
    <script src="<?= base_url()?>assets/template/assets/js/app.js"></script>
    
<script src="<?= base_url()?>assets/template/assets/extensions/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url()?>assets/template/assets/js/pages/datatables.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
  // Hide the loader and show the content when the page is fully loaded
  var loaderWrapper = document.querySelector('.loader-wrapper');
  var content = document.querySelector('#app');

  setTimeout(function() {
    loaderWrapper.style.display = 'none';
    content.style.display = 'block';
  }, 2000); // You can adjust the delay time as needed
});
</script>

<!-- Need: Apexcharts -->
<!-- <script src="<?= base_url()?>assets/template/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url()?>assets/template/assets/js/pages/dashboard.js"></script> -->
<script src="<?= base_url()?>assets/template/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
<!-- <script src="<?= base_url()?>assets/template/assets/js/pages/sweetalert2.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Punya chard -->
<!-- end -->
<script>
        const ctx = document.getElementById('myChart');
        const ctxx = document.getElementById('myBarChart');
        var labels = <?= $labels;?>;
        var values = <?= $values;?>;    

        new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Data Perbulan',
                        data: values,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        new Chart(ctxx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Data Surat',
                        data: values,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        // new Chart(ctxx, {
        //     type: 'line',
        //     data: {
        //         labels: chartData.map(data => data.jenis_sampel),
        //         datasets: [{
        //             label: 'Data Sampel',
        //             data: chartData.map(data => data.jumlah_sampel),
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
        </script>
</body>

</html>