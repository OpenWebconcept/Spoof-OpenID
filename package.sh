#!/bin/bash 

## Remove old packages
rm -rf ./releases
mkdir -p ./releases

# Copy current dir to tmp
rsync \
    -ua \
    --exclude='vendor/*' \
    --exclude='releases/*' \
    . ./releases/owc-spoof-openid/

# Remove current vendor folder (if any) 
# and install the dependencies without dev packages.
cd ./releases/owc-spoof-openid || exit
rm -rf ./vendor/
composer install -o --no-dev

# Remove unneeded files in a WordPress plugin
rm -rf ./.git ./composer.json ./composer.lock ./package.sh \
    ./.vscode ./workspace.code-workspace ./bitbucket-pipelines.yml \
    ./.phplint-cache ./.phpunit.result.cache ./.editorconfig ./.eslintignore \
    ./.eslintrc.json ./.gitignore ./phpunit.xml.dist ./psalm.xml ./releases \
    ./babel.config.json ./package.json ./package-lock.json ./tests ./assets/src \
    ./DOCKER_ENV ./docker_tag ./output.log ./.github
    
cd ../

# Create a zip file from the optimized plugin folder
zip -rq owc-spoof-openid.zip ./owc-spoof-openid
rm -rf ./owc-spoof-openid

echo "Zip completed @ $(pwd)/owc-spoof-openid.zip"
