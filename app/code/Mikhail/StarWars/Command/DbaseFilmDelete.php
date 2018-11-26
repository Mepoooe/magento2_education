<?php
namespace Mikhail\StarWars\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DbaseFilmDelete extends Command
{
    protected $objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $manager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $manager
    )
    {
        $this->objectManager = $manager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("DbaseFilmDelete");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('delete');
        $filmModel = $this->objectManager->create('Mikhail\StarWars\Model\FilmFactory')->create();
        $films = $filmModel->getCollection();
        foreach ($films as $film) {
            $filmModel->load((int)$film->getId());
            $filmModel->delete();
        }
    }
} 