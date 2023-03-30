<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Repository\TodoRepository;

class TodoUpdateProcessor implements ProcessorInterface {
  public function __construct(
      private TodoRepository $repository,
  ) {
  }

  public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void {
    $todo = $this->repository->find($uriVariables['id']);

    $todo->setText($data->text);
    $todo->setDone($data->done);

    $this->repository->update($todo, true);
  }
}
