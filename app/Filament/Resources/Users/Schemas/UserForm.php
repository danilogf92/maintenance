<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Role;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),

                Select::make('role')
                    ->options(Role::options())
                    ->required()
                    ->default(Role::USER->value)
                    ->searchable(),

                Toggle::make('is_active')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(true),

                // DateTimePicker::make('email_verified_at'),
                // TextInput::make('password')
                //     ->password()
                //     ->required(),
                // Textarea::make('two_factor_secret')
                //     ->default(null)
                //     ->columnSpanFull(),
                // Textarea::make('two_factor_recovery_codes')
                //     ->default(null)
                //     ->columnSpanFull(),
                // DateTimePicker::make('two_factor_confirmed_at'),
            ]);
    }
}
