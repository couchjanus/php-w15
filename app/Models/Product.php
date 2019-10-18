<?php
class Product extends Model
{
    protected static $table = 'products';
    protected static $primaryKey = 'id';

    // public function __get($property)
    // {
    //   if (property_exists($this, $property)) {
    //     return $this->$property;
    //   }
    // }
    
    // public function name(){
    //     return $this->getColumnValue('name');
    // }
    
    // public function status(){
    //     return $this->getColumnValue('status');
    // }
    // public function category_id(){
    //     return $this->getColumnValue('category_id');
    // }
    
    // public function price(){
    //     return $this->getColumnValue('price');
    // }
    
    // public function brand(){
    //     return $this->getColumnValue('brand');
    // }
}
