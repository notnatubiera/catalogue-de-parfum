<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerfumeResource\Pages;
use App\Filament\Resources\PerfumeResource\RelationManagers;
use App\Models\Perfume;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerfumeResource extends Resource
{
    protected static ?string $model = Perfume::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Standard Text Input
                Forms\Components\TextInput::make('name')
                    ->required(),

                // Select Dropdown for the Brand
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),

                // Multi-select for the Pivot Tables (Seasons & Occasions)
                Forms\Components\Select::make('seasons')
                    ->relationship('seasons', 'name')->multiple(),

                Forms\Components\Select::make('occasions')
                    ->relationship('occasions', 'name')->multiple(),


                Forms\Components\Repeater::make('sizes')
                    ->schema([
                        Forms\Components\TextInput::make('ml')
                            ->numeric()
                            ->suffix('ml')
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->prefix('₱') // Or your currency
                            ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('price_range') // Note the name change
                ->label('Price Range')
                    ->getStateUsing(function ($record) {
                        // We pull the data directly from the model record
                        $sizes = $record->sizes;

                        if (empty($sizes)) return 'N/A';

                        // Ensure it's an array (handles the string ghost)
                        $array = is_string($sizes) ? json_decode($sizes, true) : $sizes;

                        $prices = collect($array)
                            ->pluck('price')
                            ->filter()
                            ->map(fn($p) => (float)$p)
                            ->sort();

                        if ($prices->isEmpty()) return 'N/A';

                        $min = $prices->first();
                        $max = $prices->last();

                        return $min === $max
                            ? '₱' . number_format($min)
                            : '₱' . number_format($min) . ' - ₱' . number_format($max);
                    }),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand')
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPerfumes::route('/'),
            'create' => Pages\CreatePerfume::route('/create'),
            'edit' => Pages\EditPerfume::route('/{record}/edit'),
        ];
    }
}
