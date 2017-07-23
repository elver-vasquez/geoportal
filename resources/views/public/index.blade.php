<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cuencas </title>
    <link rel="stylesheet" href="{{asset('assets/css/ol.css')}}" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" />
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/jstree/themes/default/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" />

    @include('includes.public_style')
    <style type="text/css">
        body { overflow: hidden; }

        .navbar-offset { margin-top: 50px;   }
        #map { position: absolute; top: 50px; bottom: 0px; left: 0px; right: 0px; }
        #map .ol-zoom { font-size: 1.2em; }
        #treeCheckbox {
            font-size: 10px; !important;

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
    <script type="text/javascript" src="{{asset('assets/js/ol.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>

    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jstree/jstree.js')}}"></script>
    <script src="{{asset('assets/vendor/morris/morris.js')}}"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZIkv7ehocFWTZot3h0AQlAH1OIZ4_oAU&callback=initMap">
    </script>
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.13&sensor=false"></script>--}}


    <script type="text/javascript">
//        $(function(){
//           alert('asd')
//        });
        console.log(formula('cl',0.1));

        function formula(tipo,valor){
            let x;
            let q;
            let result={};
            if(isNaN(valor) || valor==null || valor=='' ){
               result={
                    q:0,
                    a:0
                }
                return result;

            }
            else {
                x = valor

                switch (tipo) {
                    case 'ph':
                        q=0;
                    if (x > 0 && x <= 4.5)
                        q = 0
                    else if (x > 4.5 && x <= 6.5)
                        q = (30 * x)-135
                    else if (x > 6.5 && x <= 7.5)
                        q = (40 * x)-200
                    else if (x > 7.5 && x <= 10)
                        q = 400-(40 * x)

                    result={q:q,a:1}
                    break;

                    case 'coli_tot':
                        q=0;
                        if (x > 0 && x <= 10)
                            q = 100;
                        else if (x > 10 && x <= 3000)
                            q = 140-(40.26*Math.log10(x))
                        else if (x >3000 )
                            q =0
                        result={q:q,a:1}
                        break;

                    case 'ce':
                        q=0;
                        if (x > 0 && x <= 250)
                            q = 100;
                        else if (x > 250 && x <= 1000)
                            q = 120-(0.08*x)
                        else if (x >1000 && x<=2000 )
                            q =80-(0.04*x)
                        result={q:q,a:1}
                        break;

                    case 'dqo':

                        q =(35000/(27*x+300))-(50/3)
                        result={q:q,a:0.33333333}
                        break;

                    case 'dbo':

                        q =(7000/(9*x+60))-(50/3)
                        result={q:q,a:1}
                        break;


                    case 'od':
                        q=0;
                        if (x > 0 && x <= 0.5)
                            q = 0;
                        else if (x > 0.5 && x <=8)
                            q = ((40*x)-20)/3
                        else if (x >8 && x<=14 )
                            q =100
                        else if (x >14 && x<=19 )
                            q =-(20*x)+380
                        result={q:q,a:1}
                        break;

                    case 'sst':
                        q=0;
                        if (x > 0 && x <= 30)
                            q = 100;
                        else if (x > 30 && x <=120)
                            q = (1020-(4*x))/9
                        else if (x >120 && x<=450 )
                            q =(450-x)/5.5
                        else if (x >450 && x<=480 )
                            q =0
                        result={q:q,a:1}
                        break;

                    case 'cloruro':
                        q=0;
                        if (x > 0 && x <= 400)
                            q = 100-(0.1*x);
                        else if (x >400 && x <=2000)
                            q =75-(0.0375*x)

                        result={q:q,a:0.5}
                        break;

                    case 'p':
                        q=0;
                        if (x > 0 && x <= 3.75)
                            q = (1500-(400*x))/15
                        else if (x >3.75)
                            q =0
                        result={q:q,a:0.33333333}
                        break;

                    case 'nitrato':
                        q=0;
                        if (x > 0 && x <= 250)
                            q = 100-(0.4*x)
                        else if (x >250)
                            q =0
                        result={q:q,a:0.33333333}
                        break;


                    case 'hs':
                        q=0;
                        if (x > 0 && x <= 1250)
                            q = 100-(0.08*x)
                        else if (x >1250 && x<=1600)
                            q =0
                        result={q:q,a:0.5}
                        break;

                    case 'ca':
                        q=0;
                        if (x > 0 && x <= 5)
                            q = 50
                        else if (x >5 && x<=200)
                            q =100
                        else if (x >200 && x<=2000)
                            q =(2000-x)/30
                        result={q:q,a:0.33333333}
                        break;

                    case 'mg':
                        q=0;
                        if (x > 0 && x <= 150)
                            q = 100-((4*x)/15)
                        else if (x >150 && x<=1000)
                            q =(6/85)*(1000-x)
                        result={q:q,a:0.25}
                        break;

                    case 'na':
                        q=0;
                        if (x > 0 && x <=200)
                            q = 100-(0.25*x)
                        else if (x >200 && x<=1000)
                            q =(1000-x)/16
                        result={q:q,a:0.25}
                        break;

                    case 'cu':
                        q=0;
                        if (x > 0 && x <=0.01)
                            q = 100
                        else if (x >0.01 && x<=1)
                            q =101-(101*x)
                        result={q:q,a:0.5}
                        break;
                    case 'zn':
                        q=0;
                        if (x > 0 && x <=5)
                            q = 100-(20*x)
                        else if (x >5)
                            q =0
                        result={q:q,a:1}
                        break;
                    case 'cd':
                        q=0;
                        if (x > 0 && x <=0.01)
                            q = 100-(10000*x)
                        else if (x >0.01)
                            q =0
                        result={q:q,a:1}
                        break;

                    case 'pb':
                        q=0;
                        if (x > 0 && x <=0.2)
                            q = 100-(500*x)

                        result={q:q,a:1}
                        break;
                    case 'cianuro':
                        q=0;
                        if (x > 0 && x <=0.025)
                            q = 100-(4000*x)
                        else if (x >0.025)
                            q =0
                        result={q:q,a:1}
                        break;

                    case 'cr':
                        q=0;
                        if (x > 0 && x <=0.125)
                            q = 100-(800*x)
                        else if (x >0.125)
                            q =0
                        result={q:q,a:1}
                        break;
                     }//fin de switch
                         return result;

            }

        }
  var url_punto=window.location+'mapas/tdps/puntos/';
  var url_tdps=window.location+'mapas/tdps/';
  var url_cuenca=window.location+'mapas/cuencas/';
  var url_mapa='http://geopostgradouto.com/mapas/';

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
//                alert(archivo+'  '+id+' '+tipo)



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
                 var label=tipo;
                 $(".charts-modal").on("shown.bs.modal", function () {

                     setTimeout(function(){

                       $('#area-example').empty();
                         new Morris.Line({
                             element: 'area-example',
                             data: aux,
                             xkey: 'anio',
                             ykeys: ['value'],
                             labels: [label]
                         });

                         // When you open modal several times Morris charts over loading. So this is for destory to over loades Morris charts.
                         // If you have better way please share it.
                         if($('#area-example').find('svg').length >1){


                             // Morris Charts creates svg by append, you need to remove first SVG
                             $('#area-example svg:first').remove();

                             // Also Morris Charts created for hover div by prepend, you need to remove last DIV
                             $(".morris-hover:last").remove();

                         }


                         // Smooth Loading
                         $('.js-loading').addClass('hidden');
                     },1);

                 }).modal('show')

             }
        function modalRemas(campanias,data,cod){
            $('[href="#metales_remas"]').closest('li').show();
            $('[href="#reportes"]').closest('li').show();

              let datos=[];
            $(campanias).each(function(k,v){
                let ph=formula('ph',v.ph)
                let coli_tot=formula('coli_tot',v.coli_tot)
                let ce=formula('ce',v.ce)
                let dqo=formula('dqo',v.dqo)
                let dbo=formula('dbo',v.dbo5)
                let od=formula('od',v.od)
                let sst=formula('sst',v.sst)
                let cloruro=formula('cloruro',v.cloruro)
                let p=formula('p',v.p)
                let nitrato=formula('nitrato',v.nitrato)
                let hs=formula('hs',v.hs)
                let ca=formula('ca',v.ca)
                let mg=formula('mg',v.mg)
                let na=formula('na',v.na)
                let cu=formula('cu',v.cu)
                let zn=formula('zn',v.zn)
                let cd=formula('cd',v.cd)
                let pb=formula('pb',v.pb)
                let cianuro=formula('cianuro',v.cianuro)
                let cr=formula('cr',v.cr)

                let total=0;

                 let suma= ph.a+coli_tot.a+ce.a+dqo.a+dbo.a+od.a+sst.a+cloruro.a+p.a+nitrato.a+hs.a+ca.a+mg.a+na.a+cu.a+zn.a+cd.a+pb.a+cianuro.a+cr.a;

                total=((ph.a/suma)*ph.q)+((coli_tot.a/suma)*coli_tot.q)+((ce.a/suma)*ce.q)+((dqo.a/suma)*dqo.q)+((dbo.a/suma)*dbo.q)+((od.a/suma)*od.q)+((sst.a/suma)*sst.q)+((cloruro.a/suma)*cloruro.q)+((p.a/suma)*p.q)+((nitrato.a/suma)*nitrato.q)+((hs.a/suma)*hs.q)+((ca.a/suma)*ca.q)+((mg.a/suma)*mg.q)+((na.a/suma)*na.q)+((cu.a/suma)*cu.q)+((zn.a/suma)*zn.q)+((cd.a/suma)*cd.q)+((pb.a/suma)*pb.q)+((cianuro.a/suma)*cianuro.q)+((cr.a/suma)*cr.q);

               datos.push({
                   campania:v.campania,
                   total:total,
                   fecha:v.fecha
               })

            });
            $tabla_totales='<table  class="table tablas">'+
                '<thead>' +
                '<tr><th>CAMPAÑAS</th>'+

                '<th>ICG</th></tr></thead>';
            datos.forEach(function(v,k){

                clase='';
                if(v.total>=85 && v.total<=100)
                    clase='claseE'
                else if(v.total>=75 && v.total<85)
                    clase='claseC'
                else if(v.total>=65 && v.total<75)
                    clase='claseH'
                else if(v.total>=50 && v.total<65)
                    clase='claseD'
                else if(v.total<50)
                    clase='claseF'

                $tabla_totales+='<tr><th>CAMPAÑA '+v.campania+'</th><th class="'+clase+'" style="font-size: 14px; text-align: center" >'+v.total.toFixed(2)+'</th></tr>'
            })
            $tabla_totales+='</table>'
                   $('#div_icg').empty()
                   $('#div_icg').append($tabla_totales)
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

            $tabla='<table border="1" class="table tablas">'+
                '<thead>' +
                '<tr><th>DESC</th>';
            $(campanias).each(function(k,v){
                $tabla+='<th>CAMPAÑA '+v.campania+'</th>'
            });

            $tabla+='</tr></thead>';
            $tabla+='<tbody>';
            $tabla+='<tr><th>CODIGO</th>';
            $(campanias).each(function(k,v){
                $tabla+='<td>'+v.cod_campania+'</td>'
            });
            $tabla+='</tr>';

            $tabla+='<tr><th>LABO.<br>RESPON</th>';
            $(campanias).each(function(k,v){
                $tabla+='<td>'+v.laboratorio+'</td>'
            });
            $tabla+='</tr>';

            $tabla+='<tr><th>FECHA/HORA</th>';
            $(campanias).each(function(k,v){
                $tabla+='<td>'+v.fecha+'|'+v.hora+'</td>'
            });
            $tabla+='</tr>';

            $tabla+='<tr><th>CAUDAL m3/s</th>';
            $(campanias).each(function(k,v){
                $tabla+='<td>'+v.caudal+'</td>'
            });
            $tabla+='</tr>';

            $tabla+='</tbody>';
            $tabla+='</table>';


            $tabla_fisicos='<table class="table table-responsive tablas">'+
                '<thead>' +
                '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
            $(campanias).each(function(k,v){
                $tabla_fisicos+='<th> '+v.campania+'</th>'
            });
            $tabla_fisicos+='</tr></thead>';
            $tabla_fisicos+='<tbody>';

            $tabla_fisicos+='<tr><th><button  onclick="charts_remas(\'remas\',\'ph\')" class="btn btn-default  btn-xs "><i class="fa fa-line-chart"></i></button></th><th>PH</th><th></th><th class="claseA">6 A 8,5</th><th class="claseB">6 a 9</th><th class="claseC" >6 a 9</th><th class="claseD">6 a 9</th>';
            $(campanias).each(function(k,v){
               let clase=''
                if(v.ph>=6 && v.ph<=8.5)
                    clase='claseA'
                else if(v.ph>8.5)
                    clase='claseB'


                $tabla_fisicos+='<td class="'+clase+'">'+v.ph+'</td>'

            });
            $tabla_fisicos+='</tr>';

            $tabla_fisicos+='<tr><th><button  onclick="charts_remas(\'remas\',\'temperatura\')" class="btn btn-default  btn-xs "><i class="fa fa-line-chart"></i></button></th><th>TEMP</th><th>°C</th><th >+/-3°  C. <BR>receptor</th><th >+/-3°C. <BR> receptor</th><th  >+/-3°C.  <BR>receptor</th><th>+/-3°C.  <BR>receptor</th>';
            $(campanias).each(function(k,v){
                $tabla_fisicos+='<td>'+v.temperatura+'</td>'
            });
            $tabla_fisicos+='</tr>';

            $tabla_fisicos+='<tr><th></th><th>CONDUCTIVIDAD</th><th>uS/cm</th><th ></th><th></th><th></th><th></th>';
            $(campanias).each(function(k,v){
                $tabla_fisicos+='<td>'+v.ce+'</td>'
            });
            $tabla_fisicos+='</tr>';

            $tabla_fisicos+='<tr><th></th><th>SOLIDOS  SUSPENDIDOS</th><th>mgl</th><th class="claseA" ></th><th class="claseB"></th><th class="claseC"></th><th class="claseD"></th>';
            $(campanias).each(function(k,v){
                $tabla_fisicos+='<td>'+v.sst+'</td>'
            });
            $tabla_fisicos+='</tr>';

            $tabla_fisicos+='<tr><th></th><th>SOLIDOS  DISUELTOS TOTALES</th><th>mg/l</th><th class="claseA" ></th><th class="claseB"></th><th class="claseC"></th><th class="claseD"></th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.sdt<=1000)
                    clase='claseA'
                else if(v.sdt>1000 && v.sdt<=1500)
                    clase='claseC'

               $tabla_fisicos+='<td>'+v.sdt+'</td>'
            });
            $tabla_fisicos+='</tr>';


            $tabla_fisicos+='<tr><th><button onclick="charts_remas(\'remas\',\'turbiedad\')" class="btn btn-default  btn-xs"><i class="fa fa-line-chart"></i></button></th><th>TURBIDEZ</th><th>UNT</th><th class="claseA" ><10</th><th class="claseB"><50</th><th class="claseC"><100</th><th class="claseD"><200</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.turbiedad<=10)
                    clase='claseA'
                else if(v.turbiedad>10 && v.turbiedad<=50)
                    clase='claseB'

                else if(v.turbiedad>50 && v.turbiedad<=100)
                    clase='claseC'
                else if(v.turbiedad>100 )
                    clase='claseD'
                $tabla_fisicos+='<td class="'+clase+'">'+v.turbiedad    +'</td>'
            });
            $tabla_fisicos+='</tr>';

            $tabla_fisicos+='<tr><th></th><th>COLOR</th><th>mg/l</th><th class="claseA" ><10</th><th class="claseB"><50</th><th class="claseC"><100</th><th class="claseD"><200</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.color<=10)
                    clase='claseA'
                else if(v.color>10 && v.color<=50)
                    clase='claseB'

                else if(v.color>50 && v.color<=100)
                    clase='claseC'
                else if(v.color>100 )
                    clase='claseD'
                $tabla_fisicos+='<td class="'+clase+'">'+v.color    +'</td>'
            });
            $tabla_fisicos+='</tr>';
            $tabla_fisicos+='</tbody>';
            $tabla_fisicos+='</table>';

