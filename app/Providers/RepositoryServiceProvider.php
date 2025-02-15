<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $path = app_path('Repositories');
        $files = scandir($path);
        $repositories = [];

        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || !str_ends_with($file, '.php')) {
                continue;
            }

            $className = 'App\Repositories\\' . pathinfo($file, PATHINFO_FILENAME);

            if (class_exists($className)) {
                $reflection = new ReflectionClass($className);
                $interfaces = $reflection->getInterfaceNames();

                foreach ($interfaces as $interface) {
                    if (str_contains($interface, 'RepositoryInterface')) {
                        if (!isset($repositories[$interface])) {
                            $repositories[$interface] = $className;
                        }
                    }
                }
            }
        }

        foreach ($repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }

    public function boot(): void
    {
        //
    }
}
