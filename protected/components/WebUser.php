<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
 
  // Return first name.
  // access it by Yii::app()->user->email
  function getEmail(){
    $user = $this->loadUser(Yii::app()->user->name);
    return $user->email;
  }
   
  function getId(){
     $user = $this->loadUser(Yii::app()->user->name);
     return $user->id;
  }
  
  function getFullName(){
  	 $currentUser = Yii::app()->user->name;
  	 $fullName = Users::model()->findByAttributes(array('username'=>$currentUser));
  	 return $fullName->name;
  }
  
  function getPermission($role=''){
  	$user = $this->loadUser(Yii::app()->user->name);
  	$check=0;
  	$sql="select count(*) as c from roles, user_group,group_role ";
  	$sql.=" where user_group.group_id=group_role.group_id and group_role.role_id=roles.id and ";
  	$sql.=" user_group.user_id=".$user->id." and roles.role='$role'";
  	$db=Yii::app()->db;
	$cmd = $db->createCommand($sql);
  	$count=$cmd->queryScalar();
  	if($count > 0)
  		$check=1;
  	return $check;
  }
 
  // Load user model.
  protected function loadUser($username=null)
    {
        if($this->_model===null)
        {
            if($username!==null)
                $this->_model=User::model()->find('LOWER(username)=?',array(strtolower($username)));
        }
        return $this->_model;
    }
}
?>