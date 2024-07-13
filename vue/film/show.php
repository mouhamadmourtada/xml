<?php

require 'vue/layout/head.php';
?>  


<!-- faire detail film fais un effort dans la vue, utilise tailwind -->

<div class="container mx-auto mt-6">
    <span class="text-2xl px-5 py-2 font-bold underline">Details du film</span>
    <div class="flex justify-around flex-wrap">
        <div class="mb-4 w-96">
            <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getTitre(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="annee" class="block text-gray-700 text-sm font-bold mb-2">Annee</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getAnnee(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="duree" class="block text-gray-700 text-sm font-bold mb-2">Duree</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getDuree(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="realisateur" class="block text-gray-700 text-sm font-bold mb-2">Realisateur</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getRealisateur(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getGenre(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="acteurs" class="block text-gray-700 text-sm font-bold mb-2">Acteurs</label>
            <!-- Acteurs est un tableau itere dessu pour sortir les acteurs correspondants -->
            <span class="capitalize font-semibold text-blue-600 italic">
            <?php foreach($film->getActeurs() as $acteur): ?>
                <?=$acteur.","; ?>
            <?php endforeach; ?>
            </span>

        </div>
        <div class="mb-4 w-96">
            <label for="langue" class="block text-gray-700 text-sm font-bold mb-2">Langue</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getLangue(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="synopsis" class="block text-gray-700 text-sm font-bold mb-2">Synopsis</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?php echo  $film->getSynopsis(); ?></span>

        </div>

        <div class="mb-4 w-96">
            <label for="notePresse" class="block text-gray-700 text-sm font-bold mb-2">Note Presse</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?=$film->getNotePresse()->getValeur()." / ". $film->getNotePresse()->getBase(); ?></span>

        </div>
        <div class="mb-4 w-96">
            <label for="noteSpectateur" class="block text-gray-700 text-sm font-bold mb-2">Note Spectateur</label>
            <span class="capitalize font-semibold text-blue-600 italic"><?=$film->getNoteSpectateur()->getValeur()." / ". $film->getNoteSpectateur()->getBase(); ?></span>

        </div>

        <div class="mb-4 w-96">
            <label for="horaires" class="block text-gray-700 text-sm font-bold mb-2">Horaires</label>
            <!-- GetHoraire est un tableau contenant les Jours qui sont aussi un tableau itere dessu pour sortir les jours et les heures correspondantes -->
            <?php foreach($film->getHoraires() as $horaire): ?>
                <span class="capitalize font-semibold text-blue-600 italic"> 
                    <?php foreach($horaire->getJours() as $jour): ?>
                        <?=$jour."-"; ?>
                    <?php endforeach; ?>
                    <?php foreach($horaire->getHeures() as $heure): ?>
                        <?=":".$heure.","; ?>
                    <?php endforeach; ?>
                </span>
            <?php endforeach; ?>
               
            
           

        </div>
    </div>
</div>


<?php
    require 'vue/layout/footer.php';