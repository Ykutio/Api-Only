<?php

namespace App\Services\Product\DTO;

class ProductApiDTO
{
    public function __construct(
        private readonly ?int $perPage = null,
        private readonly ?int $offset = null,
        private readonly ?string $sortField = null,
        private readonly ?string $sortOrder = null,
    ) {
    }

    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }
}
