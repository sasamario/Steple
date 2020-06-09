@extends('layouts.app')

@include('layouts.error')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">編集フォーム</div>

                    <div class="card-body">
                        <form action="{{route('update')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="date">日付</label>
                                <input type="date" name="date" class="form-control" value="{{old('date', $editStep->date)}}" placeholder="日付を入力して下さい">
                            </div>
                            <div class="form-group">
                                <label for="steps">歩数</label>
                                <input type="text" name="steps" class="form-control" value="{{old('steps', $editStep->steps)}}" placeholder="歩数を入力して下さい">
                            </div>
                            <input type="hidden" name="step_id" value="{{$editStep->step_id}}">
                            <button type="submit" class="btn btn-secondary">編集</button>
                            <button type="button" class="btn btn-secondary" onclick="history.back()">戻る</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
