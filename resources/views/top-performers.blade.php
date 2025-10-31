@extends('layouts.app')

@section('title', 'Top Performers')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Top 5 Best Performing Stocks</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card p-4 shadow-sm">
        <canvas id="performersChart"></canvas>
    </div>

    <div class="text-center mt-4">
        <a href="/upload" class="btn btn-primary">Upload More Data</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels = JSON.parse('@json($labels)');
    var data = JSON.parse('@json($data)');

    new Chart(document.getElementById('performersChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Price Gain',
                data: data,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                ],
                borderWidth: 1,
                borderColor: '#333'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Top 5 Stocks by Price Gain'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Kes' + value.toFixed(2);
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
