<!-- BEGIN: main -->
<link type="text/css" rel="stylesheet" href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/jquery.ui.tabs.css" media="all" />
<div id="topnews" style="display:none">
    <div class="indent clearfix">
        <!-- BEGIN: hots_news_img -->
        <div class="headline span-8 last fl">
            <div id="slider1" class="sliderwrapper">
                <!-- BEGIN: loop -->
                <div class="contentdiv clearfix">
                    <a title="{HOTSNEWS.title}" href="{HOTSNEWS.link}"><img id="slImg{HOTSNEWS.imgID}" src="{PIX_IMG}" alt="{HOTSNEWS.image_alt}" /></a><h3><a title="{HOTSNEWS.title}" href="{HOTSNEWS.link}">{HOTSNEWS.title}</a></h3>
                </div>
                <!-- END: loop -->
            </div>
            <div id="paginate-slider1" class="pagination">
            </div>
        </div>
        <!-- END: hots_news_img -->
        <div id="tabs" class="fr tabs" style="width:180px;">
            <ul>
                <!-- BEGIN: loop_tabs_title -->
                <li>
                    <a href="#tabs-{TAB_TITLE.id}"><span><span>{TAB_TITLE.title}</span></span></a>
                </li>
                <!-- END: loop_tabs_title -->
            </ul>
            <div class="clear">
            </div>
			<!-- BEGIN: loop_tabs_content -->
            <div id="tabs-{TAB_TITLE.id}">
                <!-- BEGIN: content -->
                <ul class="lastest-news">
                    <!-- BEGIN: loop -->
                    <li>
                        <a title="{LASTEST.title}" href="{LASTEST.link}">{LASTEST.title}</a>
                    </li>
                    <!-- END: loop -->
                </ul>
                <!-- END: content -->
            </div>
			<!-- END: loop_tabs_content -->
        </div>
    </div>
</div>
<!-- END: main -->
