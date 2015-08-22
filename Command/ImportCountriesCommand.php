<?php
namespace SKCMS\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use SKCMS\UserBundle\Entity\Country;

class ImportCountriesCommand extends ContainerAwareCommand 
{
    
    const COUNTRIES_FILE = '/../Resources/public/countries.json';
    
    
    protected function configure()
    {
        $this
            ->setName('skcms:import:countries')
            ->setDescription('Import countries from json file')
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $nombrePays = $this->createCountries();
        $output->writeln($nombrePays.' countries successfully added');
    }
    
    public function createCountries()
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $jsonCountries = json_decode(file_get_contents(__DIR__.self::COUNTRIES_FILE),true);
        
        
        
        foreach ($jsonCountries as $jsonCountry)
        {
            $country = new Country();
            
            $country->setName($jsonCountry['fields']['name']);
            $country->setIso($jsonCountry['fields']['iso3']);
            $em->persist($country);
        }
        
        $em->flush();
        
        return count($jsonCountries);
        
    }
}
