<?php

class SkillTypeViewer extends crud{
    
    protected $table = "SKILL_TYPE";
    protected $idName = "skillType_id";
    
    public function grabSkillType($id){
      
      $types = $this->selectWhere($this->table, $this->idName, $id);
      
      //Grab first result with keys intact
      $type = $types[0];
      
      return $type;
       
        
    }
    
}