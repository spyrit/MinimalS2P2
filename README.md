Minimal project with Symfony2 and Propel2.
=============

In our simple schema, a parent object, `Auteur` (author) possesses a collection of children `Livre` (book) objects. We use a Symfony form to create the `Auteur` with a collection of `Livres` objects. In this case, the `Auteur` and `Livres` are correctly persisted in the database.

To test this project with *Propel2*, please do:

    git clone https://github.com/spyrit/MinimalS2P2.git
    cf MinimalS2P2
    composer install
    app/console propel:build

To test it with *Propel1*, change to the `propel1` branch:

    git checkout propel1
    composer install
    app/console propel:build

This project was initially created to reveal a bug with Propel2 and [explain it on StackOverflow](http://stackoverflow.com/questions/31874487/propel2-collections-disappear-on-update). This bug was [fixed and merged](https://github.com/propelorm/Propel2/pull/1027).
