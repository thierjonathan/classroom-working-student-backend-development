<?php
declare(strict_types=1);

namespace App\Interfaces;

/**
 * Interface Resettable
 * Contract for user that support password resets.
 */
interface Resettable
{
    public function resetPassword(): void;
}