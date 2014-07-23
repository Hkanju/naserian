<?php
class ActiveRecordLogableBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();
    
    public function getUsername(){
    	$username='';
	    if ((get_class(Yii::app())!='CConsoleApplication'))
	 		$username = Yii::app()->user->id;
	 	else 
	 		$username = 'System';
	 	return $username;
    }
    public function afterSave($event)
    {
        if (!$this->Owner->isNewRecord) {
 
            // new attributes
            $newattributes = $this->Owner->getAttributes();
            $oldattributes = $this->getOldAttributes();
 
            // compare old and new
            $changeDone=false;
            foreach ($newattributes as $name => $value) {
                if (!empty($oldattributes)) {
                    $old = $oldattributes[$name];
                } else {
                    $old = '';
                }
 
                if ($value != $old) {
                	$changeDone=true;
                	break;
                }
            }
            if ($changeDone){
            	
	            $log=new ActiveRecordLog;
	            $log->description=$this->getUsername() 
	                                            . ' changed record in table ' 
	                                            . $this->Owner->getTableSchema()->name
	                                            . ' id=' . $this->Owner->getPrimaryKey() .'.';
		           $log->action='update';
		           $log->table=$this->Owner->getTableSchema()->name;
		           $log->table_id=$this->Owner->getPrimaryKey();
		           $log->creationdate=new CDbExpression('NOW()');
		           $log->username=$this->getUsername();
		           $log->old_values=CJSON::encode($oldattributes);
		           $log->new_values=CJSON::encode($newattributes);
		           $log->save();
           }
        } else {
        	
            $log=new ActiveRecordLog;
            $log->description=$this->getUsername() 
                                    . ' created record in table ' . $this->Owner->getTableSchema()->name
                                    . ' id=' . $this->Owner->getPrimaryKey() .'.';
            $log->action='insert';
            $log->table=$this->Owner->getTableSchema()->name;
            $log->table_id=$this->Owner->getPrimaryKey();
            $log->creationdate=new CDbExpression('NOW()');
            $log->username=$this->getUsername();
            $log->new_values=CJSON::encode($this->Owner->getAttributes());
            $log->save();
        }
    }
 
    public function afterDelete($event)
    {
    	
        $log=new ActiveRecordLog;
        $log->description=  $this->getUsername() . ' deleted record from table' 
                                . $this->Owner->getTableSchema()->name 
                                . ' id=' . $this->Owner->getPrimaryKey() .'.';
        $log->action='delete';
        $log->table=$this->Owner->getTableSchema()->name;
        $log->table_id=$this->Owner->getPrimaryKey();
        $log->creationdate=new CDbExpression('NOW()');
        $log->username=$this->getUsername();
        $log->old_values=CJSON::encode($this->getOldAttributes());
        $log->save();
    }
 
    public function afterFind($event)
    {
        // Save old values
        $this->setOldAttributes($this->Owner->getAttributes());
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }
}
