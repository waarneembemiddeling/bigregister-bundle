<?php
/*
* (c) Waarneembemiddeling.nl
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Wb\Bundle\BigRegisterBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wb\BigRegister\SoapClient\Service;

class GetBigResultByNumberCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('wb:big:by-number')
            ->setDescription('Fetch big register data by big number')
            ->addArgument('number', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Service $bigService */
        $bigService = $this->getContainer()->get('wb_big_register.service');
        $number = $input->getArgument('number');
        $bigResult = $bigService->findByRegistrationNumber($number);

        $formatter = function($value, $key) use ($output, &$formatter) {
            if (is_scalar($value)) {
                $output->writeln(sprintf('%s: %s', $key, $value));
            } elseif(is_array($value)) {
                $output->writeln(sprintf('%s:', $key));
                array_walk($value, $formatter);
            } elseif ($value instanceof \DateTime) {
                $output->writeln(sprintf('%s: %s', $key, $value->format(\DateTime::ISO8601)));
            }
        };

        array_walk($bigResult, $formatter);
    }
}
