<?php
namespace app\common\model;
use think\Db;
use think\Cache;
use app\common\util\Pinyin;

class Actor extends Base {
    // 设置数据表（不含前缀）
    protected $name = 'actor';

    // 定义时间戳字段名
    protected $createTime = '';
    protected $updateTime = '';

    // 自动完成
    protected $auto       = [];
    protected $insert     = [];
    protected $update     = [];

    public function getActorStatusTextAttr($val,$data)
    {
        $arr = [0=>'禁用',1=>'启用'];
        return $arr[$data['actor_status']];
    }

    public function countData($where)
    {
        $total = $this->where($where)->count();
        return $total;
    }

    public function listData($where,$order,$page=1,$limit=20,$start=0,$field='*',$addition=1,$totalshow=1)
    {
        if(!is_array($where)){
            $where = json_decode($where,true);
        }
        $where2='';
        if(!empty($where['_string'])){
            $where2 = $where['_string'];
            unset($where['_string']);
        }

        $limit_str = ($limit * ($page-1) + $start) .",".$limit;
        if($totalshow==1) {
            $total = $this->where($where)->count();
        }
        $list = Db::name('Actor')->field($field)->where($where)->where($where2)->orderRaw($order)->limit($limit_str)->select();
        foreach($list as $k=>$v){

        }
        return ['code'=>1,'msg'=>'数据列表','page'=>$page,'pagecount'=>ceil($total/$limit),'limit'=>$limit,'total'=>$total,'list'=>$list];
    }

