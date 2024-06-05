<?php

namespace App\Models\Entity;

class Organization {

    /**
     * ID da organização.
     * @var int
     */
    public int $id = 1;

    /**
     * Nome da organização.
     * @var string
     */
    public string $name = 'OctopusFx';

    /**
     * Descrição da organização.
     * @var string
     */
    public string $description = 'Pequena descrição da organização';
}