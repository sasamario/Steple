const backgroundColor = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(0, 204, 153, 0.2)'
];

const borderColor = [
    'rgba(255,99,132,1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)',
    'rgba(0, 204, 153, 1)'
];

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["5/1", "5/2", "5/3", "5/4", "5/5", "5/6", "5/7"], //ここにDBからとった日付をいれたい！！
        datasets: [{
            label: '歩数',
            data: [100, 75, 300, 200, 149, 530,160], //ここにDBからとった歩数をいれたい！！
            backgroundColor: backgroundColor,
            borderColor: borderColor,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                scaleLabel: {                 // 軸ラベル
                    display: true,            // 表示設定
                    labelString: '日付',      // ラベル
                    fontSize: 14              // フォントサイズ
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                    display: true,
                    labelString: '歩数（step）',
                    fontSize: 14
                }
            }],
        }
    }
});