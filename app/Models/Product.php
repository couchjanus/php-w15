<?php
class Product extends Model
{
    protected static $table = 'products';
    protected static $primaryKey = 'id';
    
    public function id(){
        return $this->getColumnValue('id');
    }
    
    public function name(){
        return $this->getColumnValue('name');
    }
    
    public function status(){
        return $this->getColumnValue('status');
    }

    public function category_id(){
        return $this->getColumnValue('category_id');
    }
    
    public function price(){
        return $this->getColumnValue('price');
    }
    
    public function brand(){
        return $this->getColumnValue('brand');
    }

    public function description(){
        return $this->getColumnValue('description');
    }

    public function is_new(){
        return $this->getColumnValue('is_new');
    }
    public function is_recommended(){
        return $this->getColumnValue('is_recommended');
    }

    public function setName($value){
        $this->setColumnValue('name', $value);
    }
    
    public function setStatus($value){
        $this->setColumnValue('status', $value);
    }

    public function setCategory_id($value){
        return $this->setColumnValue('category_id', $value);
    }
    
    public function setPrice($value){
        return $this->setColumnValue('price', $value);
    }
    
    public function setBrand($value){
        return $this->setColumnValue('brand', $value);
    }

    public function setDescription($value){
        return $this->setColumnValue('description', $value);
    }

    public function setIs_new($value){
        return $this->setColumnValue('is_new', $value);
    }
    public function setIs_recommended($value){
        return $this->setColumnValue('is_recommended', $value);
    }
}
