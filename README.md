Vue que vous utilisez apache, il faudra obligatoire mettre le projet dans htdocs ou wwww pour ceux qui sont Linux


il faudra ajouter ces lignes dans votre fichier de configuration de apache (http.conf pour windows et pour linux vous cherchez ce n'est pas compliqué)
# notez que "$SRVROOT/htdocs/xml" c'est le chemin pour arriver à la racine du projet, vous réadaptez cela donc  

<Directory "${SRVROOT}/htdocs/xml">

    AllowOverride All
    Require all granted
</Directory>



# Règle de travail (un algo très simple à appliquer
evenement déclencheur une tache à faire 
pull request
creer une nouvelle branche
switcher sur la nouvelle branche
faire ton code 
commit sur cette nouvelle branche
push sur cette branche
faire une merge request sur github


# Nguir yalla na ngueine mana respecter l'algo, surtout la première étape, deileine pull avant ngueindi créer sen branche et il faut s'assurer que la pull a marché, ta bou kenn push sur main ta bou kenn diema mergeil boppam nous allons designer quelqu'un pour se charger des merge

