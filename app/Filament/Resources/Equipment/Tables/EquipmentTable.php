<?php

namespace App\Filament\Resources\Equipment\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EquipmentTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial_number')
                    ->searchable(),
                TextColumn::make('purchase_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('warranty_until')
                    ->date()
                    ->sortable(),
                TextColumn::make('last_calibration')
                    ->date()
                    ->sortable(),

                // TextColumn::make('photo')
                // ->searchable(),

                ImageColumn::make('photo')
                    //->circular()
                    ->square()
                    ->stacked()
                    ->ring(5),

                // TextColumn::make('model_id')
                //     ->numeric()
                //     ->sortable(),

                TextColumn::make('deviceModel.name')
                    ->searchable(),

                TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('manual_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
