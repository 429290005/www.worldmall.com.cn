<?php
/**
* @copyright ������
* ����www.phppx.com
* @desc PHP���ﳵ��
*/
class carts {
        var $sortCount; //��Ʒ������
        var $totalCost; //��Ʒ�ܽ��
        /* ���е���Ʒ,�磺$myCart[5][$name]:��Ʒ���Ϊ5������
        *          $myCart[5][$price]:��Ʒ���Ϊ5�ĵ���
        *��������������  $myCart[5][$count]:��Ʒ���Ϊ5������
        *          $myCart[5][$cost]:��Ʒ���Ϊ5�ĺϼƽ��
        */
        var $myCart   ;
        var $Id;      //ÿ����Ʒ��ID�����飩
        var $Name;      //ÿ����Ʒ�����ƣ����飩
        var $Price;      //ÿ����Ʒ�ļ۸����飩
        var $Count;      //ÿ����Ʒ�ļ��������飩
        var $Cost;      //ÿ����Ʒ�ļ�ֵ�����飩


        //******���캯��
        function cart(){
                $this->sortCount = 0   ;
                $this->totalCost = 0   ;
                $this->myCart   = array()   ;
                session_start();   //��ʼ��һ��session
                if(session_is_registered("myCart")==false)   session_register("myCart");
                $this->update();
                //  $this->Calculate();

        }

        //********˽�У�����session��ֵ����������Ӧ����
        function update(){
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;
                if(false==$myCart)
                {
                        $this->sortCount = 0   ;
                        $this->totalCost = 0   ;
                        $this->myCart = array()   ;
                        return false;
                }
                //�õ���Ʒ��������
                $this->sortCount=count($myCart);
                if($this->sortCount>0)
                {
                        //��ʼ������Ʒ�Ľ��
                        $totalCost = 0   ;
                        foreach($myCart as $key=>$val)
                        {
                                //����������
                                foreach($val as $proName=>$proVal)
                                {
                                        if($proName !="name")
                                        {
                                                $val[$proName] = round(eregi_replace(",", "",$proVal),2)   ;
                                                $myCart[$key][$proName] = $val[$proName]   ;
                                        }
                                }

                                //����ÿ����Ʒ�Ľ��
                                $myCart[$key]["cost"] = round($val["count"]*$val["price"], 2)   ;
                                //�õ�������Ʒ�Ľ��
                                $totalCost += $myCart[$key]["cost"]   ;
                        }
                        $this->totalCost = $totalCost   ;
                        $this->myCart = $myCart        ;
                        $_SESSION["myCart"] = $myCart   ;

                }

        }

        /**
* ��ʽ������Ϊ��������
*
*
**/
        function formatNum($data)
        {
                foreach($data as $key=>$val)
                {
                        foreach($val as $sName=>$sValue)
                        {
                                if($sName !="name")
                                {
                                        $data[$key][$sName] = number_format($sValue, 2)   ;
                                }
                        }
                }
                return $data   ;

        }
        //**************����Ϊ�ӿں���

