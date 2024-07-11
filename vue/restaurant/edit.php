<?php

require 'vue/layout/head.php';
    // var_dump($_SESSION['user_id']);
?>    
edit restaurant

    <button>
        <a href="http://localhost/xml/auth/logout">logout</a>
    </button>
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis adipisci est cum a magnam, quo eveniet, vel voluptatem doloremque placeat ullam reprehenderit ab dolorem animi sint? Est ducimus sapiente modi.
    <div class="container mx-auto mt-10">
    <form class="bg-white p-8 rounded shadow-md" action="http://localhost/xml/restaurant/store" method="POST">
        <h1 class="text-2xl font-bold mb-6">Fiche Restaurant</h1>

        <!-- Description du Restaurant -->
        <div class="mb-6" id="descriptionRestaurant">
            
        </div>
       

        
        <div class="mb-6" id="updateSection">
            <h2 class="text-xl font-bold mb-4">Mise à jour des Paragraphes</h2>
            
            <div id="updateParagrapheDiv">
                <label class="block text-gray-700">Index du Paragraphe à Mettre à Jour</label>
                <input type="number" id="updateParagrapheIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateParagraphe()">Mettre à Jour le Paragraphe</button>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-6">Mise à jour des Images</h2>
          
            <div id="updateImageDiv">
                <label class="block text-gray-700">Index de l'Image à Mettre à Jour</label>
                <input type="number" id="updateImageIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateImage()">Mettre à Jour l'Image</button>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-6">Mise à jour des Items</h2>
           
            <div id="updateItemDiv">
                <label class="block text-gray-700">Index de l'Item à Mettre à Jour</label>
                <input type="number" id="updateItemIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateItem()">Mettre à Jour l'Item</button>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-6">Mise à jour des Éléments</h2>
            
            <div id="updateElementDiv">
                <label class="block text-gray-700">Index de l'Élément à Mettre à Jour</label>
                <input type="number" id="updateElementIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateElement()">Mettre à Jour l'Élément</button>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-6">Mise à jour des Menus</h2>
            
            <div id="updateMenuDiv">
                <label class="block text-gray-700">Index du Menu à Mettre à Jour</label>
                <input type="number" id="updateMenuIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updateMenu()">Mettre à Jour le Menu</button>
            </div>

            <h2 class="text-xl font-bold mb-4 mt-6">Mise à jour des Plats</h2>
            
            <div id="updatePlatDiv">
                <label class="block text-gray-700">Index du Plat à Mettre à Jour</label>
                <input type="number" id="updatePlatIndex" class="w-full p-2 border border-gray-300 rounded mb-2">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="updatePlat()">Mettre à Jour le Plat</button>
            </div>
        </div>

        <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded">Soumettre</button>
    </form>
</div>


    <script>
        function updateParagraphe() {
            const index = parseInt(document.getElementById('updateParagrapheIndex').value, 10);
            const descriptionRestaurant = document.getElementById('descriptionRestaurant');
            const paragrapheDiv = descriptionRestaurant.children[index];

    
            if (paragrapheDiv) {
        
        const updatedParagraphe = paragrapheDiv.querySelector('textarea[name="paragraphe[]"]').value;
        const updatedImportant = paragrapheDiv.querySelector('input[name="important[]"]').value;
        const updatedItem = paragrapheDiv.querySelector('input[name="item[]"]').value;
        const updatedImageURL = paragrapheDiv.querySelector('input[name="image_url[]"]').value;
        const updatedImagePosition = paragrapheDiv.querySelector('select[name="image_position[]"]').value;
       
        paragrapheDiv.querySelector('textarea[name="paragraphe[]"]').value = updatedParagraphe;
        paragrapheDiv.querySelector('input[name="important[]"]').value = updatedImportant;
        paragrapheDiv.querySelector('input[name="item[]"]').value=updatedItem;
        paragrapheDiv.querySelector('input[name="image_url[]"]').value=updatedImageUR;
        paragrapheDiv.querySelector('select[name="image_position[]"]').value = updatedImagePosition ;
        
        console.log(`Paragraphe ${index + 1} mis à jour`);
    } else {
        console.log('Paragraphe non trouvé à cet index');
    }
}



function updateItem() {
    const index = parseInt(document.getElementById('updateItemIndex').value, 10);
    const descriptionRestaurant = document.getElementById('descriptionRestaurant');
    const itemInput = descriptionRestaurant.querySelectorAll('input[name="item[]"]')[index];

    if (itemInput) {

        const updatedItem = itemInput.value;

        itemInput.value = updatedItem;

        console.log(`Item ${index + 1} mis à jour`);
    } else {
        console.log('Item non trouvé à cet index');
    }
}


function updateMenu() {
    const index = parseInt(document.getElementById('updateMenuIndex').value, 10);
    const descriptionRestaurant = document.getElementById('descriptionRestaurant');
    const menuDiv = descriptionRestaurant.querySelectorAll('.menu')[index];

    if (menuDiv) {
        
        const updatedMenuName = menuDiv.querySelector('input[name="menu_nom[]"]').value;
        const updatedMenuDescription = menuDiv.querySelector('textarea[name="menu_description[]"]').value;

        
        menuDiv.querySelector('input[name="menu_nom[]"]').value = updatedMenuName;
        menuDiv.querySelector('textarea[name="menu_description[]"]').value = updatedMenuDescription;

        console.log(`Menu ${index + 1} mis à jour`);
    } else {
        console.log('Menu non trouvé à cet index');
    }
}

function updatePlat() {
    const index = parseInt(document.getElementById('updatePlatIndex').value, 10);
    const descriptionRestaurant = document.getElementById('descriptionRestaurant');
    const platDiv = descriptionRestaurant.querySelectorAll('.plat')[index];

    if (platDiv) {
        
        const updatedPlatName = platDiv.querySelector('input[name="plat_nom[]"]').value;
        const updatedPlatDescription = platDiv.querySelector('textarea[name="plat_description[]"]').value;

        
        platDiv.querySelector('input[name="plat_nom[]"]').value = updatedPlatName;
        platDiv.querySelector('textarea[name="plat_description[]"]').value = updatedPlatDescription;

        console.log(`Plat ${index + 1} mis à jour`);
    } else {
        console.log('Plat non trouvé à cet index');
    }
}



function updateElement() {
    const index = parseInt(document.getElementById('updateElementIndex').value, 10);
    const descriptionRestaurant = document.getElementById('descriptionRestaurant');
    const elementSelect = descriptionRestaurant.querySelectorAll('select[name="elements[]"]')[index];

    if (elementSelect) {
        
        const updatedElement = elementSelect.value;

        
        elementSelect.value = updatedElement;

        console.log(`Élément ${index + 1} mis à jour`);
    } else {
        console.log('Élément non trouvé à cet index');
    }
}




    </script>

<?php
    require 'vue/layout/footer.php';