<?php
/**
 * 加水印
 *
 * @param unknown_type $filename图片位置
 * @param unknown_type $waterimg水印图片地址
 * @param unknown_type $waterposition水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
 * @param unknown_type $watertype水印类型,1为文字,2为图片
 * @param unknown_type $waterstring水印文子
 */
function water($filename,$waterimg='',$waterposition=2,$watertype=2,$waterstring="http://www.xyiyo.com/"){

	$image_size = getimagesize($filename);
	$iinfo=getimagesize($filename,$iinfo);
	$nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
	$white=imagecolorallocate($nimage,244,246,235);
	$black=imagecolorallocate($nimage,0,0,0);
	$red=imagecolorallocate($nimage,255,0,0);
	imagefill($nimage,0,0,$white);
	switch ($iinfo[2])
	{
		case 1:
			$simage =imagecreatefromgif($filename);
			break;
		case 2:
			$simage =imagecreatefromjpeg($filename);
			break;
		case 3:
			$simage =imagecreatefrompng($filename);
			break;
		case 6:
			$simage =imagecreatefromwbmp($filename);
			break;
		default:
			die("不支持的文件类型");
			exit;
	}
	imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
	switch($watertype)
	{
		case 1:   //加水印字符串
		switch ($waterposition){
			case 1:
		      imagestring($nimage,2,10,$image_size[1]-15,$waterstring,$black);
		    break;
		    case 2:
		      imagestring($nimage,2,$image_size[0]-50,$image_size[1]-15,$waterstring,$black);
		    break;
		    case 3:
		      imagestring($nimage,2,10,10,$waterstring,$black);
		    break;
		    case 4:
		      imagestring($nimage,2,$image_size[0]-50,10,$waterstring,$black);
		    break;
		    case 5:
		      imagestring($nimage,2,$image_size[0]/2-50,$image_size[1]/2-10,$waterstring,$black);
		    break;
		}
		break;
		case 2:   //加水印图片
		$simage1 =imagecreatefromgif($waterimg);
		$waterimgsize=getimagesize($waterimg);
		switch ($waterposition){
			case 1://左下角
			    imagecopy($nimage,$simage1,10,$image_size[1]-$waterimgsize[1]-10,0,0,$waterimgsize[0],$waterimgsize[1]);
		        break;
			case 2://右下角
				imagecopy($nimage,$simage1,$image_size[0]-$waterimgsize[0]-10,$image_size[1]-$waterimgsize[1]-10,0,0,$waterimgsize[0],$waterimgsize[1]);
				break;
			case 3://左上角
			    imagecopy($nimage,$simage1,10,10,0,0,$waterimgsize[0],$waterimgsize[1]);
		        break;
			case 4://右上角
				imagecopy($nimage,$simage1,$image_size[0]-$waterimgsize[0]-10,10,0,0,$waterimgsize[0],$waterimgsize[1]);
				break;
			case 5://居中
				imagecopy($nimage,$simage1,$image_size[0]/2-$waterimgsize[0]/2,$image_size[1]/2-$waterimgsize[1]/2,0,0,$waterimgsize[0],$waterimgsize[1]);
				break;
		}
		imagedestroy($simage1);
		break;
	}
	switch ($iinfo[2])//覆盖原上传文件
	{
		case 1:
			if (function_exists("imagegif")) {
				imagegif ($nimage, $filename);
			}else{
				imagejpeg($nimage, $filename);
			}
			break;
		case 2:
			imagejpeg($nimage, $filename);
			break;
		case 3:
			imagepng($nimage, $filename);
			break;
		case 6:
			imagewbmp($nimage, $filename);
			//imagejpeg($nimage, $filename);
			break;
	}
		
	imagedestroy($nimage);
	imagedestroy($simage);

}