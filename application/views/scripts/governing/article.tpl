<h2><a href="{$section.url}">{$section.displayTitle}</a> {component shareWidget}</h2>
<a href="">{$content.displayTitle}</a>
<h3>{$content.subTitle}</h3>
<h4>{$content.title}</h4>
<byline>{component byline} | {$content.publishDate}</byline>
{compontent embeddedGallery}
<div id="ArticleOptions">
    <thumbnail>
        {media width=150}
        <br clear="all" />
        <byline>Photo by {$content.mainImage.author}</byline>
    </thumbnail>
    <br />
    {component voteWidget}
</div>
<article>{$content.body}</article>
<!-- {component commentBlock} -->
