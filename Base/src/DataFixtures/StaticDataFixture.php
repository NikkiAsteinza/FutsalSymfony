<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\CardTypes;
use App\Entity\Category;
use App\Entity\Genders;
use App\Entity\DefenseType;
use App\Entity\GoalType;
use App\Entity\UserType;
use App\Entity\Positions;
use App\Entity\PassesType;
use App\Entity\Season;
use App\Entity\StaffType;

class StaticDataFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $staffType = new StaffType("Primer/a entrenador/a");
        $manager->persist($staffType);

        $season = new Season(2023,2024);
        $manager->persist($season);


        $cierre = new Positions("Aierre");
        $ala = new Positions("Ala");
        $pivot = new Positions("Pivot");
        $portera = new Positions("Portería");
        $cinco = new Positions("Cinco");

        $manager->persist($cierre);
        $manager->persist($ala);
        $manager->persist($pivot);
        $manager->persist($portera);
        $manager->persist($cinco);

        $admin = new UserType("admin");
        $staff = new UserType("staff");
        $club = new UserType("club");
        $player = new UserType("player");

        $manager->persist($admin);
        $manager->persist($staff);
        $manager->persist($club);
        $manager->persist($player);

        $igualdad = new DefenseType("Igualdad");
        $superioridad = new DefenseType("Superioridad");
        $inferioridad = new DefenseType("Inferioridad");
        $repliege = new DefenseType("Repliegue");
        $paradaGol = new DefenseType("Parada Gol");

        $manager->persist($igualdad);
        $manager->persist($superioridad);
        $manager->persist($inferioridad);
        $manager->persist($repliege);
        $manager->persist($paradaGol);

        $correcto = new PassesType("Correcto");
        $perdida = new PassesType("Perdida");
        $gol = new PassesType("Pase de Gol");

        $manager->persist($correcto);
        $manager->persist($perdida);
        $manager->persist($gol);

        $benjamin = new Category("Benjamín");
        $benjamin->setMinAge(8);
        $benjamin->setMaxAge(9);
        $benjamin->setIsBase(true);

        $alevin = new Category("Alevín");
        $alevin->setMinAge(10);
        $alevin->setMaxAge(11);
        $alevin->setIsBase(true);

        $infantil = new Category("Infantil");
        $infantil->setMinAge(12);
        $infantil->setMaxAge(13);
        $infantil->setIsBase(true);

        $cadete = new Category("Cadete");
        $cadete->setMinAge(14);
        $cadete->setMaxAge(15);
        $cadete->setIsBase(true);

        $juvenil = new Category("Juvenil");
        $juvenil->setMinAge(16);
        $juvenil->setMaxAge(18);
        $juvenil->setIsBase(true);

        $segundaRegional = new Category("Segunda Regional");
        $segundaRegional->setMinAge(14);
        $segundaRegional->setMaxAge(99);
        $segundaRegional->setIsBase(false);

        $primeraRegional = new Category("Primera Regional");
        $primeraRegional->setMinAge(14);
        $primeraRegional->setMaxAge(99);
        $primeraRegional->setIsBase(false);

        $manager->persist($benjamin);
        $manager->persist($alevin);
        $manager->persist($infantil);
        $manager->persist($cadete);
        $manager->persist($juvenil);
        $manager->persist($primeraRegional);
        $manager->persist($segundaRegional);

        $yellowCard = new CardTypes("Amarilla");
        $redCard = new CardTypes("Red");

        $manager->persist($yellowCard);
        $manager->persist($redCard);

        $derecha = new GoalType("Derecha");
        $izquierda = new GoalType("Izquierda");
        $cabeza = new GoalType("Cabeza");
        $falta = new GoalType("Falta");
        $jugada = new GoalType("Jugada");

        $manager->persist($derecha);
        $manager->persist($izquierda);
        $manager->persist($cabeza);
        $manager->persist($falta);
        $manager->persist($jugada);

        $femenino = new Genders("Femenino");
        $masculino = new Genders("Masculino");

        $manager->persist($femenino);
        $manager->persist($masculino);

        $manager->flush();

    }
}
