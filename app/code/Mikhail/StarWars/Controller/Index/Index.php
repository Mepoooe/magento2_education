<?php

namespace Mikhail\StarWars\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $helper;
    protected $film;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Mikhail\StarWars\Model\FilmFactory $film
    )
    {
        $this->film = $film;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->film->create();
        $collection = $this->film->getCollection();
        echo '<pre>';
        var_dump($collection);
        echo '</pre>';
        die;
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;

    }
}
