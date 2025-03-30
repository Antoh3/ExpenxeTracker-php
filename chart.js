const ctx = document.getElementById('doughnut');
const ctx1 = document.getElementById('lineChart');

new Chart(ctx1, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Earnings in $',
            data: [2500, 2900, 4400, 2800, 4500, 3200, 3750, 4500, 2450, 4000, 3000, 4900],
            backgroundColor: [
                'rgba(85,85,85,1)'
            ],
            borderColor: [
                'rgb(41,155,99)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    }
});

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Rent', 'Food', 'Groups', 'Transport', 'Others'],
        datasets: [{
            label: 'Expenses',
            data: [400, 200, 150, 100, 50],
            backgroundColor: [
                'rgba(41,155,99,1)',
                'rgba(54,162,235,1)',
                'rgba(255,206,86,1)',
                'rgba(120,46,139,1)',
                'rgba(243,43,7,1)'
            ],
            borderColor: [
                'rgba(41,155,99,1)',
                'rgba(54,162,235,1)',
                'rgba(255,206,86,1)',
                'rgba(120,46,139,1)',
                'rgba(243,43,7,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
    }
});