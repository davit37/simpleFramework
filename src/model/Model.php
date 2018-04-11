<?php

namespace ModernFramework\Model;

use ModernFramework\Tools\Database;
use Symfony\Component\PropertyAccess\PropertyAccess;

abstract class Model
{
    private $connection;

    abstract public function getId(): ? int;
    
    public function __construct(Database $connection)
    {
        $this->connection= $connection;
    }

    public function save():void
    {
        $class = new \ReflectionClass(get_class($this));

        $table = strtolower($class->getShortName());
        $properties = array_filter($class->getProperties(\ReflectionProperty::IS_PRIVATE|\ReflectionProperty::IS_PROTECTED), function ($property){
            return 'id'===$property ? false : true;
        });

        $columns = array_map(function($property){
            return $this->toUnderScore($property->getName());
        }, $properties);

        $accessor = PropertyAccess::createPropertyAccessor();
        $parameters = [];

        foreach($columns as $key => $property){
            $parameters[$property]= $accessor->getValue($this, $property);
        }

        if($this->getId()){
            $this->update($table, $columns, $parameters);
        }else{
            $this->insert($table, $columns, $parameters);
        }
    }

    public function delete()
    {
        if($id = $this->getId()){
        $class = new \ReflectionClass(get_class($this));
        $table = strtolower($class->getShortName());
            $this->connection->execute(sprintf('DELETE FROM %s WHERE id = :id', $table), ['id'=>$id]);
        }
    }

    public function find(int $id): ? self
    {
        $class = new \ReflectionClass(get_class($this));
        $table = strtolower($class->getShortName());

        $result = $this->connection->createQueryBuilder()->from($table)->find($id);
        
        if(!$result){
            return $result;
        }
        return $this->normalize($result);
    }

    public function findAll(): array
    {
        $class = new \ReflectionClass(get_class($this));
        $table= strtolower($class->getShortName());

        $results = $this->connection->createQueryBuilder()->from($table)->get();    
        foreach($results as $key => $result){
            $results[$key] = $this->normalize($result);
        }
        return $results;
    }

    private function insert(string $table, array $columns, array $values): void
    {
        $parameters = array_map(function($columns){
            return sprintf(':%s', $columns);
        }, $columns);

        $this->connection->execute(sprintf('INSERT INTO %s(%s) VALUES (%s)', $table, implode(',',$columns),implode(',', $parameters)), $values);
    }

    private function update(string $table, array $columns, array $values): void
    {
        $parameters = array_map(function($column){
            return sprintf('%s = :%s', $column, $column);
        }, $columns);

        $this->connection->execute(sprintf('UPDATE %s SET %s WHERE id = :id', $table, implode(',', $parameters)), $values);
    }

    private function toUnderScore(string $columns): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', str_replace('','_',$columns)));
    }

    private function normalize(\stdClass $data):Model
    {
        $clone = clone $this;
        $accessor=PropertyAccess::createPropertyAccessor();
        foreach(json_decode(json_encode($data),true) as $property=>$value){
            $accessor->setValue($clone, $property, $value);
        }

        return $clone;
    }
}