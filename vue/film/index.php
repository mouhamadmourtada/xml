<?php

require 'vue/layout/head.php';
    // var_dump($_SESSION['user_id']);
?>    
index

    <button>
        <a href="http://localhost/xml/auth/logout">logout</a>
    </button>
    <button>
        <a href="http://localhost/xml/film/create">create</a>
    </button>
<!-- 
    <table>
        <tr>
            <th>Titre</th>
            <th>Annee</th>
            <th>Duree</th>
            <th>Realisateur</th>
            <th>Genre</th>
            <th>Actions</th>
        </tr>
        <?php foreach($films as $film): ?>
            <tr>
                <td><?= $film->getTitre() ?></td>
                <td><?= $film->getAnnee() ?></td>
                <td><?= $film->getDuree() ?></td>
                <td><?= $film->getRealisateur() ?></td>
                <td><?= $film->getGenre() ?></td>
                <td>
                    <button>
                        <a href="http://localhost/xml/film/<?= $film->getId() ?>">show</a>
                    </button>
                    <button>
                        <a href="http://localhost/xml/film/<?= $film->getId() ?>/edit">edit</a>
                    </button>
                    <button>
                        <a href="http://localhost/xml/film/<?= $film->getId() ?>/delete">delete</a>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table> -->

    <!-- fais un effort dans le formatage quand même on utilise tailwind -->
    <div class="flex flex-wrap -mx-1 lg:-mx-4 mt-10">
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2">
            <article class="overflow-hidden rounded-lg shadow-lg">
                <a href="#">
                    <img alt="Placeholder" class="block h-auto w-full" src="https://picsum.photos/600/400/?random">
                </a>

                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black" href="#">
                            <?= $film->getTitre() ?>
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        <?= $film->getAnnee() ?>
                    </p>
                </header>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <a class="flex items center no-underline hover:underline text-black" href="#">
                        <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                        <p class="ml-2 text-sm">
                            <?= $film->getRealisateur() ?>
                        </p>
                    </a>
                    <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                        <span class="hidden">Like</span>
                        <i class="fa fa-heart"></i>
                    </a>
                </footer>
            </article>
        </div>
    </div>



<?php
    require 'vue/layout/footer.php';