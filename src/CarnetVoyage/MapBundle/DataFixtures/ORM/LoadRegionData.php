<?php
// src/CarnetVoyage/MapBundle/DataFixtures/ORM/LoadRegionData.php
namespace CarnetVoyage\MapBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use CarnetVoyage\MapBundle\Entity\Region;

class LoadRegionData extends AbstractFixture implements \Doctrine\Common\DataFixtures\OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $france = $this->getReference('france');
        
        $suisse = $this->getReference('suisse');
        
        $afghanistan = $this->getReference('afghanistan');
        
        $MidiPyrénées = new Region();
        $MidiPyrénées->setId('201');
        $MidiPyrénées->setValeur('Midi-Pyrénées');
        $MidiPyrénées->setPays($france);
        $manager->persist($MidiPyrénées);
        
        $Aquitaine = new Region();
        $Aquitaine->setId('202');
        $Aquitaine->setValeur('Aquitaine');
        $Aquitaine->setPays($france);
        $manager->persist($Aquitaine);
        
        $LanguedocRoussillon = new Region();
        $LanguedocRoussillon->setId('203');
        $LanguedocRoussillon->setValeur('Languedoc-Roussillon');
        $LanguedocRoussillon->setPays($france);
        $manager->persist($LanguedocRoussillon);
        
        $ProvenceAlpesCôtedAzur = new Region();
        $ProvenceAlpesCôtedAzur->setId('204');
        $ProvenceAlpesCôtedAzur->setValeur('Provence-Alpes-Côte d\'Azur');
        $ProvenceAlpesCôtedAzur->setPays($france);
        $manager->persist($ProvenceAlpesCôtedAzur);
        
        $PoitouCharentes = new Region();
        $PoitouCharentes->setId('205');
        $PoitouCharentes->setValeur('Poitou-Charentes');
        $PoitouCharentes->setPays($france);
        $manager->persist($PoitouCharentes);
        
        $Limousin = new Region();
        $Limousin->setId('206');
        $Limousin->setValeur('Limousin');
        $Limousin->setPays($france);
        $manager->persist($Limousin);
        
        $Auvergne = new Region();
        $Auvergne->setId('207');
        $Auvergne->setValeur('Auvergne');
        $Auvergne->setPays($france);
        $manager->persist($Auvergne);
        
        $Bretagne = new Region();
        $Bretagne->setId('208');
        $Bretagne->setValeur('Bretagne');
        $Bretagne->setPays($france);
        $manager->persist($Bretagne);
        
        $PaysdelaLoire = new Region();
        $PaysdelaLoire->setId('209');
        $PaysdelaLoire->setValeur('Pays-de-la-Loire');
        $PaysdelaLoire->setPays($france);
        $manager->persist($PaysdelaLoire);
        
        $BasseNormandie = new Region();
        $BasseNormandie->setId('210');
        $BasseNormandie->setValeur('Basse-Normandie');
        $BasseNormandie->setPays($france);
        $manager->persist($BasseNormandie);
        
        $Centre = new Region();
        $Centre->setId('211');
        $Centre->setValeur('Centre');
        $Centre->setPays($france);
        $manager->persist($Centre);
        
        $Bourgogne = new Region();
        $Bourgogne->setId('212');
        $Bourgogne->setValeur('Bourgogne');
        $Bourgogne->setPays($france);
        $manager->persist($Bourgogne);
        
        $FrancheComté = new Region();
        $FrancheComté->setId('213');
        $FrancheComté->setValeur('Franche-Comté');
        $FrancheComté->setPays($france);
        $manager->persist($FrancheComté);
        
        $Alsace = new Region();
        $Alsace->setId('214');
        $Alsace->setValeur('Alsace');
        $Alsace->setPays($france);
        $manager->persist($Alsace);
        
        $Lorraine = new Region();
        $Lorraine->setId('215');
        $Lorraine->setValeur('Lorraine');
        $Lorraine->setPays($france);
        $manager->persist($Lorraine);
        
        $ChampagneArdenne = new Region();
        $ChampagneArdenne->setId('216');
        $ChampagneArdenne->setValeur('Champagne-Ardenne');
        $ChampagneArdenne->setPays($france);
        $manager->persist($ChampagneArdenne);
        
        $IledeFrance = new Region();
        $IledeFrance->setId('217');
        $IledeFrance->setValeur('Ile-de-France');
        $IledeFrance->setPays($france);
        $manager->persist($IledeFrance);
        
        $Picardie = new Region();
        $Picardie->setId('218');
        $Picardie->setValeur('Picardie');
        $Picardie->setPays($france);
        $manager->persist($Picardie);
        
        $HauteNormandie = new Region();
        $HauteNormandie->setId('219');
        $HauteNormandie->setValeur('Haute-Normandie');
        $HauteNormandie->setPays($france);
        $manager->persist($HauteNormandie);
        
        $NordPasDeCalais = new Region();
        $NordPasDeCalais->setId('220');
        $NordPasDeCalais->setValeur('Nord-Pas-De-Calais');
        $NordPasDeCalais->setPays($france);
        $manager->persist($NordPasDeCalais);
        
        $Corse = new Region();
        $Corse->setId('221');
        $Corse->setValeur('Corse');
        $Corse->setPays($france);
        $manager->persist($Corse);
        
        $RhôneAlpes = new Region();
        $RhôneAlpes->setId('222');
        $RhôneAlpes->setValeur('Rhône-Alpes');
        $RhôneAlpes->setPays($france);
        $manager->persist($RhôneAlpes);
        
        $Genève = new Region();
        $Genève->setId('1101');
        $Genève->setValeur('Genève');
        $Genève->setPays($suisse);
        $manager->persist($Genève);
        
        $Vaud = new Region();
        $Vaud->setId('1102');
        $Vaud->setValeur('Vaud');
        $Vaud->setPays($suisse);
        $manager->persist($Vaud);
        
        $Neuchâtel = new Region();
        $Neuchâtel->setId('1103');
        $Neuchâtel->setValeur('Neuchâtel');
        $Neuchâtel->setPays($suisse);
        $manager->persist($Neuchâtel);
        
        $Jura = new Region();
        $Jura->setId('1104');
        $Jura->setValeur('Jura');
        $Jura->setPays($suisse);
        $manager->persist($Jura);
        
        $Berne = new Region();
        $Berne->setId('1105');
        $Berne->setValeur('Berne');
        $Berne->setPays($suisse);
        $manager->persist($Berne);
        
        $Fribourg = new Region();
        $Fribourg->setId('1106');
        $Fribourg->setValeur('Fribourg');
        $Fribourg->setPays($suisse);
        $manager->persist($Fribourg);
        
        $Valais = new Region();
        $Valais->setId('1107');
        $Valais->setValeur('Valais');
        $Valais->setPays($suisse);
        $manager->persist($Valais);
        
        $Tessin = new Region();
        $Tessin->setId('1108');
        $Tessin->setValeur('Tessin');
        $Tessin->setPays($suisse);
        $manager->persist($Tessin);
        
        $Soleure = new Region();
        $Soleure->setId('1109');
        $Soleure->setValeur('Soleure');
        $Soleure->setPays($suisse);
        $manager->persist($Soleure);
        
        $BâleCampagne = new Region();
        $BâleCampagne->setId('1110');
        $BâleCampagne->setValeur('Bâle-Campagne');
        $BâleCampagne->setPays($suisse);
        $manager->persist($BâleCampagne);
        
        $BâleVille = new Region();
        $BâleVille->setId('1111');
        $BâleVille->setValeur('Bâle-Ville');
        $BâleVille->setPays($suisse);
        $manager->persist($BâleVille);
        
        $Lucerne = new Region();
        $Lucerne->setId('1112');
        $Lucerne->setValeur('Lucerne');
        $Lucerne->setPays($suisse);
        $manager->persist($Lucerne);
        
        $Obwald = new Region();
        $Obwald->setId('1113');
        $Obwald->setValeur('Obwald');
        $Obwald->setPays($suisse);
        $manager->persist($Obwald);
        
        $Nidwald = new Region();
        $Nidwald->setId('1114');
        $Nidwald->setValeur('Nidwald');
        $Nidwald->setPays($suisse);
        $manager->persist($Nidwald);
        
        $Uri = new Region();
        $Uri->setId('1115');
        $Uri->setValeur('Uri');
        $Uri->setPays($suisse);
        $manager->persist($Uri);
        
        $Grisons = new Region();
        $Grisons->setId('1116');
        $Grisons->setValeur('Grisons');
        $Grisons->setPays($suisse);
        $manager->persist($Grisons);
        
        $SaintGall = new Region();
        $SaintGall->setId('1117');
        $SaintGall->setValeur('Saint-Gall');
        $SaintGall->setPays($suisse);
        $manager->persist($SaintGall);
        
        $AppenzellRhodesIntérieures = new Region();
        $AppenzellRhodesIntérieures->setId('1118');
        $AppenzellRhodesIntérieures->setValeur('Appenzell Rhodes-Intérieures');
        $AppenzellRhodesIntérieures->setPays($suisse);
        $manager->persist($AppenzellRhodesIntérieures);
        
        $AppenzellRhodesExtérieures = new Region();
        $AppenzellRhodesExtérieures->setId('1119');
        $AppenzellRhodesExtérieures->setValeur('Appenzell Rhodes-Extérieures');
        $AppenzellRhodesExtérieures->setPays($suisse);
        $manager->persist($AppenzellRhodesExtérieures);
        
        $Glaris = new Region();
        $Glaris->setId('1120');
        $Glaris->setValeur('Glaris');
        $Glaris->setPays($suisse);
        $manager->persist($Glaris);
        
        $Schwytz = new Region();
        $Schwytz->setId('1121');
        $Schwytz->setValeur('Schwytz');
        $Schwytz->setPays($suisse);
        $manager->persist($Schwytz);
        
        $Thurgovie = new Region();
        $Thurgovie->setId('1122');
        $Thurgovie->setValeur('Thurgovie');
        $Thurgovie->setPays($suisse);
        $manager->persist($Thurgovie);
        
        $Zurich = new Region();
        $Zurich->setId('1123');
        $Zurich->setValeur('Zurich');
        $Zurich->setPays($suisse);
        $manager->persist($Zurich);
        
        $Zoug = new Region();
        $Zoug->setId('1124');
        $Zoug->setValeur('Zoug');
        $Zoug->setPays($suisse);
        $manager->persist($Zoug);
        
        $Argovie = new Region();
        $Argovie->setId('1125');
        $Argovie->setValeur('Argovie');
        $Argovie->setPays($suisse);
        $manager->persist($Argovie);
        
        $Schaffhouse = new Region();
        $Schaffhouse->setId('1126');
        $Schaffhouse->setValeur('Schaffhouse');
        $Schaffhouse->setPays($suisse);
        $manager->persist($Schaffhouse);
        
        $Kondôz = new Region();
        $Kondôz->setId('2101');
        $Kondôz->setValeur('Kondôz');
        $Kondôz->setPays($afghanistan);
        $manager->persist($Kondôz);
        
        $Takhar = new Region();
        $Takhar->setId('2102');
        $Takhar->setValeur('Takhar');
        $Takhar->setPays($afghanistan);
        $manager->persist($Takhar);
        
        $Djozdjan = new Region();
        $Djozdjan->setId('2103');
        $Djozdjan->setValeur('Djozdjan');
        $Djozdjan->setPays($afghanistan);
        $manager->persist($Djozdjan);
        
        $Badakhchan = new Region();
        $Badakhchan->setId('2104');
        $Badakhchan->setValeur('Badakhchan');
        $Badakhchan->setPays($afghanistan);
        $manager->persist($Badakhchan);
        
        $Balkh = new Region();
        $Balkh->setId('2105');
        $Balkh->setValeur('Balkh');
        $Balkh->setPays($afghanistan);
        $manager->persist($Balkh);
        
        $Pandjchir = new Region();
        $Pandjchir->setId('2106');
        $Pandjchir->setValeur('Pandjchir');
        $Pandjchir->setPays($afghanistan);
        $manager->persist($Pandjchir);
        
        $Fâryâb = new Region();
        $Fâryâb->setId('2107');
        $Fâryâb->setValeur('Fâryâb');
        $Fâryâb->setPays($afghanistan);
        $manager->persist($Fâryâb);
        
        $Samangan = new Region();
        $Samangan->setId('2108');
        $Samangan->setValeur('Samangan');
        $Samangan->setPays($afghanistan);
        $manager->persist($Samangan);
        
        $SarePol = new Region();
        $SarePol->setId('2109');
        $SarePol->setValeur('Sar-e Pol');
        $SarePol->setPays($afghanistan);
        $manager->persist($SarePol);
        
        $Baghlan = new Region();
        $Baghlan->setId('2110');
        $Baghlan->setValeur('Baghlan');
        $Baghlan->setPays($afghanistan);
        $manager->persist($Baghlan);
        
        $Nouristan = new Region();
        $Nouristan->setId('2111');
        $Nouristan->setValeur('Nouristan');
        $Nouristan->setPays($afghanistan);
        $manager->persist($Nouristan);
        
        $Bâdghîs = new Region();
        $Bâdghîs->setId('2112');
        $Bâdghîs->setValeur('Bâdghîs');
        $Bâdghîs->setPays($afghanistan);
        $manager->persist($Bâdghîs);
        
        $Parwan = new Region();
        $Parwan->setId('2113');
        $Parwan->setValeur('Parwan');
        $Parwan->setPays($afghanistan);
        $manager->persist($Parwan);
        
        $Kapisa = new Region();
        $Kapisa->setId('2114');
        $Kapisa->setValeur('Kapisa');
        $Kapisa->setPays($afghanistan);
        $manager->persist($Kapisa);
        
        $Kounar = new Region();
        $Kounar->setId('2115');
        $Kounar->setValeur('Kounar');
        $Kounar->setPays($afghanistan);
        $manager->persist($Kounar);
        
        $Laghman = new Region();
        $Laghman->setId('2116');
        $Laghman->setValeur('Laghman');
        $Laghman->setPays($afghanistan);
        $manager->persist($Laghman);
        
        $Kaboul = new Region();
        $Kaboul->setId('2117');
        $Kaboul->setValeur('Kaboul');
        $Kaboul->setPays($afghanistan);
        $manager->persist($Kaboul);
        
        $Bamiyan = new Region();
        $Bamiyan->setId('2118');
        $Bamiyan->setValeur('Bamiyan');
        $Bamiyan->setPays($afghanistan);
        $manager->persist($Bamiyan);
        
        $Wardak = new Region();
        $Wardak->setId('2119');
        $Wardak->setValeur('Wardak');
        $Wardak->setPays($afghanistan);
        $manager->persist($Wardak);
        
        $Nangarhar = new Region();
        $Nangarhar->setId('2120');
        $Nangarhar->setValeur('Nangarhar');
        $Nangarhar->setPays($afghanistan);
        $manager->persist($Nangarhar);
        
        $Logar = new Region();
        $Logar->setId('2121');
        $Logar->setValeur('Logar');
        $Logar->setPays($afghanistan);
        $manager->persist($Logar);
        
        $Ghor = new Region();
        $Ghor->setId('2122');
        $Ghor->setValeur('Ghor');
        $Ghor->setPays($afghanistan);
        $manager->persist($Ghor);
        
        $Hérât = new Region();
        $Hérât->setId('2123');
        $Hérât->setValeur('Hérât');
        $Hérât->setPays($afghanistan);
        $manager->persist($Hérât);
        
        $Deykandi = new Region();
        $Deykandi->setId('2124');
        $Deykandi->setValeur('Deykandi');
        $Deykandi->setPays($afghanistan);
        $manager->persist($Deykandi);
        
        $Paktiya = new Region();
        $Paktiya->setId('2125');
        $Paktiya->setValeur('Paktiya');
        $Paktiya->setPays($afghanistan);
        $manager->persist($Paktiya);
        
        $Khost = new Region();
        $Khost->setId('2126');
        $Khost->setValeur('Khost');
        $Khost->setPays($afghanistan);
        $manager->persist($Khost);
        
        $Ghazni = new Region();
        $Ghazni->setId('2127');
        $Ghazni->setValeur('Ghazni');
        $Ghazni->setPays($afghanistan);
        $manager->persist($Ghazni);
        
        $Oruzgan = new Region();
        $Oruzgan->setId('2128');
        $Oruzgan->setValeur('Oruzgan');
        $Oruzgan->setPays($afghanistan);
        $manager->persist($Oruzgan);
        
        $Paktika = new Region();
        $Paktika->setId('2129');
        $Paktika->setValeur('Paktika');
        $Paktika->setPays($afghanistan);
        $manager->persist($Paktika);
        
        $Farâh = new Region();
        $Farâh->setId('2130');
        $Farâh->setValeur('Farâh');
        $Farâh->setPays($afghanistan);
        $manager->persist($Farâh);
        
        $Zabol = new Region();
        $Zabol->setId('2131');
        $Zabol->setValeur('Zabol');
        $Zabol->setPays($afghanistan);
        $manager->persist($Zabol);
        
        $Nimroz = new Region();
        $Nimroz->setId('2132');
        $Nimroz->setValeur('Nimroz');
        $Nimroz->setPays($afghanistan);
        $manager->persist($Nimroz);
        
        $Kandahar = new Region();
        $Kandahar->setId('2133');
        $Kandahar->setValeur('Kandahar');
        $Kandahar->setPays($afghanistan);
        $manager->persist($Kandahar);
        
        $Helmand = new Region();
        $Helmand->setId('2134');
        $Helmand->setValeur('Helmand');
        $Helmand->setPays($afghanistan);
        $manager->persist($Helmand);

        $manager->flush();

    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
    
}