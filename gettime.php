<?php
$token="4ab76642bc8211d038356a7744007e4a883fc054";
$url1="https://vijos.org/p/1006";
function getWebDiv($div_id,$url=false,$data=false){
        if($url !== false){
            $data = file_get_contents( $url );
        }
        $charset_pos = stripos($data,'charset');
        if($charset_pos) {
            if(stripos($data,'charset=utf-8',$charset_pos)) {
                $data = iconv('utf-8','utf-8',$data);
            }else if(stripos($data,'charset=gb2312',$charset_pos)) {
                $data = iconv('gb2312','utf-8',$data);
            }else if(stripos($data,'charset=gbk',$charset_pos)) {
                $data = iconv('gbk','utf-8',$data);
            }
        }
        
        preg_match_all('/<div/i',$data,$pre_matches,PREG_OFFSET_CAPTURE);    //获取所有div前缀
        preg_match_all('/<\/div/i',$data,$suf_matches,PREG_OFFSET_CAPTURE); //获取所有div后缀
        $hit = strpos($data,$div_id);
        if($hit == -1) return false;    //未命中
        $divs = array();    //合并所有div
        foreach($pre_matches[0] as $index=>$pre_div){
            $divs[(int)$pre_div[1]] = 'p';
            $divs[(int)$suf_matches[0][$index][1]] = 's';    
        }
        
        //对div进行排序
        $sort = array_keys($divs);
        asort($sort);
        
        $count = count($pre_matches[0]);
        foreach($pre_matches[0] as $index=>$pre_div){
            //<div $hit <div+1    时div被命中
            if(($pre_matches[0][$index][1] < $hit) && ($hit < $pre_matches[0][$index+1][1])){
                $deeper = 0;
                //弹出被命中div前的div
                while(array_shift($sort) != $pre_matches[0][$index][1] && ($count--)) continue;
                //对剩余div进行匹配，若下一个为前缀，则向下一层，$deeper加1，
                //否则后退一层，$deeper减1，$deeper为0则命中匹配，计算div长度
                foreach($sort as $key){
                    if($divs[$key] == 'p') $deeper++;
                    else if($deeper == 0) {
                        $length = $key-$pre_matches[0][$index][1];
                        break;
                    }else {
                        $deeper--;
                    }
                }
                $hitDivString = substr($data,$pre_matches[0][$index][1],$length).'</div>';
                break;
            }
        }
        return $hitDivString;
    }

function login_post($url, $cookie, $post) { 
    $curl = curl_init();//初始化curl模块 
    curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址 
    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//是否自动显示返回的信息 
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中 
    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_exec($curl);//执行cURL 
    curl_close($curl);//关闭cURL资源，并且释放系统资源 
} 


echo getWebDiv('id="taglist"','http://www.cnblogs.com/Zjmainstay/tag/');
echo getWebDiv('id="mysubmits"',$url1);
?>