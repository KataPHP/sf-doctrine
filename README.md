kata Doctrine
====

Goals
-----

* Create Entities with assertion
* Handling relationship between entities
* Handling Fixtures to generate dev datas

Installation
------------

```bash
$ docker-compose up -d
$ bin/console doctrine:database:create --if-not-exists
$ bin/console doctrine:schema:update --force
$ bin/console doctrine:fixtures:load
```

Instructions
------------

- Create a new symfony project
- Add [DoctrineFixturesBundle]
- Add [Faker] librairie
- Create Entities (with annotation : [Assert], [Doctrine])
- Create Ordered Fixtures


[Assert]: http://symfony.com/doc/current/validation.html
[Doctrine]: https://symfony.com/doc/current/doctrine/associations.html
[DoctrineFixturesBundle]: http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
[Faker]: https://github.com/fzaninotto/Faker