const days = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
const weeks = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
const months = ['Week 1', 'Week 2', 'Week 3', 'Week 4']; // Use weeks for monthly chart
const years = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
let selectedPeriod = 'week'; // Default period is week
const data = {
    'week': {
        'facebook': [100, 140, 60, 180, 150, 50, 70],
        'linkedin': [80, 70, 90, 100, 120, 60, 70],
        'twitter': [50, 80, 60, 100, 80, 40, 70],
        'youtube': [200, 230, 200, 200, 300, 100, 150]
    },
    'month': {
        'facebook': [750, 600, 400, 300, 200],
        'linkedin': [600, 450, 350, 250, 150],
        'twitter': [400, 350, 250, 200, 150],
        'youtube': [1500, 1200, 900, 800, 700]
    },
    'year': {
        'facebook': [3000, 2500, 2000, 1500, 1000, 700, 900, 300, 1100, 230, 1200, 180],
        'linkedin': [2500, 2000, 1500, 1000, 700, 900, 300, 1100, 230, 1200, 500, 180],
        'twitter': [1800, 1500, 1200, 900, 600, 700, 900, 300, 1100, 230, 1200, 180],
        'youtube': [5000, 4500, 4000, 3500, 3000, 700, 900, 300, 1100, 230, 1200, 180]
    }
};

// Chart instances
const facebookChart = createChart('facebookChart', data['week']['facebook'], 'Facebook Followers');
const linkedinChart = createChart('linkedinChart', data['week']['linkedin'], 'LinkedIn Connections');
const twitterChart = createChart('twitterChart', data['week']['twitter'], 'Twitter Followers');
const youtubeChart = createChart('youtubeChart', data['week']['youtube'], 'YouTube Subscriber');

// Function to create a chart
function createChart(id, data, label) {
    const ctx = document.getElementById(id).getContext('2d');
    return new Chart(ctx, {
        type: 'bar',
        data: {
            labels: selectedPeriod === 'week' ? days : (selectedPeriod === 'month' ? weeks : years),
            datasets: [{
                label: label,
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    min: 0
                }
            }
        }
    });
}

// Function to update stats based on selected period
function updateStats(period) {
    selectedPeriod = period;
    updateCharts();
}

// Function to update charts based on selected period
function updateCharts() {
    const selectedData = data[selectedPeriod];
    facebookChart.data.labels = selectedPeriod === 'week' ? days : (selectedPeriod === 'month' ? weeks : years);
    facebookChart.data.datasets[0].data = selectedData['facebook'];
    linkedinChart.data.labels = selectedPeriod === 'week' ? days : (selectedPeriod === 'month' ? weeks : years);
    linkedinChart.data.datasets[0].data = selectedData['linkedin'];
    twitterChart.data.labels = selectedPeriod === 'week' ? days : (selectedPeriod === 'month' ? weeks : years);
    twitterChart.data.datasets[0].data = selectedData['twitter'];
    youtubeChart.data.labels = selectedPeriod === 'week' ? days : (selectedPeriod === 'month' ? weeks : years);
    youtubeChart.data.datasets[0].data = selectedData['youtube'];
    facebookChart.update();
    linkedinChart.update();
    twitterChart.update();
    youtubeChart.update();
}
