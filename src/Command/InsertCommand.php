<?php

namespace App\Command;

use App\Entity\Audit;
use App\Entity\Element;
use App\Enums\Status;
use App\Repository\ElementRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:insert',
    description: 'Add a short description for your command',
)]
class InsertCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly TypeRepository $typeRepository,
        private readonly ElementRepository $elementRepository
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $element = new Element();
        $element->setName('Name 1');
        $element->setType($this->typeRepository->getByIdOrNull('T01'));
        $element->setStatus(Status::ACTIVE);

        $audit = new Audit();
        $audit->setUserId('admin');
        $audit->setCreated(new \DateTime());
        $element->setAudit($audit);

        $this->em->persist($element);
        $this->em->flush();

        $elements = $this->elementRepository->listAll();
        foreach ($elements as $element) {
            $output->writeln($element->getName());
        }

        return Command::SUCCESS;
    }
}
