@extends('layouts.app')

{{--@include('layouts.error')--}}

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">歩数グラフ</div>

                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="card-footer">
                        <div class="mx-auto">
                            <form name="form" id="switch_form" class="form-inline">
                                <label>グラフ表示更新フォーム</label>
                                <div class="form-group mx-3">
                                    <label for="date">いつから：</label>
                                    <input type="date" name="from" id="from" class="form-control" placeholder="日付を入力してください">
                                </div>
                                <p class="mb-0">～</p>
                                <div class="form-group mx-3">
                                    <label for="date">いつまで：</label>
                                    <input type="date" name="until" id="until" class="form-control" placeholder="日付を入力してください">
                                </div>
                                <button type="button" id="switch_button" class="btn btn-secondary">グラフ更新</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('left-content')
    <div class="left-content col-md-7 mb-sm-3">
        <div class="card mb-3">
            <div class="card-header">合計歩数</div>
            <div class="card-body mx-auto">

            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">歩数追加フォーム</div>
            <div class="card-body mx-auto">
                <form action="" method="post" class="form-inline">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="steps">歩数：</label>
                    </div>
                    <div class="form-group mx-3">
                        <input type="text" name="steps" class="form-control" placeholder="歩数を入力してください">
                    </div>
                    <button type="submit" class="btn btn-secondary">追加</button>
                </form>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">直近の歩数データ</div>
            <div class="card-body">
                <table class="table steps-table table-striped mb-0">
                    <thead>
                    <tr>
                        <th scope="col">日付</th>
                        <th scope="col">歩数</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('right-content')
    <div class="right-content col-md-5">
        <div class="card">
            <div class="card-header">ランキング（合計歩数）</div>

            <div class="card-body">

            </div>
        </div>
    </div>
@endsection

@section('footer-content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
@endsection


