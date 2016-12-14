/**
 * Created by Elver on 5/11/2016.
 */

    //<![CDATA[
    jQuery.noConflict(); jQuery(document).ready(function(){

    var zoomLevel = 7,
        gMap = jQuery("#gMap"),
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
        jQuery("#footer").prepend('<div class="markerNav" title="Prev" id="prevMarker">&lsaquo;</div><div id="markers"></div><div class="markerNav" title="Next" id="nextMarker">&rsaquo;</div><div id="mapTypeContainer"><div id="mapStyleContainer"><div id="mapStyle" class="satellite"></div></div><div id="mapType" title="Map Type" class="satellite"></div></div><div class="zoomControl" title="Zoom Out" id="zoomOut"><img src="/assets/images/zoomOut.png" alt="-" /></div><div class="zoomControl" title="Zoom In" id="zoomIn"><img src="/assets/images/zoomIn.png" alt="+" /></div>');
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

                        add(jQuery(this), number += 1, "Oruro", "map_post.html","Dpto, Oruro<br />","-17.7667","-67.4833", '<img width="95" height="95" src="{{asset('assets/images/thumbs/oruro.jpg')}}" alt="" />');
                    }
                });
            }
        }
    },{
        action: 'setOptions', args:[{

            zoom:zoomLevel,
            center:{
                lat:-19,
                lng:-63
            },
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