//                ***************GASES**********************
            $tabla_gases='<table class="table table-responsive tablas">'+
                '<thead>' +
                '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
            $(campanias).each(function(k,v){
                $tabla_gases+='<th> '+v.campania+'</th>'
            });
            $tabla_gases+='</tr></thead>';
            $tabla_gases+='<tbody>';

            $tabla_gases+='<tr><th></th><th>OXIGINENO DISUELTO</th><th>mg/l</th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
            $(campanias).each(function(k,v){
                  $tabla_gases+='<td >'+v.od+'</td>'

            });
            $tabla_gases+='</tr>';

            $tabla_gases+='<tr><th></th><th>SULFATOS</th><th>mg/l</th><th class="claseA">300</th><th class="claseB">400</th><th class="claseC" >400</th><th class="claseD">400</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.hs<=300)
                    clase='claseA'
                else if(v.hs>300 && v.hs<=400)
                    clase='claseB'

                $tabla_gases+='<td class="'+clase+'">'+v.hs+'</td>'
            });
            $tabla_gases+='</tr>';
            $tabla_gases+='</tbody>';
            $tabla_gases+='</table>';




            //                ***************QUIMICOS**********************
            $tabla_quimicos='<table class="table table-responsive tablas">'+
                '<thead>' +
                '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
            $(campanias).each(function(k,v){
                $tabla_quimicos+='<th> '+v.campania+'</th>'
            });
            $tabla_quimicos+='</tr></thead>';
            $tabla_quimicos+='<tbody>';

            $tabla_quimicos+='<tr><th></th><th>AMONIO</th><th>mg/l</th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
            $(campanias).each(function(k,v){
                $tabla_quimicos+='<td >'+v.amonio+'</td>'

            });
            $tabla_quimicos+='</tr>';

            $tabla_quimicos+='<tr><th></th><th>CLORUROS</th><th>mg/l</th><th class="claseA">250</th><th class="claseB">300</th><th class="claseC" >400</th><th class="claseD">500</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.cloruro<=250)
                    clase='claseA'
                else if(v.cloruro>250 && v.cloruro<=300)
                    clase='claseB'
                else if(v.cloruro>300 && v.cloruro<=400)
                    clase='claseB'
                else if(v.cloruro>400 && v.cloruro<=500)
                    clase='claseB'

                $tabla_quimicos+='<td class="'+clase+'">'+v.cloruro+'</td>'
            });
            $tabla_quimicos+='</tr>';

            $tabla_quimicos+='<tr><th></th><th>NITRATO</th><th>mg/l</th><th class="claseA">20</th><th class="claseB">50</th><th class="claseC" >50</th><th class="claseD">50</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.nitrato<=20)
                    clase='claseA'
                else if(v.nitrato>20 && v.nitrato<=50)
                    clase='claseB'


                $tabla_quimicos+='<td class="'+clase+'">'+v.nitrato+'</td>'
            });
            $tabla_quimicos+='</tr>';

            $tabla_quimicos+='<tr><th></th><th>NITRITO</th><th>mg/l</th><th class="claseA"><1.0</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.nitrito<1)
                    clase='claseA'
                else if(v.nitrito>=1)
                    clase='claseB'


                $tabla_quimicos+='<td class="'+clase+'">'+v.nitrito+'</td>'
            });
            $tabla_quimicos+='</tr>';


            $tabla_quimicos+='<tr><th></th><th>CALCIO</th><th>mg/l</th><th class="claseA">200</th><th class="claseB">300</th><th class="claseC" >300</th><th class="claseD">400</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.ca<=200)
                    clase='claseA'
                else if(v.ca>200 && v.ca<=300)
                    clase='claseB'
                else if(v.ca>300 && v.ca<=400)
                    clase='claseC'


                $tabla_quimicos+='<td class="'+clase+'">'+v.ca+'</td>'
            });
            $tabla_quimicos+='</tr>';


            $tabla_quimicos+='<tr><th></th><th>MAGNESIO</th><th>mg/l</th><th class="claseA">100</th><th class="claseB">100</th><th class="claseC" >150</th><th class="claseD">150</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.mg<=100)
                    clase='claseA'
                else if(v.mg>100&& v.mg<=150)
                    clase='claseC'


                $tabla_quimicos+='<td class="'+clase+'">'+v.mg+'</td>'
            });
            $tabla_quimicos+='</tr>';

            $tabla_quimicos+='<tr><th></th><th>POTASIO</th><th>mg/l</th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
            $(campanias).each(function(k,v){

                $tabla_quimicos+='<td >'+v.k+'</td>'
            });
            $tabla_quimicos+='</tr>';


            $tabla_quimicos+='<tr><th></th><th>SODIO</th><th>mg/l</th><th class="claseA">200</th><th class="claseB">200</th><th class="claseC" >200</th><th class="claseD">200</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.na<=200)
                    clase='claseA'
                               $tabla_quimicos+='<td class="'+clase+'">'+v.na+'</td>'
            });
            $tabla_quimicos+='</tr>';

            $tabla_quimicos+='<tr><th></th><th>CIANUROS</th><th>mg/l</th><th class="claseA">0.02</th><th class="claseB">0.1</th><th class="claseC" >0.2</th><th class="claseD">0.2</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.cianuro<=0.02)
                    clase='claseA'
                else if(v.cianuro>0.02 && v.cianuro<=0.1)
                    clase='claseB'
                else if(v.cianuro>0.1 && v.cianuro<=0.2)
                    clase='claseC'
                $tabla_quimicos+='<td class="'+clase+'">'+v.cianuro+'</td>'
            });
            $tabla_quimicos+='</tr>';
           $tabla_quimicos+='</tbody>';
            $tabla_quimicos+='</table>';


            //                ***************NUTRIENTES**********************
            $tabla_nutrientes='<table class="table table-responsive tablas">'+
                '<thead>' +
                '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
            $(campanias).each(function(k,v){
                $tabla_nutrientes+='<th> '+v.campania+'</th>'
            });
            $tabla_nutrientes+='</tr></thead>';
            $tabla_nutrientes+='<tbody>';

            $tabla_nutrientes+='<tr><th></th><th>FOSFATO TOTAL</th><th>mg/l</th><th class="claseA">0.4</th><th class="claseB">0.5</th><th class="claseC" >1</th><th class="claseD">1</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.p<=0.4)
                    clase='claseA'
                else if(v.p>0.4 && v.p<=0.5)
                    clase='claseB'
                else if(v.p>0.5 && v.p<=1)
                    clase='claseC'

                $tabla_nutrientes+='<td class="'+clase+'">'+v.p+'</td>'

            });
            $tabla_nutrientes+='</tr>';


            $tabla_nutrientes+='<tr><th></th><th>NITROGENO TOTAL</th><th>mg/l</th><th class="claseA">5</th><th class="claseB">12</th><th class="claseC" >12</th><th class="claseD">12</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.nt<=5)
                    clase='claseA'
                else if(v.nt>5 && v.nt<=12)
                    clase='claseB'


                $tabla_nutrientes+='<td  class="'+clase+'">'+v.nt+'</td>'

            });
            $tabla_nutrientes+='</tr>';


            $tabla_nutrientes+='<tr><th></th><th>BORO</th><th>mg/l</th><th>1.0c. B</th><th>1.0c. B</th><th>1.0c. B</th><th>1.0c. B</th>';
            $(campanias).each(function(k,v){

                $tabla_nutrientes+='<td >'+v.b+'</td>'

            });
            $tabla_nutrientes+='</tr>';
            $tabla_nutrientes+='</tbody>';
            $tabla_nutrientes+='</table>';


            //                ***************SANITARIOS**********************
            $tabla_sanitarios='<table class="table table-responsive tablas">'+
                '<thead>' +
                '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
            $(campanias).each(function(k,v){
                $tabla_sanitarios+='<th> '+v.campania+'</th>'
            });
            $tabla_sanitarios+='</tr></thead>';
            $tabla_sanitarios+='<tbody>';

            $tabla_sanitarios+='<tr><th></th><th>COLIFORMES TOTALES</th><th>UFC</th><th ></th><th ></th><th></th><th></th>';
            $(campanias).each(function(k,v){

                $tabla_sanitarios+='<td >'+v.coli_tot+'</td>'

            });
            $tabla_sanitarios+='</tr>';

            $tabla_sanitarios+='<tr><th></th><th>DQO</th><th>mg/l</th><th class="claseA"><5</th><th class="claseB"><10</th><th class="claseC" ><40</th><th class="claseD"><60</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.dqo<=5)
                    clase='claseA'
                else if(v.dqo>5 && v.dqo<=10)
                    clase='claseB'
                else if(v.dqo>5 && v.dqo<=40)
                    clase='claseC'
                else if(v.dqo>40 && v.dqo<=60)
                    clase='claseC'
                $tabla_sanitarios+='<td class="'+clase+'">'+v.dqo+'</td>'
            });
            $tabla_sanitarios+='</tr>';

            $tabla_sanitarios+='<tr><th></th><th>DBO5</th><th>mg/l</th><th class="claseA"><2</th><th class="claseB"><5</th><th class="claseC" ><20</th><th class="claseD"><30</th>';
            $(campanias).each(function(k,v){
                let clase=''
                if(v.dbo5<=2)
                    clase='claseA'
                else if(v.dbo5>2 && v.dbo5<=5)
                    clase='claseB'
                else if(v.dbo5>5 && v.dbo5<=20)
                    clase='claseC'
                else if(v.dbo5>20 && v.dbo5<=30)
                    clase='claseC'
                $tabla_sanitarios+='<td class="'+clase+'">'+v.dbo5+'</td>'
            });
            $tabla_sanitarios+='</tr>';

            $tabla_sanitarios+='<tr><th></th><th>NMP COLIFECALES</th><th>N/100ml</th><th ><50y<5en80%de muestras</th><th ><1000 y <200 en 80%de muestras</th><th><5000 y <1000 en 80%de muestra</th><th><50000 y <5000 en 80% de muestras</th>';
            $(campanias).each(function(k,v){

                $tabla_sanitarios+='<td>'+v.coli_feca+'</td>'

            });
            $tabla_sanitarios+='</tr>';

            $tabla_sanitarios+='</tbody>';
            $tabla_sanitarios+='</table>';



            //                ***************METALES**********************
            $tabla_metales='<table class="table table-responsive tablas">'+
                '<thead>' +
                '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
            $(campanias).each(function(k,v){
                $tabla_metales+='<th> '+v.campania+'</th>'
            });
            $tabla_metales+='</tr></thead>';
            $tabla_metales+='<tbody>';

            $tabla_metales+='<tr><th></th><th>COBRE</th><th>mg/l</th><th class="claseA">0.05</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.cu<=0.05)
                    clase='claseA'
                else if(v.cu>0.05 && v.cu<=1)
                    clase='claseB'

                $tabla_metales+='<td class="'+clase+'">'+v.cu+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>HIERRO SOLUBLE</th><th>mg/l</th><th class="claseA">0.3</th><th class="claseB">0.3</th><th class="claseC" >1</th><th class="claseD">1</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.fe<=0.3)
                    clase='claseA'
                else if(v.fe>0.3 && v.fe<=1)
                    clase='claseC'

                $tabla_metales+='<td class="'+clase+'">'+v.fe+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>Zinc PLAGUICIDAS</th><th>mg/l</th><th class="claseA">0.2</th><th class="claseB">0.2</th><th class="claseC" >5</th><th class="claseD">5</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.zn<=0.2)
                    clase='claseA'
                else if(v.zn>0.2 && v.zn<=5)
                    clase='claseC'

                $tabla_metales+='<td class="'+clase+'">'+v.zn+'</td>'

            });
            $tabla_metales+='</tr>';

            $tabla_metales+='<tr><th></th><th>ARSENICO TOTAL</th><th>mg/l</th><th class="claseA">0.05</th><th class="claseB">0.05</th><th class="claseC" >0.05</th><th class="claseD">0.1</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.as<=0.05)
                    clase='claseA'
                else if(v.as>0.05 && v.as<=0.1)
                    clase='claseD'

                $tabla_metales+='<td class="'+clase+'">'+v.as+'</td>'

            });
            $tabla_metales+='</tr>';

            $tabla_metales+='<tr><th></th><th>CADMIO</th><th>mg/l</th><th class="claseA">0.005</th><th class="claseB">0.005</th><th class="claseC" >0.005</th><th class="claseD">0.005</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.cd<=0.005)
                    clase='claseA'
                $tabla_metales+='<td class="'+clase+'">'+v.cd+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>PLOMO</th><th>mg/l</th><th class="claseA">0.05</th><th class="claseB">0.05</th><th class="claseC" >0.05</th><th class="claseD">0.1</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.pb<=0.05)
                    clase='claseA'
                else if(v.pb>0.05 && v.pb<=0.1)
                    clase='claseD'

                $tabla_metales+='<td class="'+clase+'">'+v.pb+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>CROMO HEXAVALENTE</th><th>mg/l</th><th class="claseA">0.05</th><th class="claseB">0.05</th><th class="claseC" >0.05</th><th class="claseD">0.05</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.cr<=0.05)
                    clase='claseA'

               $tabla_metales+='<td class="'+clase+'">'+v.cr+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>MANGANESO</th><th>mg/l</th><th class="claseA">0.05</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
            $(campanias).each(function(k,v){

                let clase=''
                if(v.mn<=0.05)
                    clase='claseA'
                else if(v.mn>0.05 && v.mn<=1)
                    clase='claseB'
                $tabla_metales+='<td class="'+clase+'">'+v.mn+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>ANTIMONIO</th><th>mg/l</th><th >0.01c. Sb</th><th>0.01c. Sb</th><th>  0.01c. Sb</th><th >0.01c. Sb</th>';
            $(campanias).each(function(k,v){

                $tabla_metales+='<td>'+v.sb+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>MERCURIO</th><th>mg/l</th><th >0.001 Hg</th><th>0.001 Hg</th><th>  0.001 Hg</th><th >0.001 Hg</th>';
            $(campanias).each(function(k,v){

                $tabla_metales+='<td>'+v.hg+'</td>'

            });
            $tabla_metales+='</tr>';


            $tabla_metales+='<tr><th></th><th>NIQUEL</th><th>mg/l</th><th >0.05c.Ni</th><th>0.05c.Ni</th><th>  0.05c.Ni</th><th >0.05c.Ni</th>';
            $(campanias).each(function(k,v){

                $tabla_metales+='<td>'+v.ni+'</td>'

            });
            $tabla_metales+='</tr>';

            $tabla_metales+='<tr><th></th><th>SELENIO</th><th>mg/l</th><th >0.01c Se</th><th>0.01c Se</th><th>  0.01c Se</th><th >0.01c Se</th>';
            $(campanias).each(function(k,v){

                $tabla_metales+='<td>'+v.se+'</td>'

            });
            $tabla_metales+='</tr>';
            $tabla_metales+='</tbody>';
            $tabla_metales+='</table>';




                $ul_reporte+='<form method="POST" action="{{url('reportes/remas')}}" id="reporte-remas" >'+
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

                        '<li> OD(mg/l)<input type="checkbox" value="od" name="reporte[]" ></li>'+
                        '<li> HS2(mg/l)<input type="checkbox" value="hs" name="reporte[]" ></li>'+
                        '</ol>'+
                        '</li>'+
                        '<li>'+
                        '<ol>'+
                        '<li  class="text-warning"> Quimicos</li>'+
                        '<li >Ca (mg/l) <input type="checkbox" value="ca" name="reporte[]" ></li>'+
                        '<li> Mg (mg/l) <input type="checkbox" value="mg" name="reporte[]" ></li>'+
                        '<li> K (mg/l) <input type="checkbox" value="k" name="reporte[]" ></li>'+
                        '<li> Na + K (mg/l) <input type="checkbox" value="na_k" name="reporte[]" ></li>'+
                        '<li> CO3 (mg/l) <input type="checkbox" value="co2" name="reporte[]" ></li>'+
                        '<li> CO3H (mg/l) <input type="checkbox" value="co2h" name="reporte[]" ></li>'+
                        '<li> Cl (mg/l) <input type="checkbox" value="ci" name="reporte[]" ></li>'+
                        '<li> (SO4)2- (mg/l) <input type="checkbox" value="so4" name="reporte[]" ></li>'+
                        '<li> Alcalinidad (mg/l) CaCO3 <input type="checkbox" value="alcalinidad" name="reporte[]" ></li>'+
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

                 $('#general_remas').append($tabla);
//                 $('#general_remas').append( $ul_gen);
//                 $('#fisico_remas').append($ul_fisico);
                 $('#fisico_remas').append($tabla_fisicos);
                 $('#gases_remas').append($tabla_gases);
                 $('#quimicos_remas').append($tabla_quimicos);
                 $('#nutrientes_remas').append($tabla_nutrientes);
                 $('#sanitarios_remas').append($tabla_sanitarios);
                 $('#metales_remas').append($tabla_metales);
                 $('#reportes').append($ul_reporte);


    $('#myModal').modal('show');
}


  function modalRemfc(campanias,data,cod){

      $('[href="#metales_remas"]').closest('li').show();
      $('[href="#icg"]').closest('li').show();
      $('[href="#reportes"]').closest('li').hide();

      let datos=[];
      $(campanias).each(function(k,v){
          let ph=formula('ph',v.ph)
          let coli_tot=formula('coli_tot',v.coli_tot)
          let ce=formula('ce',v.ce)
          let dqo=formula('dqo',v.dqo)
          let dbo=formula('dbo',v.dbo5)
          let od=formula('od',v.od)
          let sst=formula('sst',v.sst)
          let cloruro=formula('cloruro',v.cloruro)
          let p=formula('p',v.p)
          let nitrato=formula('nitrato',v.nitrato)
          let hs=formula('hs',v.hs)
          let ca=formula('ca',v.ca)
          let mg=formula('mg',v.mg)
          let na=formula('na',v.na)
          let cu=formula('cu',v.cu)
          let zn=formula('zn',v.zn)
          let cd=formula('cd',v.cd)
          let pb=formula('pb',v.pb)
          let cianuro=formula('cianuro',v.cianuro)
          let cr=formula('cr',v.cr)

          let total=0;


          let suma= ph.a+coli_tot.a+ce.a+dqo.a+dbo.a+od.a+sst.a+cloruro.a+p.a+nitrato.a+hs.a+ca.a+mg.a+na.a+cu.a+zn.a+cd.a+pb.a+cianuro.a+cr.a;

          total=((ph.a/suma)*ph.q)+((coli_tot.a/suma)*coli_tot.q)+((ce.a/suma)*ce.q)+((dqo.a/suma)*dqo.q)+((dbo.a/suma)*dbo.q)+((od.a/suma)*od.q)+((sst.a/suma)*sst.q)+((cloruro.a/suma)*cloruro.q)+((p.a/suma)*p.q)+((nitrato.a/suma)*nitrato.q)+((hs.a/suma)*hs.q)+((ca.a/suma)*ca.q)+((mg.a/suma)*mg.q)+((na.a/suma)*na.q)+((cu.a/suma)*cu.q)+((zn.a/suma)*zn.q)+((cd.a/suma)*cd.q)+((pb.a/suma)*pb.q)+((cianuro.a/suma)*cianuro.q)+((cr.a/suma)*cr.q);
               console.log(suma)
          datos.push({
              campania:v.campania,
              total:total,
              fecha:v.fecha
          })

      });
      $tabla_totales='<table  class="table tablas">'+
          '<thead>' +
          '<tr><th>CAMPAÑAS</th>'+

          '<th>ICG</th></tr></thead>';
      datos.forEach(function(v,k){

          clase='';

          if(v.total>=85 && v.total<=100)
              clase='claseE'
          else if(v.total>=75 && v.total<85)
              clase='claseC'
          else if(v.total>=65 && v.total<75)
              clase='claseH'
          else if(v.total>=50 && v.total<65)
              clase='claseD'
          else if(v.total<50)
              clase='claseF'

          $tabla_totales+='<tr><th>CAMPAÑA '+v.campania+'</th><th class="'+clase+'" style="font-size: 14px; text-align: center" >'+v.total.toFixed(2)+'</th></tr>'
      })
      $tabla_totales+='</table>'
      $('#div_icg').empty()
      $('#div_icg').append($tabla_totales)



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

      $tabla='<table  class="table tablas">'+
          '<thead>' +
          '<tr><th>DESC</th>';
      $(campanias).each(function(k,v){
          $tabla+='<th>CAMPAÑA '+v.campania+'</th>'
      });

      $tabla+='</tr></thead>';
      $tabla+='<tbody>';
      $tabla+='<tr><th>CODIGO</th>';
      $(campanias).each(function(k,v){

//          console.log(Object.keys(v)[k])
          $tabla+='<td>'+v.cod_campania+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='<tr><th>LABO.<br>RESPON</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.laboratorio+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='<tr><th>FECHA/HORA</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.fecha+'|'+v.hora+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='<tr><th>CAUDAL m3/s</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.caudal+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='</tbody>';
      $tabla+='</table>';

      //                ***************FISICOS**********************
      $tabla_fisicos='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th style="width:50px">CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<th> '+v.campania+'</th>'
      });
      $tabla_fisicos+='</tr></thead>';
      $tabla_fisicos+='<tbody>';

      $tabla_fisicos+='<tr><th><button  onclick="charts_remas(\'remas\',\'ph\')" class="btn btn-default  btn-xs "><i class="fa fa-line-chart"></i></button></th><th>PH</th><th></th><th></th><th class="claseA">6 A 8,5</th><th class="claseB">6 a 9</th><th class="claseC" >6 a 9</th><th class="claseD">6 a 9</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.ph>=6 && v.ph<=8.5)
              clase='claseA'
          else if(v.ph>8.5)
              clase='claseB'


          $tabla_fisicos+='<td class="'+clase+'">'+v.ph+'</td>'

      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>TEMPERATURA</th><th>°C</th><th>NO</th><th >+/-3°  C. <BR>receptor</th><th >+/-3°C. <BR> receptor</th><th  >+/-3°C.  <BR>receptor</th><th>+/-3°C.  <BR>receptor</th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td>'+v.temperatura+'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>CONDUCTIVIDAD</th><th>uS/cm</th><th ></th><th></th><th></th><th></th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td>'+v.ce+'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>SOLIDOS  SUSPENDIDOS</th><th>mgl</th><th></th><th class="claseA" ></th><th class="claseB"></th><th class="claseC"></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td>'+v.sst+'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>SOLIDOS  DISUELTOS TOTALES</th><th>mg/l</th><th></th><th class="claseA" >1000</th><th class="claseB">1000</th><th class="claseC">1500</th><th class="claseD">1500</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.sdt<=1000)
              clase='claseA'
          else if(v.sdt>1000 && v.sdt<=1500)
              clase='claseC'

          $tabla_fisicos+='<td class="'+clase+'">'+v.sdt+'</td>'
      });
      $tabla_fisicos+='</tr>';


      $tabla_fisicos+='<tr><th></th><th>TURBIDEZ</th><th>UNT</th><th>NO</th><th class="claseA" ><10</th><th class="claseB"><50</th><th class="claseC"><100</th><th class="claseD"><200</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.turbiedad<=10)
              clase='claseA'
          else if(v.turbiedad>10 && v.turbiedad<=50)
              clase='claseB'

          else if(v.turbiedad>50 && v.turbiedad<=100)
              clase='claseC'
          else if(v.turbiedad>100 )
              clase='claseD'
          $tabla_fisicos+='<td class="'+clase+'">'+v.turbiedad    +'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>COLOR</th><th>mg/l</th><th>NO</th><th class="claseA" ><10</th><th class="claseB"><50</th><th class="claseC"><100</th><th class="claseD"><200</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.color<=10)
              clase='claseA'
          else if(v.color>10 && v.color<=50)
              clase='claseB'

          else if(v.color>50 && v.color<=100)
              clase='claseC'
          else if(v.color>100 )
              clase='claseD'
          $tabla_fisicos+='<td class="'+clase+'">'+v.color    +'</td>'
      });
      $tabla_fisicos+='</tr>';


      $tabla_fisicos+='<tr><th></th><th>ACEITES Y GRASAS</th><th>mg/l</th><th>NO</th><th >Ausentes</th><th> Ausentes</th><th>0.3</th><th>1</th>';
      $(campanias).each(function(k,v){
           $tabla_fisicos+='<td >'+v.aceites    +'</td>'
      });
      $tabla_fisicos+='</tr>';
      $tabla_fisicos+='</tbody>';
      $tabla_fisicos+='</table>';



