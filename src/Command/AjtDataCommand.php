<?php

namespace App\Command;

use App\Entity\Batiment;
use App\Entity\Produits;
use App\Entity\Utilisateurs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Faker\Factory as FakerFactory;

#[AsCommand(
    name: 'ajt-data',
    description: 'Ajout les données de base dans la base de données',
)]
class AjtDataCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    )
    { parent::__construct(); }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $faker = FakerFactory::create();

        //bâtiments
        for ( $i = 0 ; $i < 3 ; $i++ ) {
            $batiment = new Batiment();
            $batiment->setNom('Batiment ' . $faker->company());
            $this->entityManager->persist($batiment);
        }

        $io->success('3 bâtiments ajoutés');


        //produits
        for ( $i = 0 ; $i < 3 ; $i++ ) {
            $produit = new Produits();
            $produit->setLibelle($faker->word());
            $produit->setDescription($faker->sentence());
            $this->entityManager->persist($produit);
        }

        $io->success('3 produits ajoutés');

        //utilisateurs
        for ( $i = 0 ; $i < 3 ; $i++ ) {
            $user = new Utilisateurs();
            $user->setName($faker->name());
            $user->setEmail($faker->email());
            $this->entityManager->persist($user);
        }

        $io->success('3 utilisateurs ajoutés');


        $this->entityManager->flush();


        return Command::SUCCESS;
    }
}
