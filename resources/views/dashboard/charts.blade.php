<div class="col-xx-12">
    <div class="card card-height-100">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">{{ __('models.chart_users')  }} </h4>
        </div><!-- end card header -->
        <div class="card-body px-0">
            <ul class="list-inline lmain-chart text-center mb-0">
                <li class="list-inline-item chart-border-left me-0">
                    <h4>{{ $users_year }}<span class="text-muted d-inline-block fs-13 align-middle ms-2">{{ __('models.users_year') }}</span></h4>
                </li>
                <li class="list-inline-item chart-border-left me-0">
                    <h4>{{ $parties_year }}<span class="text-muted d-inline-block fs-13 align-middle ms-2">{{ __('models.parties_year') }}</span></h4>
                </li>
            </ul>
            <div id="revenue-expenses-charts" data-users="{{ json_encode($users_count) }}" data-parties="{{ json_encode($parties_count) }}" data-colors='["--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
        </div>
    </div><!-- end card -->
</div><!-- end col -->

    <script>
        function getChartColorsArray(elementId) {
            if (document.getElementById(elementId) !== null) {
                var colorsAttribute = document.getElementById(elementId).getAttribute("data-colors");
                if (colorsAttribute) {
                    var colors = JSON.parse(colorsAttribute);
                    return colors.map(function(color) {
                        var trimmedColor = color.replace(" ", "");
                        if (trimmedColor.indexOf(",") === -1) {
                            return getComputedStyle(document.documentElement).getPropertyValue(trimmedColor) || trimmedColor;
                        } else {
                            var colorParts = trimmedColor.split(",");
                            if (colorParts.length === 2) {
                                return "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(colorParts[0]) + "," + colorParts[1] + ")";
                            } else {
                                return trimmedColor;
                            }
                        }
                    });
                } else {
                    console.warn("data-colors Attribute not found on:", elementId);
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            var usersCountData = document.getElementById("revenue-expenses-charts").getAttribute("data-users");
            var partiesCountData = document.getElementById("revenue-expenses-charts").getAttribute("data-parties");

            var usersCount = JSON.parse(usersCountData);
            var partiesCount = JSON.parse(partiesCountData);

            var revenueExpensesChartsColors = getChartColorsArray("revenue-expenses-charts");

            if (revenueExpensesChartsColors) {
                var options = {
                    series: [
                        {
                            name: "Users",
                            data: usersCount.counts_list
                        },
                        {
                            name: "Parties",
                            data: partiesCount.counts_list
                        }
                    ],
                    chart: {
                        height: 290,
                        type: "area",
                        toolbar: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: "smooth",
                        width: 2
                    },
                    xaxis: {
                        categories: usersCount.month_list
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value;
                            }
                        },
                        tickAmount: 5,
                        min: 0,
                        max: Math.max(...usersCount.counts_list.concat(partiesCount.counts_list)) + 10
                    },
                    colors: revenueExpensesChartsColors,
                    fill: {
                        opacity: 0.06,
                        colors: revenueExpensesChartsColors,
                        type: "solid"
                    }
                };

                var chart = new ApexCharts(document.querySelector("#revenue-expenses-charts"), options);
                chart.render();
            }
        });
    </script>
