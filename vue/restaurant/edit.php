<?php

require 'vue/layout/head.php';
    // var_dump($_SESSION['user_id']);
?>    

    <button>
        <a href="http://localhost/xml/auth/logout">logout</a>
    </button>


<div class="container mx-auto mt-10">

<form class="bg-white p-8 rounded shadow-md" action="http://localhost/xml/restaurant/store" method="POST">
    <h1 class="text-2xl font-bold mb-6">Fiche Restaurant</h1>

    <!-- Coordonnées -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-4">Coordonnées</h2>
        <div class="mb-4">
            <label class="block text-gray-700">Nom</label>
            <input type="text" name="nom" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Adresse</label>
            <input type="text" name="adresse" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Restaurateur</label>
            <input type="text" name="restaurateur" class="w-full p-2 border border-gray-300 rounded">
        </div>
    </div>

    <!-- Description du Restaurant -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-4">Description du Restaurant</h2>
        <div id="descriptionRestaurant">
            <div class="mb-4">
                <label class="block text-gray-700">Paragraphe</label>
                <textarea name="paragraphe[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Important</label>
                <input type="text" name="important[]" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Liste</label>
                <div id="liste">
                    <input type="text" name="item[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                </div>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editItem()">Modifier un item</button>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Image</label>
                <input type="text" name="image_url[]" placeholder="URL de l'image" class="w-full p-2 border border-gray-300 rounded mb-2">
                <select name="image_position[]" class="w-full p-2 border border-gray-300 rounded">
                    <option value="gauche">Gauche</option>
                    <option value="droite">Droite</option>
                    <option value="centre">Centre</option>
                </select>
            </div>
        </div>
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editParagraphe()">Modifier un paragraphe</button>
    </div>

    <!-- Carte -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-4">Carte</h2>
        <div id="carte">
            <div class="mb-4 plat">
                <h3 class="font-medium">Plat</h3>
                <label class="block text-gray-700">Type</label>
                <select name="type[]" class="w-full p-2 border border-gray-300 rounded">
                    <option value="dessert">Dessert</option>
                    <option value="entree">Entrée</option>
                    <option value="plat">Plat</option>
                    <option value="fromage">Fromage</option>
                </select>
                <label class="block text-gray-700">Prix</label>
                <input type="text" name="prix[]" class="w-full p-2 border border-gray-300 rounded">
                <label class="block text-gray-700">Description du Plat</label>
                <textarea name="descriptionPlat[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
                <div class="mb-4" id="descriptionPlat">
                    <div class="mb-4">
                        <label class="block text-gray-700">Paragraphe</label>
                        <textarea name="paragraphePlat[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Important</label>
                        <input type="text" name="importantPlat[]" class="w-full p-2 border border-gray-300 rounded">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Liste</label>
                        <div id="listePlat">
                            <input type="text" name="itemPlat[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                        </div>
                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editItemPlat()">Modifier un item</button>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Image</label>
                        <input type="text" name="image_urlPlat[]" placeholder="URL de l'image" class="w-full p-2 border border-gray-300 rounded mb-2">
                        <select name="image_positionPlat[]" class="w-full p-2 border border-gray-300 rounded">
                            <option value="gauche">Gauche</option>
                            <option value="droite">Droite</option>
                            <option value="centre">Centre</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editPlat()">Modifier un plat</button>
    </div>

    <!-- Menus -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-4">Menus</h2>
        <div id="menus">
            <div class="mb-4">
                <label class="block text-gray-700">Titre</label>
                <input type="text" name="titre[]" class="w-full p-2 border border-gray-300 rounded">
                <label class="block text-gray-700">Description</label>
                <textarea name="descriptionMenu[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
                <label class="block text-gray-700">Prix</label>
                <input type="text" name="prixMenu[]" class="w-full p-2 border border-gray-300 rounded">
                <label class="block text-gray-700">Éléments</label>
                <div id="elements">
                    <select name="elements[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                        <!-- Options des plats seront ajoutées ici -->
                    </select>
                </div>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editElement()">Modifier un élément</button>
            </div>
        </div>
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editMenu()">Modifier un menu</button>
    </div>

    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Soumettre</button>
