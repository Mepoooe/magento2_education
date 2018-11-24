<?php
namespace Kram\Handler\Api;

use Kram\Handler\Api\Data\FilmInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FilmRepositoryInterface 
{
    public function save(FilmInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(FilmInterface $page);

    public function deleteById($id);
}
