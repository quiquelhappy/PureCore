AOS.init();
new SmoothScroll('a[href*="#"]', { offset: 100 });

// charts

function headerChart() {
    var options = {
        chart: {
            height: 500,
            type: 'area',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        background: '#ffffff',
        series: [{
            name: 'series1',
            data: [31, 40, 28, 51, 42, 109, 100]
        }, {
            name: 'series2',
            data: [11, 32, 45, 32, 34, 52, 41]
        }],

        xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
            lines: {
                show: false,
            }
        },
        yaxis: {
            lines: {
                show: false,
            }
        },
        colors: ['#FF7B51', '#FF9F80'],
        fill: {
            type: 'gradient',
            gradient: {
                shade: '',
                type: "vertical",
                shadeIntensity: 0,
                gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 50, 100],
                colorStops: []
            }
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
        legend: {
            show: false
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#header_chart"),
        options
    );

    chart.render();
}

// login

function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;
    
    $.post("https://purecore.io/api/v/1/login/google", { id_token: id_token }).done(function (data) {
        alert("Data Loaded: " + data);
    });

}