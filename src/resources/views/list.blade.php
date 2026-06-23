<!DOCTYPE html>
<html>
<head>
    <title>一覧画面</title>
</head>
<body>

    <h1>タスク一覧画面</h1>

    <form action="/list" method="GET">
        <input
            type="text"
            name="keyword"
            value="{{ $keyword ?? '' }}"
            placeholder="タスク名を検索">

        <button type="submit">検索</button>
    </form>

    <button onclick="location.href='/create'">
        タスク登録画面へ
    </button>

    <br><br>

    <table border="1">
        <tr>
            <th>タスク名</th>
            <th>タスク期日</th>
            <th>変更</th>
            <th>削除</th>
        </tr>

        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->task_name }}</td>
            <td>{{ $task->deadline }}</td>

            <td>
                <a href="/edit/{{ $task->id }}">変更</a>
            </td>
            <td>
                <form action="/delete/{{ $task->id }}" method="POST">
                    @csrf
                    <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>