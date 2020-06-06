@if($type === "article")
<meta property="og:url" content="{{ route('articles.show',$article->id) }}" />
<meta property="og:title" content="{{ $article->title }}" />
<meta property="og:description" content="{{ strip_tags($article->body) }}" />
@elseif($type === "top")
<meta property="og:url" content="https://binq.kiwatchi.com/" />
<meta property="og:title" content="美容師で、つながる。" />
<meta property="og:description" content="新しい、美容師のSNS" />
@endif

<meta property="og:site_name" content="BinQ" />
<meta property="og:image" content="https://binq.kiwatchi.com/images/twitter_card4.png" />
{{-- twitter設定 --}}
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@nichimachikid" />
{{-- facebook設定 --}}
<meta property="fb:app_id" content="257381682124442" />