<?php
	include("images.php");
	include("FileUploader.php");
	include("image.php");
	
	date_default_timezone_set('PRC');
	
	function upload($table,$allowExts='jpg,png,gif,bmp,rar,pdf',$maxSize=102400000,$middle=0,$middlesize='300*259',$small=0,$smallsize='150*150',$water=0)
	{
        //表名,图片格式,图片大小,是否缩略图,缩略图大小,是否加水印
		//global $pic0;  
		if(!empty($_FILES)){
			$picExts = '.jpg/.png/.gif';//当是图片类型时	
			$name=$table;
			$allowExts=$allowExts;//允许上传的类型
			$maxSize=$maxSize; // 1000KB
			$uploadDir = 'uploads/'.$table.'/';//原图上传目录
			$small_uploadDir='uploads/sm_'.$table.'/';//缩略图上传目录
			$middle_uploadDir='uploads/mid_'.$table.'/';//缩略图上传目录
			
			//if($table=="products")
//			{
//			$smalls_uploadDir='../upload/smm_'.$table.'/';//最小缩略图上传目录
//			if(!is_dir($smalls_uploadDir))mkdir($smalls_uploadDir);
//			}
			
			if(!is_dir($uploadDir))mkdir($uploadDir);
			if(!is_dir($small_uploadDir))mkdir($small_uploadDir);
			if(!is_dir($middle_uploadDir))mkdir($middle_uploadDir);
			
			$uploader =& new FLEA_Helper_FileUploader();
			$files =& $uploader->getFiles();
			
			$i=0;
			$pic=array();
			foreach ($files as $key=>$file){
			
			        if(!$file->check($allowExts, $maxSize)){
						// 上传的文件类型不符或者超过了大小限制。
//echo "<script language='javascript'>alert('Upload error');history.go(-1);/script>";
exit();
					}
				$time=date('Y').date('m').date('d').date('H').date('i').date('s');
				$filename = $name .'-'.$time.$i.'.' . strtolower($file->getExt());
				
				
				$pic[$i]=$filename;
				
				
				$up_filename=$uploadDir . '/' . $filename;//原图上传位置
				$small_up_filename=$small_uploadDir . '/' . $filename;//缩略图上传位置
				$mid_up_filename=$middle_uploadDir . '/' . $filename;//缩略图上传位置
				
				//if($table=="products")
//				{
//					$smalls_up_filename=$smalls_uploadDir . '/' . $filename;//缩略图上传位置
//				}
				
				if($small){
				    if($file->check($picExts)){//生成缩略图
						$image =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						//$images =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						
						$smallsize2=explode('*',$smallsize);//缩略图大小
						$image->crop($smallsize2[0], $smallsize2[1], true, true);
						$image->saveAsJpeg($small_up_filename);
						$image->destory();
						
						
						//if($table=="products")
//						{
//						$smallsize3=explode('*','100*100');//最小缩略图大小
//						$images->crop($smallsize3[0], $smallsize3[1], true, true);
//						$images->saveAsJpeg($smalls_up_filename);
//						$images->destory();
//						}
					}
				}
				
				if($middle){
				    if($file->check($picExts)){//生成缩略图
						$image =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						//$images =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						
						$middlesize2=explode('*',$middlesiz);//缩略图大小
						$image->crop($middlesize2[0], $middlesize2[1], true, true);
						$image->saveAsJpeg($mid_up_filename);
						$image->destory();
						
						
						//if($table=="products")
//						{
//						$smallsize3=explode('*','100*100');//最小缩略图大小
//						$images->crop($smallsize3[0], $smallsize3[1], true, true);
//						$images->saveAsJpeg($smalls_up_filename);
//						$images->destory();
//						}
					}
				}
				
				if($water){//生成水印
					$waterimg='images/water.gif';
					water($file->getTmpName(),$waterimg);
				}


				$file->move($up_filename);
				$i++;
			}

		}
		
		return $pic;
	}
	

?>
