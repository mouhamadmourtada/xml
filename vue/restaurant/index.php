<?php require 'vue/layout/head.php'; ?>

<div class="bg-slate-50 w-full h-screen">
    <!-- Header fixé en haut de la page -->
    <div class= "bg-white w-full p-4 shadow-md">
        <div class="flex justify-between">
            <button class="bg-black hover:bg-black text-white font-bold py-2 px-4 rounded">
                <a href="http://localhost/xml/auth/logout">Logout</a>
            </button>
            <!-- <div class="flex">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                    <a href="http://localhost/xml/film/create">Créer un film</a>
                </button>
            </div> -->
        </div>
    </div>

    <!-- Liste des films sous forme de cartes -->
    <div class="p-4 mt-10 w-full">
       <div class="flex items-center justify-between mb-10 ">
           <h2 class="text-2xl font-bold" >Nos Restaurants</h2>
           <div>
               <button class="px-4 py-2 bg-black text-white rounded-md"> <a href="http://localhost/xml/film"> Liste film</a> </button>
               <button class="px-4 py-2 bg-black text-white rounded-md"> <a href="http://localhost/xml/restaurant/create"> Ajouter un restaurant</a> </button>
           </div>

       </div>
       <div class="flex flex-wrap items-center justify-center bg-white rounded-xl mt-5 px-2 py-8 gap-6">
            <?php foreach($restaurants as $restaurant): ?>
                <!-- <div class="w-1/6 rounded overflow-hidden shadow-lg"> -->
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 rounded overflow-hidden shadow-lg mb-4">
 
                    <!-- Image du film (remplacer par une vraie image quand disponible) -->
                    <div class="w-full h-20 bg-gray-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-12 h-12 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19v-8a2 2 0 00-2-2H7a2 2 0 00-2 2v8m14-10h-4m0 0a1 1 0 10-2 0 1 1 0 002 0m0 0a1 1 0 10-2 0 1 1 0 002 0" />
                        </svg>
                    </div>
                    <div class="px-2 py-4">
                        <div class="font-bold text-xl mb-2"><?= $restaurant->getCoordonnees()->getNom()?></div>
                      

                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Adresse:</span>
                            <span class="text-sm font-medium"><?= $restaurant->getCoordonnees()->getAdresse() ?></span>

                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-gray-700">Restauranteur:</span>
                            <span class="text-sm font-medium"><?= $restaurant->getCoordonnees()->getRestaurateur() ?></span>
                        </div>
                    </div>
                    <div class="px-6 py-4 flex gap-2 w-full justify-end">
                        <div class="bg-slate-100 p-2 rounded">
                            <a class="h-full w-full" href=<?= "/xml/restaurant/".$restaurant->getId()."/show" ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.587 13.779c1.78 1.769 4.883 4.22 8.413 4.22c3.53 0 6.634-2.451 8.413-4.22c.47-.467.705-.7.854-1.159c.107-.327.107-.913 0-1.24c-.15-.458-.385-.692-.854-1.159C18.633 8.452 15.531 6 12 6c-3.53 0-6.634 2.452-8.413 4.221c-.47.467-.705.7-.854 1.159c-.107.327-.107.913 0 1.24c.15.458.384.692.854 1.159Z"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0-4 0Z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="bg-slate-100 p-2 rounded">
                            <a class="h-full w-full" href=<?= "/xml/restaurant/".$restaurant->getId()."/edit" ?> >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <mask id="letsIconsEdit0" width="17" height="17" x="3" y="4" fill="#000" maskUnits="userSpaceOnUse"><path fill="#fff" d="M3 4h17v17H3z"/><path d="m13.586 7.414l-7.194 7.194c-.195.195-.292.292-.36.41c-.066.119-.1.252-.166.52l-.664 2.654c-.09.36-.135.541-.035.641c.1.1.28.055.641-.035l2.655-.664c.267-.066.4-.1.518-.167c.119-.067.216-.164.41-.359l7.195-7.194c.667-.666 1-1 1-1.414c0-.414-.333-.748-1-1.414l-.172-.172c-.667-.666-1-1-1.414-1c-.414 0-.748.334-1.414 1"/></mask><path fill="currentColor" d="m6.392 14.608l1.414 1.415zm7.194-7.194L12.172 6zm2.828 0L15 8.828zm.172.172L18 6.172zm0 2.828L18 11.828zm-7.194 7.194l-1.414-1.414zm-3.526-2.07l1.94.485zm-.664 2.654l-1.94-.486zm.606.606l-.485-1.94l-.087.021l-.085.03zm2.655-.664l-.485-1.94zm-3.296.7l1.414-1.415zm.641-.036l.486 1.94l.087-.022l.084-.03zm3.173-.83l-.985-1.741zm7.605-7.554L18 11.828zM6.033 15.02l-1.74-.986zm1.773 1.004L15 8.828L12.172 6l-7.195 7.194zM15 8.828l.172.172L18 6.172L17.828 6zm.172.172l-7.195 7.194l2.829 2.829L18 11.828zM3.925 15.052l-.663 2.654l3.88.97l.664-2.653zm2.369 5.686l2.654-.663l-.97-3.88l-2.655.663zm-3.032-3.032c-.029.116-.111.424-.14.71c-.03.31-.057 1.144.63 1.831l2.829-2.828c.266.266.418.581.485.874c.06.255.044.45.038.512c-.007.067-.016.099-.007.058c.008-.038.02-.088.045-.186zm1.89-.797l1.313 3.778zm.171-.051a8.446 8.446 0 0 1-.186.045c-.041.01-.01 0 .058-.007c.062-.006.257-.021.512.038c.293.067.608.22.874.485l-2.828 2.828c.687.688 1.52.66 1.831.63c.286-.028.594-.11.71-.139zm2.654-.664l-.065.065a7.228 7.228 0 0 1-.088.087l-.003.002l.003-.002l.009-.008a.91.91 0 0 1 .093-.068a.688.688 0 0 1 .07-.043l1.97 3.48c.41-.231.72-.565.84-.684zm.97 3.88c.165-.04.61-.135 1.02-.366l-1.971-3.481a1.251 1.251 0 0 1 .18-.083l.01-.004a.682.682 0 0 1-.052.014l-.067.018l-.09.022zM15.173 9c.172.172.298.298.402.408c.105.11.152.167.172.193c.018.024-.023-.025-.069-.133A1.23 1.23 0 0 1 15.586 9h4c0-.82-.358-1.43-.66-1.826c-.267-.35-.633-.71-.926-1.002zM18 11.828L15.172 9zm0 0c.293-.293.659-.652.926-1.002c.302-.397.66-1.006.66-1.826h-4c0-.181.04-.343.091-.468c.046-.108.087-.157.069-.133a2.62 2.62 0 0 1-.172.193c-.104.11-.23.236-.402.408zm-3-3c.172-.171.298-.298.408-.402c.11-.105.167-.152.193-.172c.024-.018-.025.023-.133.069a1.231 1.231 0 0 1-.468.091v-4c-.82 0-1.43.358-1.826.66c-.35.267-.71.633-1.002.926zM17.828 6c-.293-.293-.652-.659-1.002-.926c-.397-.302-1.006-.66-1.826-.66v4c-.181 0-.343-.04-.468-.091c-.108-.046-.157-.087-.133-.069c.026.02.083.067.193.172c.11.104.236.23.408.402zm-12.85 7.194c-.12.12-.454.43-.686.84l3.481 1.97a1.247 1.247 0 0 1-.111.163l-.008.01l-.002.002l.002-.003l.008-.008a2.184 2.184 0 0 1 .079-.08l.065-.066zm2.828 2.829a48.898 48.898 0 0 1 .05-.2l.004-.01a.26.26 0 0 1-.004.012a.887.887 0 0 1-.045.106a1.213 1.213 0 0 1-.038.073l-3.48-1.97c-.232.408-.327.854-.368 1.018z" mask="url(#letsIconsEdit0)"/><path fill="currentColor" d="M12.5 7.5l3-2l3 3l-2 3z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="bg-slate-100 p-2 rounded">
                            <a class="h-full w-full" <?= "/xml/restaurant/".$restaurant->getId()."/delete" ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7.5 1h9v3H22v2h-2.029l-.5 17H4.529l-.5-17H2V4h5.5V1Zm2 3h5V3h-5v1ZM6.03 6l.441 15h11.058l.441-15H6.03ZM13 8v11h-2V8h2Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require 'vue/layout/footer.php'; ?>
 