        //*** ��һ����Ʒ
        // �ж��Ƿ��������У����У���count�������һ������Ʒ
        //���ȶ��Ǹ�session��ֵ��Ȼ���ٵ���update() and calculate()�����³�Ա����
        function addOne($id,$na,$pr,$sid,$count)
        {
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;
                //���ù��ﳵ�е�����
				
				$myCart[$id]["goods_id"]  = $id   ;
				
                $myCart[$id]["name"]  = $na   ;
                $myCart[$id]["price"] = $pr   ;
				$myCart[$id]["sid"]   = $sid   ;
                $myCart[$id]["count"] += $count  ;
                $_SESSION["myCart"] = $myCart   ;
                //����һ����ĳ�Ա����
                $this->update();

        }
        /**
* ���ﳵ�����һ����Ʒ,���û�У�������ӣ�����Ѿ����ڣ������Ϊdata
* @param $data  - Ҫ��ӵ���Ʒ,��ʽΪ��
*            $data[0][id],  $data[0][name],
*            $data[0][price],$data[0][count]
* @return boolean
*/
        function addData($data)
        {
                if(count($data > 0))
                {
                        session_start();   //��ʼ��һ��session
                        $myCart = $_SESSION["myCart"]      ;
                        foreach($data as $val)
                        {
                                extract($val)   ;
                                //���ù��ﳵ�е�����
                                $myCart[$id]["name"]  = $name   ;
                                $myCart[$id]["price"] = $price   ;
                                $myCart[$id]["count"] = $count   ;
                        }
                        $_SESSION["myCart"] = $myCart   ;
                        //����һ����ĳ�Ա����
                        $this->update();
                }
        }
        /*
        *������һ����Ʒ�ĵ���
        *
        *
        *
        **/
        function updatePrice($id, $price)
        {
                if($price <=0)   return false   ;
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;
                if($myCart[$id]==true)
                {
                        $myCart[$id]["price"]=$price;

                        $_SESSION["myCart"] = $myCart   ;
                        $this->update();
                }
        }
        //��һ����Ʒ��������1
        function removeOne($id)
        {
                $count = $this->myCart[$id]["count"]   ;
                if($count>0)
                {
                        $this->modifyCount($id, --$count)   ;
                }

        }

        //�ı���Ʒ�ĸ���,������뵥�ۣ���һ����ĵ���
        function modifyCount($id, $ncount, $price=0)
        {
                if($ncount <= 0) return false   ;
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;
                if($myCart[$id]==true)
                {
                        $myCart[$id]["count"]=$ncount;
                        //����д��뵥�ۣ���һ����ĵ���
                        if($price >0 ) $myCart[$id]["price"]=$price;
                        $_SESSION["myCart"] = $myCart   ;
                        $this->update();
                }

        }
		
		
		//�ı���Ʒ�ĸ���,������뵥�ۣ���һ����ĵ���
        function modifyCount2($id, $ncount, $price=0)
        {
                if($ncount <= 0) return false   ;
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;
                if($myCart[$id]==true)
                {
                        $myCart[$id]["count"]=$ncount;
                        //����д��뵥�ۣ���һ����ĵ���
                        if($price >0 ) $myCart[$id]["price"]=$price;
                        $_SESSION["myCart"] = $myCart   ;
                        $this->update();
                }

        }

        //���һ����Ʒ
        function emptyOne($i)
        {
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;
                unset($myCart[$i])   ;
                if(count($myCart)==0)
                {
                        $this->emptyAll()   ;
                }else{
                        $_SESSION["myCart"] = $myCart      ;
                        $this->update();
                }
				// print_r($_SESSION);
				// exit();
        }


        /***************************
        ������е���Ʒ

        ��Ϊ��win��PHP��֧��session_destroy()���������������պ��������ƣ�
        ֻ�ǰ�ÿ����Ʒ�ĸ�����Ϊ0��
        �������linux�£�����ֱ����session_destroy()������
        *****************************/
        function emptyAll()
        {
                session_start();   //��ʼ��һ��session
                $myCart = $_SESSION["myCart"]      ;

                unset($myCart)   ;
                $_SESSION["myCart"] = $myCart      ;
                $this->update();

        }

        /**
  *  �������й��ﳵ�е�����
  *
  **/
        function getData()
        {
                if($this->sortCount > 0)
                {
                        return $this->myCart   ;
                }else{
                        return array()   ;
                }
        }
        //ȡһ����Ʒ����Ϣ����Ҫ�Ĺ�������
        //����һ���������飬�±�ֱ��Ӧ id,name,price,count,cost
        function getOne($i){
                $data = $this->myCart[$i]      ;
                if(false==$data) return array()   ;

                $data["id"]   =   $i           ;
                return $data                ;

        }

        //ȡ�ܵ���Ʒ������
        function getSortCount(){
                return $this->sortCount;
        }

        //ȡ�ܵ���Ʒ��ֵ
        function getTotalCost(){
                return $this->totalCost;
        }

        //end class
}

?> 