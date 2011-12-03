{foreach from=$list item=item}
<li>
    <thumbnail>
        <image>{if $item.mainImage}{image src=$item.mainImage width=150}{/if}</image>
        <br clear="all" />
        <byline>Photo by {$item.mainImage.author}</byline>
    </thumbnail>
    <h4>{$item.title}</h4>
    <p>
        {$item.publishDate}    
        {byline src=$item}  
    </p>
    <div>{$item.body}</div>
    {socialMedia}
</li>
{/foreach}