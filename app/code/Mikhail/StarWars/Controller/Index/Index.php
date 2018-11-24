<?php

namespace Mikhail\StarWars\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $helper;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Kram\Handler\Helper\Data $helper
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->helper = $helper;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
//        $this->_redirect('*/*/index');// 1 * текущий модуль 2 * текущий контроллер
//        $this->_redirect('demo/index/index')
//        $this->getRequest()->getParams(); получает гет параметры
//        $this->_forward('index', 'index', '');// передает управление другому контроллеру
//         getRequest есть и в блоке
        return $resultPage;

    }
}
