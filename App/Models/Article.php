<?php

namespace App\Models;

/**
 * Class Article
 * @property Author author
 */
class Article extends Model
{
    /**
     * @var string
     */
    protected static $table = 'news';
    
    /**
     * @var string
     */
    public $title;
    
    /**
     * @var string
     */
    public $content;
    
    /**
     * @var int
     */
    public $author_id;
    
    /**
     * @param $name
     * @return Author|null
     * @throws \App\Exceptions\DbErrorException
     * @throws \App\Exceptions\RecordNotFoundException
     */
    public function __get($name)
    {
        if ('author' === $name && isset($this->author_id)) {
            $result = Author::findById($this->author_id);
            
            if (false !== $result) {
                return $result;
            }
        }
        
        return null;
    }
    
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if ('author' === $name && $value instanceof Author) {
            $this->author_id = $value->id;
        }
    }
    
    /**
     * @param $name
     * @return bool
     */
    public function __isset($name): bool
    {
        if ('author' === $name) {
            return isset($this->author_id);
        }
        
        return false;
    }
    
    public function validateTitle(): void
    {
        if (empty(trim($this->title))) {
            throw new \LogicException('Title can\'t be empty');
        }
    }
}
