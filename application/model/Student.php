<?php
namespace app\model;
use think\Model;
/**		
*学生管理
*/
/**
* 
*/
class Student extends Model
{
	protected $dateFormat = 'Y年m月d日';//日期格式
	//类型转换
	protected $type = [
        'create_time' => 'datetime',
    ];

    /**
     * 输出性别的属性
     * @return string 0男，1女
     * @author
     */
    public function getSexAttr($value)
    {
        $status = array('0'=>'男','1'=>'女');
        $sex = $status[$value];
        if (isset($sex))
        {
            return $sex;
        } else {
            return $status[0];
        }
    }

    /**
    *获取创建时间
    *@param int $value
    *@return string
    *@author 
    */	
    public function getCreateTimeAttr($value)
    {
    	return date('Y-m-d',$value);
    }	
}