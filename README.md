# Sauce Magento Extension 

```
  __      _
o'')}____//
 `_/      )
 (_(_/-(_/

```


## Features 

* adds a new endpoint at `/rest/v1/products/sauce` which provides a custom feed
  for our hotspots feature 
* returns the version number in the custom endpoint, so you can ascertain what
  version of the application the client has installed.
* Adds a set of Links in Marketing > Add Sauce Social > Connection Status /
  Media Library. Currently these links redirect the user to our platform.

## Before updating, please read first

[Semver](https://semver.org)


## Ratonale for Repo 

App is an submodule of [sauce magento](https://github.com/supadupa/sauce-magento) - We can develop in Magento and manage releases independently. Haivng as a seperate repo/module allows us to test composer installation using VCS while also allowing us to develop within Magento.
