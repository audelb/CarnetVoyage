<?php
// src/CarnetVoyage/MapBundle/DataFixtures/ORM/LoadCountryData.php
namespace CarnetVoyage\MapBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CarnetVoyage\MapBundle\Entity\Pays;

class LoadCountryData extends AbstractFixture implements \Doctrine\Common\DataFixtures\OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $georgie = new Pays();
        $georgie->setId('1');
        $georgie->setValeur('Georgie');
        $georgie->setNom_fichier('georgie');
        $georgie->setValeur_fichier('georgie');
        $manager->persist($georgie);
        $this->addReference('georgie', $georgie);
        
        $france = new Pays();
        $france->setId('2');
        $france->setValeur('France');
        $france->setNom_fichier('france');
        $france->setValeur_fichier('france');
        $manager->persist($france);
        $this->addReference('france', $france);

        $indonésie = new Pays();
        $indonésie->setId('3');
        $indonésie->setValeur('Indonésie');
        $indonésie->setNom_fichier('indonésie');
        $indonésie->setValeur_fichier('indonésie');
        $manager->persist($indonésie);
        $this->addReference('indonésie', $indonésie);

        $pérou = new Pays();
        $pérou->setId('4');
        $pérou->setValeur('Pérou');
        $pérou->setNom_fichier('pérou');
        $pérou->setValeur_fichier('pérou');
        $manager->persist($pérou);
        $this->addReference('pérou', $pérou);

        $burkina_faso = new Pays();
        $burkina_faso->setId('5');
        $burkina_faso->setValeur('Burkina Faso');
        $burkina_faso->setNom_fichier('burkina_faso');
        $burkina_faso->setValeur_fichier('burkina faso');
        $manager->persist($burkina_faso);
        $this->addReference('burkina_faso', $burkina_faso);

        $libye = new Pays();
        $libye->setId('6');
        $libye->setValeur('Libye');
        $libye->setNom_fichier('libye');
        $libye->setValeur_fichier('libye');
        $manager->persist($libye);
        $this->addReference('libye', $libye);

        $bielorussie = new Pays();
        $bielorussie->setId('7');
        $bielorussie->setValeur('Biélorussie');
        $bielorussie->setNom_fichier('bielorussie');
        $bielorussie->setValeur_fichier('bielorussie');
        $manager->persist($bielorussie);
        $this->addReference('bielorussie', $bielorussie);

        $pakistan = new Pays();
        $pakistan->setId('8');
        $pakistan->setValeur('Pakistan');
        $pakistan->setNom_fichier('pakistan');
        $pakistan->setValeur_fichier('pakistan');
        $manager->persist($pakistan);
        $this->addReference('pakistan', $pakistan);

        $cote_d_ivoire = new Pays();
        $cote_d_ivoire->setId('9');
        $cote_d_ivoire->setValeur('Côte d\'Ivoire');
        $cote_d_ivoire->setNom_fichier('cote_d_ivoire');
        $cote_d_ivoire->setValeur_fichier('cote d ivoire');
        $manager->persist($cote_d_ivoire);
        $this->addReference('cote_d_ivoire', $cote_d_ivoire);

        $algérie = new Pays();
        $algérie->setId('10');
        $algérie->setValeur('Algérie');
        $algérie->setNom_fichier('algérie');
        $algérie->setValeur_fichier('algérie');
        $manager->persist($algérie);
        $this->addReference('algérie', $algérie);

        $suisse = new Pays();
        $suisse->setId('11');
        $suisse->setValeur('Suisse');
        $suisse->setNom_fichier('suisse');
        $suisse->setValeur_fichier('suisse');
        $manager->persist($suisse);
        $this->addReference('suisse', $suisse);

        $cameroun = new Pays();
        $cameroun->setId('12');
        $cameroun->setValeur('Cameroun');
        $cameroun->setNom_fichier('cameroun');
        $cameroun->setValeur_fichier('cameroun');
        $manager->persist($cameroun);
        $this->addReference('cameroun', $cameroun);

        $macedoine = new Pays();
        $macedoine->setId('13');
        $macedoine->setValeur('Macédoine');
        $macedoine->setNom_fichier('macedoine');
        $macedoine->setValeur_fichier('macedoine');
        $manager->persist($macedoine);
        $this->addReference('macedoine', $macedoine);

        $botswana = new Pays();
        $botswana->setId('14');
        $botswana->setValeur('Botswana');
        $botswana->setNom_fichier('botswana');
        $botswana->setValeur_fichier('botswana');
        $manager->persist($botswana);
        $this->addReference('botswana', $botswana);

        $ukraine = new Pays();
        $ukraine->setId('15');
        $ukraine->setValeur('Ukraine');
        $ukraine->setNom_fichier('ukraine');
        $ukraine->setValeur_fichier('ukraine');
        $manager->persist($ukraine);
        $this->addReference('ukraine', $ukraine);

        $kenya = new Pays();
        $kenya->setId('16');
        $kenya->setValeur('Kenya');
        $kenya->setNom_fichier('kenya');
        $kenya->setValeur_fichier('kenya');
        $manager->persist($kenya);
        $this->addReference('kenya', $kenya);

        $jordanie = new Pays();
        $jordanie->setId('17');
        $jordanie->setValeur('Jordanie');
        $jordanie->setNom_fichier('jordanie');
        $jordanie->setValeur_fichier('jordanie');
        $manager->persist($jordanie);
        $this->addReference('jordanie', $jordanie);

        $mali = new Pays();
        $mali->setId('18');
        $mali->setValeur('Mali');
        $mali->setNom_fichier('mali');
        $mali->setValeur_fichier('mali');
        $manager->persist($mali);
        $this->addReference('mali', $mali);

        $république_démocratique_congo = new Pays();
        $république_démocratique_congo->setId('19');
        $république_démocratique_congo->setValeur('République Démocratique du Congo');
        $république_démocratique_congo->setNom_fichier('république_démocratique_congo');
        $république_démocratique_congo->setValeur_fichier('république démocratique congo');
        $manager->persist($république_démocratique_congo);
        $this->addReference('république_démocratique_congo', $république_démocratique_congo);

        $somalie = new Pays();
        $somalie->setId('20');
        $somalie->setValeur('Somalie');
        $somalie->setNom_fichier('somalie');
        $somalie->setValeur_fichier('somalie');
        $manager->persist($somalie);
        $this->addReference('somalie', $somalie);

        $afghanistan = new Pays();
        $afghanistan->setId('21');
        $afghanistan->setValeur('Afghanistan');
        $afghanistan->setNom_fichier('afghanistan');
        $afghanistan->setValeur_fichier('afghanistan');
        $manager->persist($afghanistan);
        $this->addReference('afghanistan', $afghanistan);

        $ghana = new Pays();
        $ghana->setId('22');
        $ghana->setValeur('Ghana');
        $ghana->setNom_fichier('ghana');
        $ghana->setValeur_fichier('ghana');
        $manager->persist($ghana);
        $this->addReference('ghana', $ghana);

        $autriche = new Pays();
        $autriche->setId('23');
        $autriche->setValeur('Autriche');
        $autriche->setNom_fichier('autriche');
        $autriche->setValeur_fichier('autriche');
        $manager->persist($autriche);
        $this->addReference('autriche', $autriche);

        $ouganda = new Pays();
        $ouganda->setId('24');
        $ouganda->setValeur('Ouganda');
        $ouganda->setNom_fichier('ouganda');
        $ouganda->setValeur_fichier('ouganda');
        $manager->persist($ouganda);
        $this->addReference('ouganda', $ouganda);

        $colombie = new Pays();
        $colombie->setId('25');
        $colombie->setValeur('Colombie');
        $colombie->setNom_fichier('colombie');
        $colombie->setValeur_fichier('colombie');
        $manager->persist($colombie);
        $this->addReference('colombie', $colombie);

        $irak = new Pays();
        $irak->setId('26');
        $irak->setValeur('Iraq');
        $irak->setNom_fichier('irak');
        $irak->setValeur_fichier('irak');
        $manager->persist($irak);
        $this->addReference('irak', $irak);

        $niger = new Pays();
        $niger->setId('27');
        $niger->setValeur('Niger');
        $niger->setNom_fichier('niger');
        $niger->setValeur_fichier('niger');
        $manager->persist($niger);
        $this->addReference('niger', $niger);

        $lettonie = new Pays();
        $lettonie->setId('28');
        $lettonie->setValeur('Lettonie');
        $lettonie->setNom_fichier('lettonie');
        $lettonie->setValeur_fichier('lettonie');
        $manager->persist($lettonie);
        $this->addReference('lettonie', $lettonie);

        $roumanie = new Pays();
        $roumanie->setId('29');
        $roumanie->setValeur('Roumanie');
        $roumanie->setNom_fichier('roumanie');
        $roumanie->setValeur_fichier('roumanie');
        $manager->persist($roumanie);
        $this->addReference('roumanie', $roumanie);

        $zambie = new Pays();
        $zambie->setId('30');
        $zambie->setValeur('Zambie');
        $zambie->setNom_fichier('zambie');
        $zambie->setValeur_fichier('zambie');
        $manager->persist($zambie);
        $this->addReference('zambie', $zambie);

        $ethiopie = new Pays();
        $ethiopie->setId('31');
        $ethiopie->setValeur('Ethiopie');
        $ethiopie->setNom_fichier('ethiopie');
        $ethiopie->setValeur_fichier('ethiopie');
        $manager->persist($ethiopie);
        $this->addReference('ethiopie', $ethiopie);

        $guatemala = new Pays();
        $guatemala->setId('32');
        $guatemala->setValeur('Guatemala');
        $guatemala->setNom_fichier('guatemala');
        $guatemala->setValeur_fichier('guatemala');
        $manager->persist($guatemala);
        $this->addReference('guatemala', $guatemala);

        $suriname = new Pays();
        $suriname->setId('33');
        $suriname->setValeur('Suriname');
        $suriname->setNom_fichier('suriname');
        $suriname->setValeur_fichier('suriname');
        $manager->persist($suriname);
        $this->addReference('suriname', $suriname);

        $sahara_occidental = new Pays();
        $sahara_occidental->setId('34');
        $sahara_occidental->setValeur('Sahara Occidental');
        $sahara_occidental->setNom_fichier('sahara_occidental');
        $sahara_occidental->setValeur_fichier('sahara occidental');
        $manager->persist($sahara_occidental);
        $this->addReference('sahara_occidental', $sahara_occidental);

        $république_tchèque = new Pays();
        $république_tchèque->setId('35');
        $république_tchèque->setValeur('République tchèque');
        $république_tchèque->setNom_fichier('république_tchèque');
        $république_tchèque->setValeur_fichier('république tchèque');
        $manager->persist($république_tchèque);
        $this->addReference('république_tchèque', $république_tchèque);

        $tchad = new Pays();
        $tchad->setId('36');
        $tchad->setValeur('Tchad');
        $tchad->setNom_fichier('tchad');
        $tchad->setValeur_fichier('tchad');
        $manager->persist($tchad);
        $this->addReference('tchad', $tchad);

        $albanie = new Pays();
        $albanie->setId('37');
        $albanie->setValeur('Albanie');
        $albanie->setNom_fichier('albanie');
        $albanie->setValeur_fichier('albanie');
        $manager->persist($albanie);
        $this->addReference('albanie', $albanie);

        $syrie = new Pays();
        $syrie->setId('38');
        $syrie->setValeur('Syrie');
        $syrie->setNom_fichier('syrie');
        $syrie->setValeur_fichier('syrie');
        $manager->persist($syrie);
        $this->addReference('syrie', $syrie);

        $kirghizistan = new Pays();
        $kirghizistan->setId('39');
        $kirghizistan->setValeur('Kirghizistan');
        $kirghizistan->setNom_fichier('kirghizistan');
        $kirghizistan->setValeur_fichier('kirghizistan');
        $manager->persist($kirghizistan);
        $this->addReference('kirghizistan', $kirghizistan);

        $costa_rica = new Pays();
        $costa_rica->setId('40');
        $costa_rica->setValeur('Costa Rica');
        $costa_rica->setNom_fichier('costa_rica');
        $costa_rica->setValeur_fichier('costa rica');
        $manager->persist($costa_rica);
        $this->addReference('costa_rica', $costa_rica);

        $paraguay = new Pays();
        $paraguay->setId('41');
        $paraguay->setValeur('Paraguay');
        $paraguay->setNom_fichier('paraguay');
        $paraguay->setValeur_fichier('paraguay');
        $manager->persist($paraguay);
        $this->addReference('paraguay', $paraguay);

        $pologne = new Pays();
        $pologne->setId('42');
        $pologne->setValeur('Pologne');
        $pologne->setNom_fichier('pologne');
        $pologne->setValeur_fichier('pologne');
        $manager->persist($pologne);
        $this->addReference('pologne', $pologne);

        $namibie = new Pays();
        $namibie->setId('43');
        $namibie->setValeur('Namibie');
        $namibie->setNom_fichier('namibie');
        $namibie->setValeur_fichier('namibie');
        $manager->persist($namibie);
        $this->addReference('namibie', $namibie);

        $afrique_du_sud = new Pays();
        $afrique_du_sud->setId('44');
        $afrique_du_sud->setValeur('Afrique du Sud');
        $afrique_du_sud->setNom_fichier('afrique_du_sud');
        $afrique_du_sud->setValeur_fichier('afrique du sud');
        $manager->persist($afrique_du_sud);
        $this->addReference('afrique_du_sud', $afrique_du_sud);

        $egypte = new Pays();
        $egypte->setId('45');
        $egypte->setValeur('Egypte');
        $egypte->setNom_fichier('egypte');
        $egypte->setValeur_fichier('egypte');
        $manager->persist($egypte);
        $this->addReference('egypte', $egypte);

        $bosnie_herzégovine = new Pays();
        $bosnie_herzégovine->setId('46');
        $bosnie_herzégovine->setValeur('Bosnie-Herzégovine');
        $bosnie_herzégovine->setNom_fichier('bosnie_herzégovine');
        $bosnie_herzégovine->setValeur_fichier('bosnie herzégovine');
        $manager->persist($bosnie_herzégovine);
        $this->addReference('bosnie_herzégovine', $bosnie_herzégovine);

        $salvador = new Pays();
        $salvador->setId('47');
        $salvador->setValeur('Salvador');
        $salvador->setNom_fichier('salvador');
        $salvador->setValeur_fichier('salvador');
        $manager->persist($salvador);
        $this->addReference('salvador', $salvador);

        $guyane = new Pays();
        $guyane->setId('48');
        $guyane->setValeur('Guyane');
        $guyane->setNom_fichier('guyane');
        $guyane->setValeur_fichier('guyane');
        $manager->persist($guyane);
        $this->addReference('guyane', $guyane);

        $belgique = new Pays();
        $belgique->setId('49');
        $belgique->setValeur('Belgique');
        $belgique->setNom_fichier('belgique');
        $belgique->setValeur_fichier('belgique');
        $manager->persist($belgique);
        $this->addReference('belgique', $belgique);

        $lesotho = new Pays();
        $lesotho->setId('50');
        $lesotho->setValeur('Lesotho');
        $lesotho->setNom_fichier('lesotho');
        $lesotho->setValeur_fichier('lesotho');
        $manager->persist($lesotho);
        $this->addReference('lesotho', $lesotho);

        $bulgarie = new Pays();
        $bulgarie->setId('51');
        $bulgarie->setValeur('Bulgarie');
        $bulgarie->setNom_fichier('bulgarie');
        $bulgarie->setValeur_fichier('bulgarie');
        $manager->persist($bulgarie);
        $this->addReference('bulgarie', $bulgarie);

        $burundi = new Pays();
        $burundi->setId('52');
        $burundi->setValeur('Burundi');
        $burundi->setNom_fichier('burundi');
        $burundi->setValeur_fichier('burundi');
        $manager->persist($burundi);
        $this->addReference('burundi', $burundi);

        $djibouti = new Pays();
        $djibouti->setId('53');
        $djibouti->setValeur('Djibouti');
        $djibouti->setNom_fichier('djibouti');
        $djibouti->setValeur_fichier('djibouti');
        $manager->persist($djibouti);
        $this->addReference('djibouti', $djibouti);

        $uruguay = new Pays();
        $uruguay->setId('54');
        $uruguay->setValeur('Uruguay');
        $uruguay->setNom_fichier('uruguay');
        $uruguay->setValeur_fichier('uruguay');
        $manager->persist($uruguay);
        $this->addReference('uruguay', $uruguay);

        $congo = new Pays();
        $congo->setId('55');
        $congo->setValeur('Congo');
        $congo->setNom_fichier('congo');
        $congo->setValeur_fichier('congo');
        $manager->persist($congo);
        $this->addReference('congo', $congo);

        $rwanda = new Pays();
        $rwanda->setId('56');
        $rwanda->setValeur('Rwanda');
        $rwanda->setNom_fichier('rwanda');
        $rwanda->setValeur_fichier('rwanda');
        $manager->persist($rwanda);
        $this->addReference('rwanda', $rwanda);

        $arménie = new Pays();
        $arménie->setId('57');
        $arménie->setValeur('Arménie');
        $arménie->setNom_fichier('arménie');
        $arménie->setValeur_fichier('arménie');
        $manager->persist($arménie);
        $this->addReference('arménie', $arménie);

        $sénégal = new Pays();
        $sénégal->setId('58');
        $sénégal->setValeur('Sénégal');
        $sénégal->setNom_fichier('sénégal');
        $sénégal->setValeur_fichier('sénégal');
        $manager->persist($sénégal);
        $this->addReference('sénégal', $sénégal);

        $togo = new Pays();
        $togo->setId('59');
        $togo->setValeur('Togo');
        $togo->setNom_fichier('togo');
        $togo->setValeur_fichier('togo');
        $manager->persist($togo);
        $this->addReference('togo', $togo);

        $hongrie = new Pays();
        $hongrie->setId('60');
        $hongrie->setValeur('Hongrie');
        $hongrie->setNom_fichier('hongrie');
        $hongrie->setValeur_fichier('hongrie');
        $manager->persist($hongrie);
        $this->addReference('hongrie', $hongrie);

        $malawi = new Pays();
        $malawi->setId('61');
        $malawi->setValeur('Malawi');
        $malawi->setNom_fichier('malawi');
        $malawi->setValeur_fichier('malawi');
        $manager->persist($malawi);
        $this->addReference('malawi', $malawi);

        $tadjikistan = new Pays();
        $tadjikistan->setId('62');
        $tadjikistan->setValeur('Tadjikistan');
        $tadjikistan->setNom_fichier('tadjikistan');
        $tadjikistan->setValeur_fichier('tadjikistan');
        $manager->persist($tadjikistan);
        $this->addReference('tadjikistan', $tadjikistan);

        $islande = new Pays();
        $islande->setId('63');
        $islande->setValeur('Islande');
        $islande->setNom_fichier('islande');
        $islande->setValeur_fichier('islande');
        $manager->persist($islande);
        $this->addReference('islande', $islande);

        $nicaragua = new Pays();
        $nicaragua->setId('64');
        $nicaragua->setValeur('Nicaragua');
        $nicaragua->setNom_fichier('nicaragua');
        $nicaragua->setValeur_fichier('nicaragua');
        $manager->persist($nicaragua);
        $this->addReference('nicaragua', $nicaragua);

        $maroc = new Pays();
        $maroc->setId('65');
        $maroc->setValeur('Maroc');
        $maroc->setNom_fichier('maroc');
        $maroc->setValeur_fichier('maroc');
        $manager->persist($maroc);
        $this->addReference('maroc', $maroc);

        $liberia = new Pays();
        $liberia->setId('66');
        $liberia->setValeur('Liberia');
        $liberia->setNom_fichier('liberia');
        $liberia->setValeur_fichier('liberia');
        $manager->persist($liberia);
        $this->addReference('liberia', $liberia);

        $république_centrafricaine = new Pays();
        $république_centrafricaine->setId('67');
        $république_centrafricaine->setValeur('République Centrafricaine');
        $république_centrafricaine->setNom_fichier('république_centrafricaine');
        $république_centrafricaine->setValeur_fichier('république centrafricaine');
        $manager->persist($république_centrafricaine);
        $this->addReference('république_centrafricaine', $république_centrafricaine);

        $slovaquie = new Pays();
        $slovaquie->setId('68');
        $slovaquie->setValeur('Slovaquie');
        $slovaquie->setNom_fichier('slovaquie');
        $slovaquie->setValeur_fichier('slovaquie');
        $manager->persist($slovaquie);
        $this->addReference('slovaquie', $slovaquie);

        $lituanie = new Pays();
        $lituanie->setId('69');
        $lituanie->setValeur('Lituanie');
        $lituanie->setNom_fichier('lituanie');
        $lituanie->setValeur_fichier('lituanie');
        $manager->persist($lituanie);
        $this->addReference('lituanie', $lituanie);

        $zimbabwe = new Pays();
        $zimbabwe->setId('70');
        $zimbabwe->setValeur('Zimbabwe');
        $zimbabwe->setNom_fichier('zimbabwe');
        $zimbabwe->setValeur_fichier('zimbabwe');
        $manager->persist($zimbabwe);
        $this->addReference('zimbabwe', $zimbabwe);

        $israël = new Pays();
        $israël->setId('71');
        $israël->setValeur('Israël');
        $israël->setNom_fichier('israël');
        $israël->setValeur_fichier('israël');
        $manager->persist($israël);
        $this->addReference('israël', $israël);

        $laos = new Pays();
        $laos->setId('72');
        $laos->setValeur('Laos');
        $laos->setNom_fichier('laos');
        $laos->setValeur_fichier('laos');
        $manager->persist($laos);
        $this->addReference('laos', $laos);

        $corée_du_nord = new Pays();
        $corée_du_nord->setId('73');
        $corée_du_nord->setValeur('Corée du Nord');
        $corée_du_nord->setNom_fichier('corée_du_nord');
        $corée_du_nord->setValeur_fichier('corée du nord');
        $manager->persist($corée_du_nord);
        $this->addReference('corée_du_nord', $corée_du_nord);

        $turkménistan = new Pays();
        $turkménistan->setId('74');
        $turkménistan->setValeur('Turkménistan');
        $turkménistan->setNom_fichier('turkménistan');
        $turkménistan->setValeur_fichier('turkménistan');
        $manager->persist($turkménistan);
        $this->addReference('turkménistan', $turkménistan);

        $bénin = new Pays();
        $bénin->setId('75');
        $bénin->setValeur('Bénin');
        $bénin->setNom_fichier('bénin');
        $bénin->setValeur_fichier('bénin');
        $manager->persist($bénin);
        $this->addReference('bénin', $bénin);

        $slovénie = new Pays();
        $slovénie->setId('76');
        $slovénie->setValeur('Slovénie');
        $slovénie->setNom_fichier('slovénie');
        $slovénie->setValeur_fichier('slovénie');
        $manager->persist($slovénie);
        $this->addReference('slovénie', $slovénie);

        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // l'ordre dans lequel les fichiers sont chargés
    }
    
}