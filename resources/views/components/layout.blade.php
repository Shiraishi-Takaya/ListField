<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListField</title>
</head>
<body>
    {{-- ヘッダー --}}
    <header>
        
    </header>

    {{-- メイン --}}
    <main>
        {{ $slot }}
    </main>

    {{-- フッター --}}
    <footer>

    </footer>

    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
