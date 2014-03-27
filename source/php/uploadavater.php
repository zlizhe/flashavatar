<?php
/**
 * 图片上传操作 PHP
 */

$rs = array();

switch(addcslashes($_GET['action'])){

	//上传头像
	case 'uploadavatar':
		$input = file_get_contents('php://input');
		$data = explode('--------------------', $input);
		//data[0] 为缩放后的图片 多个大小的会取最大的
		@file_put_contents('./avatar_small.jpg', $data[0]);
		//data[1] 为上传的原图
		@file_put_contents('./avatar.jpg', $data[0]);
		//通过对缩放后的图片按需求在缩放 即可实现按比例缩放并保持剪切等操作
        $core->cutphoto($big_file, $small_file, 50, 50);
        
		$rs['status'] = 1;
	break;

}

echo json_encode($rs);

?>
