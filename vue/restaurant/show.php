<?php

require 'vue/layout/head.php';
?>
<!-- faire detail film fais un effort dans la vue, utilise tailwind -->
<div class="container mx-auto mt-6 px-6 flex flex-col ">
    <span class="text-3xl pb-4  font-bold underline text-blue-700">Details du Restaurant</span>

    <div class="flex justify-between gap-32">
        <div class="mb-4 flex flex-col gap-1 border-x-2 rounded-xl px-4 border-x-2 rounded-xl px-4 grow ">
            <label for="titre" class="block text-blue-700 text-2xl font-bold mb-1">Coordonnées</label>
            <span class="capitalize font-semibold text-blue-600 italic text-xl "><span class=" text-gray-800 underline">Nom:</span> <?php echo  $restaurant->getCoordonnees()->getNom(); ?></span>
            <span class="capitalize font-semibold text-blue-600 italic text-xl "><span class=" text-gray-800 underline">Adresse: </span><?php echo  $restaurant->getCoordonnees()->getAdresse(); ?></span>
            <span class="capitalize font-semibold text-blue-600 italic text-xl "><span class=" text-gray-800 underline">Restaurateur:</span> <?php echo  $restaurant->getCoordonnees()->getRestaurateur(); ?></span>
        </div>

        <div class="mb-4 flex flex-col gap-1 border-x-2 rounded-xl px-4 shadow w-1/2 ">
            <label for="titre" class="block text-blue-700 text-2xl font-bold mb-1 ">Description</label>

            <?php foreach ($restaurant->getDescriptionRestaurant() as $paragraphe) : ?>
                <div class="flex flex-col gap-1">
                    <?php foreach ($paragraphe->getContent() as $element) : ?>
                        <?php if ($element[0] == "texte") : ?>
                            <span class="text-gray-800"><?php echo $element[1]; ?></span>
                        <?php elseif ($element[0] == "important") : ?>
                            <span class="text-red-800 font-bold">Important! <?php echo $element[1]; ?></span>
                        <?php elseif ($element[0] == "liste") : ?>
                            <ul class="list-disc list-inside">
                                <?php foreach ($element[1] as $liste) : ?>
                                    <li><?php echo $liste; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php elseif ($element[0] == "image") :
                            // Détermine la classe Tailwind en fonction de la position
                            $position = $element[1]->getPosition();
                            $tailwindClass = '';

                            if ($position == 'gauche') {
                                $tailwindClass = 'self-start';
                            } elseif ($position == 'droite') {
                                $tailwindClass = 'self-end';
                            } elseif ($position == 'centre') {
                                $tailwindClass = 'self-center';
                            }
                        ?>
                            <!-- Utilise la classe Tailwind déterminée pour ajuster la position de l'image -->
                            <img src="<?php echo $element[1]->getUrl(); ?>" alt="<?php echo $position; ?>" class="w-1/3 h-[10rem] border-b-3 border-blue-700 rounded-lg shadow <?php echo $tailwindClass; ?>">
                            <!-- la position est soit "gauche","droite","centre" ajuste le style tailwind en consequence pour placer l'image utilise self-start, self-center ou self-end suivant les valeurs-->


                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="mb-4 flex flex-col gap-1 w-full">
        <label for="titre" class="block text-blue-700 text-2xl font-bold mb-1">Cartes</label>
        <?php foreach ($restaurant->getCartes() as $carte) : ?>
            <div class="flex flex-col gap-1 border-x-2 rounded-xl px-4 shadow">
                <label for="titre" class="block text-gray-700 text-xl font-bold mb-1"><?php $carte->getType(); ?></label>
                <?php foreach ($carte->getDescriptionPlat()->getContent() as $element) : ?>
                    <?php if ($element[0] == "texte") : ?>
                        <span class="text-gray-800"><?php echo $element[1]; ?></span>
                    <?php elseif ($element[0] == "important") : ?>
                        <span class="text-red-800 font-bold">Important! <?php echo $element[1]; ?></span>
                    <?php elseif ($element[0] == "liste") : ?>
                        <ul class="list-disc list-inside">
                            <?php foreach ($element[1] as $liste) : ?>
                                <li><?php echo $liste; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php elseif ($element[0] == "image") :
                        // Détermine la classe Tailwind en fonction de la position
                        $position = $element[1]->getPosition();
                        $tailwindClass = '';

                        if ($position == 'gauche') {
                            $tailwindClass = 'self-start';
                        } elseif ($position == 'droite') {
                            $tailwindClass = 'self-end';
                        } elseif ($position == 'centre') {
                            $tailwindClass = 'self-center';
                        }
                    ?>
                        <!-- Utilise la classe Tailwind déterminée pour ajuster la position de l'image -->
                        <img src="<?php echo $element[1]->getUrl(); ?>" alt="<?php echo $position; ?>" class="w-1/3 h-[10rem] border-b-3 border-blue-700 rounded-lg shadow <?php echo $tailwindClass; ?>">
                        <!-- mets le prix sachant -->
                        <span class="text-gray-800 font-bold">Prix: <?php echo $carte->getPrix()->getMontant() . ' ' . $carte->getPrix()->getDevise(); ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>

            </div>
                       
        <div class="mb-4 flex flex-col gap-1 w-full">
            <label for="titre" class="block text-blue-700 text-2xl font-bold mb-1">Menus</label>
            <?php foreach ($restaurant->getMenus() as $menu) : ?>
                <div class="flex flex-col gap-1 border-x-2 rounded-xl px-4 shadow">
                    <label for="titre" class="block text-gray-700 text-xl font-bold mb-1"><?php echo $menu->getTitre(); ?></label>
                    <?php foreach ($menu->getDescriptionMenu() as $paragraphe) : ?>
                        <div class="flex flex-col gap-1">
                            <?php foreach ($paragraphe->getContent() as $element) : ?>
                                <?php if ($element[0] == "texte") : ?>
                                    <span class="text-gray-800"><?php echo $element[1]; ?></span>
                                <?php elseif ($element[0] == "important") : ?>
                                    <span class="text-red-800 font-bold">Important! <?php echo $element[1]; ?></span>
                                <?php elseif ($element[0] == "liste") : ?>
                                    <ul class="list-disc list-inside">
                                        <?php foreach ($element[1] as $liste) : ?>
                                            <li><?php echo $liste; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php elseif ($element[0] == "image") :
                                    // Détermine la classe Tailwind en fonction de la position
                                    $position = $element[1]->getPosition();
                                    $tailwindClass = '';

                                    if ($position == 'gauche') {
                                        $tailwindClass = 'self-start';
                                    } elseif ($position == 'droite') {
                                        $tailwindClass = 'self-end';
                                    } elseif ($position == 'centre') {
                                        $tailwindClass = 'self-center';
                                    }
                                ?>
                                    <!-- Utilise la classe Tailwind déterminée pour ajuster la position de l'image -->
                                    <img src="<?php echo $element[1]->getUrl(); ?>" alt="<?php echo $position; ?>" class="w-1/3 h-[10rem] border-b-3 border-blue-700 rounded-lg shadow <?php echo $tailwindClass; ?>">
                                    <!-- mets 
                                    le prix sachant -->
                                    <span class="text-gray-800 font-bold">Prix: <?php echo $menu->getPrix()->getMontant() . ' ' . $menu->getPrix()->getDevise(); ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>

        
        </div>



    <?php
    require 'vue/layout/footer.php';
