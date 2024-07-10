<?php

require 'vue/layout/head.php';
?>  

<!-- tu connais les champs de film met un formulaire pour la création et fait un effort sur la vue, on utilise tailwind -->

<div class="container mx-auto mt-10">
    <form action="http://localhost/xml/film" method="post">
        <div class="flex justify-around flex-wrap">

            <div class="mb-4 w-96">
                <label for="titre" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                <input type="text" name="titre" id="titre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="annee" class="block text-gray-700 text-sm font-bold mb-2">Annee</label>
                <input type="text" name="annee" id="annee" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="duree" class="block text-gray-700 text-sm font-bold mb-2">Duree</label>
                <input type="text" name="duree" id="duree" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="realisateur" class="block text-gray-700 text-sm font-bold mb-2">Realisateur</label>
                <input type="text" name="realisateur" id="realisateur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre</label>
                <input type="text" name="genre" id="genre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="acteurs" class="block text-gray-700 text-sm font-bold mb-2">Acteurs</label>
                <input type="text" name="acteurs" id="acteurs" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="langue" class="block text-gray-700 text-sm font-bold mb-2">Langue</label>
                <input type="text" name="langue" id="langue" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="synopsis" class="block text-gray-700 text-sm font-bold mb-2">Synopsis</label>
                <input type="text" name="synopsis" id="synopsis" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    
            </div>
            <div class="mb-4 w-96">
                <label for="notePresse" class="block text-gray-700 text-sm font-bold mb-2">Note Presse</label>
                <input type="text" name="notePresse" id="notePresse" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4 w-96">
                <label for="noteSpectateur" class="block text-gray-700 text-sm font-bold mb-2">Note Spectateur</label>
                <input type="text" name="noteSpectateur" id="noteSpectateur" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
    
            <div class="mb-4 w-96">
                <label for="horaires" class="block text-gray-700 text-sm font-bold mb-2">Horaires</label>
                <input type="text" name="horaires" id="horaires" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>


        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Ajouter</button>
    </form>
</div>



<?php
    require 'vue/layout/footer.php';