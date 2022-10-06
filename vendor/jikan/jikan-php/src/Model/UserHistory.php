<?php declare(strict_types=1);

namespace Jikan\JikanPHP\Model;

class UserHistory
{
    /**
     * @var History[]
     */
    protected $data = [];

    /**
     * @return History[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param History[] $data
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
