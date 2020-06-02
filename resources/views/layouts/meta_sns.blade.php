<meta property="og:url" content="{{ route('articles.show',$article->id) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ $article->body }}" />
<meta property="og:site_name" content="BinQ" />
<meta property="og:image" content="{{asset('/storage/'.$article->img)}}" />

<meta name="twitter:creator" content="@kiwatchi1991" />
<meta name="twitter:title" content="【記事タイトル７０文字まで】" />
<meta name="twitter:description" content="【記事概要２００文字まで】" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@nishimachikid" />