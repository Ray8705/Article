<html>
    <head>

    </head>
    <body>
        <h2> 文章內容 </h2>

        <p> Title : {{ $article['title'] }} </p>
        <p> Content : {{ $article['title'] }} </p>
        <p> Create_time : {{ $article['created_at'] }} </p>

        <h2> 評論 </h2>
        @if (!$comments->first())
            <p> 暫無評論 </p>
        @else
            @foreach($comments as $comment)
                <p> Content : {{ $comment['content'] }} </p>
                <p> Create_time : {{ $comment['created_at'] }} </p>
                <p> ------------------------------ </p>
            @endforeach
        @endif

        <a href="../articles"> 返回列表 </a>
    </body>
</html>
