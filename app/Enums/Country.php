<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Country: string implements HasLabel, HasColor
{
    case ECUADOR = 'Ecuador';
    case COLOMBIA = 'Colombia';
    case PERU = 'Perú';
    case USA = 'Estados Unidos';
    case GERMANY = 'Alemania';
    case CHINA = 'China';

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $country) => [
                $country->value => $country->getLabel(),
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
            self::COLOMBIA => 'warning',
            self::ECUADOR => 'success',
            self::PERU => 'info',
            self::USA => 'primary',
            self::GERMANY => 'gray',
            self::CHINA => 'danger',
        };
    }
}
