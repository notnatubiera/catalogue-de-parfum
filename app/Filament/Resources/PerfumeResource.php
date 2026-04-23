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
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\CheckboxList;
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
                Section::make('Core Information')->schema([
                    TextInput::make('name')->required(),
                    Forms\Components\Select::make('brand_id')
                        ->relationship('brand', 'name')
                        ->required(),

                    Textarea::make('description')
                        ->label('Universal Description')
                        ->rows(3)
                        ->helperText('This text appears on both the homepage carousel and the fragrance profile.')
                        ->required(),

                    FileUpload::make('image')
                        ->label('Bottle Image (Grid/Profile)')
                        ->image()
                        ->directory('fragrances')
                        ->required()
                        ->disk('public') // Explicitly tell it to use the public disk
                        ->visibility('public')
                        ->preserveFilenames(),
                    TextInput::make('price')
                        ->placeholder('e.g. $$$$')
                        ->label('Price Range')
                        ->required(),

                    Select::make('longevity')
                        ->options([
                            'Weak' => 'Weak',
                            'Moderate' => 'Moderate',
                            'Long Lasting' => 'Long Lasting',
                            'Very Long Lasting' => 'Very Long Lasting',
                        ])
                        ->required(),

                    Select::make('sillage')
                        ->options([
                            'Intimate' => 'Intimate',
                            'Moderate' => 'Moderate',
                            'Strong' => 'Strong',
                            'Enormous' => 'Enormous',
                        ])
                        ->required(),

                    Forms\Components\Select::make('seasons')
                        ->relationship('seasons', 'name')
                        ->multiple()
                        ->preload()
                        ->native(false)
                        ->required(),
                    Forms\Components\Select::make('occasions')
                        ->relationship('occasions', 'name')->multiple()
                        ->preload()
                        ->native(false)
                        ->required(),

                    // Gender as a simple dropdown inside this resource
                    Select::make('gender')
                        ->options([
                            'Masculine' => 'Masculine',
                            'Feminine' => 'Feminine',
                            'Unisex' => 'Unisex',
                        ])->required(),

                    CheckboxList::make('time_of_day')
                        ->label('Best Time to Wear')
                        ->options([
                            'day' => 'Day',
                            'night' => 'Night',
                        ])
                        ->required()
                        ->columns(2),

                    // Universal Description for both Carousel and Profile

                ]),

                Section::make('Featured Fragrance Carousel')->schema([
                    // Feature Toggle for the Carousel
                    Toggle::make('is_featured')
                        ->label('Feature in Homepage Carousel')
                        ->helperText('If enabled, this fragrance can appear in the hero section.'),

                    FileUpload::make('hero_image')
                        ->label('Hero Background (Carousel Only)')
                        ->image()
                        ->directory('hero-images')
                        ->helperText('Upload a landscape image for the homepage hero section.')
                        ->disk('public') // Explicitly tell it to use the public disk
                        ->visibility('public')
                        ->preserveFilenames(),
                ])->columns(2),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
