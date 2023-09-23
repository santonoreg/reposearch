<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('payment_type_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('beneficiary_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('envelope_code')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('envelope_code_year')
                    ->required()
                    ->maxLength(7),
                Forms\Components\TextInput::make('file_code')
                    ->required()
                    ->maxLength(11),
                Forms\Components\TextInput::make('payment_code')
                    ->required()
                    ->maxLength(11),
                Forms\Components\TextInput::make('relative_files')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(500),
                Forms\Components\TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('deductions')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('payment_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('payment_type.type')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('beneficiary.beneficiary')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('envelope_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('envelope_code_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('relative_files')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deductions')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