//  ***************GASES**********************
      $tabla_gases='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th style="width:30px">CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_gases+='<th> '+v.campania+'</th>'
      });
      $tabla_gases+='</tr></thead>';
      $tabla_gases+='<tbody>';

      $tabla_gases+='<tr><th></th><th>OXIGINENO DISUELTO</th><th>mg/l</th><th>NO</th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){
          $tabla_gases+='<td >'+v.od+'</td>'

      });
      $tabla_gases+='</tr>';

      $tabla_gases+='<tr><th></th><th>SULFATOS</th><th>mg/l</th><th>NO</th><th class="claseA">300</th><th class="claseB">400</th><th class="claseC" >400</th><th class="claseD">400</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.hs<=300)
              clase='claseA'
          else if(v.hs>300 && v.hs<=400)
              clase='claseB'

          $tabla_gases+='<td class="'+clase+'">'+v.hs+'</td>'
      });
      $tabla_gases+='</tr>';
      $tabla_gases+='</tbody>';
      $tabla_gases+='</table>';


      //                ***************QUIMICOS**********************
      $tabla_quimicos='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_quimicos+='<th> '+v.campania+'</th>'
      });
      $tabla_quimicos+='</tr></thead>';
      $tabla_quimicos+='<tbody>';

      $tabla_quimicos+='<tr><th></th><th>AMONIO</th><th>mg/l</th><TH></TH><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){
          $tabla_quimicos+='<td >'+v.amonio+'</td>'

      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>CLORUROS</th><th>mg/l</th><th>NO</th><th class="claseA">250</th><th class="claseB">300</th><th class="claseC" >400</th><th class="claseD">500</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.cloruro<=250)
              clase='claseA'
          else if(v.cloruro>250 && v.cloruro<=300)
              clase='claseB'
          else if(v.cloruro>300 && v.cloruro<=400)
              clase='claseB'
          else if(v.cloruro>400 && v.cloruro<=500)
              clase='claseB'

          $tabla_quimicos+='<td class="'+clase+'">'+v.cloruro+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>NITRATO</th><th>mg/l</th><th>NO</th><th class="claseA">20</th><th class="claseB">50</th><th class="claseC" >50</th><th class="claseD">50</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.nitrato<=20)
              clase='claseA'
          else if(v.nitrato>20 && v.nitrato<=50)
              clase='claseB'


          $tabla_quimicos+='<td class="'+clase+'">'+v.nitrato+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>NITRITO</th><th>mg/l</th><th>NO</th><th class="claseA"><1.0</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.nitrito<1)
              clase='claseA'
          else if(v.nitrito>=1)
              clase='claseB'


          $tabla_quimicos+='<td class="'+clase+'">'+v.nitrito+'</td>'
      });
      $tabla_quimicos+='</tr>';


      $tabla_quimicos+='<tr><th></th><th>CALCIO</th><th>mg/l</th><th>NO</th><th class="claseA">200</th><th class="claseB">300</th><th class="claseC" >300</th><th class="claseD">400</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.ca<=200)
              clase='claseA'
          else if(v.ca>200 && v.ca<=300)
              clase='claseB'
          else if(v.ca>300 && v.ca<=400)
              clase='claseC'


          $tabla_quimicos+='<td class="'+clase+'">'+v.ca+'</td>'
      });
      $tabla_quimicos+='</tr>';


      $tabla_quimicos+='<tr><th></th><th>MAGNESIO</th><th>mg/l</th><th>NO</th><th class="claseA">100</th><th class="claseB">100</th><th class="claseC" >150</th><th class="claseD">150</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.mg<=100)
              clase='claseA'
          else if(v.mg>100&& v.mg<=150)
              clase='claseC'


          $tabla_quimicos+='<td class="'+clase+'">'+v.mg+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>POTASIO</th><th>mg/l</th><th></th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){

          $tabla_quimicos+='<td >'+v.k+'</td>'
      });
      $tabla_quimicos+='</tr>';


      $tabla_quimicos+='<tr><th></th><th>SODIO</th><th>mg/l</th><th>NO</th><th class="claseA">200</th><th class="claseB">200</th><th class="claseC" >200</th><th class="claseD">200</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.na<=200)
              clase='claseA'
          $tabla_quimicos+='<td class="'+clase+'">'+v.na+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>CIANUROS</th><th>mg/l</th><th>NO</th><th class="claseA">0.02</th><th class="claseB">0.1</th><th class="claseC" >0.2</th><th class="claseD">0.2</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.cianuro<=0.02)
              clase='claseA'
          else if(v.cianuro>0.02 && v.cianuro<=0.1)
              clase='claseB'
          else if(v.cianuro>0.1 && v.cianuro<=0.2)
              clase='claseC'
          $tabla_quimicos+='<td class="'+clase+'">'+v.cianuro+'</td>'
      });
      $tabla_quimicos+='</tr>';
      $tabla_quimicos+='</tbody>';
      $tabla_quimicos+='</table>';

      //                ***************NUTRIENTES**********************
      $tabla_nutrientes='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_nutrientes+='<th> '+v.campania+'</th>'
      });
      $tabla_nutrientes+='</tr></thead>';
      $tabla_nutrientes+='<tbody>';

      $tabla_nutrientes+='<tr><th></th><th>FOSFATO TOTAL</th><th>mg/l</th><th>NO</th><th class="claseA">0.4</th><th class="claseB">0.5</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.p<=0.4)
              clase='claseA'
          else if(v.p>0.4 && v.p<=0.5)
              clase='claseB'
          else if(v.p>0.5 && v.p<=1)
              clase='claseC'

          $tabla_nutrientes+='<td class="'+clase+'">'+v.p+'</td>'

      });
      $tabla_nutrientes+='</tr>';


      $tabla_nutrientes+='<tr><th></th><th>NITROGENO TOTAL</th><th>mg/l</th><th>NO</th><th class="claseA">5</th><th class="claseB">12</th><th class="claseC" >12</th><th class="claseD">12</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.nt<=5)
              clase='claseA'
          else if(v.nt>5 && v.nt<=12)
              clase='claseB'


          $tabla_nutrientes+='<td  class="'+clase+'">'+v.nt+'</td>'

      });
      $tabla_nutrientes+='</tr>';


      $tabla_nutrientes+='<tr><th></th><th>BORO</th><th>mg/l</th><th></th><th>1.0c. B</th><th>1.0c. B</th><th>1.0c. B</th><th>1.0c. B</th>';
      $(campanias).each(function(k,v){

          $tabla_nutrientes+='<td >'+v.b+'</td>'

      });
      $tabla_nutrientes+='</tr>';
      $tabla_nutrientes+='</tbody>';
      $tabla_nutrientes+='</table>';

      //                ***************SANITARIOS**********************
      $tabla_sanitarios='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CANCERIGENOS </th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_sanitarios+='<th> '+v.campania+'</th>'
      });
      $tabla_sanitarios+='</tr></thead>';
      $tabla_sanitarios+='<tbody>';

      $tabla_sanitarios+='<tr><th></th><th>COLIFORMES TOTALES</th><th>UFC</th><th ></th><th ></th><th ></th><th></th><th></th>';
      $(campanias).each(function(k,v){

          $tabla_sanitarios+='<td >'+v.coli_tot+'</td>'

      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>DQO</th><th>mg/l</th><th >NO</th><th class="claseA"><5</th><th class="claseB"><10</th><th class="claseC" ><40</th><th class="claseD"><60</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.dqo<=5)
              clase='claseA'
          else if(v.dqo>5 && v.dqo<=10)
              clase='claseB'
          else if(v.dqo>5 && v.dqo<=40)
              clase='claseC'
          else if(v.dqo>40 && v.dqo<=60)
              clase='claseC'
          $tabla_sanitarios+='<td class="'+clase+'">'+v.dqo+'</td>'
      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>DBO5</th><th>mg/l</th><th >NO</th><th class="claseA"><2</th><th class="claseB"><5</th><th class="claseC" ><20</th><th class="claseD"><30</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.dbo5<=2)
              clase='claseA'
          else if(v.dbo5>2 && v.dbo5<=5)
              clase='claseB'
          else if(v.dbo5>5 && v.dbo5<=20)
              clase='claseC'
          else if(v.dbo5>20 && v.dbo5<=30)
              clase='claseC'
          $tabla_sanitarios+='<td class="'+clase+'">'+v.dbo5+'</td>'
      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>NMP COLIFECALES</th><th>N/100ml</th><th >NO</th><th ><50y<5en80%de muestras</th><th ><1000 y <200 en 80%de muestras</th><th><5000 y <1000 en 80%de muestra</th><th><50000 y <5000 en 80% de muestras</th>';
      $(campanias).each(function(k,v){

          $tabla_sanitarios+='<td>'+v.coli_feca+'</td>'

      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>Bacterias colif. Termorresistentes</th><th>UFC/100 ml</th><th ></th><th ></th><th ></th><th></th><th></th>';
      $(campanias).each(function(k,v){

          $tabla_sanitarios+='<td>'+v.bact_coli+'</td>'

      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='</tbody>';
      $tabla_sanitarios+='</table>';


      //                ***************METALES**********************
      $tabla_metales='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><TH>CANCERIGENOS</TH><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_metales+='<th> '+v.campania+'</th>'
      });
      $tabla_metales+='</tr></thead>';
      $tabla_metales+='<tbody>';

      $tabla_metales+='<tr><th></th><th>COBRE</th><th>mg/l</th><th>NO</th><th class="claseA">0.05</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.cu<=0.05)
              clase='claseA'
          else if(v.cu>0.05 && v.cu<=1)
              clase='claseB'

          $tabla_metales+='<td class="'+clase+'">'+v.cu+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>HIERRO SOLUBLE</th><th>mg/l</th><th>NO</th><th class="claseA">0.3</th><th class="claseB">0.3</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.fe<=0.3)
              clase='claseA'
          else if(v.fe>0.3 && v.fe<=1)
              clase='claseC'

          $tabla_metales+='<td class="'+clase+'">'+v.fe+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>Zinc PLAGUICIDAS</th><th>mg/l</th><th>NO</th><th class="claseA">0.2</th><th class="claseB">0.2</th><th class="claseC" >5</th><th class="claseD">5</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.zn<=0.2)
              clase='claseA'
          else if(v.zn>0.2 && v.zn<=5)
              clase='claseC'

          $tabla_metales+='<td class="'+clase+'">'+v.zn+'</td>'

      });
      $tabla_metales+='</tr>';

      $tabla_metales+='<tr><th></th><th>ARSENICO TOTAL</th><th>mg/l</th><th>SI</th><th class="claseA">0.05</th><th class="claseB">0.05</th><th class="claseC" >0.05</th><th class="claseD">0.1</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.as<=0.05)
              clase='claseA'
          else if(v.as>0.05 && v.as<=0.1)
              clase='claseD'

          $tabla_metales+='<td class="'+clase+'">'+v.as+'</td>'

      });
      $tabla_metales+='</tr>';

      $tabla_metales+='<tr><th></th><th>CADMIO</th><th>mg/l</th><th>NO</th><th class="claseA">0.005</th><th class="claseB">0.005</th><th class="claseC" >0.005</th><th class="claseD">0.005</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.cd<=0.005)
              clase='claseA'
          $tabla_metales+='<td class="'+clase+'">'+v.cd+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>PLOMO</th><th>mg/l</th><th>NO</th><th class="claseA">0.05</th><th class="claseB">0.05</th><th class="claseC" >0.05</th><th class="claseD">0.1</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.pb<=0.05)
              clase='claseA'
          else if(v.pb>0.05 && v.pb<=0.1)
              clase='claseD'

          $tabla_metales+='<td class="'+clase+'">'+v.pb+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>CROMO HEXAVALENTE</th><th>mg/l</th><th>SI</th><th class="claseA">0.05</th><th class="claseB">0.05</th><th class="claseC" >0.05</th><th class="claseD">0.05</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.cr<=0.05)
              clase='claseA'

          $tabla_metales+='<td class="'+clase+'">'+v.cr+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>MANGANESO</th><th>mg/l</th><th>NO</th><th class="claseA">0.05</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){

          let clase=''
          if(v.mn<=0.05)
              clase='claseA'
          else if(v.mn>0.05 && v.mn<=1)
              clase='claseB'
          $tabla_metales+='<td class="'+clase+'">'+v.mn+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>ANTIMONIO</th><th>mg/l</th><th>NO</th><th >0.01c. Sb</th><th>0.01c. Sb</th><th>  0.01c. Sb</th><th >0.01c. Sb</th>';
      $(campanias).each(function(k,v){

          $tabla_metales+='<td>'+v.sb+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>MERCURIO</th><th>mg/l</th><th>NO</th><th >0.001 Hg</th><th>0.001 Hg</th><th>  0.001 Hg</th><th >0.001 Hg</th>';
      $(campanias).each(function(k,v){

          $tabla_metales+='<td>'+v.hg+'</td>'

      });
      $tabla_metales+='</tr>';


      $tabla_metales+='<tr><th></th><th>NIQUEL</th><th>mg/l</th><th>SI</th><th >0.05c.Ni</th><th>0.05c.Ni</th><th>  0.05c.Ni</th><th >0.05c.Ni</th>';
      $(campanias).each(function(k,v){

          $tabla_metales+='<td>'+v.ni+'</td>'

      });
      $tabla_metales+='</tr>';

      $tabla_metales+='<tr><th></th><th>SELENIO</th><th>mg/l</th><th>NO</th><th >0.01c Se</th><th>0.01c Se</th><th>  0.01c Se</th><th >0.01c Se</th>';
      $(campanias).each(function(k,v){

          $tabla_metales+='<td>'+v.se+'</td>'

      });
      $tabla_metales+='</tr>';
      $tabla_metales+='</tbody>';
      $tabla_metales+='</table>';




      $('#general_remas').append($tabla);
      $('#fisico_remas').append($tabla_fisicos);
      $('#gases_remas').append($tabla_gases);
      $('#quimicos_remas').append($tabla_quimicos);
      $('#nutrientes_remas').append($tabla_nutrientes);
      $('#sanitarios_remas').append($tabla_sanitarios);
      $('#metales_remas').append($tabla_metales);

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
      $tabla='<table  class="table tablas">'+
          '<thead>' +
          '<tr><th>DESC</th>';
      $(campanias).each(function(k,v){
          $tabla+='<th>CAMPAÑA '+v.campania+'</th>'
      });

      $tabla+='</tr></thead>';
      $tabla+='<tbody>';
      $tabla+='<tr><th>CODIGO</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.cod_campania+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='<tr><th>LABO.<br>RESPON</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.laboratorio+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='<tr><th>FECHA/HORA</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.fecha+'|'+v.hora+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='<tr><th>PROFUNDIDAD (m)</th>';
      $(campanias).each(function(k,v){
          $tabla+='<td>'+v.prof+'</td>'
      });
      $tabla+='</tr>';

      $tabla+='</tbody>';
      $tabla+='</table>';

      //                ***************FISICOS**********************
      $tabla_fisicos='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th style="width:50px">CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<th> '+v.campania+'</th>'
      });
      $tabla_fisicos+='</tr></thead>';
      $tabla_fisicos+='<tbody>';

      $tabla_fisicos+='<tr><th><button  onclick="charts_remas(\'remas\',\'ph\')" class="btn btn-default  btn-xs "><i class="fa fa-line-chart"></i></button></th><th>PH</th><th></th><th></th><th class="claseA">6 A 8,5</th><th class="claseB">6 a 9</th><th class="claseC" >6 a 9</th><th class="claseD">6 a 9</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.ph>=6 && v.ph<=8.5)
              clase='claseA'
          else if(v.ph>8.5)
              clase='claseB'


          $tabla_fisicos+='<td class="'+clase+'">'+v.ph+'</td>'

      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>TEMPERATURA</th><th>°C</th><th>NO</th><th >+/-3°  C. <BR>receptor</th><th >+/-3°C. <BR> receptor</th><th  >+/-3°C.  <BR>receptor</th><th>+/-3°C.  <BR>receptor</th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td>'+v.temperatura+'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>CONDUCTIVIDAD</th><th>uS/cm</th><th ></th><th></th><th></th><th></th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td>'+v.ce+'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>SOLIDOS  SUSPENDIDOS</th><th>mgl</th><th></th><th class="claseA" ></th><th class="claseB"></th><th class="claseC"></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td>'+v.sst+'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>SOLIDOS  DISUELTOS TOTALES</th><th>mg/l</th><th></th><th class="claseA" >1000</th><th class="claseB">1000</th><th class="claseC">1500</th><th class="claseD">1500</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.sdt<=1000)
              clase='claseA'
          else if(v.sdt>1000 && v.sdt<=1500)
              clase='claseC'

          $tabla_fisicos+='<td class="'+clase+'">'+v.sdt+'</td>'
      });
      $tabla_fisicos+='</tr>';


      $tabla_fisicos+='<tr><th></th><th>TURBIDEZ</th><th>UNT</th><th>NO</th><th class="claseA" ><10</th><th class="claseB"><50</th><th class="claseC"><100</th><th class="claseD"><200</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.turbiedad<=10)
              clase='claseA'
          else if(v.turbiedad>10 && v.turbiedad<=50)
              clase='claseB'

          else if(v.turbiedad>50 && v.turbiedad<=100)
              clase='claseC'
          else if(v.turbiedad>100 )
              clase='claseD'
          $tabla_fisicos+='<td class="'+clase+'">'+v.turbiedad    +'</td>'
      });
      $tabla_fisicos+='</tr>';

      $tabla_fisicos+='<tr><th></th><th>COLOR</th><th>mg/l</th><th>NO</th><th class="claseA" ><10</th><th class="claseB"><50</th><th class="claseC"><100</th><th class="claseD"><200</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.color<=10)
              clase='claseA'
          else if(v.color>10 && v.color<=50)
              clase='claseB'

          else if(v.color>50 && v.color<=100)
              clase='claseC'
          else if(v.color>100 )
              clase='claseD'
          $tabla_fisicos+='<td class="'+clase+'">'+v.color    +'</td>'
      });
      $tabla_fisicos+='</tr>';


      $tabla_fisicos+='<tr><th></th><th>ACEITES Y GRASAS</th><th>mg/l</th><th>NO</th><th >Ausentes</th><th> Ausentes</th><th>0.3</th><th>1</th>';
      $(campanias).each(function(k,v){
          $tabla_fisicos+='<td >'+v.aceites    +'</td>'
      });
      $tabla_fisicos+='</tr>';
      $tabla_fisicos+='</tbody>';
      $tabla_fisicos+='</table>';



