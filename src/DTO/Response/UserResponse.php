<?php
// src/DTO/Response/UserResponse.php
namespace App\DTO\Response;


class UserResponse implements \JsonSerializable
{
    private ?int $id = null;

    private ?string $name = null;

    private ?bool $is_active = null;

    // Getters and Setters

    public function setId(?int $id): void
    {
        $this->id =$id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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
    
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'is_active' => $this->getIsActive(),
        ];
    }

}
