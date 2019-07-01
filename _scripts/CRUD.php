<?php

    class CRUD extends DBCONN{
        
        protected function selectAll($table){
            $sql = "SELECT * FROM $table ;";
            //echo "<p>".$sql."</p>";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0){
                while($row = $result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
            }
            
        }
        
        protected function selectWhere($table, $values){
            
            $sql = "SELECT * FROM $table WHERE ";
            //echo "<p>".$sql."</p>";
            
            foreach($values as $key => $value){
                
                if (!next($values)){
					
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value ";
					}
					else{
						$sql.= "$key = $value ";
						
					}
                    
                }
                else{
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value AND ";
					}
					else{
						$sql.= "$key = $value AND ";
						
					}
                }
                
            }
            
            //echo "<p>".$sql."</p>";
            
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0){
                while($row = $result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
                
            }
            
        }
        //Technically not used: But has been tested
        protected function selectJoinWhere($table,$join,$values){
            
            $sql = "SELECT * FROM $table $join WHERE ";
            //echo "<p>".$sql."</p>";
            
            foreach($values as $key => $value){
                
                if (!next($values)){
					
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value ";
					}
					else{
						$sql.= "$key = $value ";
						
					}
                    
                }
                else{
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value AND ";
					}
					else{
						$sql.= "$key = $value AND ";
						
					}
                }
                
            }
            
            echo "<p>".$sql."</p>";
            
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0){
                while($row = $result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
                
            }
            
        }
        
        protected function selectWhereOrder($table, $values, $order){
            
            $sql = "SELECT * FROM $table WHERE ";
            //echo "<p>".$sql."</p>";
            
            foreach($values as $key => $value){
                
                if (!next($values)){
					
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value ";
					}
					else{
						$sql.= "$key = $value ";
						
					}
                    
                }
                else{
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value AND ";
					}
					else{
						$sql.= "$key = $value AND ";
						
					}
                }
                
            }
            
            $sql .= "ORDER BY ";
            
            foreach($order as $value){
                
                if (!next($order)){
                    $sql.= "$value";
                }
                else{
                    $sql.= "$value, ";
                }
                
            }
            
            //echo "<p>".$sql."</p>";
            
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0){
                while($row = $result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
                
            }
            
        }
        
        protected function selectJoinWhereOrder($table,$join,$values,$order){
            
            $sql = "SELECT * FROM $table $join WHERE ";
            
            foreach($values as $key => $value){
                
                if (!next($values)){
					
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value ";
					}
					else{
						$sql.= "$key = $value ";
						
					}
                    
                }
                else{
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value AND ";
					}
					else{
						$sql.= "$key = $value AND ";
						
					}
                }
                
            }
            
            $sql .= "ORDER BY ";
            
            foreach($order as $value){
                
                if (!next($order)){
                    $sql.= "$value";
                }
                else{
                    $sql.= "$value, ";
                }
                
            }
            
            //echo "<p>".$sql."</p>";
            
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0){
                while($row = $result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
                
            }
            
        }
        
        protected function selectSpecialJoinWhereOrder($table,$special,$join,$values,$order){
            
            $sql = "SELECT $special FROM $table $join WHERE ";
            
            foreach($values as $key => $value){
                
                if (!next($values)){
					
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value ";
					}
					else{
						$sql.= "$key = $value ";
						
					}
                    
                }
                else{
					if(strcmp($value, "IS NOT NULL") == 0 or strcmp($value, "IS NULL") == 0){
						$sql.= "$key $value AND ";
					}
					else{
						$sql.= "$key = $value AND ";
						
					}
                }
                
            }
            
            $sql .= "ORDER BY ";
            
            foreach($order as $value){
                
                if (!next($order)){
                    $sql.= "$value";
                }
                else{
                    $sql.= "$value, ";
                }
                
            }
            
            //echo "<p>".$sql."</p>";
            
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows;
            
            if ($numRows > 0){
                while($row = $result->fetch_assoc()){
                    $data[]= $row;
                }
                return $data;
                
            }
            
        }
        
        protected function insertInto($table,$values){
            
            $sql = "INSERT INTO ".$table;
            $sql.= " (".implode(",", array_keys($values)).") VALUES ";
            $sql.= " (".implode(",", array_values($values)).")";
            //echo "<p>".$sql."</p>";
            $result = $this->connect()->query($sql);
            
            return $result;
            
        }
        

        protected function update($table,$values,$idName, $id){
            
            $sql = "UPDATE $table SET ";
            
            /*foreach($values as $key => $value){
                foreach( $items as $item ) {
                if( !next( $items ) ) {
                    echo 'Last Item';
                }
            }*/
            
            foreach($values as $key => $value){
                
                if (!next($values)){
                    $sql.= "$key = $value ";
                }
                else{
                    $sql.= "$key = $value, ";
                }
                
            }
            
            $sql.= "WHERE $idName = $id";
            
            //echo $sql;
            
            $result = $this->connect()->query($sql);
            
            return $result;
            
        }
        
        protected function delete($table, $idName, $id){
             
            $sql = "DELETE FROM $table WHERE $idName = '".$id."' ;";
            //echo "<p>".$sql."</p>";
            $result = $this->connect()->query($sql);
            
            return $result;
            
        }
        
    }