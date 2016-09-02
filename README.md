# Elao Profiler Dashboard Bundle

## What is it?

This bundle compile metrics (request info, performance metrics, db queries, etc.) of last requests (from the Symfony Profiler) into one view.

## Installation

### Symfony >= 2.7

Add repository to composer
```json
"repositories": [
    {
        "url": "https://github.com/Elao/elao-profiler-dashboard-bundle.git",
        "type": "git"
    }
],
```

Require the bundle in _Composer_:

```bash
$ composer require elao/profiler-dashboard-bundle dev-master@dev
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
        $bundles[] = new Elao\Bundle\ProfilerDashboardBundle\ElaoProfilerDashboardBundle();
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

Go on http://app.domain.dev/app_dev.php/_profiler_dashboard/metrics
