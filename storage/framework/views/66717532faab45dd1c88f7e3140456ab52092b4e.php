<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cuencas </title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/ol.css')); ?>" />
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/font-awesome/css/font-awesome.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/jstree/themes/default/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/morris/morris.css')); ?>" />

    <?php echo $__env->make('includes.public_style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <style type="text/css">
        body { overflow: hidden; }

        .navbar-offset { margin-top: 50px;   }
        #map { position: absolute; top: 50px; bottom: 0px; left: 0px; right: 0px; }
        #map .ol-zoom { font-size: 1.2em; }
        #treeCheckbox {
            font-size: 11px; !important;

        }


        .zoom-top-opened-sidebar { margin-top: 5px; }
        .zoom-top-collapsed { margin-top: 45px; }

        .mini-submenu{
            display:none;
            background-color: rgba(255, 200, 0, 0.6);
            border: 1px solid rgba(0, 0, 0, 0.9);
            border-radius: 5px;
            padding: 8px;
            /*position: relative;*/
            width: 50px;
            text-align: center;
            color:#FFF;
        }

        .mini-submenu-left {
            position: absolute;
            top: 60px;
            left: .5em;
            z-index: 40;
        }
        .mini-submenu-right {
            position: absolute;
            top: 60px;
            right: .5em;
            z-index: 40;
        }

        #map { z-index: 35; }

        .sidebar { z-index: 45;

        }

        .main-row { position: relative; top: 0; }

        .mini-submenu:hover{
            cursor: pointer;
        }

        .slide-submenu{
            background: rgba(0, 0, 0, 0.45);
            display: inline-block;
            padding: 0 8px;
            border-radius: 4px;
            cursor: pointer;
        }


        /*style infowindow*/
        #map-canvas {
            margin: 0;
            padding: 0;
            height: auto;

        }
        #map-canvas img {
            max-width: none !important;
        }
        .gm-style-iw {
            width: 100%; !important;
            height: auto;
            top: 0px !important;
            left: 0px !important;
            background-color: #262b33;

        }
        #iw-container {
            margin-bottom: 10px;
            overflow-x: hidden;

        }
        #iw-container .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 12px;
            text-align: center;
            width: 100%;

            font-weight: 400;
            padding: 5px;
            background-color: #4e5458;
            color: white;
            margin: 10px;
            border-radius: 2px 2px 0 0;
        }
        #iw-container .iw-content {
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            margin-right: 1px;
            padding: 15px 5px 20px 15px;
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .iw-content img {
            float: right;
            margin: 0 5px 5px 10px;
        }
        .iw-subTitle {
            font-size: 12px;
            font-weight: 700;
            padding: 5px 0;
        }


    </style>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/ol.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery-1.10.2.min.js')); ?>"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/jstree/jstree.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/morris/morris.js')); ?>"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZIkv7ehocFWTZot3h0AQlAH1OIZ4_oAU&callback=initMap">
    </script>
    


    <script type="text/javascript">
  var url_punto=window.location+'mapas/tdps/puntos/';
  var url_tdps=window.location+'mapas/tdps/';
  var url_cuenca=window.location+'mapas/cuencas/';
//  var url_mapa=window.location+'mapas/';
  var url_mapa='http://www.fedjuveoruro.com/mapas/';

  var i=0;
  var layers = [];
  var codigo='B-012-10B-1-01';

  var data_charts=[];


        function initMap(){
            var options={
                center:{
                    lat:-17.7667,
                    lng:-67.4833
                },
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                    position: google.maps.ControlPosition.TOP_CENTER
                },
                zoomControl: true,

                zoom:8,
                mapTypeId:google.maps.MapTypeId.HYBRID,
                zoomControlOptions:{
                    position:google.maps.ControlPosition.BOTTON_CENTER,
                    style:google.maps.ZoomControlStyle.DEFAULT

                },
                panControlOptions:{
                    position:google.maps.ControlPosition.LEFT_BOTTOM
                },
                scaleControl: true,
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_BOTTON
                }
            };
            map = new google.maps.Map(document.getElementById('map'),options);

