<?php

namespace App\Exceptions;

class Errors extends BaseException
{
    /**
     * @var \Exception[]
     */
    protected $errors = [];
    
    /**
     * @param \Exception $e
     */
    public function add(\Exception $e): void
    {
        $this->errors[] = $e;
    }
    
    /**
     * @return \Exception[]
     */
    public function getAll(): array
    {
        return $this->errors;
    }
    
    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->errors);
    }
}
