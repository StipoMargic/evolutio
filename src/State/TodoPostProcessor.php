<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Todo;
use App\Repository\TodoRepository;

class TodoPostProcessor implements ProcessorInterface {
  public function __construct(
      private TodoRepository $todoRepository,
  ) {
  }

  public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): Todo {
    $todo = new Todo();
    $todo->setText($data->text);
    $todo->setDone(false);
    $this->todoRepository->save($todo, true);

    return $todo;
  }
}
