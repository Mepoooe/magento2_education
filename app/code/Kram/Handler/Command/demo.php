<?php

namespace Kram\Handler\Command;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\ObjectManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class demo extends Command
{

    protected $helper = null;
//
//    public function __construct(ObjectManager $manager)
//    {
//        $this->manager = $manager;
//        parent::__construct('');
//    }

    public function __construct(
       \Kram\Handler\Helper\DataInterface $helper,
        ?string $name = null
    )
    {
        $this->helper = $helper;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("ps:demo");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln($this->helper->snakeToCamel("Hello World"));
    }
} 