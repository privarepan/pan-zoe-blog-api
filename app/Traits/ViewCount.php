<?php


namespace App\Traits;



trait ViewCount
{

    protected $view_count_column = 'view_count';
    /**
     * @throws \Exception
     */
    public function counting()
    {
        return $this->increment($this->view_count_column);
    }
}
