<?php  function fication($url)
{ require 'config.php';
if(preg_match("/url=58/",$url)){return $a58;} 
if(preg_match("/url=59/",$url)){return $a59;} 
if(preg_match("/url=26/",$url)){return $tdyun;}
if(preg_match("/2ya.tv/",$url)){return $mmm;}
if(preg_match("/~lianlian/",$url)){return $lianlian;} 
if(preg_match("/lamian.tv/",$url)){return $llamian;} 
if(preg_match("/url=avyun/",$url)){return $lamian;}
if(preg_match("/url=19/",$url)){return $longzhu;}
if(preg_match("/url=63/",$url)){return $leyun;}
if(preg_match("/url=v3/",$url)){return $daum;}
if(preg_match("/url=64/",$url)){return $leyun;}
if(preg_match("/url=65/",$url)){return $leyun;}
if(preg_match("/url=31/",$url)){return $leyun;}
if(preg_match("/bdstatic.com/",$url)){return $mpp;}
if(preg_match("/zuidazy.com/",$url)){return $zhilian;}
if(preg_match("/ancao.org/",$url)){return $zhilian;}
if(preg_match("/url=32/",$url)){return $leyun;}
if(preg_match("/url=33/",$url)){return $leyun;}
if(preg_match("/url=34/",$url)){return $leyun;}
if(preg_match("/url=35/",$url)){return $leyun;}
if(preg_match("/url=36/",$url)){return $leyun;}
if(preg_match("/url=37/",$url)){return $leyun;}
if(preg_match("/url=38/",$url)){return $leyun;}
if(preg_match("/url=MT/",$url)){return $leyun;}
if(preg_match("/qq.com/",$url)){return $qq;}
if(preg_match("/52avhd.com/",$url)){return $mmu;} 
if(preg_match("/mtv/",$url)){return $baidu;}
if(preg_match("/cctv.com/",$url)){return $cntv;}
if(preg_match("/1188uc.com/",$url)){return $zhilian;}
if(preg_match("/fahai1.club/",$url)){return $zhilian;}
if(preg_match("/url=C/",$url)){return $c; }
 if(preg_match("/qq.com/",$url)){ return $qq; } 
  if(preg_match("/ksbbs.com/",$url)){ return $mpp; } 
 if(preg_match("/mgtv.com/",$url)){ return $mgtv; } 
  if(preg_match("/hunantv.com/",$url)){ return $mgtv; }
 if(preg_match("/youku.com/",$url)){ return $youku; }
  if(preg_match("/kuaishou.com/",$url)){ return $kuaishou; }
  if(preg_match("/ifeng.com/",$url)){ return $ifeng; }
  if(preg_match("/tudou.com/",$url)){ return $tudou; } 
  if(preg_match("/le/",$url)){ return $le; } 

  if(preg_match("/sohu.com/",$url)){ return $sohu; } 
    if(preg_match("/iqiyi/",$url)){ return $iqiyi; }
    if(preg_match("/56.com/",$url)){ return $cntv; } 
  if(preg_match("/kankan.com/",$url)){ return $kankan; } 
  if(preg_match("/pps.com/",$url)){ return $pps; } 
  if(preg_match("/fun.tv/",$url)){ return $fun; } 
  if(preg_match("/pptv.com/",$url)){ return $pptv; } 
  if(preg_match("/wasu.cn/",$url)){ return $wasu; } 
  if(preg_match("/bilibili/",$url)){ return $bilibili; }
  if(preg_match("/cntv.cn/",$url)){ return $cntv; }
   if(preg_match("/acfun.cn/",$url)){ return $acfun; }
	if(preg_match("/fun.tv/",$url)){ return $fun; }
	    if(preg_match("/baofeng.com/",$url)){ return $baofeng; }
		  if(preg_match("/tangdou.com/",$url)){ return $tangdou; }
		  if(preg_match("/yinyuetai.com/",$url)){ return $cntv; }
		  if(preg_match("/youmi.cn/",$url)){ return $qita; }
		  if(preg_match("/baomihua.com/",$url)){ return $qita; }
		  if(preg_match("/sina.com.cn/",$url)){ return $qita; }
		  if(preg_match("/163.com/",$url)){ return $qita; }
		  if(preg_match("/1905.com/",$url)){ return $qita; }
		   if(preg_match("/youmi.cn/",$url)){ return $qita; }
		    if(preg_match("/aipai.com/",$url)){ return $qita; }
			 if(preg_match("/waqu.com/",$url)){ return $qita; }
			
			  if(preg_match("/yy.com/",$url)){ return $cntv; }
			  if(preg_match("/ifeng.com/",$url)){ return $qita; }
			   if(preg_match("/vlook.cn/",$url)){ return $qita; }
			    if(preg_match("/miaopai.com/",$url)){ return $qita; }
			  if(preg_match("/ksbbs.com/",$url)){ return $mpp; }
			   if(preg_match("/geely.com/",$url)){ return $mpp; }
			  if(preg_match("/360.cn/",$url)){ return $msub; }
  return "bzc"; } 
  function encrypt($key,$plain_text){ $plain_text = trim($plain_text); $iv=substr(md5($key),0,mcrypt_get_iv_size(MCRYPT_CAST_256,MCRYPT_MODE_CFB)); $c_t=mcrypt_cfb(MCRYPT_CAST_256,$key,$plain_text,MCRYPT_ENCRYPT,$iv); return trim(chop(base64_encode($c_t))); } function decrypt($key,$c_t){ $c_t=trim(chop(base64_decode($c_t))); $iv=substr(md5($key),0,mcrypt_get_iv_size(MCRYPT_CAST_256,MCRYPT_MODE_CFB)); $p_t=mcrypt_cfb(MCRYPT_CAST_256,$key,$c_t,MCRYPT_DECRYPT,$iv); return trim(chop($p_t)); } ?>