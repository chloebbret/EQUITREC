## Liste des routes

 - Route connexion
```
/public/connexion
```
- Route accueil
```
/public/accueil
```
- Route contact
```
/public/contact
```
- Route info compétition
```
/public/infos/competition
```
- Route classement
```
/public/classement
```

## Comment utiliser les sessions

Pour récupérer l'entité stockée dans la session,
il vous faut convertir le json stockée dans la session
nommée 'user'

Comment exploiter les sessions dans mon controller :
```php
    // Voici ma route actuellement sans support pour les sessions
    #[Route('/ma_route', name: 'ma_route')]
    public function MaRoute(Request $request)

    // Pour ajouter le support des sessions il faut
    // ajouter SessionInterface $session aux paramètres de la fonction
    #[Route('/ma_route', name: 'ma_route')]
    public function MaRoute(Request $request, SessionInterface $session)

    // En ce qui concerne la récupération de 'user' voici comment procéder :
    {
        $user = $session->get('user');
        
        // On veux récupérer le prénom du user on fait donc comme ceci :
        $prénom = $user['prenom_user'];
    }
```

Comment exploiter les sessions dans une template twig :
```html

    <!--- Récupération de la session pour 'user' --->
    {% if app.session.has('user') %}
    {% set user = app.session.get('user') %}
    <p>Bienvenue, {{ user['first_name'] }} {{ user['last_name'] }} !</p>
    {% else %}
    <p>Vous n'êtes pas connecté !</p>
    {% endif %}

    <!--- Les différentes variables d'user sont  --->

```

## Documentation

 - <a href="https://bulma.io/documentation">Bulma CSS</a>