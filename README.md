# LBExclusiveCars
## Environement de développement
### Pré-requis
 * PHP 8.0
 * Composer
 * Symfony CLI
 * Docker
 * Docker-composer
 * Yarn

 Il est possible de vérifier les pré-requis à l'aide de la commande :

 ```bash
symfony check:requirements
 ``` 
### Lancer l'environement de développement
```bash
docker-composer up -d
yarn install
yarn build
symfony serve -d
```