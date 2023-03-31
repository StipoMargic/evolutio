<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController {
  public function __construct(
      private TodoRepository $todoRepository
  ) {
  }

  #[Route('/api/todos', methods: ['POST'])]
  public function create(Request $request): JsonResponse {
    $data = json_decode($request->getContent(), true);
    $todo = new Todo();
    $todo->setText($data['text']);
    $todo->setDone(false);
    $this->todoRepository->save($todo, true);
    return $this->json($this->serializeTodo($todo));
  }

  #[Route('/api/todos', methods: ['GET'])]
  public function index() {
    $todos = $this->todoRepository->findAll();

    $serializedTodos = [];
    foreach ($todos as $todo) {
      $serializedTodos[] = $this->serializeTodo($todo);
    }
    return $this->json($serializedTodos);
  }

  #[Route('/api/todos/{id}', methods: ['GET'])]
  public function show(string $id): JsonResponse {
    $todo = $this->todoRepository->find($id);
    if (!$todo) {
      return $this->json(['error' => 'Todo not found'], 404);
    }
    return $this->json($this->serializeTodo($todo));
  }

  #[Route('/api/todos/{id}', methods: ['PUT'])]
  public function update(string $id, Request $request): JsonResponse {
    $todo = $this->todoRepository->find($id);
    if (!$todo) {
      return $this->json(['error' => 'Todo not found'], 404);
    }
    $data = json_decode($request->getContent(), true);
    $todo->setText($data['text']);
    $todo->setDone($data['done']);
    $todo->setUpdatedAt(new \DateTimeImmutable());
    $this->todoRepository->save($todo, true);
    return $this->json($this->serializeTodo($todo));
  }
  private function serializeTodo(Todo $todo): array {
    return [
      'id' => $todo->getId(),
      'text' => $todo->getText(),
      'done' => $todo->isDone(),
      'createdAt' => $todo->getCreatedAt()->format('Y-m-d H:i:s'),
    'updatedAt' => $todo->getUpdatedAt()?->format('Y-m-d H:i:s'),
    ];
  }
}
