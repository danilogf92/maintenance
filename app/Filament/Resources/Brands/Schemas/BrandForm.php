<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Enums\Country;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables\Columns\IconColumn;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        $slug = Str::slug($state);
                        $set('slug', $slug);
                    }),


                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                Select::make('country')
                    ->options(Country::options())
                    ->required()
                    ->searchable(),

                TextInput::make('link')
                    ->default(null)
                    ->prefix('https://')
                    ->suffix('.com'),
                TextInput::make('support_email')
                    ->email()
                    ->default(null),
                TextInput::make('warranty_phone')
                    ->default(null)
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),

                FileUpload::make('photo')
                    ->label('photo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('brands/photos')
                    ->maxSize(2048)
                    ->helperText('Max 2MB. Recommended: 1200x630px'),

                // Toggle::make('is_active')
                //     ->onIcon('heroicon-m-check')
                //     ->offIcon('heroicon-m-x-mark')
                //     ->inline(false)
                //     ->default(true),

                Toggle::make('is_active')
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(true),

                // FileUpload::make('photo')
                //     ->image()
                //     ->disk('public')
                //     ->directory('brands/photos'),

                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull()
                    ->extraInputAttributes([
                        'style' => 'min-height: 300px;',
                    ]),
            ]);
    }
}
