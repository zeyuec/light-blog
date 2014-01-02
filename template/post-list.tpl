{include file="header.tpl"}

{foreach from=$postList item=post}
<div class="post">
  <h3>{$post.title}</h3>
  <p>
    <span>@author: {$post.author}</span>
    <span>&nbsp;|&nbsp;</span>
    <span>@time: {$post.create_time}</span>
  </p>
  <hr>
  {$post.summary}
  <span><a href={$post.more} target=_blank>Read More</a></span>
</div>
{/foreach}

<div class="pagination">
  <ul>
  {for $p=$currentPage-2 to $current+2}
    {if $p>0 && $p<=$pageCount}
      {if $p==$currentPage}		     
        <li class="active"><span>{$p}</span></li>
      {else}
        <li><a href="post/list/p/{$p}">{$p}</a></li>      
      {/if}
    {/if}
  {/for}
  </ul>
</div>  


{include file="footer.tpl"}

