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
        $RépubliqueautonomedAbkhazie = new Region();
        $RépubliqueautonomedAbkhazie->setId('101');
        $RépubliqueautonomedAbkhazie->setValeur('République autonome d\'Abkhazie');
        $RépubliqueautonomedAbkhazie->setPays($this->getReference('georgie'));
        $manager->persist($RépubliqueautonomedAbkhazie);

        $MingrélieetHauteSvanétie = new Region();
        $MingrélieetHauteSvanétie->setId('102');
        $MingrélieetHauteSvanétie->setValeur('Mingrélie et Haute-Svanétie');
        $MingrélieetHauteSvanétie->setPays($this->getReference('georgie'));
        $manager->persist($MingrélieetHauteSvanétie);

        $Gourie = new Region();
        $Gourie->setId('103');
        $Gourie->setValeur(' Gourie');
        $Gourie->setPays($this->getReference('georgie'));
        $manager->persist($Gourie);

        $RépubliqueautonomedAdjarie = new Region();
        $RépubliqueautonomedAdjarie->setId('104');
        $RépubliqueautonomedAdjarie->setValeur('République autonome d\'Adjarie');
        $RépubliqueautonomedAdjarie->setPays($this->getReference('georgie'));
        $manager->persist($RépubliqueautonomedAdjarie);

        $RachaLechkhumietKvemoSvaneti = new Region();
        $RachaLechkhumietKvemoSvaneti->setId('105');
        $RachaLechkhumietKvemoSvaneti->setValeur('Racha-Lechkhumi et Kvemo Svaneti');
        $RachaLechkhumietKvemoSvaneti->setPays($this->getReference('georgie'));
        $manager->persist($RachaLechkhumietKvemoSvaneti);

        $Iméréthie = new Region();
        $Iméréthie->setId('106');
        $Iméréthie->setValeur('Iméréthie');
        $Iméréthie->setPays($this->getReference('georgie'));
        $manager->persist($Iméréthie);

        $SamtskheDjavakheti = new Region();
        $SamtskheDjavakheti->setId('107');
        $SamtskheDjavakheti->setValeur('Samtskhe-Djavakheti');
        $SamtskheDjavakheti->setPays($this->getReference('georgie'));
        $manager->persist($SamtskheDjavakheti);

        $ShidaKartli = new Region();
        $ShidaKartli->setId('108');
        $ShidaKartli->setValeur('Shida Kartli');
        $ShidaKartli->setPays($this->getReference('georgie'));
        $manager->persist($ShidaKartli);

        $MtskhetaMtianeti = new Region();
        $MtskhetaMtianeti->setId('109');
        $MtskhetaMtianeti->setValeur('Mtskheta-Mtianeti');
        $MtskhetaMtianeti->setPays($this->getReference('georgie'));
        $manager->persist($MtskhetaMtianeti);

        $KvemoKartli = new Region();
        $KvemoKartli->setId('110');
        $KvemoKartli->setValeur('Kvemo Kartli');
        $KvemoKartli->setPays($this->getReference('georgie'));
        $manager->persist($KvemoKartli);

        $Kakhétie = new Region();
        $Kakhétie->setId('111');
        $Kakhétie->setValeur('Kakhétie');
        $Kakhétie->setPays($this->getReference('georgie'));
        $manager->persist($Kakhétie);

        $VilledeTbilissi = new Region();
        $VilledeTbilissi->setId('112');
        $VilledeTbilissi->setValeur('Ville de Tbilissi');
        $VilledeTbilissi->setPays($this->getReference('georgie'));
        $manager->persist($VilledeTbilissi);

        $MidiPyrénées = new Region();
        $MidiPyrénées->setId('201');
        $MidiPyrénées->setValeur('Midi-Pyrénées');
        $MidiPyrénées->setPays($this->getReference('france'));
        $manager->persist($MidiPyrénées);

        $Aquitaine = new Region();
        $Aquitaine->setId('202');
        $Aquitaine->setValeur('Aquitaine');
        $Aquitaine->setPays($this->getReference('france'));
        $manager->persist($Aquitaine);

        $LanguedocRoussillon = new Region();
        $LanguedocRoussillon->setId('203');
        $LanguedocRoussillon->setValeur('Languedoc-Roussillon');
        $LanguedocRoussillon->setPays($this->getReference('france'));
        $manager->persist($LanguedocRoussillon);

        $ProvenceAlpesCôtedAzur = new Region();
        $ProvenceAlpesCôtedAzur->setId('204');
        $ProvenceAlpesCôtedAzur->setValeur('Provence-Alpes-Côte d\'Azur');
        $ProvenceAlpesCôtedAzur->setPays($this->getReference('france'));
        $manager->persist($ProvenceAlpesCôtedAzur);

        $PoitouCharentes = new Region();
        $PoitouCharentes->setId('205');
        $PoitouCharentes->setValeur('Poitou-Charentes');
        $PoitouCharentes->setPays($this->getReference('france'));
        $manager->persist($PoitouCharentes);

        $Limousin = new Region();
        $Limousin->setId('206');
        $Limousin->setValeur('Limousin');
        $Limousin->setPays($this->getReference('france'));
        $manager->persist($Limousin);

        $Auvergne = new Region();
        $Auvergne->setId('207');
        $Auvergne->setValeur('Auvergne');
        $Auvergne->setPays($this->getReference('france'));
        $manager->persist($Auvergne);

        $Bretagne = new Region();
        $Bretagne->setId('208');
        $Bretagne->setValeur('Bretagne');
        $Bretagne->setPays($this->getReference('france'));
        $manager->persist($Bretagne);

        $PaysdelaLoire = new Region();
        $PaysdelaLoire->setId('209');
        $PaysdelaLoire->setValeur('Pays-de-la-Loire');
        $PaysdelaLoire->setPays($this->getReference('france'));
        $manager->persist($PaysdelaLoire);

        $BasseNormandie = new Region();
        $BasseNormandie->setId('210');
        $BasseNormandie->setValeur('Basse-Normandie');
        $BasseNormandie->setPays($this->getReference('france'));
        $manager->persist($BasseNormandie);

        $Centre = new Region();
        $Centre->setId('211');
        $Centre->setValeur('Centre');
        $Centre->setPays($this->getReference('france'));
        $manager->persist($Centre);

        $Bourgogne = new Region();
        $Bourgogne->setId('212');
        $Bourgogne->setValeur('Bourgogne');
        $Bourgogne->setPays($this->getReference('france'));
        $manager->persist($Bourgogne);

        $FrancheComté = new Region();
        $FrancheComté->setId('213');
        $FrancheComté->setValeur('Franche-Comté');
        $FrancheComté->setPays($this->getReference('france'));
        $manager->persist($FrancheComté);

        $Alsace = new Region();
        $Alsace->setId('214');
        $Alsace->setValeur('Alsace');
        $Alsace->setPays($this->getReference('france'));
        $manager->persist($Alsace);

        $Lorraine = new Region();
        $Lorraine->setId('215');
        $Lorraine->setValeur('Lorraine');
        $Lorraine->setPays($this->getReference('france'));
        $manager->persist($Lorraine);

        $ChampagneArdenne = new Region();
        $ChampagneArdenne->setId('216');
        $ChampagneArdenne->setValeur('Champagne-Ardenne');
        $ChampagneArdenne->setPays($this->getReference('france'));
        $manager->persist($ChampagneArdenne);

        $IledeFrance = new Region();
        $IledeFrance->setId('217');
        $IledeFrance->setValeur('Ile-de-France');
        $IledeFrance->setPays($this->getReference('france'));
        $manager->persist($IledeFrance);

        $Picardie = new Region();
        $Picardie->setId('218');
        $Picardie->setValeur('Picardie');
        $Picardie->setPays($this->getReference('france'));
        $manager->persist($Picardie);

        $HauteNormandie = new Region();
        $HauteNormandie->setId('219');
        $HauteNormandie->setValeur('Haute-Normandie');
        $HauteNormandie->setPays($this->getReference('france'));
        $manager->persist($HauteNormandie);

        $NordPasDeCalais = new Region();
        $NordPasDeCalais->setId('220');
        $NordPasDeCalais->setValeur('Nord-Pas-De-Calais');
        $NordPasDeCalais->setPays($this->getReference('france'));
        $manager->persist($NordPasDeCalais);

        $Corse = new Region();
        $Corse->setId('221');
        $Corse->setValeur('Corse');
        $Corse->setPays($this->getReference('france'));
        $manager->persist($Corse);

        $RhôneAlpes = new Region();
        $RhôneAlpes->setId('222');
        $RhôneAlpes->setValeur('Rhône-Alpes');
        $RhôneAlpes->setPays($this->getReference('france'));
        $manager->persist($RhôneAlpes);

        $Aceh = new Region();
        $Aceh->setId('301');
        $Aceh->setValeur(' Aceh');
        $Aceh->setPays($this->getReference('indonésie'));
        $manager->persist($Aceh);

        $SumatraduNord = new Region();
        $SumatraduNord->setId('302');
        $SumatraduNord->setValeur('Sumatra du Nord');
        $SumatraduNord->setPays($this->getReference('indonésie'));
        $manager->persist($SumatraduNord);

        $SumatraOccidental = new Region();
        $SumatraOccidental->setId('303');
        $SumatraOccidental->setValeur('Sumatra Occidental');
        $SumatraOccidental->setPays($this->getReference('indonésie'));
        $manager->persist($SumatraOccidental);

        $Riau = new Region();
        $Riau->setId('304');
        $Riau->setValeur('Riau');
        $Riau->setPays($this->getReference('indonésie'));
        $manager->persist($Riau);

        $Bengkulu = new Region();
        $Bengkulu->setId('305');
        $Bengkulu->setValeur('Bengkulu');
        $Bengkulu->setPays($this->getReference('indonésie'));
        $manager->persist($Bengkulu);

        $Jambi = new Region();
        $Jambi->setId('306');
        $Jambi->setValeur('Jambi');
        $Jambi->setPays($this->getReference('indonésie'));
        $manager->persist($Jambi);

        $SumatraduSud = new Region();
        $SumatraduSud->setId('307');
        $SumatraduSud->setValeur('Sumatra du Sud');
        $SumatraduSud->setPays($this->getReference('indonésie'));
        $manager->persist($SumatraduSud);

        $Lampung = new Region();
        $Lampung->setId('308');
        $Lampung->setValeur('Lampung');
        $Lampung->setPays($this->getReference('indonésie'));
        $manager->persist($Lampung);

        $BangkaBelifung = new Region();
        $BangkaBelifung->setId('309');
        $BangkaBelifung->setValeur('Bangka-Belifung');
        $BangkaBelifung->setPays($this->getReference('indonésie'));
        $manager->persist($BangkaBelifung);

        $Banten = new Region();
        $Banten->setId('310');
        $Banten->setValeur('Banten');
        $Banten->setPays($this->getReference('indonésie'));
        $manager->persist($Banten);

        $Jakarta = new Region();
        $Jakarta->setId('311');
        $Jakarta->setValeur('Jakarta');
        $Jakarta->setPays($this->getReference('indonésie'));
        $manager->persist($Jakarta);

        $JavaOccidental = new Region();
        $JavaOccidental->setId('312');
        $JavaOccidental->setValeur('Java Occidental');
        $JavaOccidental->setPays($this->getReference('indonésie'));
        $manager->persist($JavaOccidental);

        $JavaCentral = new Region();
        $JavaCentral->setId('313');
        $JavaCentral->setValeur('Java Central');
        $JavaCentral->setPays($this->getReference('indonésie'));
        $manager->persist($JavaCentral);

        $Yogyakarta = new Region();
        $Yogyakarta->setId('314');
        $Yogyakarta->setValeur('Yogyakarta');
        $Yogyakarta->setPays($this->getReference('indonésie'));
        $manager->persist($Yogyakarta);

        $JavaOriental = new Region();
        $JavaOriental->setId('315');
        $JavaOriental->setValeur('Java Oriental');
        $JavaOriental->setPays($this->getReference('indonésie'));
        $manager->persist($JavaOriental);

        $Bali = new Region();
        $Bali->setId('316');
        $Bali->setValeur('Bali');
        $Bali->setPays($this->getReference('indonésie'));
        $manager->persist($Bali);

        $PetitesîlesdelaSondeOccidentales = new Region();
        $PetitesîlesdelaSondeOccidentales->setId('317');
        $PetitesîlesdelaSondeOccidentales->setValeur('Petites îles de la Sonde Occidentales');
        $PetitesîlesdelaSondeOccidentales->setPays($this->getReference('indonésie'));
        $manager->persist($PetitesîlesdelaSondeOccidentales);

        $PetitesîlesdelaSondeOrientales = new Region();
        $PetitesîlesdelaSondeOrientales->setId('318');
        $PetitesîlesdelaSondeOrientales->setValeur('Petites îles de la Sonde Orientales');
        $PetitesîlesdelaSondeOrientales->setPays($this->getReference('indonésie'));
        $manager->persist($PetitesîlesdelaSondeOrientales);

        $Molusques = new Region();
        $Molusques->setId('319');
        $Molusques->setValeur('Molusques');
        $Molusques->setPays($this->getReference('indonésie'));
        $manager->persist($Molusques);

        $Papouasie = new Region();
        $Papouasie->setId('320');
        $Papouasie->setValeur('Papouasie');
        $Papouasie->setPays($this->getReference('indonésie'));
        $manager->persist($Papouasie);

        $Papouasieoccidentale = new Region();
        $Papouasieoccidentale->setId('321');
        $Papouasieoccidentale->setValeur('Papouasie occidentale');
        $Papouasieoccidentale->setPays($this->getReference('indonésie'));
        $manager->persist($Papouasieoccidentale);

        $MolusquesduNord = new Region();
        $MolusquesduNord->setId('322');
        $MolusquesduNord->setValeur('Molusques du Nord');
        $MolusquesduNord->setPays($this->getReference('indonésie'));
        $manager->persist($MolusquesduNord);

        $SulawesiduNord = new Region();
        $SulawesiduNord->setId('323');
        $SulawesiduNord->setValeur('Sulawesi du Nord');
        $SulawesiduNord->setPays($this->getReference('indonésie'));
        $manager->persist($SulawesiduNord);

        $Gorontalo = new Region();
        $Gorontalo->setId('324');
        $Gorontalo->setValeur('Gorontalo');
        $Gorontalo->setPays($this->getReference('indonésie'));
        $manager->persist($Gorontalo);

        $SulawesiCentral = new Region();
        $SulawesiCentral->setId('325');
        $SulawesiCentral->setValeur('Sulawesi Central');
        $SulawesiCentral->setPays($this->getReference('indonésie'));
        $manager->persist($SulawesiCentral);

        $SulawesiOccidental = new Region();
        $SulawesiOccidental->setId('326');
        $SulawesiOccidental->setValeur('Sulawesi Occidental');
        $SulawesiOccidental->setPays($this->getReference('indonésie'));
        $manager->persist($SulawesiOccidental);

        $SulawesiduSud = new Region();
        $SulawesiduSud->setId('327');
        $SulawesiduSud->setValeur('Sulawesi du Sud');
        $SulawesiduSud->setPays($this->getReference('indonésie'));
        $manager->persist($SulawesiduSud);

        $SulawesiduSudEst = new Region();
        $SulawesiduSudEst->setId('328');
        $SulawesiduSudEst->setValeur('Sulawesi du Sud-Est');
        $SulawesiduSudEst->setPays($this->getReference('indonésie'));
        $manager->persist($SulawesiduSudEst);

        $KalimantanOriental = new Region();
        $KalimantanOriental->setId('329');
        $KalimantanOriental->setValeur('Kalimantan Oriental');
        $KalimantanOriental->setPays($this->getReference('indonésie'));
        $manager->persist($KalimantanOriental);

        $KalimantanduSud = new Region();
        $KalimantanduSud->setId('330');
        $KalimantanduSud->setValeur('Kalimantan du Sud');
        $KalimantanduSud->setPays($this->getReference('indonésie'));
        $manager->persist($KalimantanduSud);

        $KalimantanCentral = new Region();
        $KalimantanCentral->setId('331');
        $KalimantanCentral->setValeur('Kalimantan Central');
        $KalimantanCentral->setPays($this->getReference('indonésie'));
        $manager->persist($KalimantanCentral);

        $KalimantanOccidental = new Region();
        $KalimantanOccidental->setId('332');
        $KalimantanOccidental->setValeur('Kalimantan Occidental');
        $KalimantanOccidental->setPays($this->getReference('indonésie'));
        $manager->persist($KalimantanOccidental);

        $IlesRiau = new Region();
        $IlesRiau->setId('333');
        $IlesRiau->setValeur('Iles Riau');
        $IlesRiau->setPays($this->getReference('indonésie'));
        $manager->persist($IlesRiau);

        $Tumbes = new Region();
        $Tumbes->setId('401');
        $Tumbes->setValeur('Tumbes');
        $Tumbes->setPays($this->getReference('pérou'));
        $manager->persist($Tumbes);

        $Piura = new Region();
        $Piura->setId('402');
        $Piura->setValeur('Piura');
        $Piura->setPays($this->getReference('pérou'));
        $manager->persist($Piura);

        $Lambayeque = new Region();
        $Lambayeque->setId('403');
        $Lambayeque->setValeur('Lambayeque');
        $Lambayeque->setPays($this->getReference('pérou'));
        $manager->persist($Lambayeque);

        $Cajamarca = new Region();
        $Cajamarca->setId('404');
        $Cajamarca->setValeur('Cajamarca');
        $Cajamarca->setPays($this->getReference('pérou'));
        $manager->persist($Cajamarca);

        $Amazonas = new Region();
        $Amazonas->setId('405');
        $Amazonas->setValeur('Amazonas');
        $Amazonas->setPays($this->getReference('pérou'));
        $manager->persist($Amazonas);

        $Loreto = new Region();
        $Loreto->setId('406');
        $Loreto->setValeur('Loreto');
        $Loreto->setPays($this->getReference('pérou'));
        $manager->persist($Loreto);

        $SanMartín = new Region();
        $SanMartín->setId('407');
        $SanMartín->setValeur('San Martín');
        $SanMartín->setPays($this->getReference('pérou'));
        $manager->persist($SanMartín);

        $LaLibertad = new Region();
        $LaLibertad->setId('408');
        $LaLibertad->setValeur('La Libertad');
        $LaLibertad->setPays($this->getReference('pérou'));
        $manager->persist($LaLibertad);

        $Ancash = new Region();
        $Ancash->setId('409');
        $Ancash->setValeur('Ancash');
        $Ancash->setPays($this->getReference('pérou'));
        $manager->persist($Ancash);

        $Huánuco = new Region();
        $Huánuco->setId('410');
        $Huánuco->setValeur('Huánuco');
        $Huánuco->setPays($this->getReference('pérou'));
        $manager->persist($Huánuco);

        $Ucayali = new Region();
        $Ucayali->setId('411');
        $Ucayali->setValeur('Ucayali');
        $Ucayali->setPays($this->getReference('pérou'));
        $manager->persist($Ucayali);

        $Lima = new Region();
        $Lima->setId('412');
        $Lima->setValeur('Lima');
        $Lima->setPays($this->getReference('pérou'));
        $manager->persist($Lima);

        $ProvincedeLima = new Region();
        $ProvincedeLima->setId('413');
        $ProvincedeLima->setValeur('Province de Lima');
        $ProvincedeLima->setPays($this->getReference('pérou'));
        $manager->persist($ProvincedeLima);

        $Callao = new Region();
        $Callao->setId('414');
        $Callao->setValeur('Callao');
        $Callao->setPays($this->getReference('pérou'));
        $manager->persist($Callao);

        $Pasco = new Region();
        $Pasco->setId('415');
        $Pasco->setValeur('Pasco');
        $Pasco->setPays($this->getReference('pérou'));
        $manager->persist($Pasco);

        $Junín = new Region();
        $Junín->setId('416');
        $Junín->setValeur('Junín');
        $Junín->setPays($this->getReference('pérou'));
        $manager->persist($Junín);

        $Ica = new Region();
        $Ica->setId('417');
        $Ica->setValeur('Ica');
        $Ica->setPays($this->getReference('pérou'));
        $manager->persist($Ica);

        $Huancavelica = new Region();
        $Huancavelica->setId('418');
        $Huancavelica->setValeur('Huancavelica');
        $Huancavelica->setPays($this->getReference('pérou'));
        $manager->persist($Huancavelica);

        $Ayacucho = new Region();
        $Ayacucho->setId('419');
        $Ayacucho->setValeur('Ayacucho');
        $Ayacucho->setPays($this->getReference('pérou'));
        $manager->persist($Ayacucho);

        $Cuzco = new Region();
        $Cuzco->setId('420');
        $Cuzco->setValeur('Cuzco');
        $Cuzco->setPays($this->getReference('pérou'));
        $manager->persist($Cuzco);

        $MadredeDios = new Region();
        $MadredeDios->setId('421');
        $MadredeDios->setValeur('Madre de Dios');
        $MadredeDios->setPays($this->getReference('pérou'));
        $manager->persist($MadredeDios);

        $Apurimac = new Region();
        $Apurimac->setId('422');
        $Apurimac->setValeur('Apurimac');
        $Apurimac->setPays($this->getReference('pérou'));
        $manager->persist($Apurimac);

        $Arequipa = new Region();
        $Arequipa->setId('423');
        $Arequipa->setValeur('Arequipa');
        $Arequipa->setPays($this->getReference('pérou'));
        $manager->persist($Arequipa);

        $Puno = new Region();
        $Puno->setId('424');
        $Puno->setValeur('Puno');
        $Puno->setPays($this->getReference('pérou'));
        $manager->persist($Puno);

        $Moquegua = new Region();
        $Moquegua->setId('425');
        $Moquegua->setValeur('Moquegua');
        $Moquegua->setPays($this->getReference('pérou'));
        $manager->persist($Moquegua);

        $Tacna = new Region();
        $Tacna->setId('426');
        $Tacna->setValeur('Tacna');
        $Tacna->setPays($this->getReference('pérou'));
        $manager->persist($Tacna);

        $Titicaca = new Region();
        $Titicaca->setId('427');
        $Titicaca->setValeur('Titicaca');
        $Titicaca->setPays($this->getReference('pérou'));
        $manager->persist($Titicaca);

        $Genève = new Region();
        $Genève->setId('1101');
        $Genève->setValeur('Genève');
        $Genève->setPays($this->getReference('suisse'));
        $manager->persist($Genève);

        $Vaud = new Region();
        $Vaud->setId('1102');
        $Vaud->setValeur('Vaud');
        $Vaud->setPays($this->getReference('suisse'));
        $manager->persist($Vaud);

        $Neuchâtel = new Region();
        $Neuchâtel->setId('1103');
        $Neuchâtel->setValeur('Neuchâtel');
        $Neuchâtel->setPays($this->getReference('suisse'));
        $manager->persist($Neuchâtel);

        $Jura = new Region();
        $Jura->setId('1104');
        $Jura->setValeur('Jura');
        $Jura->setPays($this->getReference('suisse'));
        $manager->persist($Jura);

        $Berne = new Region();
        $Berne->setId('1105');
        $Berne->setValeur('Berne');
        $Berne->setPays($this->getReference('suisse'));
        $manager->persist($Berne);

        $Fribourg = new Region();
        $Fribourg->setId('1106');
        $Fribourg->setValeur('Fribourg');
        $Fribourg->setPays($this->getReference('suisse'));
        $manager->persist($Fribourg);

        $Valais = new Region();
        $Valais->setId('1107');
        $Valais->setValeur('Valais');
        $Valais->setPays($this->getReference('suisse'));
        $manager->persist($Valais);

        $Tessin = new Region();
        $Tessin->setId('1108');
        $Tessin->setValeur('Tessin');
        $Tessin->setPays($this->getReference('suisse'));
        $manager->persist($Tessin);

        $Soleure = new Region();
        $Soleure->setId('1109');
        $Soleure->setValeur('Soleure');
        $Soleure->setPays($this->getReference('suisse'));
        $manager->persist($Soleure);

        $BâleCampagne = new Region();
        $BâleCampagne->setId('1110');
        $BâleCampagne->setValeur('Bâle-Campagne');
        $BâleCampagne->setPays($this->getReference('suisse'));
        $manager->persist($BâleCampagne);

        $BâleVille = new Region();
        $BâleVille->setId('1111');
        $BâleVille->setValeur('Bâle-Ville');
        $BâleVille->setPays($this->getReference('suisse'));
        $manager->persist($BâleVille);

        $Lucerne = new Region();
        $Lucerne->setId('1112');
        $Lucerne->setValeur('Lucerne');
        $Lucerne->setPays($this->getReference('suisse'));
        $manager->persist($Lucerne);

        $Obwald = new Region();
        $Obwald->setId('1113');
        $Obwald->setValeur('Obwald');
        $Obwald->setPays($this->getReference('suisse'));
        $manager->persist($Obwald);

        $Nidwald = new Region();
        $Nidwald->setId('1114');
        $Nidwald->setValeur('Nidwald');
        $Nidwald->setPays($this->getReference('suisse'));
        $manager->persist($Nidwald);

        $Uri = new Region();
        $Uri->setId('1115');
        $Uri->setValeur('Uri');
        $Uri->setPays($this->getReference('suisse'));
        $manager->persist($Uri);

        $Grisons = new Region();
        $Grisons->setId('1116');
        $Grisons->setValeur('Grisons');
        $Grisons->setPays($this->getReference('suisse'));
        $manager->persist($Grisons);

        $SaintGall = new Region();
        $SaintGall->setId('1117');
        $SaintGall->setValeur('Saint-Gall');
        $SaintGall->setPays($this->getReference('suisse'));
        $manager->persist($SaintGall);

        $AppenzellRhodesIntérieures = new Region();
        $AppenzellRhodesIntérieures->setId('1118');
        $AppenzellRhodesIntérieures->setValeur('Appenzell Rhodes-Intérieures');
        $AppenzellRhodesIntérieures->setPays($this->getReference('suisse'));
        $manager->persist($AppenzellRhodesIntérieures);

        $AppenzellRhodesExtérieures = new Region();
        $AppenzellRhodesExtérieures->setId('1119');
        $AppenzellRhodesExtérieures->setValeur('Appenzell Rhodes-Extérieures');
        $AppenzellRhodesExtérieures->setPays($this->getReference('suisse'));
        $manager->persist($AppenzellRhodesExtérieures);

        $Glaris = new Region();
        $Glaris->setId('1120');
        $Glaris->setValeur('Glaris');
        $Glaris->setPays($this->getReference('suisse'));
        $manager->persist($Glaris);

        $Schwytz = new Region();
        $Schwytz->setId('1121');
        $Schwytz->setValeur('Schwytz');
        $Schwytz->setPays($this->getReference('suisse'));
        $manager->persist($Schwytz);

        $Thurgovie = new Region();
        $Thurgovie->setId('1122');
        $Thurgovie->setValeur('Thurgovie');
        $Thurgovie->setPays($this->getReference('suisse'));
        $manager->persist($Thurgovie);

        $Zurich = new Region();
        $Zurich->setId('1123');
        $Zurich->setValeur('Zurich');
        $Zurich->setPays($this->getReference('suisse'));
        $manager->persist($Zurich);

        $Zoug = new Region();
        $Zoug->setId('1124');
        $Zoug->setValeur('Zoug');
        $Zoug->setPays($this->getReference('suisse'));
        $manager->persist($Zoug);

        $Argovie = new Region();
        $Argovie->setId('1125');
        $Argovie->setValeur('Argovie');
        $Argovie->setPays($this->getReference('suisse'));
        $manager->persist($Argovie);

        $Schaffhouse = new Region();
        $Schaffhouse->setId('1126');
        $Schaffhouse->setValeur('Schaffhouse');
        $Schaffhouse->setPays($this->getReference('suisse'));
        $manager->persist($Schaffhouse);

        $Kondôz = new Region();
        $Kondôz->setId('2101');
        $Kondôz->setValeur('Kondôz');
        $Kondôz->setPays($this->getReference('afghanistan'));
        $manager->persist($Kondôz);

        $Takhar = new Region();
        $Takhar->setId('2102');
        $Takhar->setValeur('Takhar');
        $Takhar->setPays($this->getReference('afghanistan'));
        $manager->persist($Takhar);

        $Djozdjan = new Region();
        $Djozdjan->setId('2103');
        $Djozdjan->setValeur('Djozdjan');
        $Djozdjan->setPays($this->getReference('afghanistan'));
        $manager->persist($Djozdjan);

        $Badakhchan = new Region();
        $Badakhchan->setId('2104');
        $Badakhchan->setValeur('Badakhchan');
        $Badakhchan->setPays($this->getReference('afghanistan'));
        $manager->persist($Badakhchan);

        $Balkh = new Region();
        $Balkh->setId('2105');
        $Balkh->setValeur('Balkh');
        $Balkh->setPays($this->getReference('afghanistan'));
        $manager->persist($Balkh);

        $Pandjchir = new Region();
        $Pandjchir->setId('2106');
        $Pandjchir->setValeur('Pandjchir');
        $Pandjchir->setPays($this->getReference('afghanistan'));
        $manager->persist($Pandjchir);

        $Fâryâb = new Region();
        $Fâryâb->setId('2107');
        $Fâryâb->setValeur('Fâryâb');
        $Fâryâb->setPays($this->getReference('afghanistan'));
        $manager->persist($Fâryâb);

        $Samangan = new Region();
        $Samangan->setId('2108');
        $Samangan->setValeur('Samangan');
        $Samangan->setPays($this->getReference('afghanistan'));
        $manager->persist($Samangan);

        $SarePol = new Region();
        $SarePol->setId('2109');
        $SarePol->setValeur('Sar-e Pol');
        $SarePol->setPays($this->getReference('afghanistan'));
        $manager->persist($SarePol);

        $Baghlan = new Region();
        $Baghlan->setId('2110');
        $Baghlan->setValeur('Baghlan');
        $Baghlan->setPays($this->getReference('afghanistan'));
        $manager->persist($Baghlan);

        $Nouristan = new Region();
        $Nouristan->setId('2111');
        $Nouristan->setValeur('Nouristan');
        $Nouristan->setPays($this->getReference('afghanistan'));
        $manager->persist($Nouristan);

        $Bâdghîs = new Region();
        $Bâdghîs->setId('2112');
        $Bâdghîs->setValeur('Bâdghîs');
        $Bâdghîs->setPays($this->getReference('afghanistan'));
        $manager->persist($Bâdghîs);

        $Parwan = new Region();
        $Parwan->setId('2113');
        $Parwan->setValeur('Parwan');
        $Parwan->setPays($this->getReference('afghanistan'));
        $manager->persist($Parwan);

        $Kapisa = new Region();
        $Kapisa->setId('2114');
        $Kapisa->setValeur('Kapisa');
        $Kapisa->setPays($this->getReference('afghanistan'));
        $manager->persist($Kapisa);

        $Kounar = new Region();
        $Kounar->setId('2115');
        $Kounar->setValeur('Kounar');
        $Kounar->setPays($this->getReference('afghanistan'));
        $manager->persist($Kounar);

        $Laghman = new Region();
        $Laghman->setId('2116');
        $Laghman->setValeur('Laghman');
        $Laghman->setPays($this->getReference('afghanistan'));
        $manager->persist($Laghman);

        $Kaboul = new Region();
        $Kaboul->setId('2117');
        $Kaboul->setValeur('Kaboul');
        $Kaboul->setPays($this->getReference('afghanistan'));
        $manager->persist($Kaboul);

        $Bamiyan = new Region();
        $Bamiyan->setId('2118');
        $Bamiyan->setValeur('Bamiyan');
        $Bamiyan->setPays($this->getReference('afghanistan'));
        $manager->persist($Bamiyan);

        $Wardak = new Region();
        $Wardak->setId('2119');
        $Wardak->setValeur('Wardak');
        $Wardak->setPays($this->getReference('afghanistan'));
        $manager->persist($Wardak);

        $Nangarhar = new Region();
        $Nangarhar->setId('2120');
        $Nangarhar->setValeur('Nangarhar');
        $Nangarhar->setPays($this->getReference('afghanistan'));
        $manager->persist($Nangarhar);

        $Logar = new Region();
        $Logar->setId('2121');
        $Logar->setValeur('Logar');
        $Logar->setPays($this->getReference('afghanistan'));
        $manager->persist($Logar);

        $Ghor = new Region();
        $Ghor->setId('2122');
        $Ghor->setValeur('Ghor');
        $Ghor->setPays($this->getReference('afghanistan'));
        $manager->persist($Ghor);

        $Hérât = new Region();
        $Hérât->setId('2123');
        $Hérât->setValeur('Hérât');
        $Hérât->setPays($this->getReference('afghanistan'));
        $manager->persist($Hérât);

        $Deykandi = new Region();
        $Deykandi->setId('2124');
        $Deykandi->setValeur('Deykandi');
        $Deykandi->setPays($this->getReference('afghanistan'));
        $manager->persist($Deykandi);

        $Paktiya = new Region();
        $Paktiya->setId('2125');
        $Paktiya->setValeur('Paktiya');
        $Paktiya->setPays($this->getReference('afghanistan'));
        $manager->persist($Paktiya);

        $Khost = new Region();
        $Khost->setId('2126');
        $Khost->setValeur('Khost');
        $Khost->setPays($this->getReference('afghanistan'));
        $manager->persist($Khost);

        $Ghazni = new Region();
        $Ghazni->setId('2127');
        $Ghazni->setValeur('Ghazni');
        $Ghazni->setPays($this->getReference('afghanistan'));
        $manager->persist($Ghazni);

        $Oruzgan = new Region();
        $Oruzgan->setId('2128');
        $Oruzgan->setValeur('Oruzgan');
        $Oruzgan->setPays($this->getReference('afghanistan'));
        $manager->persist($Oruzgan);

        $Paktika = new Region();
        $Paktika->setId('2129');
        $Paktika->setValeur('Paktika');
        $Paktika->setPays($this->getReference('afghanistan'));
        $manager->persist($Paktika);

        $Farâh = new Region();
        $Farâh->setId('2130');
        $Farâh->setValeur('Farâh');
        $Farâh->setPays($this->getReference('afghanistan'));
        $manager->persist($Farâh);

        $Zabol = new Region();
        $Zabol->setId('2131');
        $Zabol->setValeur('Zabol');
        $Zabol->setPays($this->getReference('afghanistan'));
        $manager->persist($Zabol);

        $Nimroz = new Region();
        $Nimroz->setId('2132');
        $Nimroz->setValeur('Nimroz');
        $Nimroz->setPays($this->getReference('afghanistan'));
        $manager->persist($Nimroz);

        $Kandahar = new Region();
        $Kandahar->setId('2133');
        $Kandahar->setValeur('Kandahar');
        $Kandahar->setPays($this->getReference('afghanistan'));
        $manager->persist($Kandahar);

        $Helmand = new Region();
        $Helmand->setId('2134');
        $Helmand->setValeur('Helmand');
        $Helmand->setPays($this->getReference('afghanistan'));
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