    public function listCacheData($lp)
    {
        if (!is_array($lp)) {
            $lp = json_decode($lp, true);
        }

        $order = $lp['order'];
        $by = $lp['by'];
        $ids = $lp['ids'];
        $paging = $lp['paging'];
        $pageurl = $lp['pageurl'];
        $level = $lp['level'];
        $wd = $lp['wd'];
        $name = $lp['name'];
        $area = $lp['area'];
        $letter = $lp['letter'];
        $sex = $lp['sex'];
        $starsign = $lp['starsign'];
        $blood = $lp['blood'];
        $start = intval(abs($lp['start']));
        $num = intval(abs($lp['num']));
        $half = intval(abs($lp['half']));
        $timeadd = $lp['timeadd'];
        $timehits = $lp['timehits'];
        $time = $lp['time'];
        $hitsmonth = $lp['hitsmonth'];
        $hitsweek = $lp['hitsweek'];
        $hitsday = $lp['hitsday'];
        $hits = $lp['hits'];
        $not = $lp['not'];
        $cachetime = $lp['cachetime'];

        $page = 1;
        $where = [];
        $totalshow=0;

        if(empty($num)){
            $num = 20;
        }
        if($start>1){
            $start--;
        }
        if(!in_array($paging, ['yes', 'no'])) {
            $paging = 'no';
        }
        $param = mac_param_url();
        if($paging=='yes') {
            $totalshow = 1;
            if(!empty($param['ids'])){
                $ids = $param['ids'];
            }
            if(!empty($param['level'])) {
                if($param['level']=='all'){
                    $level = '1,2,3,4,5,6,7,8,9';
                }
                else{
                    $level = $param['level'];
                }
            }
            if(!empty($param['letter'])) {
                $letter = $param['letter'];
            }
            if(!empty($param['sex'])){
                $sex = $param['sex'];
            }
            if(!empty($param['area'])) {
                $area = $param['area'];
            }
            if(!empty($param['starsign'])){
                $starsign = $param['starsign'];
            }
            if(!empty($param['blood'])){
                $blood = $param['blood'];
            }

            if(!empty($param['wd'])) {
                $wd = $param['wd'];
            }
            if(!empty($param['by'])){
                $by = $param['by'];
            }
            if(!empty($param['order'])){
                $order = $param['order'];
            }
            if(!empty($param['page'])){
                $page = intval($param['page']);
            }
            foreach($param as $k=>$v){
                if(empty($v)){
                    unset($param[$k]);
                }
            }
            if(empty($pageurl)){
                $pageurl = 'actor/index';
            }
            $param['page'] = 'PAGELINK';
            $pageurl = mac_url($pageurl,$param);

        }

        $where['actor_status'] = ['eq',1];
        if(!empty($level)) {
            if($level=='all'){
                $level = '1,2,3,4,5,6,7,8,9';
            }
            $where['actor_level'] = ['in',explode(',',$level)];
        }
        if(!empty($ids)) {
            if($ids!='all'){
                $where['actor_id'] = ['in',explode(',',$ids)];
            }
        }
        if(!empty($not)){
            $where['actor_id'] = ['not in',explode(',',$not)];
        }
        if(!empty($sex)){
            $where['actor_sex'] = ['eq',$sex];
        }
        if(!empty($letter)){
            if(substr($letter,0,1)=='0' && substr($letter,2,1)=='9'){
                $letter='0,1,2,3,4,5,6,7,8,9';
            }
            $where['actor_letter'] = ['in',explode(',',$letter)];
        }

        if(!empty($timeadd)){
            $s = intval(strtotime($timeadd));
            $where['actor_time_add'] =['gt',$s];
        }
        if(!empty($timehits)){
            $s = intval(strtotime($timehits));
            $where['actor_time_hits'] =['gt',$s];
        }
        if(!empty($time)){
            $s = intval(strtotime($time));
            $where['actor_time'] =['gt',$s];
        }
        if(!empty($hitsmonth)){
            $tmp = explode(' ',$hitsmonth);
            if(count($tmp)==1){
                $where['actor_hits_month'] = ['gt', $tmp];
            }
            else{
                $where['actor_hits_month'] = [$tmp[0],$tmp[1]];
            }
        }
        if(!empty($hitsweek)){
            $tmp = explode(' ',$hitsweek);
            if(count($tmp)==1){
                $where['actor_hits_week'] = ['gt', $tmp];
            }
            else{
                $where['actor_hits_week'] = [$tmp[0],$tmp[1]];
            }
        }
        if(!empty($hitsday)){
            $tmp = explode(' ',$hitsday);
            if(count($tmp)==1){
                $where['actor_hits_day'] = ['gt', $tmp];
            }
            else{
                $where['actor_hits_day'] = [$tmp[0],$tmp[1]];
            }
        }
        if(!empty($hits)){
            $tmp = explode(' ',$hits);
            if(count($tmp)==1){
                $where['actor_hits'] = ['gt', $tmp];
            }
            else{
                $where['actor_hits'] = [$tmp[0],$tmp[1]];
            }
        }

        if(!empty($area)){
            $where['actor_area'] = ['in',explode(',',$area) ];
        }
        if(!empty($starsign)){
            $where['actor_starsign'] = ['in',explode(',',$starsign) ];
        }
        if(!empty($blood)){
            $where['actor_blood'] = ['in',explode(',',$blood) ];
        }

        if(!empty($name)){
            $where['actor_name'] = ['in',explode(',',$name) ];
        }
        if(!empty($wd)) {
            $where['actor_name|actor_en'] = ['like', '%' . $wd . '%'];
        }
        if($by=='rnd'){
            $data_count = mac_data_count(0,'all','actor');
            $data_min = mac_data_count(0,'min','actor');
            $maxi = $data_count-$lp['num'];
            if($maxi<0){ $maxi=0; }
            $randi = @mt_rand($data_min, $data_min + $maxi);
            if($randi<0) { $randi=0; }
            $where['actor_id'] = ['gt',$randi];
            $by='time';
            $order='asc';
        }
        if(!in_array($by, ['id', 'time','time_add','score','hits','hits_day','hits_week','hits_month','up','down','level','rnd','in'])) {
            $by = 'time';
        }
        if(!in_array($order, ['asc', 'desc'])) {
            $order = 'desc';
        }

        $where_cache = $where;
        if(!empty($randi)){
            unset($where_cache['actor_id']);
            $where_cache['order'] = 'rnd';
        }


        if($by=='in' && !empty($name) ){
            $order = ' find_in_set(actor_name, \''.$name.'\'  ) ';
        }
        else{
            if($by=='in' && empty($name) ){
                $by = 'time';
            }
            $order= 'actor_'.$by .' ' . $order;
        }

        $cach_name = $GLOBALS['config']['app']['cache_flag']. '_' .md5('actor_listcache_'.http_build_query($where_cache).'_'.$order.'_'.$page.'_'.$num.'_'.$start.'_'.$pageurl);
        $res = Cache::get($cach_name);
        if($GLOBALS['config']['app']['cache_core']==0 || empty($res)) {
            $res = $this->listData($where,$order,$page,$num,$start,'*',1,$totalshow);
            $cache_time = $GLOBALS['config']['app']['cache_time'];
            if(intval($cachetime)>0){
                $cache_time = $cachetime;
            }
            if($GLOBALS['config']['app']['cache_core']==1){
                Cache::set($cach_name, $res, $cache_time);
            }
        }
        $res['pageurl'] = $pageurl;
        $res['half'] = $half;
        return $res;
    }

