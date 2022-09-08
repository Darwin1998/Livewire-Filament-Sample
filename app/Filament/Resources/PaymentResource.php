<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;

use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class PaymentResource extends Resource
{

    
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        
       
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('client_id')
                        ->relationship('client', 'full_name')
                        ->required(),
                    
                    TextInput::make('received_by')->required(),
                    TextInput::make('amount')->numeric()->required(),
                    TextInput::make('payment_mode')->required(),
                    Select::make('status')->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid'
                    ])->required(),
                    DatePicker::make('date')->required(),
                    
                  
                        
                    
                ])->columns(2)
            ]);
    }
    
    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.full_name'),
                TextColumn::make('amount')->money('php'),
                TextColumn::make('date')->date('F j, Y'),
                TextColumn::make('status'),
            ])
            ->filters([
                SelectFilter::make('status')
                            ->options([
                                'paid' => 'Paid',
                                'unpaid' => 'Unpaid',]),
                SelectFilter::make('date')
                ->options([
                    'paid' => 'Paid',
                    'unpaid' => 'Unpaid',])->column('address'),
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until')
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button()->color('success'),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
            
        ];
    } 
    
}
