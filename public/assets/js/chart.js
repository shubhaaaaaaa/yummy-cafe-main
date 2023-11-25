document.addEventListener('DOMContentLoaded', function() {

    //order status chart
    const ctx = document.getElementById('orderStatusChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pending', 'Paid', 'Completed'],
            datasets: [{
                data: [pendingOrders, paidOrders, completedOrders],
                backgroundColor: [
                    '#E74C3C', // Red
                    '#FF9800', // Orange
                    '#3498DB', // Blue
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: true,
                position: 'top'
            },
            title: {
                display: true,
                text: 'Order Status Distribution'
            }
        }
    });

    //monthly sales chart

    const ctx1 = document.getElementById('monthlySalesChart');

    const labels = monthlySales.map(entry => entry.month);
    const data = monthlySales.map(entry => entry.total_sales);

    console.log(monthlySales);

    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Sales',
                data: data,
                backgroundColor: '#FF9800', // Adjust color as needed
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: Math.max(...data) + 100, // Set the suggested max value for y-axis
                    ticks: {
                        stepSize: 200 // Set the step size for the y-axis ticks
                    }
                }
            }
        }
    });
});
