Minimal project showing collection update issue with Propel2.
=============

In our simple schema, a parent object, `Auteur` (author) possesses a collection of children `Livre` (book) objects. We use a Symfony form to create the `Auteur` with a collection of `Livres` objects. In this case, the `Auteur` and `Livres` are correctly persisted in the database.

However, **when we update the Auteur object without touching the collection of Livres, the collection is emptied**.

We could not determine whether this was *a bug in Propel2* (or less probably Symfony2) or if we are doing things incorrectly. The same code (somewhat adapted to Propel1) works without a problem.

We have published this minimal project to show the problem. To test it with *Propel2*, please do:

    git clone https://github.com/spyrit/MinimalS2P2.git
    cf MinimalS2P2
    composer install
    app/console propel:build

To test it with *Propel1*, change to the `propel1` branch:

    git checkout propel1
    composer install
    app/console propel:build