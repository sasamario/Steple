@section('error-message')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show mt-5 mb-0">
            <p>入力に問題があります。再入力してください。</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection

