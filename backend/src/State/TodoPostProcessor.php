<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Todo;

class TodoPostProcessor implements ProcessorInterface {
  public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Todo {
    $todo = new Todo();
    $todo->setText($data->text);
    $todo->setDone(false);

    return $todo;
  }
}
