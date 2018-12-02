<?php
namespace Mikhail\StarWars\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DbaseFilmCreate extends Command
{
    protected $objectManager;
    protected $eventManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $manager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $manager,
        \Magento\Framework\Event\ManagerInterface $eventManager
    )
    {
        $this->objectManager = $manager;
        $this->eventManager = $eventManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("DbaseFilmCreate");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $starWarsFilms = $this->getStarWarsFilms();
        $output->writeln('create');

        foreach ($starWarsFilms as $starWarsFilm) {
            $film = $this->objectManager->create('Mikhail\StarWars\Model\FilmFactory')->create();
            $film->setTitle($starWarsFilm->title);
            $film->setDirector($starWarsFilm->director);
            $film->save();
        }

        $product = $this->objectManager->create('Magento\Framework\DataObject', ['text' => 'initial']);

        /** only object can be passed from event to observer */
        $this->eventManager->dispatch('dbase_command_dispatch', ['product' => $product]);

        $output->writeln("After event: ". $product->getText());
    }

    private function getStarWarsFilms()
    {
        $data = $this->objectManager->create('Mikhail\StarWars\Helper\Data');
        return $data->getCollection();
    }
} 