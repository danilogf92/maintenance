<?php

namespace App\Filament\Resources\Equipment\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EquipmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('serial_number')
                    ->required(),
                DatePicker::make('purchase_date')
                    ->required(),
                DatePicker::make('warranty_until'),
                DatePicker::make('last_calibration'),

                // TextInput::make('photo')
                //     ->default(null),

                FileUpload::make('photo')
                    ->label('photo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('equipment/photos')
                    ->maxSize(2048)
                    ->helperText('Max 2MB. Recommended: 1200x630px'),

                Select::make('model_id')
                    ->relationship('deviceModel', 'name')
                    ->required(),

                TextInput::make('customer_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('manual_id')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
