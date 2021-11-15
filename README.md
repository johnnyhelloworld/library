Challenge 10 : "The Library Factory" lance son site e-commerce
À partir de la bibliothèque que tu as faite en cours, tu vas pouvoir commencer le développement de ton application "The Library Factory".

Il s'agit d'une petite application qui permet de s'identifier avec seulement un nom d'utilisateur, sans appel à une base de données.

Voici les tâches à réaliser pour mettre en place le système de login et de gestion de panier d'achat :

Partie 1 – Gestion du login
- Sur la page login.php, lorsqu'un utilisateur entre un nom, enregistre ce nom en session (ne demande pas de mot de passe pour cet exercice). Une fois identifié, redirige l'utilisateur sur la page index.php
- Gérer les droits d'accès aux URLs : Si l'utilisateur n'est pas identifié (si la variable de session contenant le nom d'utilisateur n'est pas définie) : Il n'a accès qu'aux pages login.php et index.php. Les autres pages redirigent vers login.php.
- Dans la barre de menu, on souhaite la bienvenue à "Donkey". Remplace Donkey par le nom de l'utilisateur (s'il est identifié !)
- Pour terminer la partie login, gère le logout : créé dans la barre de navigation un lien vers une page logout.php. Cette page permettra de détruire la session en cours, ainsi que toutes les informations, puis redirigera vers login.php

Partie 2 – Gestion du panier d'achat
- Sur la page index.php, la liste des livres mis en vente est affichée. Lorsqu'un utilisateur clique sur le bouton d'ajout au panier, enregistre cet article dans tes données de session. La gestion des quantités est optionnelle pour cet exercice.
- Affiche le nom des livres ajoutés au panier dans la page cart.php
- [BONUS] Gérer les quantités de livres dans ton panier. Cette tâche est assez complexe, tu peux tenter de la faire, mais ce n'est pas le but de la quête. Ne perds pas plus de temps que de raison là-dessus.

Critères de validation
- On peut s'identifier de manière simple avec seulement un nom d'utilisateur.
- Le nom d'utilisateur, donné lors de l'identification, est affiché dans le header sur toutes les pages à partir des informations de sessions.
- Le panier est stocké dans la session de l'utilisateur et est affiché sur la page "Panier".
- Seules les pages login.php et index.php sont accessibles tant que l'utilisateur n'est pas connecté.
- L'utilisateur peut également se délogger et la session est alors détruite.
