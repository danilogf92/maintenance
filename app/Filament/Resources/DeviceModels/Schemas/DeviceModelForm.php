<?php

namespace App\Filament\Resources\DeviceModels\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DeviceModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('expected_lifespan')
                    ->required()
                    ->numeric(),

                Select::make('brand_id')
                    ->relationship('brand', 'name', fn($query) => $query->active())
                    ->required(),
            ]);
    }
}
