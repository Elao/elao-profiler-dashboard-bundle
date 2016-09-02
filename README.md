# Elao Profiler Dashboard Bundle

## What is it?

This bundle compile metrics (request info, performance metrics, db queries, etc.) of last requests (from the Symfony Profiler) into one view.

## Installation

### Symfony >= 2.7

Require the bundle in _Composer_:

```bash
$ composer require elao/profiler-dashboard-bundle
```

Install the bundle in your _AppKernel_:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    // ...

    if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
        // ...
        $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();

        // Elao Profiler Dashboard
        $bundles[] = new Bundles\ElaoProfilerDashboardBundle\ElaoProfilerDashboardBundle();
    }
}
```

Import the rounting in your `routing_dev.yml` configuration file:

```yml
// app/config/routing_dev.yml
_elao_profiler_dashboard:
    resource: "@ElaoProfilerDashboardBundle"
    type:     annotation
    prefix:   /_profiler_dashboard
```
