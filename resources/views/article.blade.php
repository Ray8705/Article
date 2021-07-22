<html>
<head>

</head>
<body>
    <h2> 文章列表 </h2>
    @foreach($articles as $article)
        <p> Title : {{ $article['title'] }} </p>
        <p> Content : {{ $article['title'] }} </p>
        <p> Create_time : {{ $article['created_at'] }} </p>

        <a href="article/ {{ $article['id'] }}"> 點擊查看 </a>
        <p> ------------------------------ </p>
    @endforeach
</body>
</html>
