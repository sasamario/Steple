//myChart.destroy()を使用するために、グローバル変数にする
let myChart;

//ユーザトップページ遷移後のグラフ描画処理
$(document).ready(function(){
    const url = 'home/graph';
    drawGraph(url);
});

//日付指定でのグラフ描画処理
$('#switch_button').click(function() {
    const from = document.forms.switch_form.from.value;
    const until = document.forms.switch_form.until.value;
    const url = 'home/graph/switch';
    const switchDate = {from : from, until : until};
    drawGraph(url, switchDate);
});

//グラフ描画処理
function drawGraph(url, switchDate = []) {
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'GET',
        url: url,
        dataType: 'json',
        data: switchDate,
    }).done(function (response) {
        console.log(response);
        const responseDate = [];
        const responseSteps = [];
        //受け取った歩数データを、配列に入れる
        for (let i = 0; i < Object.keys(response).length; i++) {
            responseDate.push(response[i].date);
            responseSteps.push(response[i].steps);
        }
        const element = document.getElementById("myChart");

        //グラフデータが残っている場合、データの破棄
        if (myChart) {
            myChart.destroy();
        }

        myChart = new Chart(element, {
            type: 'bar',
            data: {
                labels: responseDate,
                datasets: [{
                    label: '歩数',
                    data: responseSteps,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    colorschemes: {
                        scheme: 'brewer.Greens3'
                    }
                },
                legend: {
                    display: false
                },
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
                },
            }
        });
    });
}