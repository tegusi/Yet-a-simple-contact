<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">  
    html{height:100%}  
    body{height:100%;margin:0px;padding:0px}  
    #container{height:400px; width:100%;}  
    </style>  
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=BjI5gn8B0vAxxc21hAoaBhL9">
    </script>
    <title> 同学都去哪了</title>
</head>

<body>
    <div style="width:80%;margin:auto 10%;">
        <form action="/action.php" method="post" style="">
            姓名 
            <input type="text" name="name"/>
            <br />
            院校
            <input type="text" name="university"/>
            <br />
            专业
            <input type="text" name="major"/>
            <br />
            城市
            <input type="text" name="city"/>
            <br />
            电话
            <input type="text" name="phone"/>
            <br />
            <input type="submit" value="提交"/>
        </form>
        <a href="/map.php">去地图上看看</a>
        <?php
        echo "<table border='1'>
        <tr>
        <th>姓名</th>
        <th>院校</th>
        <th>专业</th>
        <th>城市</th>
        <th>电话</th>
        </tr>";

        $list=scandir(".");
        $i=0;
        foreach ($list as $f) {
            if(strpos($f, '.')==0&&$f[0]!='.'&&$f[0]!='@') 
            {
                $file=fopen($f, "r");
                //$f=iconv( "GBK", "UTF-8", $f); 
                echo "<tr>";
                echo "<td>" . $f. "</td>";
                echo "<td>" . fgets($file). "</td>";
                echo "<td>" . fgets($file). "</td>";
                echo "<td>" . fgets($file). "</td>";
                echo "<td>" . fgets($file). "</td>";
                echo "</tr>";
                $i++;
            }
        }
        echo "<tr><td>共".$i."人</td></tr>";
        echo "</table>";
        ?>
    </div>
</body>
</html>
