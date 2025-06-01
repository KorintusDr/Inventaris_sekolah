<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <!-- Charts Row -->
            <div class="row">
            <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Lingkaran Barang</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="barangPieChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Batang Barang</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="barangBarChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Garis Barang</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="barangLineChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Diagram Donat Barang</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="barangDonutChart" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Tambahkan CSS -->
<style>
    .chart-canvas {
        max-height: 300px; /* Mengatur tinggi maksimum grafik */
        width: 100%; /* Memastikan grafik menyesuaikan dengan ukuran kolom */
    }

    .small-box h3 {
        font-size: 24px; /* Perkecil ukuran teks pada small box */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('select').forEach(function(select) {
        select.addEventListener('change', function() {
            var options = select.querySelectorAll('option');
            options.forEach(function(option) {
                if (option.value === "") {
                    option.style.display = select.value ? 'none' : 'block';
                }
            });
        });
    });
});

      // Data yang diambil dari PHP untuk diagram
      var barangCount = <?php echo $barang_count; ?>;
    var barangMasukCount = <?php echo $barang_masuk_count; ?>;
    var barangKeluarCount = <?php echo $barang_keluar_count; ?>;
    var peminjamanBarangCount = <?php echo $peminjaman_barang_count; ?>;

    // Diagram Lingkaran (Pie Chart)
    var ctxPie = document.getElementById('barangPieChart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Barang Masuk', 'Barang Keluar', 'Peminjaman Barang'],
            datasets: [{
                data: [barangMasukCount, barangKeluarCount, peminjamanBarangCount],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            }]
        }
    });

    // Diagram Batang (Bar Chart)
    var ctxBar = document.getElementById('barangBarChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Barang', 'Barang Masuk', 'Barang Keluar', 'Peminjaman Barang'],
            datasets: [{
                data: [barangCount, barangMasukCount, barangKeluarCount, peminjamanBarangCount],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#fa842d'],
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // Menghilangkan label "Jumlah"
                }
            }
        }
    });

    // Diagram Garis (Line Chart)
    var ctxLine = document.getElementById('barangLineChart').getContext('2d');
    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Barang', 'Barang Masuk', 'Barang Keluar', 'Peminjaman Barang'],
            datasets: [{
                data: [barangCount, barangMasukCount, barangKeluarCount, peminjamanBarangCount],
                borderColor: ['#4BC0C0'], // Mengganti warna garis
                backgroundColor: 'rgba(75,192,192,0.4)',
                fill: false
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // Menghilangkan label "Jumlah"
                }
            }
        }
    });

    // Diagram Donut (Doughnut Chart)
    var ctxDonut = document.getElementById('barangDonutChart').getContext('2d');
    var donutChart = new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: ['Barang Masuk', 'Barang Keluar', 'Peminjaman Barang'],
            datasets: [{
                data: [barangMasukCount, barangKeluarCount, peminjamanBarangCount],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            }]
        }
    });
</script>
