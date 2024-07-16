function getChartColorsArray(chartId) {
    const chartElement = document.getElementById(chartId);
    if (chartElement) {
        const dataColors = chartElement.getAttribute('data-colors');
        if (dataColors) {
            const colors = JSON.parse(dataColors);
            return colors.map(color => {
                color = color.trim();
                if (color.indexOf(',') === -1) {
                    return getComputedStyle(document.documentElement).getPropertyValue(color) || color;
                } else {
                    const [baseColor, alpha] = color.split(',');
                    return `rgba(${getComputedStyle(document.documentElement).getPropertyValue(baseColor)},${alpha})`;
                }
            });
        } else {
            console.warn(`data-colors attribute not found on ${chartId}`);
        }
    }
    return [];
}

// Initialize the donut chart
function initializeUserDevicePieChart() {
    const chartId = 'user_device_pie_charts';
    const colors = getChartColorsArray(chartId);

    const chartElement = document.getElementById(chartId);
    if (chartElement) {
        const iPhoneUsers = chartElement.getAttribute('data-iphone-users');
        const androidUsers = chartElement.getAttribute('data-android-users');

        if (colors.length && iPhoneUsers && androidUsers) {
            const options = {
                series: [parseFloat(iPhoneUsers), parseFloat(androidUsers)],
                labels: ['iPhone', 'Android'],
                chart: {
                    type: 'donut',
                    height: 219
                },
                plotOptions: {
                    pie: {
                        size: 100,
                        donut: {
                            size: '76%'
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    offsetX: 0,
                    offsetY: 0,
                    markers: {
                        width: 20,
                        height: 6,
                        radius: 2
                    },
                    itemMargin: {
                        horizontal: 12,
                        vertical: 0
                    }
                },
                stroke: {
                    width: 0
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return `${value} Users`;
                        }
                    },
                    tickAmount: 4,
                    min: 0
                },
                colors: colors
            };

            const chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }
    }
}

// Initialize all charts on page load
document.addEventListener('DOMContentLoaded', function () {
    initializeUserDevicePieChart();
});
