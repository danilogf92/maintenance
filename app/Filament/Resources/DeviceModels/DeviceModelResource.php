<?php

namespace App\Filament\Resources\DeviceModels;

use App\Filament\Resources\DeviceModels\Pages\CreateDeviceModel;
use App\Filament\Resources\DeviceModels\Pages\EditDeviceModel;
use App\Filament\Resources\DeviceModels\Pages\ListDeviceModels;
use App\Filament\Resources\DeviceModels\Schemas\DeviceModelForm;
use App\Filament\Resources\DeviceModels\Tables\DeviceModelsTable;
use App\Models\DeviceModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DeviceModelResource extends Resource
{
    protected static ?string $model = DeviceModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleGroup;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return __('resource.navigation.group.equipment');
    }

    public static function form(Schema $schema): Schema
    {
        return DeviceModelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DeviceModelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDeviceModels::route('/'),
            'create' => CreateDeviceModel::route('/create'),
            'edit' => EditDeviceModel::route('/{record}/edit'),
        ];
    }
}
