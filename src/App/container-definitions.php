<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Container, Database};
use App\Config\Paths;
use App\Services\{
  ValidatorService,
  UserService,
  TransactionService,
  DateService,
  SettingsService
};

return [
  TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
  ValidatorService::class => fn () => new ValidatorService(),
  DateService::class => fn () => new DateService(),
  Database::class => fn () => new Database($_ENV['DB_DRIVER'], [
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_NAME']
  ], $_ENV['DB_USER'], $_ENV['DB_PASS']),
  UserService::class => function (Container $container) {
    $db =  $container->get(Database::class);

    return new UserService($db);
  },
  TransactionService::class => function (Container $container) {
    $db =  $container->get(Database::class);

    return new TransactionService($db);
  },
  
  SettingsService::class => function (Container $container) {
    $db =  $container->get(Database::class);

    return new SettingsService($db);
  },

];
