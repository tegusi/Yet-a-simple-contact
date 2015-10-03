<!DOCTYPE html>  
<html>  
<head>  
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <title>地图展示</title>  
    <style type="text/css">  
    html{height:100%}  
    body{height:100%;margin:0px;padding:0px}  
    #container{height:95%;width:100%;}  
    </style>  
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.5&ak=BjI5gn8B0vAxxc21hAoaBhL9"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/library/DistanceTool/1.2/src/DistanceTool_min.js"></script>
</head>  

<body>  
    <div id="container"></div> 
    <script type="text/javascript"> 
    var map = new BMap.Map("container");
    map.enableScrollWheelZoom();
var point = new BMap.Point(108.54, 38.16);  // 创建点坐标  
map.centerAndZoom(point, 6);                 // 初始化地图，设置中心点坐标和地图级别  
map.addControl(new BMap.NavigationControl());  
var myDis = new BMapLib.DistanceTool(map);
var myGeo = new BMap.Geocoder();
<?php
class college
{
    public $city,$name,$major;
}
$list=scandir(".");
$data=array();
foreach ($list as $f) {
    if(strpos($f, '.')==0&&$f[0]!='.')
    {
        $file=fopen($f, "r");
        // $f=iconv( "GBK", "UTF-8", $f);
        $a=fgets($file);$a=preg_replace("/\s/","",$a);
        if(array_key_exists($a, $data)) {$data[$a]->name.="&".$f;$c=fgets($file);$c=preg_replace("/\s/","",$c);$data[$a]->major.="&".$c;continue;}
        $b=new college();
        $b->name=$f;
        $c=fgets($file);$c=preg_replace("/\s/","",$c);
        $b->major=$c;
        $c=fgets($file);$c=preg_replace("/\s/","",$c);
        $b->city=$c;
        $data[$a]=$b;
    }
}
foreach ($data as $c => $b) {
    if(strcmp($b->name,"王冠宇")==0)
    {
        echo "myGeo.getPoint(\"长沙市北区三一大道\", function(point){  
            if (point) {
                var marker = new BMap.Marker(point); 
                var opts = {
                    width : 200,
                    height: 100,
                    title : \"$b->name\",
                }
                var infoWindow = new BMap.InfoWindow(\"$c\\n$b->major\", opts); 
                marker.addEventListener(\"click\", function(){          
                    map.openInfoWindow(infoWindow,point);
                });
map.addOverlay(marker);
var label = new BMap.Label(\"$b->name\",{offset:new BMap.Size(20,10)});
marker.setLabel(label);   
}      
}, \"$b->city\");\n";
}
else if(strcmp($b->name,"张宁育")==0)
{
    echo "myGeo.getPoint(\"北京市昌平区沙河高教园区\", function(point){  
        if (point) {
            var marker = new BMap.Marker(point); 
            var opts = {
                width : 200,
                height: 100,
                title : \"$b->name\",
            }
            var infoWindow = new BMap.InfoWindow(\"$c\\n$b->major\", opts); 
            marker.addEventListener(\"click\", function(){          
                map.openInfoWindow(infoWindow,point);
            });
map.addOverlay(marker);
var label = new BMap.Label(\"$b->name\",{offset:new BMap.Size(20,10)});
marker.setLabel(label);   
}      
}, \"$b->city\");\n";
}
else if(strcmp($b->name,"王帅")==0)
{
    echo "myGeo.getPoint(\"解放南路269号\", function(point){  
        if (point) {
            var marker = new BMap.Marker(point); 
            var opts = {
                width : 200,
                height: 100,
                title : \"$b->name\",
            }
            var infoWindow = new BMap.InfoWindow(\"$c\\n$b->major\", opts); 
            marker.addEventListener(\"click\", function(){          
                map.openInfoWindow(infoWindow,point);
            });
map.addOverlay(marker);
var label = new BMap.Label(\"$b->name\",{offset:new BMap.Size(20,10)});
marker.setLabel(label);   
}      
}, \"$b->city\");\n";
}
else if(strcmp($b->name,"杨舒然")==0)
{
    echo "myGeo.getPoint(\"东南大学路2号\", function(point){  
        if (point) {
            var marker = new BMap.Marker(point); 
            var opts = {
                width : 200,
                height: 100,
                title : \"$b->name\",
            }
            var infoWindow = new BMap.InfoWindow(\"$c\\n$b->major\", opts); 
            marker.addEventListener(\"click\", function(){          
                map.openInfoWindow(infoWindow,point);
            });
map.addOverlay(marker);
var label = new BMap.Label(\"$b->name\",{offset:new BMap.Size(20,10)});
marker.setLabel(label);   
}      
}, \"$b->city\");\n";
}
else {echo "myGeo.getPoint(\"$c\", function(point){  
    if (point) {
        var marker = new BMap.Marker(point); 
        var opts = {
            width : 200,
            height: 100,
            title : \"$b->name\",
        }
        var infoWindow = new BMap.InfoWindow(\"$c\\n$b->major\", opts); 
        marker.addEventListener(\"click\", function(){          
            map.openInfoWindow(infoWindow,point);
        });
map.addOverlay(marker);
var label = new BMap.Label(\"$b->name\",{offset:new BMap.Size(20,10)});
marker.setLabel(label);   
}      
}, \"$b->city\");\n";
}
}
?>
</script> 
<input type="button" value="开启测距工具" onclick="myDis.open()" />    
<input type="button" value="关闭" onclick="myDis.close()" />
<div style="display:none"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1255856800'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1255856800' type='text/javascript'%3E%3C/script%3E"));</script></div>
</body>  
</html>