//            addMark();

        }


        $(document).ready(function () {
//            alert(window.location.protocol+'//'+window.location.hostname)

//            buscarCampaniasRemas('P-017-003-1-01');



            $('#treeCheckbox').jstree({
                'core' : {
                    'themes' : {
                        'responsive': true
                    }
                },

                'types' : {
                    'default' : {
                        'icon' : 'fa fa-folder'
                    },
                    'file' : {
                        'icon' : 'fa fa-file'
                    }
                },
//            'plugins' : ['contextmenu', 'types'],
            "plugins" : [ "checkbox",  "types" ],

            "checkbox": {
                   "keep_selected_style" : false,
                   "three_state": false,
                   "real_checkboxes": false,
                   "tie_selection" : false
               }
            }).on("select_node.jstree", function (event, data) {

                var id=data.node.id;
                var oElement = $("#" + data.node.id)[0];
                var archivo = oElement.attributes["label"].value;
                var tipo =oElement.attributes["tipo"].value;
//                alert(tipo)



            abrirLayer(url_mapa+archivo,id,tipo);


        }).bind("deselect_node.jstree", function(evt, data) {

            layers[data.node.id].setMap(null);

        });

        });
        function applyMargins() {
            var leftToggler = $(".mini-submenu-left");
            var rightToggler = $(".mini-submenu-right");
            if (leftToggler.is(":visible")) {
                $("#map .ol-zoom")
                        .css("margin-left", 0)
                        .removeClass("zoom-top-opened-sidebar")
                        .addClass("zoom-top-collapsed");
            } else {
                $("#map .ol-zoom")
                        .css("margin-left", $(".sidebar-left").width())
                        .removeClass("zoom-top-opened-sidebar")
                        .removeClass("zoom-top-collapsed");
            }
            if (rightToggler.is(":visible")) {
                $("#map .ol-rotate")
                        .css("margin-right", 0)
                        .removeClass("zoom-top-opened-sidebar")
                        .addClass("zoom-top-collapsed");
            } else {
                $("#map .ol-rotate")
                        .css("margin-right", $(".sidebar-right").width())
                        .removeClass("zoom-top-opened-sidebar")
                        .removeClass("zoom-top-collapsed");
            }
        }
        function isConstrained() {
            return $("div.mid").width() == $(window).width();
        }

        function applyInitialUIState() {
            if (isConstrained()) {
                $(".sidebar-left .sidebar-body").fadeOut('slide');
                $(".sidebar-right .sidebar-body").fadeOut('slide');
                $('.mini-submenu-left').fadeIn();
                $('.mini-submenu-right').fadeIn();
            }
        }


             function charts_remas(tdps,tipo) {
                 var aux=[];
                 switch(tipo){
                     case 'ph':{  $(data_charts).each(function(k,v){
                         aux.push({'anio':''+v.fecha+'','value':v.ph});
                     });
                     } break;
                     case 'temperatura':{  $(data_charts).each(function(k,v){
                         aux.push({'anio':''+v.fecha+'','value':v.temperatura});
                     });
                     } break;
                     case 'turbiedad':{  $(data_charts).each(function(k,v){
                         aux.push({'anio':''+v.fecha+'','value':v.turbiedad});
                     });
                     } break;
                 }

                 $('#titulo_chart').html(tipo)

                 $(".charts-modal").on("shown.bs.modal", function () {
                     setTimeout(function(){
                         new Morris.Line({

                             element: 'area-example',

                             data: aux,

                             xkey: 'anio',
                             ykeys: ['value'],

                             labels: [tipo]
                         });
                         // When you open modal several times Morris charts over loading. So this is for destory to over loades Morris charts.
                         // If you have better way please share it.
                         if($('#area-example').find('svg').length > 1){
                             // Morris Charts creates svg by append, you need to remove first SVG
                             $('#area-example svg:first').remove();
                             // Also Morris Charts created for hover div by prepend, you need to remove last DIV
                             $(".morris-hover:last").remove();
                         }
                         // Smooth Loading
                         $('.js-loading').addClass('hidden');

                     },300);

                 }).modal('show')
             }
        function modalRemas(campanias,data,cod){

    $datos_generales='';
    $ul_gen='';
    $ul_fisico='';
    $ul_gases='';
    $ul_quimicos='';
    $ul_nutrientes='';
    $ul_sanitarios='';
    $ul_metales='';
    $ul_reporte='';

              $('#cod_remas').html(cod)
              $ul_gen+='<ul class="list-inline">';
              $ul_fisico+='<ul class="list-inline">';
              $ul_gases+='<ul class="list-inline">';
              $ul_quimicos+='<ul class="list-inline">';
              $ul_nutrientes+='<ul class="list-inline">';
              $ul_sanitarios+='<ul class="list-inline">';
              $ul_metales+='<ul class="list-inline">';
            $datos_generales+='<li >Pto:<strong class="text-primary">'+data.pto+'</strong></li>'+
           '<li >Pais:<strong class="text-primary">'+data.pais+'</strong></li>'+
           '<li >Zona Hidrologica:<strong class="text-primary">'+data.zona_hidrologica+'</strong></li>'+
           '<li >Red:<strong class="text-primary">'+data.red+'</strong></li>'+
           '<li >Nro Red:<strong class="text-primary">'+data.nro_red+'</strong></li>'+
           '<li >Nombre de Zona Hidrologica TDPS:<strong class="text-primary">'+data.nombre_hidrologica+'</strong></li>'+
           '<li >Coordenada Este:<strong class="text-primary">'+data.coor_este+'</strong></li>'+
           '<li >Coordenada Norte:<strong class="text-primary">'+data.coor_oeste+'</strong></li>'+
           '<li >Altura(msnm):<strong class="text-primary">'+data.altura+'</strong></li>'+
           '<li >Departamento:<strong class="text-primary">'+data.dpto+'</strong></li>'+
           '<li >Nombre de Estacion:<strong class="text-primary">'+data.estacion+'</strong></li>';

             $('#datos_generales').append($datos_generales);


             $(campanias).each(function(k,v){
                $ul_gen+='<li>'+
                        '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                 '<li >Codigo campaña: <strong>'+v.cod_campania+'</strong></li>'+
                 '<li >Laboratorio Responsable: <strong>'+v.laboratorio+'</strong></li>'+
                 '<li >Fecha d/m/A: <strong>'+v.fecha+'</strong></li>'+
                 '<li >Hora H:m: <strong>'+v.hora+'</strong></li>'+
                 '<li >Caudal m3/s: <strong>'+v.caudal+'</strong></li>'+
                 '</ol>'+
                 '</li>';
                 $ul_fisico+='<li>'+
                         '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+

                         '<li >PH:<strong class="text-primary">'+v.ph+'</strong>  <button  onclick="charts_remas(\'remas\',\'ph\')" class="btn btn-default  btn-xs "><i class="fa fa-line-chart"></i> Grafico</button></li>'+
                         '<li >CEV (uS/cm):<strong class="text-primary">'+v.ce+'</strong>'+
                         '<li >T (°C):<strong class="text-primary">'+v.temperatura+'</strong><button onclick="charts_remas(\'remas\',\'temperatura\')" class="btn btn-default  btn-xs"> <i class="fa fa-line-chart"></i> Grafico</button></li>'+
                         '<li >TURBIEDAD(NTU):<strong class="text-primary">'+v.turbiedad+'</strong><button onclick="charts_remas(\'remas\',\'turbiedad\')" class="btn btn-default  btn-xs"><i class="fa fa-line-chart"></i> Grafico</button></li>'+
                         '<li >SDT(mg/l):<strong class="text-primary">'+v.sdt+'</strong></li>'+
                         '<li >SST(mg/l):<strong class="text-primary">'+v.sst+'</strong></li>'+
                         '<li >Color:<strong class="text-primary">'+v.color+'</strong></li>'+
                         '</ol>'+
                         '</li>';

                 $ul_gases+='<li>'+
                         '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+

                         '<li >CO2(mg/l):<strong class="text-primary">'+v.co+'</strong></li>'+
                         '<li> OD(mg/l):<strong class="text-primary">'+v.od+'</strong></li>'+
                         '<li> HS2(mg/l):<strong class="text-primary">'+v.hs+'</strong></li>'+
                         '</ol>'+
                         '</li>';


                 $ul_quimicos+='<li>'+
                         '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                        '<li >Ca (mg/l):<strong class="text-primary">'+v.ca+'</strong></li>'+
                        '<li> Mg (mg/l):<strong class="text-primary">'+v.mg+'</strong></li>'+
                        '<li> Na (mg/l):<strong class="text-primary">'+v.na+'</strong></li>'+
                        '<li> K (mg/l):<strong class="text-primary">'+v.k+'</strong></li>'+
                        '<li> Na + K (mg/l):<strong class="text-primary">'+v.na_k+'</strong></li>'+
                        '<li> CO3 (mg/l):<strong class="text-primary">'+v.co2+'</strong></li>'+
                        '<li> CO3H (mg/l):<strong class="text-primary">'+v.co2h+'</strong></li>'+
                        '<li> Cl (mg/l):<strong class="text-primary">'+v.ci+'</strong></li>'+
                        '<li> (SO4)2- (mg/l):<strong class="text-primary">'+v.so4+'</strong></li>'+
                        '<li> Alcalinidad (mg/l) CaCO3:<strong class="text-primary">'+v.alcalinidad+'</strong></li>'+
                        '<li> Dureza total (mg/l) CaCO3:<strong class="text-primary">'+v.dureza +'</strong></li>'+
                         '</ol>'+
                         '</li>';


                 $ul_nutrientes+='<li>'+
                         '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                         '<li >SiO3 (mg/l):<strong class="text-primary">'+v.sio3+'</strong></li>'+
                         '<li> N-NO3- (mg/l):<strong class="text-primary">'+v.nno3+'</strong></li>'+
                         '<li> N-NO2- (mg/l):<strong class="text-primary">'+v.nno2+'</strong></li>'+
                         '<li> N-NH4+ (mg/l):<strong class="text-primary">'+v.nnh4+'</strong></li>'+
                         '<li> Nt (mg/l):<strong class="text-primary">'+v.nt+'</strong></li>'+
                         '<li> N-Kjeldall (mg/l):<strong class="text-primary">'+v.kjendall+'</strong></li>'+
                         '<li> (PO4)3- (mg/l):<strong class="text-primary">'+v.po4+'</strong></li>'+
                         '<li> P (mg/l):<strong class="text-primary">'+v.p+'</strong></li>'+
                         '<li> Pt (mg/l):<strong class="text-primary">'+v.pt+'</strong></li>'+
                         '<li> B (mg/l):<strong class="text-primary">'+v.b+'</strong></li>'+
                         '</ol>'+
                         '</li>';

                 $ul_sanitarios+='<li>'+
                         '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                         '<li >DBO5 (mg/l):<strong class="text-primary">'+v.dbo5+'</strong></li>'+
                         '<li >DQO (mg/l):<strong class="text-primary">'+v.dqo+'</strong></li>'+
                         '<li >Coliformes fecales (NMP/100 ml):<strong class="text-primary">'+v.coli_feca+'</strong></li>'+
                         '<li >Coliformes totales (NMP/100 ml):<strong class="text-primary">'+v.coli_tot+'</strong></li>'+
                         '<li >Salmonella spp (NMP/100 ml):<strong class="text-primary">'+v.salmonella+'</strong></li>'+
                         '</ol>'+
                         '</li>';

                 $ul_metales+='<li>'+
                         '<ol>'+
                         '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                         '<li >Zn (mg/l):<strong class="text-primary">'+v.zn+'</strong></li>'+
                         '<li >Cd (mg/l):<strong class="text-primary">'+v.cd+'</strong></li>'+
                         '<li >Pb (mg/l):<strong class="text-primary">'+v.pb+'</strong></li>'+
                         '<li >Fe (mg/l):<strong class="text-primary">'+v.fe+'</strong></li>'+
                         '<li >Mn (mg/l):<strong class="text-primary">'+v.mn+'</strong></li>'+
                         '<li >Cu (mg/l):<strong class="text-primary">'+v.cu+'</strong></li>'+
                         '<li >Hg (mg/l):<strong class="text-primary">'+v.hg+'</strong></li>'+
                         '<li >As (mg/l):<strong class="text-primary">'+v.as+'</strong></li>'+
                         '<li >Cr (mg/l):<strong class="text-primary">'+v.cr+'</strong></li>'+
                         '<li >Ni (mg/l):<strong class="text-primary">'+v.ni+'</strong></li>'+
                         '<li >Sb (mg/l):<strong class="text-primary">'+v.sb+'</strong></li>'+
                         '<li >Se (mg/l):<strong class="text-primary">'+v.se+'</strong></li>'+
                         '</ol>'+
                         '</li>';
             });

                $ul_reporte+='<form method="POST" action="<?php echo e(url('reportes/remas')); ?>" id="reporte-remas" >'+
                                '<input type="hidden" name="codigo_rema" value="'+cod+'"/>'+
                        '<ul class="list-inline">'+
                        '<li>'+
                        '<ol>'+
                        '<li  class="text-warning"> <strong>Fisicos</strong></li>'+
                        '<li >PH <input type="checkbox" name="reporte[]"  value="ph"></li>'+
                        '<li >CEV (uS/cm) <input type="checkbox" name="reporte[]" value="ce" ></li>'+
                        '<li >T (°C) <input type="checkbox" value="temperatura" name="reporte[]" ></li>'+
                        '<li >TURBIEDAD(NTU) <input type="checkbox" value="turbiedad" name="reporte[]" ></li>'+
                        '<li >SDT(mg/l) <input type="checkbox" value="sdt" name="reporte[]" ></li>'+
                        '<li >SST(mg/l) <input type="checkbox" value="sst"  name="reporte[]" ></li>'+
                        '<li >Color <input type="checkbox" value="color" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                        '<li>'+
                        '<ol>'+
                        '<li  class="text-warning"> Gases</li>'+
                        '<li >CO2(mg/l)<input type="checkbox" value="co" name="reporte[]" ></li>'+
                        '<li> OD(mg/l)<input type="checkbox" value="od" name="reporte[]" ></li>'+
                        '<li> HS2(mg/l)<input type="checkbox" value="hs" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                        '<li>'+
                        '<ol>'+
                        '<li  class="text-warning"> Quimicos</li>'+
                        '<li >Ca (mg/l) <input type="checkbox" value="ca" name="reporte[]" ></li>'+
                        '<li> Mg (mg/l) <input type="checkbox" value="mg" name="reporte[]" ></li>'+
                        '<li> Na (mg/l) <input type="checkbox" value="na" name="reporte[]" ></li>'+
                        '<li> K (mg/l) <input type="checkbox" value="k" name="reporte[]" ></li>'+
                        '<li> Na + K (mg/l) <input type="checkbox" value="na_k" name="reporte[]" ></li>'+
                        '<li> CO3 (mg/l) <input type="checkbox" value="co2" name="reporte[]" ></li>'+
                        '<li> CO3H (mg/l) <input type="checkbox" value="co2h" name="reporte[]" ></li>'+
                        '<li> Cl (mg/l) <input type="checkbox" value="ci" name="reporte[]" ></li>'+
                        '<li> (SO4)2- (mg/l) <input type="checkbox" value="so4" name="reporte[]" ></li>'+
                        '<li> Alcalinidad (mg/l) CaCO3 <input type="checkbox" value="alcalinidad" name="reporte[]" ></li>'+
                        '<li> Dureza total (mg/l) CaCO3 <input type="checkbox" value="dureza" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                       '<li>'+
                        '<ol>'+
                        '<li  class="text-warning"> Nutrientes</li>'+
                        '<li >SiO3 (mg/l) <input type="checkbox" value="sio3" name="reporte[]" ></li>'+
                        '<li> N-NO3- (mg/l) <input type="checkbox" value="nno3" name="reporte[]" ></li>'+
                        '<li> N-NO2- (mg/l) <input type="checkbox" value="nno2" name="reporte[]" ></li>'+
                        '<li> N-NH4+ (mg/l) <input type="checkbox" value="nnh4" name="reporte[]" ></li>'+
                        '<li> Nt (mg/l) <input type="checkbox" value="nt" name="reporte[]" ></li>'+
                        '<li> N-Kjeldall (mg/l) <input type="checkbox" value="kjendall" name="reporte[]" ></li>'+
                        '<li> (PO4)3- (mg/l) <input type="checkbox" value="po4" name="reporte[]" ></li>'+
                        '<li> P (mg/l) <input type="checkbox" value="p" name="reporte[]" ></li>'+
                        '<li> Pt (mg/l) <input type="checkbox" value="pt" name="reporte[]" ></li>'+
                        '<li> B (mg/l) <input type="checkbox" value="si" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                        '<li>'+
                        '<ol>'+
                        '<li  class="text-warning"> Sanitarios<br> y biologicos</li>'+
                        '<li >DBO5 (mg/l) <input type="checkbox" value="dbo5" name="reporte[]" ></li>'+
                        '<li >DQO (mg/l) <input type="checkbox" value="dqo" name="reporte[]" ></li>'+
                        '<li >Coliformes fecales (NMP/100 ml) <input type="checkbox" value="coli_feca" name="reporte[]" ></li>'+
                        '<li >Coliformes totales (NMP/100 ml) <input type="checkbox" value="coli_tot" name="reporte[]" ></li>'+
                        '<li >Salmonella spp (NMP/100 ml) <input type="checkbox" value="salmonella" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                        '<li>'+
                         '<ol>'+
                        '<li  class="text-warning">Metales y no<br> Metales Trazas</li>'+
                        '<li >Zn (mg/l) <input type="checkbox" value="zn" name="reporte[]" ></li>'+
                        '<li >Cd (mg/l) <input type="checkbox" value="cd" name="reporte[]" ></li>'+
                        '<li >Pb (mg/l) <input type="checkbox" value="pb" name="reporte[]" ></li>'+
                        '<li >Fe (mg/l) <input type="checkbox" value="fe" name="reporte[]" ></li>'+
                        '<li >Mn (mg/l) <input type="checkbox" value="mn" name="reporte[]" ></li>'+
                        '<li >Cu (mg/l) <input type="checkbox" value="cu" name="reporte[]" ></li>'+
                        '<li >Hg (mg/l) <input type="checkbox" value="hg" name="reporte[]" ></li>'+
                        '<li >As (mg/l) <input type="checkbox" value="as" name="reporte[]" ></li>'+
                        '<li >Cr (mg/l) <input type="checkbox" value="cr" name="reporte[]" ></li>'+
                        '<li >Ni (mg/l) <input type="checkbox" value="ni" name="reporte[]" ></li>'+
                        '<li >Sb (mg/l) <input type="checkbox" value="sb" name="reporte[]" ></li>'+
                        '<li >Se (mg/l) <input type="checkbox" value="se" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                         '</ul>'+
                                '<button type="submit" class="btn btn-warning"><i class="fa fa-file-excel-o"></i> Generar Reporte</button>'+
                                '</form>';
                 $ul_gen+='</li>';
                 $ul_fisico+='</li>';
                 $ul_gases+='</li>';
                 $ul_quimicos+='</li>';
                 $ul_nutrientes+='</li>';
                 $ul_sanitarios+='</li>';
                 $ul_metales+='</li>';

                 $('#general_remas').append($ul_gen);
                 $('#fisico_remas').append($ul_fisico);
                 $('#gases_remas').append($ul_gases);
                 $('#quimicos_remas').append($ul_quimicos);
                 $('#nutrientes_remas').append($ul_nutrientes);
                 $('#sanitarios_remas').append($ul_sanitarios);
                 $('#metales_remas').append($ul_metales);
                 $('#reportes').append($ul_reporte);


    $('#myModal').modal('show');
}


  function modalRemfc(campanias,data,cod){
      $datos_generales='';
      $ul_gen='';
      $ul_fisico='';
      $ul_gases='';
      $ul_quimicos='';
      $ul_nutrientes='';
      $ul_sanitarios='';
      $ul_metales='';

      $('#cod_remas').html(cod)
      $ul_gen+='<ul class="list-inline">';
      $ul_fisico+='<ul class="list-inline">';
      $ul_gases+='<ul class="list-inline">';
      $ul_quimicos+='<ul class="list-inline">';
      $ul_nutrientes+='<ul class="list-inline">';
      $ul_sanitarios+='<ul class="list-inline">';
      $ul_metales+='<ul class="list-inline">';




      $datos_generales+='<li >Pto:<strong class="text-primary">'+data.pto+'</strong></li>'+
              '<li >Pais:<strong class="text-primary">'+data.pais+'</strong></li>'+
              '<li >Zona Hidrologica:<strong class="text-primary">'+data.zona_hidrologica+'</strong></li>'+
              '<li >Red:<strong class="text-primary">'+data.red+'</strong></li>'+
              '<li >Nro Red:<strong class="text-primary">'+data.nro_red+'</strong></li>'+
              '<li >Nombre de Zona Hidrologica TDPS:<strong class="text-primary">'+data.nombre_hidrologica+'</strong></li>'+
              '<li >Coordenada Este:<strong class="text-primary">'+data.coor_este+'</strong></li>'+
              '<li >Coordenada Norte:<strong class="text-primary">'+data.coor_oeste+'</strong></li>'+
              '<li >Altura(msnm):<strong class="text-primary">'+data.altura+'</strong></li>'+
              '<li >Departamento:<strong class="text-primary">'+data.dpto+'</strong></li>'+
              '<li >Nombre de Estacion:<strong class="text-primary">'+data.estacion+'</strong></li>';

      $('#datos_generales').append($datos_generales);


      $(campanias).each(function(k,v){
          $ul_gen+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >Codigo campaña: <strong>'+v.cod_campania+'</strong></li>'+
                  '<li >Laboratorio Responsable: <strong>'+v.laboratorio+'</strong></li>'+
                  '<li >Fecha d/m/A: <strong>'+v.fecha+'</strong></li>'+
                  '<li >Hora H:m: <strong>'+v.hora+'</strong></li>'+
                  '<li >Caudal m3/s: <strong>'+v.caudal+'</strong></li>'+
                  '</ol>'+
                  '</li>';
          $ul_fisico+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+

                  '<li >PH:<strong class="text-primary">'+v.ph+'</strong>  <button  onclick="charts_remas(\'remas\',\'ph\')" class="btn btn-primary  btn-xs ">Graficar</button></li>'+
                  '<li >CEV (uS/cm):<strong class="text-primary">'+v.ce+'</strong><a href="###" onclick="charts_remas(\'remas\',\'ce\')" class="text-warning ">Graficar</a></i>'+
                  '<li >T (°C):<strong class="text-primary">'+v.temperatura+'</strong></li>'+
                  '<li >Aceites y grasas (mg/l):<strong class="text-primary">'+v.aceites+'</strong></li>'+
                  '<li >TURBIEDAD(NTU):<strong class="text-primary">'+v.turbiedad+'</strong></li>'+
                  '<li >SDT(mg/l):<strong class="text-primary">'+v.sdt+'</strong></li>'+
                  '<li >SST(mg/l):<strong class="text-primary">'+v.sst+'</strong></li>'+
                  '<li >Color:<strong class="text-primary">'+v.color+'</strong></li>'+
                  '</ol>'+
                  '</li>';

          $ul_gases+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+

                  '<li >CO2(mg/l):<strong class="text-primary">'+v.co+'</strong></li>'+
                  '<li> OD(mg/l):<strong class="text-primary">'+v.od+'</strong></li>'+
                  '<li> OD Saturado (mg/l):<strong class="text-primary">'+v.od_satu+'</strong></li>'+
                  '<li> Saturación (%):<strong class="text-primary">'+v.saturacion+'</strong></li>'+
                  '<li> HS2(mg/l):<strong class="text-primary">'+v.hs+'</strong></li>'+
                  '</ol>'+
                  '</li>';


          $ul_quimicos+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >Ca (mg/l):<strong class="text-primary">'+v.ca+'</strong></li>'+
                  '<li> Mg (mg/l):<strong class="text-primary">'+v.mg+'</strong></li>'+
                  '<li> Na (mg/l):<strong class="text-primary">'+v.na+'</strong></li>'+
                  '<li> K (mg/l):<strong class="text-primary">'+v.k+'</strong></li>'+
                  '<li> Na + K (mg/l):<strong class="text-primary">'+v.na_k+'</strong></li>'+
                  '<li> CO3 (mg/l):<strong class="text-primary">'+v.co2+'</strong></li>'+
                  '<li> CO3H (mg/l):<strong class="text-primary">'+v.co2h+'</strong></li>'+
                  '<li> Cl (mg/l):<strong class="text-primary">'+v.ci+'</strong></li>'+
                  '<li> (SO4)2- (mg/l):<strong class="text-primary">'+v.so4+'</strong></li>'+
                  '<li> Alcalinidad (mg/l) CaCO3:<strong class="text-primary">'+v.alcalinidad+'</strong></li>'+
                  '<li> Dureza total (mg/l) CaCO3:<strong class="text-primary">'+v.dureza +'</strong></li>'+
                  '</ol>'+
                  '</li>';


          $ul_nutrientes+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >SiO3 (mg/l):<strong class="text-primary">'+v.sio3+'</strong></li>'+
                  '<li> N-NO3- (mg/l):<strong class="text-primary">'+v.nno3+'</strong></li>'+
                  '<li> N-NO2- (mg/l):<strong class="text-primary">'+v.nno2+'</strong></li>'+
                  '<li> N-NH4+ (mg/l):<strong class="text-primary">'+v.nnh4+'</strong></li>'+
                  '<li> Nt (mg/l):<strong class="text-primary">'+v.nt+'</strong></li>'+
                  '<li> N-Kjeldall (mg/l):<strong class="text-primary">'+v.kjendall+'</strong></li>'+
                  '<li> (PO4)3- (mg/l):<strong class="text-primary">'+v.po4+'</strong></li>'+
                  '<li> P (mg/l):<strong class="text-primary">'+v.p+'</strong></li>'+
                  '<li> Pt (mg/l):<strong class="text-primary">'+v.pt+'</strong></li>'+
                  '<li> B (mg/l):<strong class="text-primary">'+v.b+'</strong></li>'+
                  '</ol>'+
                  '</li>';

          $ul_sanitarios+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >DBO5 (mg/l):<strong class="text-primary">'+v.dbo5+'</strong></li>'+
                  '<li >DQO (mg/l):<strong class="text-primary">'+v.dqo+'</strong></li>'+
                  '<li >Coliformes fecales (NMP/100 ml):<strong class="text-primary">'+v.coli_feca+'</strong></li>'+
                  '<li >Coliformes totales (NMP/100 ml):<strong class="text-primary">'+v.coli_tot+'</strong></li>'+
                  '<li >Salmonella spp (NMP/100 ml):<strong class="text-primary">'+v.salmonella+'</strong></li>'+
                  '<li >Bacterias colif. termorresistentes UFC/100 ml:<strong class="text-primary">'+v.bact_coli+'</strong></li>'+
                  '</ol>'+
                  '</li>';

          $ul_metales+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >Zn (mg/l):<strong class="text-primary">'+v.zn+'</strong></li>'+
                  '<li >Cd (mg/l):<strong class="text-primary">'+v.cd+'</strong></li>'+
                  '<li >Pb (mg/l):<strong class="text-primary">'+v.pb+'</strong></li>'+
                  '<li >Fe (mg/l):<strong class="text-primary">'+v.fe+'</strong></li>'+
                  '<li >Mn (mg/l):<strong class="text-primary">'+v.mn+'</strong></li>'+
                  '<li >Cu (mg/l):<strong class="text-primary">'+v.cu+'</strong></li>'+
                  '<li >Hg (mg/l):<strong class="text-primary">'+v.hg+'</strong></li>'+
                  '<li >As (mg/l):<strong class="text-primary">'+v.as+'</strong></li>'+
                  '<li >Cr (mg/l):<strong class="text-primary">'+v.cr+'</strong></li>'+
                  '<li >Ni (mg/l):<strong class="text-primary">'+v.ni+'</strong></li>'+
                  '<li >Sb (mg/l):<strong class="text-primary">'+v.sb+'</strong></li>'+
                  '<li >Se (mg/l):<strong class="text-primary">'+v.se+'</strong></li>'+
                  '</ol>'+
                  '</li>';
      });
      $ul_gen+='</li>';
      $ul_fisico+='</li>';
      $ul_gases+='</li>';
      $ul_quimicos+='</li>';
      $ul_nutrientes+='</li>';
      $ul_sanitarios+='</li>';
      $ul_metales+='</li>';

      $('#general_remas').append($ul_gen);
      $('#fisico_remas').append($ul_fisico);
      $('#gases_remas').append($ul_gases);
      $('#quimicos_remas').append($ul_quimicos);
      $('#nutrientes_remas').append($ul_nutrientes);
      $('#sanitarios_remas').append($ul_sanitarios);
      $('#metales_remas').append($ul_metales);

      $('#myModal').modal('show');
  }

  function modalRemli(campanias,data,cod){
      $datos_generales='';
      $ul_gen='';
      $ul_fisico='';
      $ul_gases='';
      $ul_quimicos='';
      $ul_nutrientes='';
      $ul_sanitarios='';
      $ul_metales='';

      $('#cod_remas').html(cod)
      $ul_gen+='<ul class="list-inline">';
      $ul_fisico+='<ul class="list-inline">';
      $ul_gases+='<ul class="list-inline">';
      $ul_quimicos+='<ul class="list-inline">';
      $ul_nutrientes+='<ul class="list-inline">';
      $ul_sanitarios+='<ul class="list-inline">';

      $datos_generales+='<li >Pto:<strong class="text-primary">'+data.pto+'</strong></li>'+
              '<li >Pais:<strong class="text-primary">'+data.pais+'</strong></li>'+
              '<li >Zona Hidrologica:<strong class="text-primary">'+data.zona_hidrologica+'</strong></li>'+
              '<li >Red:<strong class="text-primary">'+data.red+'</strong></li>'+
              '<li >Nro Red:<strong class="text-primary">'+data.nro_red+'</strong></li>'+
              '<li >Nombre de Zona Hidrologica TDPS:<strong class="text-primary">'+data.nombre_hidrologica+'</strong></li>'+
              '<li >Coordenada Este:<strong class="text-primary">'+data.coor_este+'</strong></li>'+
              '<li >Coordenada Norte:<strong class="text-primary">'+data.coor_oeste+'</strong></li>'+
              '<li >Altura(msnm):<strong class="text-primary">'+data.altura+'</strong></li>'+
              '<li >Departamento:<strong class="text-primary">'+data.dpto+'</strong></li>'+
              '<li >Nombre de Estacion:<strong class="text-primary">'+data.estacion+'</strong></li>';

      $('#datos_generales').append($datos_generales);
      $(campanias).each(function(k,v){
          $ul_gen+='<li>'+
                  '<ol>'+

                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >Codigo campaña: <strong>'+v.cod_campania+'</strong></li>'+
                  '<li >Laboratorio Responsable: <strong>'+v.laboratorio+'</strong></li>'+
                  '<li >Fecha d/m/A: <strong>'+v.fecha+'</strong></li>'+
                  '<li >Hora H:m: <strong>'+v.hora+'</strong></li>'+
                  '<li >Profundidad. (m): <strong>'+v.prof+'</strong></li>'+
                  '</ol>'+
                  '</li>';
          $ul_fisico+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+

                  '<li >PH:<strong class="text-primary">'+v.ph+'</strong>  <button  onclick="charts_remas(\'remas\',\'ph\')" class="btn btn-primary  btn-xs ">Graficar</button></li>'+
                  '<li >CEV (uS/cm):<strong class="text-primary">'+v.ce+'</strong><a href="###" onclick="charts_remas(\'remas\',\'ce\')" class="text-warning ">Graficar</a></i>'+
                  '<li >T (°C):<strong class="text-primary">'+v.temperatura+'</strong></li>'+
                  '<li >TURBIEDAD(NTU):<strong class="text-primary">'+v.turbiedad+'</strong></li>'+
                  '<li >Color:<strong class="text-primary">'+v.color+'</strong></li>'+
                  '<li >SST(mg/l):<strong class="text-primary">'+v.sst+'</strong></li>'+
                  '<li >SDT(mg/l):<strong class="text-primary">'+v.sdt+'</strong></li>'+
                  '<li >Disco Sechi:<strong class="text-primary">'+v.disco+'</strong></li>'+
                  '</ol>'+
                  '</li>';

          $ul_gases+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+

                  '<li >CO2(mg/l):<strong class="text-primary">'+v.co+'</strong></li>'+
                  '<li> OD(mg/l):<strong class="text-primary">'+v.od+'</strong></li>'+
                  '<li> OD Saturado (mg/l):<strong class="text-primary">'+v.od_satu+'</strong></li>'+
                  '<li> Saturación (%):<strong class="text-primary">'+v.saturacion+'</strong></li>'+
                  '<li> HS2(mg/l):<strong class="text-primary">'+v.hs+'</strong></li>'+
                  '</ol>'+
                  '</li>';


          $ul_quimicos+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >Ca (mg/l):<strong class="text-primary">'+v.ca+'</strong></li>'+
                  '<li> Mg (mg/l):<strong class="text-primary">'+v.mg+'</strong></li>'+
                  '<li> Na (mg/l):<strong class="text-primary">'+v.na+'</strong></li>'+
                  '<li> K (mg/l):<strong class="text-primary">'+v.k+'</strong></li>'+
                  '<li> Na + K (mg/l):<strong class="text-primary">'+v.na_k+'</strong></li>'+
                  '<li> CO3 (mg/l):<strong class="text-primary">'+v.co2+'</strong></li>'+
                  '<li> CO3H (mg/l):<strong class="text-primary">'+v.co2h+'</strong></li>'+
                  '<li> Cl (mg/l):<strong class="text-primary">'+v.ci+'</strong></li>'+
                  '<li> (SO4)2- (mg/l):<strong class="text-primary">'+v.so4+'</strong></li>'+
                  '<li> Alcalinidad (mg/l) CaCO3:<strong class="text-primary">'+v.alcalinidad+'</strong></li>'+
                  '<li> Dureza total (mg/l) CaCO3:<strong class="text-primary">'+v.dureza +'</strong></li>'+
                  '</ol>'+
                  '</li>';


          $ul_nutrientes+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >SiO3 (mg/l):<strong class="text-primary">'+v.sio3+'</strong></li>'+
                  '<li> N-NO3- (mg/l):<strong class="text-primary">'+v.nno3+'</strong></li>'+
                  '<li> N-NO2- (mg/l):<strong class="text-primary">'+v.nno2+'</strong></li>'+
                  '<li> N-NH4+ (mg/l):<strong class="text-primary">'+v.nnh4+'</strong></li>'+
                  '<li> Nt (mg/l):<strong class="text-primary">'+v.nt+'</strong></li>'+
                  '<li> N-Kjeldall (mg/l):<strong class="text-primary">'+v.kjendall+'</strong></li>'+
                  '<li> (PO4)3- (mg/l):<strong class="text-primary">'+v.po4+'</strong></li>'+
                  '<li> P (mg/l):<strong class="text-primary">'+v.p+'</strong></li>'+
                  '<li> Pt (mg/l):<strong class="text-primary">'+v.pt+'</strong></li>'+
                  '<li>Si (mg/l):<strong class="text-primary">'+v.si+'</strong></li>'+
                  '<li> B (mg/l):<strong class="text-primary">'+v.b+'</strong></li>'+
                  '</ol>'+
                  '</li>';

          $ul_sanitarios+='<li>'+
                  '<ol>'+
                  '<li  class="text-warning">Campaña:<strong>'+v.campania+'</strong></li>'+
                  '<li >DBO5 (mg/l):<strong class="text-primary">'+v.dbo5+'</strong></li>'+
                  '<li >DQO (mg/l):<strong class="text-primary">'+v.dqo+'</strong></li>'+
                  '<li >Coliformes fecales (NMP/100 ml):<strong class="text-primary">'+v.coli_feca+'</strong></li>'+
                  '<li >Coliformes totales (NMP/100 ml):<strong class="text-primary">'+v.coli_tot+'</strong></li>'+
                  '<li >Salmonella spp (NMP/100 ml):<strong class="text-primary">'+v.salmonella+'</strong></li>'+
                  '<li >Clorofila A (mg/m3):<strong class="text-primary">'+v.clorofilla+'</strong></li>'+
                  '<li >Conteo de algas:<strong class="text-primary">'+v.cont_algas+'</strong></li>'+
                  '<li >Conteo zooplancton:<strong class="text-primary">'+v.cont_plancton+'</strong></li>'+
                  '<li >Conteo bentos:<strong class="text-primary">'+v.cont_bentos+'</strong></li>'+
                  '</ol>'+
                  '</li>';
      });
      $ul_gen+='</li>';
      $ul_fisico+='</li>';
      $ul_gases+='</li>';
      $ul_quimicos+='</li>';
      $ul_nutrientes+='</li>';
      $ul_sanitarios+='</li>';

      $('#general_remas').append($ul_gen);
      $('#fisico_remas').append($ul_fisico);
      $('#gases_remas').append($ul_gases);
      $('#quimicos_remas').append($ul_quimicos);
      $('#nutrientes_remas').append($ul_nutrientes);
      $('#sanitarios_remas').append($ul_sanitarios);

      $('#myModal').modal('show');
  }


  function buscarCampaniasRemas(cod){

            $('#datos_generales').empty();
            $('#general_remas').empty();
            $('#fisico_remas').empty();
            $('#gases_remas').empty();
            $('#quimicos_remas').empty();
            $('#nutrientes_remas').empty();
            $('#sanitarios_remas').empty();
            $('#metales_remas').empty();
             $('#reportes').empty();

      $url='/remas/buscarCampanias/'+cod;

      $.ajax({
          url:$url,
          method:'GET',

          dataType:'json',
          success:function(response,status,xhr){
              if(response.status==true){
                  data_charts=response.campanias;

                  switch(response.tipo){
                      case 'rema':modalRemas(response.campanias,response.datos,cod);break;
                      case 'remfc':modalRemfc(response.campanias,response.datos,cod);break;
                      case 'remli':modalRemli(response.campanias,response.datos,cod);break;
                  }

              }
              else{
                  alert('No se enontro el codigo')
              }
          },
          error:function(xhr,status,error){
              alert(error);

          }

      });

  }

   function bajar() {
      window.location='http://google.com';

  }
        function abrirLayer(archivo,id,tipo){


            layers[id]=new google.maps.KmlLayer(archivo,
                    {preserveViewport: false, suppressInfoWindows: true});
            layers[id].setMap(map);




//            var placemarkInfo = new google.maps.InfoWindow();

            google.maps.event.addListener(layers[id], 'click', function (kmlEvent) {
                var codigo = kmlEvent.featureData.name;

                var text = kmlEvent.featureData.description;
                var info=kmlEvent.featureData.infoWindowHtml;
                var info2=kmlEvent.featureData.snippet;
                var clickPos = kmlEvent.latLng;

                alert(codigo)


                if(tipo=='pm') {
                    var content = '<div id="iw-container">' +
                            '<div class="iw-title">' + codigo + '</div>' +
                            '<div class="iw-content">' +
                            '<div class="iw-subTitle">' + info + '</div>' +
                            '<p><a class="btn btn-warning"  id="' + codigo + '" onclick="buscarCampaniasRemas(this.id);"><i class="fa fa-eye"></i> Ver Detalles</a><br>' + '</div>' +
                            '</div>';


                }
                else{
                    var content = '<div id="iw-container">' +
                            '<div class="iw-title">' + codigo + '</div>' +
                            '<div class="iw-content">' +
                            '<div class="iw-subTitle">' + info + '</div>' +
                            '<p><a class="btn btn-warning"  id="' + codigo + '" onclick="buscarCampaniasRemas(this.id);"><i class="fa fa-eye"></i> Ver Detalles</a><br>' + '</div>' +

                            '</div>';

                }

                var posX = new google.maps.LatLng(clickPos.lat(), clickPos.lng());

                var infowindow = new google.maps.InfoWindow({
                    content:content,
                    maxWidth:250
                });
                infowindow.setPosition(posX);
//                infowindow.setContent(content);
                infowindow.open(map);

//                infowindow.setContent( info );
//                infowindow.open( $('#map'), layer.marker );

                showInContentWindow(info);
//
            });
            i++;
        }
        function showInContentWindow(text) {
            var sidediv = document.getElementById('content-window');

            sidediv.innerHTML = text;
        }

        $(function(){
            $('.sidebar-left .slide-submenu').on('click',function() {
                var thisEl = $(this);
                thisEl.closest('.sidebar-body').fadeOut('slide',function(){
                    $('.mini-submenu-left').fadeIn();
                    applyMargins();
                });
            });

            $('.mini-submenu-left').on('click',function() {
                var thisEl = $(this);
                $('.sidebar-left .sidebar-body').toggle('slide');
                thisEl.hide();
                applyMargins();
            });

            $('.sidebar-right .slide-submenu').on('click',function() {
                var thisEl = $(this);
                thisEl.closest('.sidebar-body').fadeOut('slide',function(){
                    $('.mini-submenu-right').fadeIn();
                    applyMargins();
                });
            });

            $('.mini-submenu-right').on('click',function() {
                var thisEl = $(this);
                $('.sidebar-right .sidebar-body').toggle('slide');
                thisEl.hide();
                applyMargins();
            });

            $(window).on("resize", applyMargins);


            applyInitialUIState();
            applyMargins();
        });
    </script>
