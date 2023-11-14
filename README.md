# Sauce Social Media Marketing: Magento Extension 

See our User Guide here: https://help.addsauce.com/en/articles/8540371-user-guide-for-the-sauce-magento-extension-for-live-links

## Features 

* Provides Sauce configuration data for Magento integration. 
* Adds custom API endpoint @ `/rest/v1/sauce/products` which provides a custom
  feed for our hotspots feature. The feed is set with a custom permission.
* We add a link to `Content > Sauce Social Media Marketing > Media Library`. 
  Currently this redirects to [our platform](https://app.addsauce.com/backoffice/media/added).

## Install via composer (recommend)

```
composer require sauce/app
php bin/magento maintenance:enable
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento maintenance:disable
php bin/magento cache:clean
```


## License 

Copyright © 2023 Sauce. All rights reserved.
