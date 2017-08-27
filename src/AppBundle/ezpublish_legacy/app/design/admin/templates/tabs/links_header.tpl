<li id="node-tab-links" class="{if $last}last{else}middle{/if}{if $node_tab_index|eq('links')} selected{/if}">
    {if $tabs_disabled}
        <span class="disabled">Links</span>
    {else}
        <a href={concat( $node_url_alias, '/(tab)/links' )|ezurl} title="Links">Links</a>
    {/if}
</li>
