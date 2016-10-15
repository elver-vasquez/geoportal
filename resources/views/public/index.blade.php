@extends('layouts.public')

@section('content')
    <div id="gMap"></div>

    <div id="header">
        <!--LOGO-->
        <a id="logo" href="index.html"><img src="images/logo.png" alt="The Navigator" /></a>
        <!--DESCRIPTION-->
        <h2 id="description">Premium HTML Location Guide</h2>
        <!--NAVIGATION MENU-->
        <div id="navigation">
   @include('includes.menu_public')
        </div>
    </div><!--end header-->

    <div id="loading"></div>

    <div id="contentContainer">
        <div id="content">

            <script type="text/javascript">
                //<![CDATA[
                jQuery.noConflict(); jQuery(document).ready(function(){
                    //MAP ZOOM (0 to 20)
                    var zoomLevel = 3,
                            gMap = jQuery("#gMap"),
                    //iPad,iPhone,iPod...
                            deviceAgent = navigator.userAgent.toLowerCase(),
                            iPadiPhone = deviceAgent.match(/(iphone|ipod|ipad)/);

                    //iPad Stuff
                    if (iPadiPhone) {
                        //ADD MAP CONTROLS AND POST ARROWS
                        jQuery("#footer").prepend('<div class="markerNav" title="Prev" id="prevMarker">&lsaquo;</div><div id="markers"></div><div class="markerNav" title="Next" id="nextMarker">&rsaquo;</div><div id="mapTypeContainer"><div id="mapStyleContainer"><div id="mapStyle" class="satellite"></div></div><div id="mapType" title="Map Type" class="satellite"></div></div>');
                    } else {//IF NOT iPad
                        jQuery('#zoomIn').live('click',function(){
                            zoomLevel += 1;
                            gMap.gmap3({action: 'setOptions', args:[{zoom:zoomLevel}]});
                        });
                        jQuery('#zoomOut').live('click',function(){
                            zoomLevel -= 1;
                            gMap.gmap3({action: 'setOptions', args:[{zoom:zoomLevel}]});
                        });
                        //ADD MAP CONTROLS AND POST ARROWS
                        jQuery("#footer").prepend('<div class="markerNav" title="Prev" id="prevMarker">&lsaquo;</div><div id="markers"></div><div class="markerNav" title="Next" id="nextMarker">&rsaquo;</div><div id="mapTypeContainer"><div id="mapStyleContainer"><div id="mapStyle" class="satellite"></div></div><div id="mapType" title="Map Type" class="satellite"></div></div><div class="zoomControl" title="Zoom Out" id="zoomOut"><img src="images/zoomOut.png" alt="-" /></div><div class="zoomControl" title="Zoom In" id="zoomIn"><img src="images/zoomIn.png" alt="+" /></div>');
                    }
                    jQuery('body').prepend("<div id='target'></div>");

                    gMap.gmap3({
                        action: 'init',
                        onces: {
                            bounds_changed: function(){
                                var number = 0;
                                jQuery(this).gmap3({
                                    action:'getBounds',
                                    callback: function (){
//ADD MARKERS HERE - FORMAT IS AS FOLLOWS...
//add(jQuery(this), number += 1, "NAME", "URL","ADDRESS1<br />ADDRESS2","LATITUDE","LONGITUDE", 'THUMBNAIL');
                                        add(jQuery(this), number += 1, "Colosseum", "map_post.html","Via Sforza, 10<br />00184 Roma, Italy","41.890202","12.492228", '<img width="95" height="95" src="{{asset('assets/images/thumbs/colosseum.jpg')}}" alt="" />');
                                        add(jQuery(this), number += 1, "Iguazu Falls", "map_post.html","Iguazu Falls<br />Misiones, Argentina","-25.69506","-54.440432", '<img width="95" height="95" src="images/thumbs/iguazu.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Great Barrier Reef", "map_post.html","Great Barrier Reef<br />Australia","-10.21053","142.159653", '<img width="95" height="95" src="images/thumbs/reef.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Statue of Liberty", "map_post.html","Liberty Island<br />New York, NY 10004","40.69005","-74.045067", '<img width="95" height="95" src="images/thumbs/liberty.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Chichen Itza", "map_post.html","Chichen Itza<br />Mexico","20.683341","-88.569009", '<img width="95" height="95" src="images/thumbs/itza.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Taj Mahal", "map_post.html","Taj Mahal<br />Agra, India","27.174799","78.042111", '<img width="95" height="95" src="images/thumbs/taj.jpg" alt=""" />');
                                        add(jQuery(this), number += 1, "Great Wall of China", "map_post.html","Great Wall of China<br />Beijing, China","40.429076","116.568219", '<img width="95" height="95" src="images/thumbs/wall.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Stonehenge", "map_post.html","4 A344 Road<br />Wiltshire, Salisbury SP4 7DE, UK","51.178859","-1.82622", '<img width="95" height="95" src="images/thumbs/stone.jpg" alt=""" />');
                                        add(jQuery(this), number += 1, "Great Pyramid of Giza", "map_post.html","Great Pyramid of Giza<br />Egypt","29.977316","31.132314", '<img width="95" height="95" src="images/thumbs/giza.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Grand Canyon", "map_post.html","Grand Canyon<br />Williams, AZ","36.34313","-112.51339", '<img width="95" height="95" src="images/thumbs/canyon.jpg" alt="" />');
                                        add(jQuery(this), number += 1, "Eiffel Tower", "map_post.html","Parc du Champ de Mars, 5 Ave Anatole France <br />75007 Paris, France","48.858588","2.293847", '<img width="95" height="95" src="images/thumbs/tower.jpg" alt="" />');
                                    }
                                });
                            }
                        }
                    },{
                        action: 'setOptions', args:[{
                            zoom:zoomLevel,
                            scrollwheel:false,
                            disableDefaultUI:true,
                            disableDoubleClickZoom:true,
                            draggable:true,
                            mapTypeControl:false,
                            panControl:false,
                            scaleControl:false,
                            streetViewControl:false,
                            zoomControl:false,
                            //MAP TYPE: 'roadmap', 'satellite', 'hybrid'
                            mapTypeId:'roadmap'
                        }]
                    });
                    function add(jQuerythis, i, title, link, excerpt, lati, longi, img){
                        jQuerythis.gmap3({
                            action : 'addMarker',
                            lat:lati,
                            lng:longi,
                            //PIN MARKER IMAGE
                            options: {icon: new google.maps.MarkerImage('/assets/images/pin.png')},
                            events:{
                                mouseover: function(marker){
                                    jQuerythis.css({cursor:'pointer'});
                                    jQuery('#markerTitle'+i+'').fadeIn({ duration: 200, queue: false }).animate({bottom:"32px"},{duration:200,queue:false});
                                    jQuery('.markerInfo').removeClass('activeInfo').hide();
                                    jQuery('#markerInfo'+i+'').addClass('activeInfo').show();
                                    jQuery('.marker').removeClass('activeMarker');
                                    jQuery('#marker'+i+'').addClass('activeMarker');
                                },
                                mouseout: function(){
                                    jQuerythis.css({cursor:'default'});
                                    jQuery('#markerTitle'+i+'').stop(true,true).fadeOut(200,function(){jQuery(this).css({bottom:"0"})});
                                },
                                click: function(marker){window.location = link}
                            },
                            callback: function(marker){
                                var jQuerybutton = jQuery('<div id="marker'+i+'" class="marker"><div id="markerInfo'+i+'" class="markerInfo"><a href="'+link+'">'+img+'</a><h2><a href="'+link+'">'+title+'</a></h2><p>'+excerpt+'</p><a class="markerLink" href="'+link+'">View Details &rarr;</a><div class="markerTotal">'+i+' / <span></span></div></div></div>');
                                jQuerybutton.mouseover(function(){
                                    jQuerythis.gmap3({
                                        action:'panTo',
                                        args:[marker.position]
                                    });
                                    jQuery("#target").stop(true,true).fadeIn(1200).delay(500).fadeOut(1200);
                                });
                                jQuery('#markers').append(jQuerybutton);
                                var numbers = jQuery(".markerInfo").length;
                                jQuery(".markerTotal span").html(numbers);
                                if(i == 1){
                                    jQuery('.marker:first-child').addClass('activeMarker').mouseover();
                                }
                                jQuerythis.gmap3({
                                    action:'addOverlay',
                                    content: '<div id="markerTitle'+i+'" class="markerTitle">'+title+'</div>',
                                    latLng: marker.getPosition()
                                });
                            }
                        });
                    }
                });
                //]]>
            </script>

            {{--<div id="sidebar">--}}
                {{--<ul>--}}
                    {{--<!--WIDGET 1-->--}}
                    {{--<li class="widget">--}}
                        {{--<h2 class="widgettitle">Sponsors</h2>--}}
                        {{--<a href="http://themeforest.net/user/themolitor/portfolio?ref=themolitor">--}}
                            {{--<img src="http://www.lakewaparks.com/wp/wp-content/uploads/2011/07/tf_260x120.gif" alt="ThemeForest" />--}}
                        {{--</a>--}}
                    {{--</li><!--end widget-->--}}

                    {{--<!--WIDGET 2-->--}}
                    {{--<li class="widget">--}}
                        {{--<h2 class="widgettitle">Text Widget</h2>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sagittis aliquet commodo. Sed consequat lorem a quam fermentum auctor. Donec quis nisi mi. In vel justo sem, quis iaculis tellus. Sed molestie imperdiet sapien, sed adipiscing tellus imperdiet at. Donec id orci sed elit eleifend luctus.</p>--}}
                    {{--</li><!--end widget-->--}}

                    {{--<!--WIDGET 3-->--}}
                    {{--<li class="widget">--}}
                        {{--<h2 class="widgettitle">Tags</h2>--}}
                        {{--<div class="tagcloud">--}}
                            {{--<a href='#'>Africa</a>--}}
                            {{--<a href='#'>All</a>--}}
                            {{--<a href='#'>Argentina</a>--}}
                            {{--<a href='#'>Arizona</a>--}}
                            {{--<a href='#'>Asia</a>--}}
                            {{--<a href='#'>Australia</a>--}}
                            {{--<a href='#'>Brazil</a>--}}
                            {{--<a href='#'>China</a>--}}
                            {{--<a href='#'>Egypt</a>--}}
                            {{--<a href='#'>England</a>--}}
                            {{--<a href='#'>Europe</a>--}}
                            {{--<a href='#'>France</a>--}}
                            {{--<a href='#'>India</a>--}}
                            {{--<a href='#'>Italy</a>--}}
                            {{--<a href='#'>Mexico</a>--}}
                            {{--<a href='#'>New York</a>--}}
                            {{--<a href='#'>North Africa</a>--}}
                            {{--<a href='#'>North America</a>--}}
                            {{--<a href='#'>Paris</a>--}}
                            {{--<a href='#'>Rome</a>--}}
                            {{--<a href='#'>South America</a>--}}
                            {{--<a href='#'>UK</a>--}}
                            {{--<a href='#'>US</a>--}}
                        {{--</div>--}}
                    {{--</li><!--end widget-->--}}
                {{--</ul>--}}
                {{--<div class="clear"></div>--}}
            {{--</div><!--end sidebar-->--}}

            <div class="clear"></div>
        </div><!--end content-->
    </div><!--end contentContainer-->

    <div id="footer">

        <!--WIDGET PANEL OPEN/CLOSE-->
        <a href="#" id="widgetsOpen" title="More" class="widgetsToggle">+</a>
        <a href="#" id="widgetsClose" title="Close" class="widgetsToggle">&times;</a>

        <!--SEARCH (NOT FUNCTIONAL)-->
        <div id="footerSearch">
            <form method="get" action="/">
                <input type="image" src="images/mag_glass.png" id="searchsubmit" alt="GO!" />
                <input type="text" value="" onfocus="this.value=''; this.onfocus=null;"  name="s" id="s" />
            </form>
        </div>

        <!--SOCIAL BUTTONS-->
        <div id="socialStuff">
            <a class="socialicon" id="rssIcon" href="#"  title="Subscribe via RSS" rel="nofollow"></a>
            <a class="socialicon" id="facebookIcon" href="#"  title="Facebook" rel="nofollow"></a>
            <a class="socialicon" id="twitterIcon" href="#" title="Follow on Twitter" rel="nofollow"></a>
            <!--
            <a class="socialicon" id="vimeoIcon" href="#" title="Vimeo" rel="nofollow"></a>
            <a class="socialicon" id="skypeIcon" href="#" title="Skype" rel="nofollow"></a>
            <a class="socialicon" id="myspaceIcon" href="#" title="MySpace" rel="nofollow"></a>
            <a class="socialicon" id="flickrIcon" href="#" title="Flickr" rel="nofollow"></a>
            <a class="socialicon" id="linkedinIcon" href="#" title="LinkedIn" rel="nofollow"></a>
            <a class="socialicon" id="youtubeIcon" href="#" title="YouTube" rel="nofollow"></a>
            -->
        </div>

        <!--COPYRIGHT NOTICE - IMPORTANT! DO NOT REMOVE GOOGLE NOTICE -->
        <div id="copyright">
            &copy; 2016 Sistema de cuencas Bolivia </a>
        </div>

        <!--THIS SHOULD BE THE TITLE OF THE PAGE-->
        <div class="pageContent">
            <h2>Page Title Here</h2>
        </div>
    </div><!--end footer-->
    @stop