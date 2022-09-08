<?php

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
   

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // $data['image'] = [Str::uuid() => 'storage/app/public'];
        $data['amount'] = $data['amount'] * 100;
        return $data;
    }

}
