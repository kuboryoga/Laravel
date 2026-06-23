<!DOCTYPE html>
<html>
<head>
    <title>変更画面</title>
</head>
<body>

<h1>タスク変更画面</h1>

<form action="/update/{{ $task->id }}" method="POST">

    @csrf

    <label>タスク名</label><br>
    <input
        type="text"
        name="task_name"
        value="{{ $task->task_name }}"
    >

    <br><br>

    <label>タスク期日</label><br>
    <input
        type="date"
        name="deadline"
        value="{{ $task->deadline }}"
    >

    <br><br>

    <button type="submit">
        更新
    </button>

</form>

</body>
</html>