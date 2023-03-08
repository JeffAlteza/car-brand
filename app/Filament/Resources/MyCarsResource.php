<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyCarsResource\Pages;
use App\Filament\Resources\MyCarsResource\RelationManagers;
use App\Models\Car;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MyCarsResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $slug = 'my-cars';

    protected static ?string $navigationLabel = 'My Cars';

    protected static ?string $title = 'My Cars';

    protected static ?string $navigationGroup = 'Personal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular()->grow(false),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description')
                    ->limit(20),
                Tables\Columns\TextColumn::make('price'),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMyCars::route('/'),
            // 'create' => Pages\CreateMyCars::route('/create'),
            // 'edit' => Pages\EditMyCars::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()
    //         ->with('users')
    //         // ->where('carable_id', Auth::id())
    //         ->where('carable_type', User::class);

    //     return parent::getEloquentQuery()->withoutGlobalScopes();
    // }
}
