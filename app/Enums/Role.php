<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasLabel, HasColor
{
    case ADMIN = 'admin';
    case USER = 'user';
    case GUEST = 'guest';

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $role) => [
                $role->value => $role->getLabel(),
            ])
            ->toArray();
    }

    public function getLabel(): ?string
    {
        return $this->value;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ADMIN => 'warning',
            self::USER => 'success',
            self::GUEST => 'info',
        };
    }
}