</head>
<body>

<div class="container">

    <div class="modal fade charts-modal" style="z-index: 100000" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Grafico <span id="titulo_chart"></span></h4>
                </div>
                <div class="js-loading text-center">
                    <h3>Cargando...</h3>
                </div>
                <div id="area-example"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div   class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width:80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Codigo : <span  class="text-warning" id="cod_remas"></span></h4>

                    <ul class="list-inline" id="datos_generales" style="font-size: 11px">

                    </ul>

                </div>
                <div class="modal-body">
                    <div class="tabs">
                        <ul class=" col-md-12 nav nav-tabs" style="font-size:11px">
                            <li class="active">
                                <a href="#general_remas" data-toggle="tab"><i class="fa fa-star"></i> Generales</a>
                            </li>
                            <li >
                                <a href="#fisico_remas" data-toggle="tab"  >Parametros <br>fisicos</a>
                            </li>
                            <li>
                                <a href="#gases_remas" data-toggle="tab" >Gases</a>
                            </li>
                            <li>
                                <a href="#quimicos_remas" data-toggle="tab" >Parametros Quimicos</a>
                            </li>
                            <li>
                                <a href="#nutrientes_remas" data-toggle="tab" >Nutrientes</a>
                            </li>
                            <li>
                                <a href="#sanitarios_remas" data-toggle="tab" >Indicadores <br>sanitarios Biologicos</a>
                            </li>
                            <li>
                                <a href="#metales_remas" data-toggle="tab" >Metales y <br>no Metales trazas</a>
                            </li>
                            <li>
                                <a href="#reportes" data-toggle="tab" >Reporte</a>
                            </li>
                        </ul>
                        <div class="tab-content" style="font-size: 12px;">
                            <div id="general_remas" class="tab-pane active">


                            </div>
                            <div id="fisico_remas" class="tab-pane ">


                                <div  id="graficos_fisico_rema" class=" pull-right col-md-3 " >
                                </div>
                            </div>
                            <div id="gases_remas" class="tab-pane">



                            </div>
                            <div id="quimicos_remas" class="tab-pane">


                            </div>
                            <div id="nutrientes_remas" class="tab-pane">


                            </div>
                            <div id="sanitarios_remas" class="tab-pane">




                            </div>
                            <div id="metales_remas" class="tab-pane">



                            </div>

                            <div id="reportes" class="tab-pane">



                            </div>
                        </div>
                    </div>
                </div>
                
                    
                    
                
            </div>
        </div>
    </div>



    <nav class="navbar navbar-fixed-top navbar-default  " role="navigation">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->


            <div class="navbar-header ">
                <button type="button "  class=" navbar-toggle"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-left"><img style="max-width:65px; padding: 4px; margin-top: -7px;"  class="image-responsive" src="<?php echo e(asset('img/logo.png')); ?>" alt=""></a>

                <a class="hidden-xs navbar-brand" href=""  >Universidad Tecnica de Oruro  - Sistema de Redes de Monitoreo de Calidad de Aguas </a>

            </div>

            <div class="navbar-header ">
                <button type="button "  class=" navbar-toggle"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo e(url('/login')); ?>"><i class="fa fa-gears"></i> Admin</a></li>
                    <li class="dropdown">
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>

                
                    

                        
                            
                                
                            
                            
                                
                            
                            

                                
                                    

                                    
                                        
                                            

                                                
                                                    
                                                        
                                                        
                                                            
                                                                
                                                                    
                                                                
                                                            
                                                        

                                                    
                                                

                                            
                                            
                                                
                                                    
                                                        
                                                        
                                                            
                                                                
                                                                    
                                                                
                                                            
                                                        

                                                    
                                                
                                            
                                            
                                                
                                                    
                                                        
                                                        
                                                            
                                                                
                                                                    
                                                                
                                                            
                                                        

                                                    
                                                
                                            



                                        

                                    

                                
                            


                        
                    

                    
                        
                        
                            
                                

                            
                            
                                
                                
                                    

                                        
                                            
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                    
                                

                            
                            
                                
                                
                                    
                                        
                                            
                                        
                                    

                                
                            
                        

                    
                    
                        
                        

                            
                                
                            
                            
                                
                                
                                    

                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                
                                            
                                        
                                    
                                

                            
                            
                                
                                
                                    
                                        
                                            
                                        
                                    

                                
                            
                        
                    




                
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>
</div>
</nav>
<div class="navbar-offset"></div>



