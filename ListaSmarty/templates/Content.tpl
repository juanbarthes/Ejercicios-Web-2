{include file= "Header.tpl"}
<h1>{$titulo}</h1>
<ul class="list-group">
    {foreach from=$frutas item=fruta}
    <li class="list-group-item list-group-item-action">{$fruta|upper}</li>
    {/foreach}
</ul>
{include file= "Footer.tpl"}