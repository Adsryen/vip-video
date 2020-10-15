<?php
	switch($_GET['lx']){
		case 'hqpt':
			$ys = $_GET['ys'];
			
			$jieguo = json_decode(http_request('https://m.zhanqi.tv/api/static/game.lists/100-'.$ys.'.json'));
			
			
			if($jieguo == ''){
				$jieguo = json_decode(http_request('https://m.zhanqi.tv/api/static/game.lists/100-'.$ys.'.json'));
			}
			
			$zong = array();
			
			for($i = 0;$i < count($jieguo->data->games);$i++){
				$json = $jieguo->data->games[$i];
				if($json->tvIcon != ''){
					array_push($zong,array('img'=>$json->spic,'name'=>$json->name,'id'=>$json->id));
				}
			}
			
			echo json_encode($zong);
			break;
		case 'hqzb':
			$ys = $_GET['ys'];
			$id = $_GET['id'];
			
			$jieguo = json_decode(http_request('https://m.zhanqi.tv/api/static/game.lives/'.$id.'/100-'.$ys.'.json'));
			if(count($jieguo) == 0){
				$jieguo = json_decode(http_request('https://m.zhanqi.tv/api/static/game.lives/'.$id.'/100-'.$ys.'.json'));
			}
			$zong = array();
			for($i = 0;$i < count($jieguo->data->rooms);$i++){
				$json = $jieguo->data->rooms[$i];
				if($json->videoId != ''){
					array_push($zong,array('img'=>$json->spic,'name'=>$json->title,'video'=>$json->videoId,'nickname'=>str_replace('战丶旗',"",$json->nickname)));
				}
			}
			echo json_encode($zong);
			break;
	}

	function http_request($url,$data = null){  
		$curl = curl_init();  
		curl_setopt($curl, CURLOPT_URL, $url);  
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);    
		if(!empty($data)){  
			curl_setopt($curl,CURLOPT_POST,1);  
			curl_setopt($curl,CURLOPT_POSTFIELDS,$data);  
		}  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
		$output = curl_exec($curl);  
		curl_close($curl);  
		return $output;   
	}  

?>