<div id="map">
</div>



<div class="row main-row">
    <div class="col-sm-3 col-md-3 sidebar sidebar-left pull-left" >
        <div class="panel-group sidebar-body " id="accordion-left" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">


                        <a data-toggle="navbar-collapse" href="#layers">
                            <i class="fa fa-list-alt"></i>
                           TDPS - CUENCAS
                        </a>
                        <span class="pull-right slide-submenu">
                    <i class="fa fa-chevron-left"></i>
                  </span>
                    </h4>
                </div>
                <div id="layers" class="panel-collapse collapse in">
                    <div class="panel-body list-group">
                            
                                
                            

                        <div id="treeCheckbox"  style=" margin-left:-22px;overflow-y: auto; height:500px; overflow-x:hidden " >

                            <ul >
                                <li class="jstree-open" >TDPS

                                    <ul>
                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($bolivia->archivo); ?>">
                                        <?php echo e($bolivia->nombre); ?>  / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($bolivia->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                        </li>
                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($peru->archivo); ?>">
                                          <?php echo e($peru->nombre); ?>    / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($peru->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                        </li>
                                        <?php $__currentLoopData = $tdps->where('tipo','tdps'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $td): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <li data-jstree='{ "enabled" : true,"icon":"fa fa-globe"}' tipo="tdps"  label="<?php echo e($td->archivo); ?>">
                                                <?php echo e($td->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($td->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>

                                                <ul>
                                                    <?php $__currentLoopData = $zh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moni): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($td->id==19): ?>

                                                            <?php if($moni->estado_remas=='1'): ?>
                                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="<?php echo e($moni->archivo_remas); ?>" >
                                                              <?php echo e($moni->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($moni->archivo_remas); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                            <ul>
                                                                <?php $__currentLoopData = $moni->puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                    <li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="<?php echo e($punto->archivo); ?>">
                                                                       <?php echo e($punto->nombre); ?>  / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            </ul>

                                                        </li>
                                                                <?php endif; ?>

                                                        <?php endif; ?>
                                                        <?php if($td->id==20): ?>
                                                                <?php if($moni->estado_remfc=='1'): ?>
                                                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="<?php echo e($moni->archivo_remfc); ?>" >
                                                                 <?php echo e($moni->nombre); ?>  / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($moni->archivo_remfc); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                    <ul>
                                                                        <?php $__currentLoopData = $moni->puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="<?php echo e($punto->archivo); ?>">
                                                                               <?php echo e($punto->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    </ul>

                                                                </li>
                                                                 <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if($td->id==21): ?>
                                                                <?php if($moni->estado_remli=='1'): ?>
                                                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="<?php echo e($moni->archivo_remli); ?>" >
                                                                  <?php echo e($moni->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($moni->archivo_remli); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                    <ul>
                                                                        <?php $__currentLoopData = $moni->puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="<?php echo e($punto->archivo); ?>">
                                                                                <?php echo e($punto->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                            </li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    </ul>

                                                                </li>
                                                        <?php endif; ?>
                                                        <?php endif; ?>



                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                </ul>

                                                  </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                            </ul>
                                </li>

                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}'label="<?php echo e($poopo->archivo); ?>" >
                                   <?php echo e($poopo->nombre); ?> / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($poopo->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                    <ul>
                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($sub_poopo->archivo); ?>">
                                           <?php echo e($sub_poopo->nombre); ?>  / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($sub_poopo->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>

                                        </li>
                                        <li>
                                          Escala 1:50000
                                            <ul>
                                                <?php $__currentLoopData = $sub_poopo_5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                    <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($sub->archivo); ?>">
                                                        <?php echo e($sub->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($sub->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                        <ul>
                                                            <?php $__currentLoopData = $sub->puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($punto->archivo); ?>">
                                                                    <?php echo e($punto->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </ul>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </ul>

                                        </li>
                                        <li>
                                            Escala 1:1000000
                                            <ul>
                                                <?php $__currentLoopData = $sub_poopo_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($punto->archivo); ?>">
                                                       <?php echo e($punto->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($coipasa->archivo); ?>">
                                     <?php echo e($coipasa->nombre); ?>  / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($coipasa->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                        <ul>

                                               <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($sub_coi->archivo); ?>">
                                                <?php echo e($sub_coi->nombre); ?>  / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($sub_coi->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                               </li>
                                                 <li>
                                                     Escala 1:50000
                                                           <ul>
                                                             <?php $__currentLoopData = $sub_coipasa_5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                                  <li data-jstree='{ "icon":"fa fa-globe"}' label="<?php echo e($sub->archivo); ?>">
                                                                    <?php echo e($sub->nombre); ?> / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($sub->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>                                                                         <ul>
                                                                          <?php $__currentLoopData = $sub->puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="<?php echo e($punto->archivo); ?>">
                                                                              <?php echo e($punto->nombre); ?>   / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                               </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                          </ul>
                                                                     </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                              </ul>

                                                 </li>
                                <li>
                                    Escala 1:1000000
                                    <ul>
                                        <?php $__currentLoopData = $sub_coipasa_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $punto1): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li data-jstree='{"icon":"fa fa-globe"}' label="<?php echo e($punto1->archivo); ?>">
                                               <?php echo e($punto1->nombre); ?> / <span><a  href="" onclick="javascript:location.href='<?php echo e(asset('mapas')); ?>/<?php echo e($punto1->archivo); ?>'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                    </ul>
                                </li>
                                </ul>
                                </li>




                                </ul>


                        </div>

                    </div>
                </div>
            </div>
            
                
                    
                        
                            
                            
                        
                    
                
                
                    
                        

                        
                            
                        
                        
                            
                        
                        
                            
                        
                        
                            
                        
                    
                
            
        </div>
    </div>
    <div class="col-sm-4 col-md-6 mid"></div>
    <div class="col-sm-4 col-md-3 sidebar sidebar-right pull-right">
        
            
                
                    
                        
                            
                            
                        
                        
                    
                  
                    
                
                
                    
                        
                            
                        
                        
                            
                        
                        
                            
                        
                        
                            
                        
                    
                
            
        
    </div>
</div>
<div class="mini-submenu mini-submenu-left pull-left">
    <i class="fa fa-list-alt"></i>
</div>
<div class="mini-submenu mini-submenu-right pull-right">
    <i class="fa fa-tasks"></i>
</div>
</div>

</body>
</html>


