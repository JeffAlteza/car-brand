<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers\TagsRelationManager;
use App\Models\Tag;
use App\Models\User;
use Domain\Car\Models\Car;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nuhel\FilamentCropper\Components\Cropper;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Manage';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('price')
                        ->required(),
                    Textarea::make('description')
                        ->columnSpan('full')
                        ->required(),
                ])
                    ->columnSpan(['lg' => 2]),

                Group::make([
                    Section::make('Tags')
                        ->schema([
                            Select::make('tags')
                                ->multiple()
                                ->preload()
                                ->relationship('tags', 'name')
                        ])
                ])->columnSpan(['lg' => 1]),
                // Section::make(trans('Belongs to'))
                //     ->schema([
                        
                        // MorphToSelect::make('cars')
                        //     ->label('Relationships')
                        //     ->types([
                        //         MorphToSelect\Type::make(Brand::class)->titleColumnName('name'),
                        //         // MorphToSelect\Type::make(User::class)->titleColumnName('name'),
                        //     ])
                        //     ->required()
                    // ])
                    // ->columnSpan(['lg' => 1]),
                Section::make(trans('Upload Image'))
                    ->schema([
                        Cropper::make('image')
                            ->enableDownload()
                            ->enableOpen()
                            ->enableImageRotation()
                            ->enableImageFlipping()
                            ->modalSize('xl')
                            ->enabledAspectRatios([
                                '2:3', '9:16', '5:5'
                            ])
                            ->enableAspectRatioFreeMode(),
                    ])
                    ->columnSpan(['lg' => 1]),


            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    ImageColumn::make('image')->circular()->grow(false),
                    Tables\Columns\TextColumn::make('name'),
                    Panel::make([
                        // Stack::make([
                        Tables\Columns\TextColumn::make('description')
                            ->limit(20),
                        Tables\Columns\TextColumn::make('price'),
                        // Tables\Columns\TextColumn::make('brand.name'),
                        // ])
                    ])->collapsible()
                ])->from('sm')
            ])
            ->defaultSort('name', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    // public static function getRelations(): array
    // {
    //     return [
    //         TagsRelationManager::class,
    //     ];
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
