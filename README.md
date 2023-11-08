# Sauce Magento Extension 

Our own special Magento Application

```
  __      _
o'')}____//
 `_/      )
 (_(_/-(_/

```

## Features 

* Provides Sauce configuration options for Magento integrations. *If you
  intend to test (see below) the appication in different environments, be mindful of the
  values set in `./etc/integrations/config.xml`*
* Adds a new endpoint at `/rest/v1/products/sauce` which provides a custom feed
  for our hotspots feature.
* Adds a custom permission which our endpoint sits behind.
* Returns the version number in the custom endpoint, so you can ascertain what
  version of the application the client has installed.
* Adds a set of Links in `Marketing > Add Sauce Social > Connection Status /
  Media Library`. Currently these links redirect the user to [our platform](https://github.con/supadupa/sauce)] 
  rather than render anything within Magento.

## Before updating, please read first

[Semver](https://semver.org)


## How to test 

TODO: write this section when you know


## Ratonale for Repo 

App is an submodule of [sauce magento](https://github.com/supadupa/sauce-magento) - We can develop in Magento and manage releases independently. Haivng as a seperate repo/module allows us to test composer installation using VCS while also allowing us to develop within Magento.
