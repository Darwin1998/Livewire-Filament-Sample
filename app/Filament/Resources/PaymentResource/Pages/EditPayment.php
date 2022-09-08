<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayment extends EditRecord
{
    
    
    
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    
    protected static string $resource = PaymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
   

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // $data['image'] = [\Illuminate\Support\Str::uuid() => 'storage/app/public'];
        $data['amount'] = $data['amount'] * 100;
        return $data;
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // $data['image'] = [\Illuminate\Support\Str::uuid() => 'storage/app/public'];
        $data['amount'] = $data['amount'] / 100;
        return $data;
       
    
    }    
}
