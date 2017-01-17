<?php
	include("images.php");
	include("FileUploader.php");
	include("image.php");
	
	date_default_timezone_set('PRC');
	
	function upload($table,$allowExts='jpg,png,gif,bmp,rar,pdf',$maxSize=102400000,$small=0,$smallsize='150*130',$water=0)
	{
        //����,ͼƬ��ʽ,ͼƬ��С,�Ƿ�����ͼ,����ͼ��С,�Ƿ��ˮӡ
		//global $pic0;  
		if(!empty($_FILES)){
			$picExts = '.jpg/.png/.gif';//����ͼƬ����ʱ	
			$name=$table;
			$allowExts=$allowExts;//�����ϴ�������
			$maxSize=$maxSize; // 1000KB
			$uploadDir = 'uploads/'.$table.'/';//ԭͼ�ϴ�Ŀ¼
			$small_uploadDir='uploads/sm_'.$table.'/';//����ͼ�ϴ�Ŀ¼
			
			
			if($table=="goods")
			{
			$smalls_uploadDir='uploads/smm_'.$table.'/';//��С����ͼ�ϴ�Ŀ¼
			if(!is_dir($smalls_uploadDir))mkdir($smalls_uploadDir);
			}
			
			if($table=="memberproduct")
			{
			$smalls_uploadDir='uploads/smm_'.$table.'/';//��С����ͼ�ϴ�Ŀ¼
			if(!is_dir($smalls_uploadDir))mkdir($smalls_uploadDir);
			}
			
			if($table=="member")
			{
			$smalls_uploadDir='uploads/smm_'.$table.'/';//��С����ͼ�ϴ�Ŀ¼
			if(!is_dir($smalls_uploadDir))mkdir($smalls_uploadDir);
			}
			
			// if($table=="goodsimg")
			// {
				// $smallss_uploadDir='uploads/smm_'.$table.'/';//��С����ͼ�ϴ�Ŀ¼
				// if(!is_dir($smallss_uploadDir))mkdir($smallss_uploadDir);
			// }
			
			if(!is_dir($uploadDir))mkdir($uploadDir);
			if(!is_dir($small_uploadDir))mkdir($small_uploadDir);
			
			$uploader =& new FLEA_Helper_FileUploader();
			$files =& $uploader->getFiles();
			
			$i=0;
			$pic=array();
			foreach ($files as $key=>$file){
			
			        if(!$file->check($allowExts, $maxSize)){
						// �ϴ����ļ����Ͳ������߳����˴�С���ơ�
//echo "<script language='javascript'>alert('Upload error');history.go(-1);/script>";
exit();
					}
				$time=date('Y').date('m').date('d').date('H').date('i').date('s');
				$filename = $name .'-'.$time.$i.'.' . strtolower($file->getExt());
				
				
				$pic[$i]=$filename;
				
				
				$up_filename=$uploadDir . '/' . $filename;//ԭͼ�ϴ�λ��
				$small_up_filename=$small_uploadDir . '/' . $filename;//����ͼ�ϴ�λ��
				
				if($table=="goods")
				{
					$smalls_up_filename=$smalls_uploadDir . '/' . $filename;//����ͼ�ϴ�λ��
					
				}
				
				if($table=="memberproduct")
				{
					$smalls_up_filename=$smalls_uploadDir . '/' . $filename;//����ͼ�ϴ�λ��
					
				}
				
				if($table=="member")
				{
					$smalls_up_filename=$smalls_uploadDir . '/' . $filename;//����ͼ�ϴ�λ��
					
				}
				
				// if($table=="goodsimg")
				// {
					// $smallss_up_filename=$smallss_uploadDir . '/' . $filename;//����ͼ�ϴ�λ��
					
				// }
				
				if($small){
				    if($file->check($picExts)){//��������ͼ
						$image =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						$images =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						$imagess =& FLEA_Helper_Image::createFromFile($file->getTmpName(), $file->getExt());
						
						$smallsize2=explode('*',$smallsize);//����ͼ��С
						$image->crop($smallsize2[0], $smallsize2[1], true, true);
						$image->saveAsJpeg($small_up_filename);
						$image->destory();
						
						
						if($table=="goods")
						{
							$smallsize3=explode('*','450*474');//��С����ͼ��С
							$images->crop($smallsize3[0], $smallsize3[1], true, true);
							$images->saveAsJpeg($smalls_up_filename);
							$images->destory();
						}
						
						if($table=="memberproduct")
						{
							$smallsize3=explode('*','120*90');//��С����ͼ��С
							$images->crop($smallsize3[0], $smallsize3[1], true, true);
							$images->saveAsJpeg($smalls_up_filename);
							$images->destory();
						}
						
						if($table=="member")
						{
							$smallsize3=explode('*','120*90');//��С����ͼ��С
							$images->crop($smallsize3[0], $smallsize3[1], true, true);
							$images->saveAsJpeg($smalls_up_filename);
							$images->destory();
						}
						
						// if($table=="goodsimg")
						// {
							// $smallsize4=explode('*','70*70');//��С����ͼ��С
							// $imagess->crop($smallsize4[0], $smallsize4[1], true, true);
							// $imagess->saveAsJpeg($smallss_up_filename);
							// $imagess->destory();
						// }
					}
				}
				
				if($water){//����ˮӡ
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
