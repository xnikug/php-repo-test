<?php
// src/DTO/Request/UserRequest.php
namespace App\DTO\Request;


class UserRequest
{
    private ?string $name = null;

    private ?bool $is_active = null;

    // Getters and Setters

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(?bool $is_active): void
    {
        $this->is_active = $is_active;
    }


}
