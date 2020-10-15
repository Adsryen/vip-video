<?php


namespace app\index\controller;

use think\Controller;
class Dao extends Controller
{
	public function txt()
	{
		$_var_0 = input('content');
		Header('Content-type:   application/octet-stream ');
		Header('Accept-Ranges:   bytes ');
		header('Content-Disposition:   attachment;   filename=' . date('Y-m-d H:i:s') . '.txt ');
		header('Expires:   0 ');
		header('Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 ');
		header('Pragma:   public ');
		echo str_replace('<br><hr>', '
', $_var_0);
	}
	public function copy()
	{
		$_var_1 = input('content');
		return view('copy');
	}
	public function excel()
	{
		$_var_2 = input('content');
		header('Content-Type: application/vnd.ms-excel; name=\'excel\'');
		header('Content-type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . date('Y-m-d H:i:s') . '.xls');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		header('Expires: 0');
		echo str_replace('<br><hr>', '
', $_var_2);
	}
	public function cexcel()
	{
		if (session('power') == '0') {
			$_var_3['y'] = '0';
		} else {
			$_var_3['uid'] = session('user');
			$_var_3['y'] = '0';
		}
		if (input('user')) {
			$_var_4 = input('user');
			$_var_3['dianka'] = ['like', "%{$_var_4}%"];
		}
		if (input('start') && input('end')) {
			$_var_3['ctime'] = ['between', strtotime(input('start') . ' 00:00:00') . ',' . strtotime(input('end') . ' 00:00:00')];
		} else {
			if (input('start')) {
				$_var_3['ctime'] = ['>', strtotime(input('start') . ' 00:00:00')];
			}
			if (input('end')) {
				$_var_3['ctime'] = ['<', strtotime(input('end') . ' 00:00:00')];
			}
		}
		if (input('day')) {
			$_var_3['name'] = input('day');
		}
		header('Content-Type: application/vnd.ms-excel; name=\'excel\'');
		header('Content-type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . date('Y-m-d H:i:s') . '.xls');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: no-cache');
		header('Expires: 0');
		$_var_5 = db('dianka')->where($_var_3)->paginate(20);
		echo '<table>';
		foreach ($_var_5 as $_var_6) {
			echo '<tr>';
			echo '<td>';
			echo $_var_6['dianka'];
			echo '</td>';
			echo '<td>';
			echo $_var_6['name'];
			echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	public function ctxt()
	{
		if (session('power') == '0') {
			$_var_7['y'] = '0';
		} else {
			$_var_7['uid'] = session('user');
			$_var_7['y'] = '0';
		}
		if (input('user')) {
			$_var_8 = input('user');
			$_var_7['dianka'] = ['like', "%{$_var_8}%"];
		}
		if (input('start') && input('end')) {
			$_var_7['ctime'] = ['between', strtotime(input('start') . ' 00:00:00') . ',' . strtotime(input('end') . ' 00:00:00')];
		} else {
			if (input('start')) {
				$_var_7['ctime'] = ['>', strtotime(input('start') . ' 00:00:00')];
			}
			if (input('end')) {
				$_var_7['ctime'] = ['<', strtotime(input('end') . ' 00:00:00')];
			}
		}
		if (input('day')) {
			$_var_7['name'] = input('day');
		}
		$_var_9 = db('dianka')->where($_var_7)->paginate(1000);
		Header('Content-type:   application/octet-stream ');
		Header('Accept-Ranges:   bytes ');
		header('Content-Disposition:   attachment;   filename=' . date('Y-m-d H:i:s') . '.txt ');
		header('Expires:   0 ');
		header('Cache-Control:   must-revalidate,   post-check=0,   pre-check=0 ');
		header('Pragma:   public ');
		$_var_9 = db('dianka')->where($_var_7)->paginate(1000);
		foreach ($_var_9 as $_var_10) {
			echo $_var_10['name'];
			echo '------';
			echo $_var_10['dianka'];
			echo '
';
		}
	}
}