//  ***************GASES**********************
      $tabla_gases='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th style="width:30px">CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_gases+='<th> '+v.campania+'</th>'
      });
      $tabla_gases+='</tr></thead>';
      $tabla_gases+='<tbody>';

      $tabla_gases+='<tr><th></th><th>OXIGINENO DISUELTO</th><th>mg/l</th><th>NO</th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){
          $tabla_gases+='<td >'+v.od+'</td>'

      });
      $tabla_gases+='</tr>';

      $tabla_gases+='<tr><th></th><th>SULFATOS</th><th>mg/l</th><th>NO</th><th class="claseA">300</th><th class="claseB">400</th><th class="claseC" >400</th><th class="claseD">400</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.hs<=300)
              clase='claseA'
          else if(v.hs>300 && v.hs<=400)
              clase='claseB'

          $tabla_gases+='<td class="'+clase+'">'+v.hs+'</td>'
      });
      $tabla_gases+='</tr>';
      $tabla_gases+='</tbody>';
      $tabla_gases+='</table>';


      //                ***************QUIMICOS**********************
      $tabla_quimicos='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_quimicos+='<th> '+v.campania+'</th>'
      });
      $tabla_quimicos+='</tr></thead>';
      $tabla_quimicos+='<tbody>';

      $tabla_quimicos+='<tr><th></th><th>AMONIO</th><th>mg/l</th><TH></TH><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){
          $tabla_quimicos+='<td >'+v.amonio+'</td>'

      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>CLORUROS</th><th>mg/l</th><th>NO</th><th class="claseA">250</th><th class="claseB">300</th><th class="claseC" >400</th><th class="claseD">500</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.cloruro<=250)
              clase='claseA'
          else if(v.cloruro>250 && v.cloruro<=300)
              clase='claseB'
          else if(v.cloruro>300 && v.cloruro<=400)
              clase='claseB'
          else if(v.cloruro>400 && v.cloruro<=500)
              clase='claseB'

          $tabla_quimicos+='<td class="'+clase+'">'+v.cloruro+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>NITRATO</th><th>mg/l</th><th>NO</th><th class="claseA">20</th><th class="claseB">50</th><th class="claseC" >50</th><th class="claseD">50</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.nitrato<=20)
              clase='claseA'
          else if(v.nitrato>20 && v.nitrato<=50)
              clase='claseB'


          $tabla_quimicos+='<td class="'+clase+'">'+v.nitrato+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>NITRITO</th><th>mg/l</th><th>NO</th><th class="claseA"><1.0</th><th class="claseB">1</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.nitrito<1)
              clase='claseA'
          else if(v.nitrito>=1)
              clase='claseB'


          $tabla_quimicos+='<td class="'+clase+'">'+v.nitrito+'</td>'
      });
      $tabla_quimicos+='</tr>';


      $tabla_quimicos+='<tr><th></th><th>CALCIO</th><th>mg/l</th><th>NO</th><th class="claseA">200</th><th class="claseB">300</th><th class="claseC" >300</th><th class="claseD">400</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.ca<=200)
              clase='claseA'
          else if(v.ca>200 && v.ca<=300)
              clase='claseB'
          else if(v.ca>300 && v.ca<=400)
              clase='claseC'


          $tabla_quimicos+='<td class="'+clase+'">'+v.ca+'</td>'
      });
      $tabla_quimicos+='</tr>';


      $tabla_quimicos+='<tr><th></th><th>MAGNESIO</th><th>mg/l</th><th>NO</th><th class="claseA">100</th><th class="claseB">100</th><th class="claseC" >150</th><th class="claseD">150</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.mg<=100)
              clase='claseA'
          else if(v.mg>100&& v.mg<=150)
              clase='claseC'


          $tabla_quimicos+='<td class="'+clase+'">'+v.mg+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>POTASIO</th><th>mg/l</th><th></th><th class="claseA"></th><th class="claseB"></th><th class="claseC" ></th><th class="claseD"></th>';
      $(campanias).each(function(k,v){

          $tabla_quimicos+='<td >'+v.k+'</td>'
      });
      $tabla_quimicos+='</tr>';


      $tabla_quimicos+='<tr><th></th><th>SODIO</th><th>mg/l</th><th>NO</th><th class="claseA">200</th><th class="claseB">200</th><th class="claseC" >200</th><th class="claseD">200</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.na<=200)
              clase='claseA'
          $tabla_quimicos+='<td class="'+clase+'">'+v.na+'</td>'
      });
      $tabla_quimicos+='</tr>';

      $tabla_quimicos+='<tr><th></th><th>CIANUROS</th><th>mg/l</th><th>NO</th><th class="claseA">0.02</th><th class="claseB">0.1</th><th class="claseC" >0.2</th><th class="claseD">0.2</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.cianuro<=0.02)
              clase='claseA'
          else if(v.cianuro>0.02 && v.cianuro<=0.1)
              clase='claseB'
          else if(v.cianuro>0.1 && v.cianuro<=0.2)
              clase='claseC'
          $tabla_quimicos+='<td class="'+clase+'">'+v.cianuro+'</td>'
      });
      $tabla_quimicos+='</tr>';
      $tabla_quimicos+='</tbody>';
      $tabla_quimicos+='</table>';

      //                ***************NUTRIENTES**********************
      $tabla_nutrientes='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CANCERIGENOS</th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_nutrientes+='<th> '+v.campania+'</th>'
      });
      $tabla_nutrientes+='</tr></thead>';
      $tabla_nutrientes+='<tbody>';

      $tabla_nutrientes+='<tr><th></th><th>FOSFATO TOTAL</th><th>mg/l</th><th>NO</th><th class="claseA">0.4</th><th class="claseB">0.5</th><th class="claseC" >1</th><th class="claseD">1</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.p<=0.4)
              clase='claseA'
          else if(v.p>0.4 && v.p<=0.5)
              clase='claseB'
          else if(v.p>0.5 && v.p<=1)
              clase='claseC'

          $tabla_nutrientes+='<td class="'+clase+'">'+v.p+'</td>'

      });
      $tabla_nutrientes+='</tr>';


      $tabla_nutrientes+='<tr><th></th><th>NITROGENO TOTAL</th><th>mg/l</th><th>NO</th><th class="claseA">5</th><th class="claseB">12</th><th class="claseC" >12</th><th class="claseD">12</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.nt<=5)
              clase='claseA'
          else if(v.nt>5 && v.nt<=12)
              clase='claseB'


          $tabla_nutrientes+='<td  class="'+clase+'">'+v.nt+'</td>'

      });
      $tabla_nutrientes+='</tr>';


      $tabla_nutrientes+='<tr><th></th><th>BORO</th><th>mg/l</th><th></th><th>1.0c. B</th><th>1.0c. B</th><th>1.0c. B</th><th>1.0c. B</th>';
      $(campanias).each(function(k,v){

          $tabla_nutrientes+='<td >'+v.b+'</td>'

      });
      $tabla_nutrientes+='</tr>';
      $tabla_nutrientes+='</tbody>';
      $tabla_nutrientes+='</table>';

      //                ***************SANITARIOS**********************
      $tabla_sanitarios='<table class="table table-responsive tablas">'+
          '<thead>' +
          '<tr><th style="width:15px">GRAFICO</th><th style="width:150px">PARAMETROS</th><th>UNID.</th><th>CANCERIGENOS </th><th>CLASE A</th><th>CLASE B</th><th>CLASE C</th><th>CLASE D</th>';
      $(campanias).each(function(k,v){
          $tabla_sanitarios+='<th> '+v.campania+'</th>'
      });
      $tabla_sanitarios+='</tr></thead>';
      $tabla_sanitarios+='<tbody>';

      $tabla_sanitarios+='<tr><th></th><th>COLIFORMES TOTALES</th><th>UFC</th><th ></th><th ></th><th ></th><th></th><th></th>';
      $(campanias).each(function(k,v){

          $tabla_sanitarios+='<td >'+v.coli_tot+'</td>'

      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>DQO</th><th>mg/l</th><th >NO</th><th class="claseA"><5</th><th class="claseB"><10</th><th class="claseC" ><40</th><th class="claseD"><60</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.dqo<=5)
              clase='claseA'
          else if(v.dqo>5 && v.dqo<=10)
              clase='claseB'
          else if(v.dqo>5 && v.dqo<=40)
              clase='claseC'
          else if(v.dqo>40 && v.dqo<=60)
              clase='claseC'
          $tabla_sanitarios+='<td class="'+clase+'">'+v.dqo+'</td>'
      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>DBO5</th><th>mg/l</th><th >NO</th><th class="claseA"><2</th><th class="claseB"><5</th><th class="claseC" ><20</th><th class="claseD"><30</th>';
      $(campanias).each(function(k,v){
          let clase=''
          if(v.dbo5<=2)
              clase='claseA'
          else if(v.dbo5>2 && v.dbo5<=5)
              clase='claseB'
          else if(v.dbo5>5 && v.dbo5<=20)
              clase='claseC'
          else if(v.dbo5>20 && v.dbo5<=30)
              clase='claseC'
          $tabla_sanitarios+='<td class="'+clase+'">'+v.dbo5+'</td>'
      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>NMP COLIFECALES</th><th>N/100ml</th><th >NO</th><th ><50y<5en80%de muestras</th><th ><1000 y <200 en 80%de muestras</th><th><5000 y <1000 en 80%de muestra</th><th><50000 y <5000 en 80% de muestras</th>';
      $(campanias).each(function(k,v){

          $tabla_sanitarios+='<td>'+v.coli_feca+'</td>'

      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='<tr><th></th><th>Bacterias colif. Termorresistentes</th><th>UFC/100 ml</th><th ></th><th ></th><th ></th><th></th><th></th>';
      $(campanias).each(function(k,v){

          $tabla_sanitarios+='<td>'+v.salmonella+'</td>'

      });
      $tabla_sanitarios+='</tr>';

      $tabla_sanitarios+='</tbody>';
      $tabla_sanitarios+='</table>';







      $ul_gen+='</li>';
      $ul_fisico+='</li>';
      $ul_gases+='</li>';
      $ul_quimicos+='</li>';
      $ul_nutrientes+='</li>';
      $ul_sanitarios+='</li>';
      $tabla_metales='<div style="height:150px "></div>';

      $('[href="#metales_remas"]').closest('li').hide();
      $('[href="#reportes"]').closest('li').hide();
      $('[href="#icg"]').closest('li').hide();
      $('#general_remas').append($tabla);
      $('#fisico_remas').append($tabla_fisicos);
      $('#gases_remas').append($tabla_gases);
      $('#quimicos_remas').append($tabla_quimicos);
      $('#nutrientes_remas').append($tabla_nutrientes);
      $('#sanitarios_remas').append($tabla_sanitarios);
      $('#metales_remas').append($tabla_metales);
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

//            sidediv.innerHTML = text;
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

    <div class="modal fade charts-modal" id="modal-graficos" style="z-index: 100000" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                            <li id="tab_metales">
                                <a href="#metales_remas" data-toggle="tab" >Metales y <br>no Metales trazas</a>
                            </li>
                            <li class="tab-reporte">
                                <a href="#reportes" data-toggle="tab" >Reporte</a>
                            </li>
                            <li class="tab-icg">
                                <a href="#icg" data-toggle="tab" >ICG</a>
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

                            <div id="icg" class=" row tab-pane">
                                <div class=" col-md-6"  id="div_icg">

                                </div>
                                <div class=" col-md-6"  id="div_icg">
                                    <h6>La clasificacion de la aguas  en funcion de su ICG se  muestra en la siguiente tabla:</h6>
                                    <br>
                                    <img  style="margin: auto" src="{{asset('img/icg.png')}}" alt="">
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                {{--</div>--}}
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
                <a href="#" class="navbar-left"><img style="max-width:65px; padding: 4px; margin-top: -7px;"  class="image-responsive" src="{{asset('img/logo.png')}}" alt=""></a>

                <a class="hidden-xs navbar-brand" href=""  >Universidad Tecnica de Oruro  - Sistema de Redes de Monitoreo de Calidad de Aguas </a>

            </div>

            {{--<div class="navbar-header ">--}}
                {{--<button type="button "  class=" navbar-toggle"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">--}}
                    {{--<span class="sr-only">Toggle navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}


            {{--</div>--}}

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{url('/login')}}"><i class="fa fa-gears"></i> Admin</a></li>
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

                {{--<ul class="nav navbar-nav navbar-right" >--}}
                    {{--<li class="jstree-open" >TDPS--}}

                        {{--<ul>--}}
                            {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$bolivia->archivo}}">--}}
                                {{--{{$bolivia->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$bolivia->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                            {{--</li>--}}
                            {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$peru->archivo}}">--}}
                                {{--{{$peru->nombre}}    / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$peru->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                            {{--</li>--}}
                            {{--@foreach($tdps->where('tipo','tdps') as $td)--}}

                                {{--<li data-jstree='{ "enabled" : true,"icon":"fa fa-globe"}' tipo="tdps"  label="{{$td->archivo}}">--}}
                                    {{--{{$td->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$td->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}

                                    {{--<ul>--}}
                                        {{--@foreach($zh  as $moni)--}}
                                            {{--@if($td->id==19)--}}

                                                {{--@if($moni->estado_remas=='1')--}}
                                                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$moni->archivo_remas}}" >--}}
                                                        {{--{{$moni->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$moni->archivo_remas}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                        {{--<ul>--}}
                                                            {{--@foreach($moni->puntos as  $punto)--}}
                                                                {{--<li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="{{$punto->archivo}}">--}}
                                                                    {{--{{$punto->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                                {{--</li>--}}
                                                            {{--@endforeach--}}
                                                        {{--</ul>--}}

                                                    {{--</li>--}}
                                                {{--@endif--}}

                                            {{--@endif--}}
                                            {{--@if($td->id==20)--}}
                                                {{--@if($moni->estado_remfc=='1')--}}
                                                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$moni->archivo_remfc}}" >--}}
                                                        {{--{{$moni->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$moni->archivo_remfc}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                        {{--<ul>--}}
                                                            {{--@foreach($moni->puntos as  $punto)--}}
                                                                {{--<li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="{{$punto->archivo}}">--}}
                                                                    {{--{{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                                {{--</li>--}}
                                                            {{--@endforeach--}}
                                                        {{--</ul>--}}

                                                    {{--</li>--}}
                                                {{--@endif--}}
                                            {{--@endif--}}
                                            {{--@if($td->id==21)--}}
                                                {{--@if($moni->estado_remli=='1')--}}
                                                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$moni->archivo_remli}}" >--}}
                                                        {{--{{$moni->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$moni->archivo_remli}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                        {{--<ul>--}}
                                                            {{--@foreach($moni->puntos as  $punto)--}}
                                                                {{--<li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="{{$punto->archivo}}">--}}
                                                                    {{--{{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                                {{--</li>--}}
                                                            {{--@endforeach--}}
                                                        {{--</ul>--}}

                                                    {{--</li>--}}
                                                {{--@endif--}}
                                            {{--@endif--}}



                                        {{--@endforeach--}}

                                    {{--</ul>--}}

                                {{--</li>--}}
                            {{--@endforeach--}}


                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}'label="{{$poopo->archivo}}" >--}}
                        {{--{{$poopo->nombre}} / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$poopo->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                        {{--<ul>--}}
                            {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$sub_poopo->archivo}}">--}}
                                {{--{{$sub_poopo->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$sub_poopo->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}

                            {{--</li>--}}
                            {{--<li>--}}
                                {{--Escala 1:50000--}}
                                {{--<ul>--}}
                                    {{--@foreach($sub_poopo_5 as $sub)--}}

                                        {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$sub->archivo}}">--}}
                                            {{--{{$sub->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$sub->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                            {{--<ul>--}}
                                                {{--@foreach($sub->puntos as $punto)--}}
                                                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$punto->archivo}}">--}}
                                                        {{--{{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}

                            {{--</li>--}}
                            {{--<li>--}}
                                {{--Escala 1:1000000--}}
                                {{--<ul>--}}
                                    {{--@foreach($sub_poopo_1 as $punto)--}}
                                        {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$punto->archivo}}">--}}
                                            {{--{{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}

                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                    {{--</li>--}}
                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$coipasa->archivo}}">--}}
                        {{--{{$coipasa->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$coipasa->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                        {{--<ul>--}}

                            {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$sub_coi->archivo}}">--}}
                                {{--{{$sub_coi->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$sub_coi->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--Escala 1:50000--}}
                                {{--<ul>--}}
                                    {{--@foreach($sub_coipasa_5 as $sub)--}}

                                        {{--<li data-jstree='{ "icon":"fa fa-globe"}' label="{{$sub->archivo}}">--}}
                                            {{--{{$sub->nombre}} / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$sub->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>                                                                         <ul>--}}
                                                {{--@foreach($sub->puntos as $punto)--}}
                                                    {{--<li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$punto->archivo}}">--}}
                                                        {{--{{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}

                            {{--</li>--}}
                            {{--<li>--}}
                                {{--Escala 1:1000000--}}
                                {{--<ul>--}}
                                    {{--@foreach($sub_coipasa_1 as $punto1)--}}
                                        {{--<li data-jstree='{"icon":"fa fa-globe"}' label="{{$punto1->archivo}}">--}}
                                            {{--{{$punto1->nombre}} / <span><a  href="" onclick="javascript:location.href='{{asset('mapas')}}/{{$punto1->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}

                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}




                {{--</ul>--}}
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
                            {{--<a href="###" onclick="abrirLayer()" class="list-group-item">--}}
                                {{--<i class="fa fa-globe"></i> CUENCA 1--}}
                            {{--</a>--}}

                        <div id="treeCheckbox"  style=" margin-left:-22px;overflow-y: auto; height:500px; overflow-x:hidden " >

                            <ul >
                                <li class="jstree-open" >TDPS

                                    <ul>
                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$bolivia->archivo}}">
                                        {{$bolivia->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$bolivia->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                        </li>
                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' label="{{$peru->archivo}}">
                                          {{$peru->nombre}}    / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$peru->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                        </li>
                                        @foreach($tdps->where('tipo','tdps') as $td)

                                            <li data-jstree='{ "enabled" : true,"icon":"fa fa-globe"}' tipo="tdps"  label="{{$td->archivo}}">
                                                {{$td->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$td->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>

                                                <ul>
                                                    @foreach($zh  as $moni)
                                                        @if($td->id==19)

                                                            @if($moni->estado_remas=='1')
                                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$moni->archivo_remas}}" >
                                                              {{$moni->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$moni->archivo_remas}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                            <ul>
                                                                @foreach($moni->puntos as  $punto)
                                                                    <li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="{{$punto->archivo}}">
                                                                       {{$punto->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>

                                                        </li>
                                                                @endif

                                                        @endif
                                                        @if($td->id==20)
                                                                @if($moni->estado_remfc=='1')
                                                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$moni->archivo_remfc}}" >
                                                                 {{$moni->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$moni->archivo_remfc}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                    <ul>
                                                                        @foreach($moni->puntos as  $punto)
                                                                            <li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="{{$punto->archivo}}">
                                                                               {{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                </li>
                                                                 @endif
                                                        @endif
                                                        @if($td->id==21)
                                                                @if($moni->estado_remli=='1')
                                                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$moni->archivo_remli}}" >
                                                                  {{$moni->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$moni->archivo_remli}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                    <ul>
                                                                        @foreach($moni->puntos as  $punto)
                                                                            <li data-jstree='{ "icon":"fa fa-globe"}' tipo="nn" label="{{$punto->archivo}}">
                                                                                {{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                </li>
                                                        @endif
                                                        @endif



                                                    @endforeach

                                                </ul>

                                                  </li>
                                        @endforeach


                                            </ul>
                                </li>

                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}'  tipo="tdps" label="{{$poopo->archivo}}" >
                                   {{$poopo->nombre}} / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$poopo->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                    <ul>
                                        <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$sub_poopo->archivo}}">
                                           {{$sub_poopo->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$sub_poopo->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>

                                        </li>
                                        <li>
                                          Escala 1:50000
                                            <ul>
                                                @foreach($sub_poopo_5 as $sub)

                                                    <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="tdps" label="{{$sub->archivo}}">
                                                        {{$sub->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$sub->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                        <ul>
                                                            @foreach($sub->puntos as $punto)
                                                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}'  tipo="pm" label="{{$punto->archivo}}">
                                                                    {{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @endforeach
                                            </ul>

                                        </li>
                                        <li>
                                            Escala 1:1000000
                                            <ul>
                                                @foreach($sub_poopo_1 as $punto)
                                                    <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}'  tipo="pm" label="{{$punto->archivo}}">
                                                       {{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                                <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$coipasa->archivo}}">
                                     {{$coipasa->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$coipasa->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                        <ul>

                                               <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$sub_coi->archivo}}">
                                                {{$sub_coi->nombre}}  / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$sub_coi->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                               </li>
                                                 <li>
                                                     Escala 1:50000
                                                           <ul>
                                                             @foreach($sub_coipasa_5 as $sub)

                                                                  <li data-jstree='{ "icon":"fa fa-globe"}' tipo="pm" label="{{$sub->archivo}}">
                                                                    {{$sub->nombre}} / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$sub->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>                                                                         <ul>
                                                                          @foreach($sub->puntos as $punto)
                                                                            <li data-jstree='{ "opened" : true ,"icon":"fa fa-globe"}' tipo="pm" label="{{$punto->archivo}}">
                                                                              {{$punto->nombre}}   / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                                                               </li>
                                                                            @endforeach
                                                                          </ul>
                                                                     </li>
                                                                @endforeach
                                                              </ul>

                                                 </li>
                                <li>
                                    Escala 1:1000000
                                    <ul>
                                        @foreach($sub_coipasa_1 as $punto1)
                                            <li data-jstree='{"icon":"fa fa-globe"}' label="{{$punto1->archivo}}">
                                               {{$punto1->nombre}} / <span><a  href="" onclick="javascript:location.href='{{url('descargar')}}/{{$punto1->archivo}}'" title="descargar mapa" style="font-size: 10px;"class="text-sm text-warning"><i  style="color:#FFF;"class="fa fa-download "></i> </a> </span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                                </ul>
                                </li>




                                </ul>


                        </div>

                    </div>
                </div>
            </div>
            {{--<div class="panel panel-primary">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a data-toggle="collapse" href="#properties">--}}
                            {{--<i class="fa fa-list-alt"></i>--}}
                            {{--Properties--}}
                        {{--</a>--}}
                    {{--</h4>--}}
                {{--</div>--}}
                {{--<div id="properties" class="panel-collapse collapse in">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div id="content-window"></div>--}}

                        {{--<p>--}}
                            {{--Lorem ipsum dolor sit amet, vel an wisi propriae. Sea ut graece gloriatur. Per ei quando dicant vivendum. An insolens appellantur eos, doctus convenire vis et, at solet aeterno intellegebat qui.--}}
                        {{--</p>--}}
                        {{--<p>--}}
                            {{--Elitr minimum inciderint qui no. Ne mea quaerendum scriptorem consequuntur. Mel ea nobis discere dignissim, aperiam patrioque ei ius. Stet laboramus eos te, his recteque mnesarchum an, quo id adipisci salutatus. Quas solet inimicus eu per. Sonet conclusionemque id vis.--}}
                        {{--</p>--}}
                        {{--<p>--}}
                            {{--Eam vivendo repudiandae in, ei pri sint probatus. Pri et lorem praesent periculis, dicam singulis ut sed. Omnis patrioque sit ei, vis illud impetus molestiae id. Ex viderer assentior mel, inani liber officiis pro et. Qui ut perfecto repudiandae, per no hinc tation labores.--}}
                        {{--</p>--}}
                        {{--<p>--}}
                            {{--Pro cu scaevola antiopam, cum id inermis salutatus. No duo liber gloriatur. Duo id vitae decore, justo consequat vix et. Sea id tale quot vitae.--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="col-sm-4 col-md-6 mid"></div>
    <div class="col-sm-4 col-md-3 sidebar sidebar-right pull-right">
        {{--<div class="panel-group sidebar-body" id="accordion-right">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h4 class="panel-title">--}}
                        {{--<a data-toggle="collapse" href="#taskpane">--}}
                            {{--<i class="fa fa-tasks"></i>--}}
                            {{--Task Pane--}}
                        {{--</a>--}}
                        {{--<span class="pull-right slide-submenu">--}}
                    {{--<i class="fa fa-chevron-right"></i>--}}
                  {{--</span>--}}
                    {{--</h4>--}}
                {{--</div>--}}
                {{--<div id="taskpane" class="panel-collapse collapse in">--}}
                    {{--<div class="panel-body">--}}
                        {{--<p>--}}
                            {{--Lorem ipsum dolor sit amet, vel an wisi propriae. Sea ut graece gloriatur. Per ei quando dicant vivendum. An insolens appellantur eos, doctus convenire vis et, at solet aeterno intellegebat qui.--}}
                        {{--</p>--}}
                        {{--<p>--}}
                            {{--Elitr minimum inciderint qui no. Ne mea quaerendum scriptorem consequuntur. Mel ea nobis discere dignissim, aperiam patrioque ei ius. Stet laboramus eos te, his recteque mnesarchum an, quo id adipisci salutatus. Quas solet inimicus eu per. Sonet conclusionemque id vis.--}}
                        {{--</p>--}}
                        {{--<p>--}}
                            {{--Eam vivendo repudiandae in, ei pri sint probatus. Pri et lorem praesent periculis, dicam singulis ut sed. Omnis patrioque sit ei, vis illud impetus molestiae id. Ex viderer assentior mel, inani liber officiis pro et. Qui ut perfecto repudiandae, per no hinc tation labores.--}}
                        {{--</p>--}}
                        {{--<p>--}}
                            {{--Pro cu scaevola antiopam, cum id inermis salutatus. No duo liber gloriatur. Duo id vitae decore, justo consequat vix et. Sea id tale quot vitae.--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
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


