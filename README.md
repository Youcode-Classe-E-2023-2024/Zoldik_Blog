# Blog d'Entreprise Avito

!(![Uploading image.png…]())

Bienvenue dans le blog d'entreprise d'Avito, votre source d'informations sur les technologies émergentes, les meilleures pratiques de développement et bien plus encore.

## Table des Matières

- [Description](#description)
- [Fonctionnalités](#fonctionnalités)
- [Base_de_données](#base_de_données)
- [Auteurs](#auteurs)

## Description

L'entreprise Avito a lancé ce blog d'entreprise dans le but de partager des informations pertinentes sur les technologies émergentes, les meilleures pratiques de développement, les tendances du marché et les réussites de l'entreprise.

## Fonctionnalités

1. **UML**: Utilisation de diagrammes UML pour modéliser l'architecture et les relations.

2. ### Diagramme de cas d'utilisation

3.  ![Diagramme de Cas d'Utilisation](![image](https://github.com/Youcode-Classe-E-2023-2024/Zoldik_Blog/assets/132862036/e69059c6-4172-47bd-b4cf-1c4841e07e5d))
4. 
5. Le diagramme de cas d'utilisation est particulièrement utile pour décrire les interactions entre les acteurs externes et le système. Il identifie les fonctionnalités du système sous la forme de cas d'utilisation et montre comment différents acteurs interagissent avec ces cas d'utilisation.

   ### Diagramme de cas d'utilisation

3.  ![Diagramme de Classe](![image](https://github.com/Youcode-Classe-E-2023-2024/Zoldik_Blog/assets/132862036/f1f3d32e-5827-4c3c-a7aa-07762e73f7a7))
4. 
5. Le diagramme de classe représente la structure statique du système, montrant les classes, les attributs, les méthodes et les relations entre les classes.

6. **Usage du Soft Delete**: Mise en œuvre de la suppression douce pour la gestion des données.

7. **Barre de Recherche Fonctionnelle**: Barre de recherche permettant de trouver rapidement des articles.

8. **Ajout Multiple**: Possibilité d'ajouter plusieurs articles en une seule opération.

9. **Gestion de Permissions**: Contrôle d'accès basé sur les rôles pour une gestion sécurisée des utilisateurs.

10. **Communication AJAX**: Utilisation de l'AJAX pour des mises à jour dynamiques et une expérience utilisateur améliorée.

11. **Usage des Data Table JS Lib**: Intégration de la bibliothèque DataTable pour une gestion avancée des tableaux.

12. **Utilisation des Concepts SQL 'Group By', 'Order', 'Joins', 'Cascade'**: Optimisation des requêtes SQL pour des performances maximales.

13. **Utilisation de l'Encryption pour les Données Sensibles**: Sécurisation des données sensibles via le chiffrement.

14. **HTML/CSS Framework**: Utilisation de tailwind pour un design réactif.

15. **Hosting**: Choix d'un service d'hébergement robuste pour garantir une disponibilité maximale.

### Bonus

- **Mailing (Forgot Password)**: Fonctionnalité d'envoi de courriels pour la réinitialisation de mot de passe.

- **Drag and Drop**: Prise en charge du glisser-déposer pour une meilleure expérience utilisateur.


## Base de données

La base de données est nommée "blog" et elle est constituée de plusieurs tables qui stockent différentes informations liées à un blog d'entreprise. Voici un aperçu des principales tables et de leur contenu :

1. **Table `articles` :**
   - Stocke des articles de blog.
   - Chaque article a un titre, un contenu, une description, un chemin vers une image, une catégorie à laquelle il appartient, un auteur et une indication s'il est supprimé ou non.

2. **Table `categories` :**
   - Contient les catégories auxquelles un article peut appartenir.
   - Chaque catégorie a un identifiant unique et un nom.

3. **Table `comments` :**
   - Stocke les commentaires associés aux articles du blog.
   - Chaque commentaire a un contenu, un auteur, un article auquel il est associé et un horodatage.

4. **Table `users` :**
   - Contient les informations sur les utilisateurs du blog.
   - Chaque utilisateur a un prénom, un nom, un nom d'utilisateur unique, une adresse e-mail, un mot de passe haché, un chemin vers son avatar, et une indication s'il est administrateur ou non.

Les tables sont interconnectées par des clés étrangères pour établir des relations entre les données. Par exemple, l'`author_id` dans la table `articles` est une clé étrangère qui fait référence à l'`id` de la table `users`, indiquant ainsi l'auteur de l'article.

## Auteurs

- [Zoldik_Blog](https://github.com/Youcode-Classe-E-2023-2024/Zoldik_Blog)