</form>
</div>
     <script>
      
        function editParagraphe() {
    const descriptionRestaurant = document.getElementById('descriptionRestaurant');
    descriptionRestaurant.innerHTML = ''
    // Sélectionnez l'élément div existant que vous souhaitez modifier
    const paragrapheDiv = descriptionRestaurant.querySelector('.mb-4');

    // Vérifiez si paragrapheDiv existe déjà
    if (paragrapheDiv) {
        // Modifier le contenu de paragrapheDiv
        paragrapheDiv.innerHTML = `
            <label class="block text-gray-700">Paragraphe</label>
            <textarea name="paragraphe[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
            <label class="block text-gray-700">Important</label>
            <input type="text" name="important[]" class="w-full p-2 border border-gray-300 rounded">
            <label class="block text-gray-700">Liste</label>
            <div id="liste">
                <input type="text" name="item[]" class="w-full p-2 border border-gray-300 rounded mb-2">
            </div>
            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editItem()">Modifier un item</button>
            <label class="block text-gray-700">Image</label>
            <input type="text" name="image_url[]" placeholder="URL de l'image" class="w-full p-2 border border-gray-300 rounded mb-2">
            <select name="image_position[]" class="w-full p-2 border border-gray-300 rounded">
                <option value="gauche">Gauche</option>
                <option value="droite">Droite</option>
                <option value="centre">Centre</option>
            </select>
        `;}}
        descriptionRestaurant.appendChild(paragrapheDiv)

       

        function editItem() {
    const liste = document.getElementById('liste');
    
    const itemToModify = liste.querySelector('input'); 

    if (itemToModify) {
        
        itemToModify.type = 'text';
        itemToModify.name = 'item[]';
        itemToModify.className = 'w-full p-2 border border-gray-300 rounded mb-2';
    } else {
        console.log("Aucun élément trouvé à modifier.");
    }
}


function editPlat() {
            const carte = document.getElementById('carte');
            carte.innerHTML = ''; 
            const platDiv = document.createElement('div');
            platDiv.className = 'mb-4 plat';
            platDiv.innerHTML = `
                <h3 class="font-medium">Plat</h3>
                <label class="block text-gray-700">Type</label>
                <select name="type[]" class="w-full p-2 border border-gray-300 rounded">
                    <option value="dessert">Dessert</option>
                    <option value="entree">Entrée</option>
                    <option value="plat">Plat</option>
                    <option value="fromage">Fromage</option>
                </select>
                <label class="block text-gray-700">Prix</label>
                <input type="text" name="prix[]" class="w-full p-2 border border-gray-300 rounded">
                <label class="block text-gray-700">Description du Plat</label>
                <textarea name="descriptionPlat[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
                   <div class="mb-4" id="descriptionPlat">
                        <div class="mb-4">
                            <label class="block text-gray-700">Paragraphe</label>
                            <textarea name="paragraphePlat[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Important</label>
                            <input type="text" name="importantPlat[]" class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Liste</label>
                            <div id="listePlat">
                                <input type="text" name="itemPlat[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                            </div>
                            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editItemPlat()">Modifier un item</button>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Image</label>
                            <input type="text" name="image_urlPlat[]" placeholder="URL de l'image" class="w-full p-2 border border-gray-300 rounded mb-2">
                            <select name="image_positionPlat[]" class="w-full p-2 border border-gray-300 rounded">
                                <option value="gauche">Gauche</option>
                                <option value="droite">Droite</option>
                                <option value="centre">Centre</option>
                            </select>
                        </div>
                    </div>
            `;
            carte.appendChild(platDiv)

           
        }

        function editElement() {
    const elements = document.getElementById('elements');
    elements.innerHTML = ''; 

    const elementSelect = document.createElement('select');
    elementSelect.name = 'elements[]';
    elementSelect.className = 'w-full p-2 border border-gray-300 rounded mb-2';

    const plats = document.querySelectorAll('.plat');
    plats.forEach((plat, index) => {
        const option = document.createElement('option');
        option.value = index + 1;
        option.textContent = `Plat ${index + 1}`;
        elementSelect.appendChild(option);
    });

    elements.appendChild(elementSelect); 
}

        function editMenu() {
    const menus = document.getElementById('menus');
    menus.innerHTML = ''; 

    const menuDiv = document.createElement('div');
    menuDiv.className = 'mb-4';

    menuDiv.innerHTML = `
        <label class="block text-gray-700">Titre</label>
        <input type="text" name="titre[]" class="w-full p-2 border border-gray-300 rounded">
        <label class="block text-gray-700">Description</label>
        <textarea name="descriptionMenu[]" class="w-full p-2 border border-gray-300 rounded"></textarea>
        <label class="block text-gray-700">Prix</label>
        <input type="text" name="prixMenu[]" class="w-full p-2 border border-gray-300 rounded">
        <label class="block text-gray-700">Éléments</label>
        <div id="elements">
            <select name="elements[]" class="w-full p-2 border border-gray-300 rounded mb-2">
                <!-- Options des plats seront ajoutées ici -->
            </select>
        </div>
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="editElement()">Modifier un élément</button>
    `;

    menus.appendChild(menuDiv); // Ajoute le div mis à jour au conteneur 'menus'
}




    
</script>
<?php
    require 'vue/layout/footer.php';