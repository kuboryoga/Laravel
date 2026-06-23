<!DOCTYPE html>
<html>
<head>
    <title>登録画面</title>
</head>
<body>
    <h1>タスク登録画面</h1>

    <button onclick="location.href='/list'">
        タスク一覧画面へ
    </button>

    <form action="/create" method="POST">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @csrf

        <label>タスク名</label><br>
        <input type="text" name="task_name"><br><br>

        <label>タスク期日</label><br>
        <input type="date" name="deadline"><br><br>

        <button type="submit">登録</button>
    </form>


</body>
</html>