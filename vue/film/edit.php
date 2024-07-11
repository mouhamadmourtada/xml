<?php

require 'vue/layout/head.php';


?> 

<div class="container mx-auto mt-10">
    <form class="bg-white p-8 rounded shadow-md" action="http://localhost/xml/film/store" method="POST">
        <h1 class="text-2xl font-bold mb-6">Formulaire Cinéma</h1>

        <!-- Cinéma -->
        <div id="cinema">
            <!-- Contenu dynamique ajouté avec JavaScript -->
        </div>
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mb-6" onclick="addFilm()">Ajouter un film</button>

        <!-- Section de mise à jour -->
        <div class="mb-6" id="updateSection">
            <h2 class="text-xl font-bold mb-4">Mise à jour des Films</h2>

            <!-- Div pour mettre à jour un film spécifique -->
            <div id="updateFilmDiv">
                <label class="block text-gray-700">Index du Film à Mettre à Jour</label>
                <input type="number" id="updateFilmIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateFilm()">Mettre à Jour le Film</button>
            </div>

            <!-- Div pour mettre à jour un acteur spécifique -->
            <div id="updateActeurDiv" class="mt-6">
                <label class="block text-gray-700">Index du Film</label>
                <input type="number" id="updateFilmActeurIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <label class="block text-gray-700">Index de l'Acteur à Mettre à Jour</label>
                <input type="number" id="updateActeurIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateActeur()">Mettre à Jour l'Acteur</button>
            </div>

            <!-- Div pour mettre à jour un horaire spécifique -->
            <div id="updateHoraireDiv" class="mt-6">
                <label class="block text-gray-700">Index du Film</label>
                <input type="number" id="updateFilmHoraireIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <label class="block text-gray-700">Index de l'Horaire à Mettre à Jour</label>
                <input type="number" id="updateHoraireIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateHoraire()">Mettre à Jour l'Horaire</button>
            </div>
        </div>

        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Soumettre</button>
    </form>
</div>

<script>
    function updateFilm() {
    const index = parseInt(document.getElementById('updateFilmIndex').value, 10);
    const cinemaDiv = document.getElementById('cinema');
    const filmDivs = cinemaDiv.querySelectorAll('.film');

    if (index >= 0 && index < filmDivs.length) {
        const filmDiv = filmDivs[index];
      
        const updatedTitre = prompt("Entrez le nouveau titre du film:");
        const updatedGenre = prompt("Entrez le nouveau genre du film:");
        if (updatedTitre) {
            filmDiv.querySelector('input[name="titre[]"]').value = updatedTitre;
        }
        if (updatedGenre) {
            filmDiv.querySelector('input[name="genre[]"]').value = updatedGenre;
        }
    } else {
        console.log('Film non trouvé à cet index');
    }
}

function updateActeur() {
    const filmIndex = parseInt(document.getElementById('updateFilmActeurIndex').value, 10);
    const acteurIndex = parseInt(document.getElementById('updateActeurIndex').value, 10);
    const cinemaDiv = document.getElementById('cinema');
    const filmDivs = cinemaDiv.querySelectorAll('.film');

    if (filmIndex >= 0 && filmIndex < filmDivs.length) {
        const filmDiv = filmDivs[filmIndex];
        const acteursDiv = filmDiv.querySelector('#acteurs');
        const acteurInputs = acteursDiv.querySelectorAll('input[name="acteur[]"]');

        if (acteurIndex >= 0 && acteurIndex < acteurInputs.length) {
            const updatedActeur = prompt("Entrez le nouveau nom de l'acteur:");
            if (updatedActeur) {
                acteurInputs[acteurIndex].value = updatedActeur;
            }
        } else {
            console.log('Acteur non trouvé à cet index');
        }
    } else {
        console.log('Film non trouvé à cet index');
    }
}

function updateHoraire() {
    const filmIndex = parseInt(document.getElementById('updateFilmHoraireIndex').value, 10);
    const horaireIndex = parseInt(document.getElementById('updateHoraireIndex').value, 10);
    const cinemaDiv = document.getElementById('cinema');
    const filmDivs = cinemaDiv.querySelectorAll('.film');

    if (filmIndex >= 0 && filmIndex < filmDivs.length) {
        const filmDiv = filmDivs[filmIndex];
        const horairesDiv = filmDiv.querySelector('#horaires');
        const horaireDivs = horairesDiv.querySelectorAll('.horaire');

        if (horaireIndex >= 0 && horaireIndex < horaireDivs.length) {
            const horaireDiv = horaireDivs[horaireIndex];
            const updatedJour = prompt("Entrez le nouveau jour de l'horaire:");
            const updatedHeure = prompt("Entrez la nouvelle heure de l'horaire:");
            if (updatedJour) {
                horaireDiv.querySelector('select[name="jour[]"]').value = updatedJour;
            }
            if (updatedHeure) {
                horaireDiv.querySelector('input[name="heure[]"]').value = updatedHeure;
            }
        } else {
            console.log('Horaire non trouvé à cet index');
        }
    } else {
        console.log('Film non trouvé à cet index');
    }
}

</script>
<?php
    require 'vue/layout/footer.php';