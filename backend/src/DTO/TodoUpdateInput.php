<?php

namespace App\DTO;

class TodoUpdateInput {
  public ?string $text = NULL;
  public ?bool $done = NULL;
}