<?php

require 'vue/layout/head.php';
?>  

<!-- tu connais les champs de film met un formulaire pour la création et fait un effort sur la vue, on utilise tailwind -->
<button>
        <a href="http://localhost/xml/auth/logout">logout</a>
    </button>
<div class="container mx-auto mt-10">

    <form class="bg-white p-8 rounded shadow-md" action="http://localhost/xml/film/store" method="POST">
        <h1 class="text-2xl font-bold mb-6">Formulaire Cinéma</h1>

        <!-- Cinéma -->
        <div id="cinema">
            <div class="mb-6 film">
                <h2 class="text-xl font-semibold mb-4">Film</h2>
                <label class="block text-gray-700">Titre</label>
                <input type="text" name="titre" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Genre</label>
                <input type="text" name="genre" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Durée</label>
                <input type="text" name="duree" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Réalisateur</label>
                <input type="text" name="realisateur" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Acteurs</label>
                <div id="acteurs" class="mb-4">
                    <input type="text" name="acteur[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                </div>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-4" onclick="addActeur()">Ajouter un acteur</button>

                <label class="block text-gray-700">Année</label>
                <input type="text" name="annee" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Langue</label>
                <input type="text" name="langue" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Synopsis</label>
                <textarea name="synopsis" class="w-full p-2 border border-gray-300 rounded mb-4"></textarea>

                <label class="block text-gray-700">Note Presse</label>
                <input type="text" name="notePresse" class="w-full p-2 border border-gray-300 rounded mb-2">
                <input type="text" name="notePresseValeur" placeholder="Valeur" class="w-full p-2 border border-gray-300 rounded mb-2">
                <input type="text" name="notePresseBase" placeholder="Base" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Note Spectateur</label>
                <input type="text" name="noteSpectateur" class="w-full p-2 border border-gray-300 rounded mb-2">
                <input type="text" name="noteSpectateurValeur" placeholder="Valeur" class="w-full p-2 border border-gray-300 rounded mb-2">
                <input type="text" name="noteSpectateurBase" placeholder="Base" class="w-full p-2 border border-gray-300 rounded mb-4">

                <label class="block text-gray-700">Horaires</label>
                <div id="horaires" class="mb-4">
                    <div class="horaire">
                        <label class="block text-gray-700">Jour</label>
                        <select name="jour[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                            <option value="LUNDI">Lundi</option>
                            <option value="MARDI">Mardi</option>
                            <option value="MERCREDI">Mercredi</option>
                            <option value="JEUDI">Jeudi</option>
                            <option value="VENDREDI">Vendredi</option>
                            <option value="SAMEDI">Samedi</option>
                            <option value="DIMANCHE">Dimanche</option>
                        </select>
                        <label class="block text-gray-700">Heure</label>
                        <input type="text" name="heure[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                    </div>
                </div>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-4" onclick="addHoraire()">Ajouter un horaire</button>
            </div>
        </div>
        <!-- <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-6" onclick="addFilm()">Ajouter un film</button> -->

        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Soumettre</button>
    </form>
</div>
    <script>
        function addActeur() {
            const acteursDiv = document.getElementById('acteurs');
            const acteurInput = document.createElement('input');
            acteurInput.type = 'text';
            acteurInput.name = 'acteur[]';
            acteurInput.className = 'w-full p-2 border border-gray-300 rounded mb-2';
            acteursDiv.appendChild(acteurInput);
        }

        function addHoraire() {
            const horairesDiv = document.getElementById('horaires');
            const horaireDiv = document.createElement('div');
            horaireDiv.className = 'horaire mb-4';
            horaireDiv.innerHTML = `
                <label class="block text-gray-700">Jour</label>
                <select name="jour[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                    <option value="LUNDI">Lundi</option>
                    <option value="MARDI">Mardi</option>
                    <option value="MERCREDI">Mercredi</option>
                    <option value="JEUDI">Jeudi</option>
                    <option value="VENDREDI">Vendredi</option>
                    <option value="SAMEDI">Samedi</option>
                    <option value="DIMANCHE">Dimanche</option>
                </select>
                <label class="block text-gray-700">Heure</label>
                <input type="text" name="heure[]" class="w-full p-2 border border-gray-300 rounded mb-2">
            `;
            horairesDiv.appendChild(horaireDiv);
        }

        // function addFilm() {
        //     const cinemaDiv = document.getElementById('cinema');
        //     const filmDiv = document.createElement('div');
        //     filmDiv.className = 'mb-6 film';
        //     filmDiv.innerHTML = `
        //         <h2 class="text-xl font-semibold mb-4">Film</h2>
        //         <label class="block text-gray-700">Titre</label>
        //         <input type="text" name="titre[]" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Genre</label>
        //         <input type="text" name="genre[]" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Durée</label>
        //         <input type="text" name="duree[]" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Réalisateur</label>
        //         <input type="text" name="realisateur[]" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Acteurs</label>
        //         <div id="acteurs" class="mb-4">
        //             <input type="text" name="acteur[]" class="w-full p-2 border border-gray-300 rounded mb-2">
        //         </div>
        //         <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-4" onclick="addActeur()">Ajouter un acteur</button>
        //         <label class="block text-gray-700">Année</label>
        //         <input type="text" name="annee[]" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Langue</label>
        //         <input type="text" name="langue[]" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Synopsis</label>
        //         <textarea name="synopsis[]" class="w-full p-2 border border-gray-300 rounded mb-4"></textarea>
        //         <label class="block text-gray-700">Note Presse</label>
        //         <input type="text" name="notePresse[]" class="w-full p-2 border border-gray-300 rounded mb-2">
        //         <input type="text" name="notePresseValeur[]" placeholder="Valeur" class="w-full p-2 border border-gray-300 rounded mb-2">
        //         <input type="text" name="notePresseBase[]" placeholder="Base" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Note Spectateur</label>
        //         <input type="text" name="noteSpectateur[]" class="w-full p-2 border border-gray-300 rounded mb-2">
        //         <input type="text" name="noteSpectateurValeur[]" placeholder="Valeur" class="w-full p-2 border border-gray-300 rounded mb-2">
        //         <input type="text" name="noteSpectateurBase[]" placeholder="Base" class="w-full p-2 border border-gray-300 rounded mb-4">
        //         <label class="block text-gray-700">Horaires</label>
        //         <div id="horaires" class="mb-4">
        //             <div class="horaire">
        //                 <label class="block text-gray-700">Jour</label>
        //                 <select name="jour[]" class="w-full p-2 border border-gray-300 rounded mb-2">
        //                     <option value="LUNDI">Lundi</option>
        //                     <option value="MARDI">Mardi</option>
        //                     <option value="MERCREDI">Mercredi</option>
        //                     <option value="JEUDI">Jeudi</option>
        //                     <option value="VENDREDI">Vendredi</option>
        //                     <option value="SAMEDI">Samedi</option>
        //                     <option value="DIMANCHE">Dimanche</option>
        //                 </select>
        //                 <label class="block text-gray-700">Heure</label>
        //                 <input type="text" name="heure[]" class="w-full p-2 border border-gray-300 rounded mb-2">
        //             </div>
        //         </div>
        //         <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-4" onclick="addHoraire()">Ajouter un horaire</button>
        //     `;
        //     cinemaDiv.appendChild(filmDiv);
        // }
    </script>



<?php
    require 'vue/layout/footer.php';