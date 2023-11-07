# IMPORTANT
## Before updating, please read first

[https://semver.org/](given we start with version number: 0.0.1)

### making a MAJOR version change to 1.0.0

* change  `./etc/webapi.xml` 

```
<route url="/sauce/v0/products" method="GET">
```
to:

```
<route url="/sauce/v1/products" method="GET">
```

* update `composer.json`.

### making a MINOR version change to 0.1.0

* update `composer.json`    

### making a PATCH version change to 0.0.1

* update `composer.json` 

# Ratonale for Repo 

App is an submodule of [sauce magento](https://github.com/supadupa/sauce-magento) - We can develop in Magento and manage releases independently. Haivng as a seperate repo/module allows us to test composer installation using VCS while also allowing us to develop within Magento.
