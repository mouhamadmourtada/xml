<?php

require 'vue/layout/head.php';
?>  

show

<!-- faire detail film fais un effort dans la vue, utilise tailwind -->

<div class="container mx-auto mt-10">
    <div class="flex justify-around flex-wrap">
        <div class="mb-4 w-96">
            <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
            <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getTitre() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="annee" class="block text-gray-700 text-sm font-bold mb-2">Annee</label>
            <input type="text" name="annee" id="annee" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getAnnee() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="duree" class="block text-gray-700 text-sm font-bold mb-2">Duree</label>
            <input type="text" name="duree" id="duree" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getDuree() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="realisateur" class="block text-gray-700 text-sm font-bold mb-2">Realisateur</label>
            <input type="text" name="realisateur" id="realisateur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getRealisateur() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre</label>
            <input type="text" name="genre" id="genre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getGenre() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="acteurs" class="block text-gray-700 text-sm font-bold mb-2">Acteurs</label>
            <input type="text" name="acteurs" id="acteurs" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getActeurs() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="langue" class="block text-gray-700 text-sm font-bold mb-2">Langue</label>
            <input type="text" name="langue" id="langue" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getLangue() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="synopsis" class="block text-gray-700 text-sm font-bold mb-2">Synopsis</label>
            <input type="text" name="synopsis" id="synopsis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getSynopsis() ?>" readonly>
        </div>

        <div class="mb-4 w-96">
            <label for="notePresse" class="block text-gray-700 text-sm font-bold mb-2">Note Presse</label>
            <input type="text" name="notePresse" id="notePresse" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getNotePresse()->getValeur() ?>" readonly>
        </div>
        <div class="mb-4 w-96">
            <label for="noteSpectateur" class="block text-gray-700 text-sm font-bold mb-2">Note Spectateur</label>
            <input type="text" name="noteSpectateur" id="noteSpectateur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getNoteSpectateur()->getValeur() ?>" readonly>
        </div>

        <div class="mb-4 w-96">
            <label for="horaires" class="block text-gray-700 text-sm font-bold mb-2">Horaires</label>
            <input type="text" name="horaires" id="horaires" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $film->getHoraires() ?>" readonly>
        </div>
    </div>
</div>


<?php
    require 'vue/layout/footer.php';