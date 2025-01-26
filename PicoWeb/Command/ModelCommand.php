<?php
namespace PicoWeb\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModelCommand extends Command
{
    protected static $defaultName = 'craft:model';

    protected function configure()
    {
        $this
            ->setName('craft:model')
            ->setDescription('Creates a new model class.')
            ->addArgument('model-name', InputArgument::REQUIRED, 'The name of the model.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $modelName = $input->getArgument('model-name');
        $generator = new ModelGenerator();

        ob_start(); // Capture the generator's output
        $generator->generate($modelName);
        $message = ob_get_clean();

        $output->writeln($message);
        return Command::SUCCESS;
    }
}

