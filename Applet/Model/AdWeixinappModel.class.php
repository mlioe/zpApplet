<?php 
namespace Applet\Model;
use Think\Model;
class AdWeixinappModel extends Model{
	public $category = array('QS_weixinapp_indexfocus'=>'轮播广告750x325px');
	protected $_validate = array(
	);
	protected $_auto = array (
		array('is_display',0),
		array('addtime','time',1,'function'),
		array('starttime','timestamp',3,'callback'),
		array('deadline','timedtamp',3,'callback'),
	);
	protected function timestamp($d){
		return $d ? strtotime($d) : time();
	}
	protected function timedtamp($d){
		return $d ? strtotime($d) : 0;
	}
	/*
		获取广告列表
		@ $where 查询条件 array
		@ $offset 显示数目  默认 10
		返回值 array
		$result  广告列表
	*/
	public function get_ad_list($where,$offset=10){
		$result = $this->where($where)->order('show_order desc')->limit($offset)->select();
		return $result;
	}
}
?>