    public function infoData($where,$field='*',$cache=0)
    {
        if(empty($where) || !is_array($where)){
            return ['code'=>1001,'msg'=>'参数错误'];
        }
        $key = 'actor_detail_'.$where['actor_id'][1].'_'.$where['actor_en'][1];
        $info = Cache::get($key);
        if($GLOBALS['config']['app']['cache_core']==0 || $cache==0 || empty($info['actor_id'])) {
            $info = $this->field($field)->where($where)->find();
            if (empty($info)) {
                return ['code' => 1002, 'msg' => '获取数据失败'];
            }
            $info = $info->toArray();
            if($GLOBALS['config']['app']['cache_core']==1) {
                Cache::set($key, $info);
            }
        }
        return ['code'=>1,'msg'=>'获取成功','info'=>$info];
    }

    public function saveData($data)
    {
        $validate = \think\Loader::validate('Actor');
        if(!$validate->check($data)){
            return ['code'=>1001,'msg'=>'参数错误：'.$validate->getError() ];
        }

        $key = 'actor_detail_'.$data['actor_id'];
        Cache::rm($key);
        $key = 'actor_detail_'.$data['actor_en'];
        Cache::rm($key);
        $key = 'actor_detail_'.$data['actor_id'].'_'.$data['actor_en'];
        Cache::rm($key);

        if(empty($data['actor_en'])){
            $data['actor_en'] = Pinyin::get($data['actor_name']);
        }

        if(empty($data['actor_letter'])){
            $data['actor_letter'] = strtoupper(substr($data['actor_en'],0,1));
        }

        if($data['uptime']==1){
            $data['actor_time'] = time();
        }
        unset($data['uptime']);
        if(!empty($data['actor_id'])){
            $where=[];
            $where['actor_id'] = ['eq',$data['actor_id']];
            $res = $this->allowField(true)->where($where)->update($data);
        }
        else{
            $data['actor_time_add'] = time();
            $data['actor_time'] = time();
            $res = $this->allowField(true)->insert($data);
        }
        if(false === $res){
            return ['code'=>1002,'msg'=>'保存失败：'.$this->getError() ];
        }
        return ['code'=>1,'msg'=>'保存成功'];
    }

    public function delData($where)
    {
        $res = $this->where($where)->delete();
        if($res===false){
            return ['code'=>1001,'msg'=>'删除失败：'.$this->getError() ];
        }
        $list = $this->where($where)->select();
        $path = './';
        foreach($list as $k=>$v){
            if(file_exists($path.$v['actor_pic'])){
                unlink($path.$v['actor_pic']);
            }
        }
        return ['code'=>1,'msg'=>'删除成功'];
    }

    public function fieldData($where,$col,$val)
    {
        if(!isset($col) || !isset($val)){
            return ['code'=>1001,'msg'=>'参数错误'];
        }

        $data = [];
        $data[$col] = $val;
        $res = $this->allowField(true)->where($where)->update($data);
        if($res===false){
            return ['code'=>1001,'msg'=>'设置失败：'.$this->getError() ];
        }

        $list = $this->field('actor_id,actor_name,actor_en')->where($where)->select();
        foreach($list as $k=>$v){
            $key = 'actor_detail_'.$v['actor_id'];
            Cache::rm($key);
            $key = 'actor_detail_'.$v['actor_en'];
            Cache::rm($key);
        }

        return ['code'=>1,'msg'=>'设置成功'];
    }

}