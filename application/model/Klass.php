<?php
namespace app\model;
use think\Model;

/**
*班级
*/

class Klass extends Model
{
	/**
	 * 获取对应的教师（辅导员）信息
     * @return Teacher 教师
     * @author 
	 */
	public function Teacher()
	{
        // $teacherId = $this->getData('teacher_id');
        // $Teacher = Teacher::get($teacherId);
        // return $Teacher;
        return $this->belongsTo('Teacher');
	}
}