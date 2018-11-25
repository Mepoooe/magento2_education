<?php

namespace Mikhail\StarWars\Block;

use Magento\Framework\View\Element\Template;

class Main extends \Magento\Framework\View\Element\Template
{
    protected $helper;
    protected $objectManager;


    public function __construct(
        Template\Context $context,
        array $data = [],
        \Mikhail\StarWars\Helper\Data $dataHelper,
        \Magento\Framework\ObjectManagerInterface $manager
//        StarWarsData $dataHelper // virtual type which doesn't work
    )
    {

        $this->objectManager = $manager;
        $this->helper = $dataHelper;
        parent::__construct($context, $data);
    }

    function _prepareLayout(){}

    public function getStarWarsFilms()
    {
        if ($episode = $this->getRequest()->getParam('episode')) {
            return $this->helper->getEntityById($episode); // return filtering array
        }
        return $this->helper->getCollection();
    }
}
