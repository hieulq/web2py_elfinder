<!-- BEGIN: main -->
{FILE "header.tpl"}
<div class="contentwrapper">
    <!-- BEGIN: mod_title -->
    <h3 class="breakcolumn">
    	<a title="{LANG.Home}" href="{NV_BASE_SITEURL}"><img src="{NV_BASE_SITEURL}themes/{TEMPLATE}/images/icons/home.png" alt="{LANG.Home}" /></a>
    	<!-- BEGIN: breakcolumn -->
			<span class="breakcolumn">&raquo;</span>	    	
    		<a href="{BREAKCOLUMN.link}" title="{BREAKCOLUMN.title}">{BREAKCOLUMN.title}</a>
    	<!-- END: breakcolumn -->
    </h3>
    <!-- END: mod_title -->
	[HEADER]
	[TOP]
    {MODULE_CONTENT}
	[BOTTOM]
	[FOOTER]
</div>
{FILE "footer.tpl"}
<!-- END: main -->
