<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;
    
    
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

   protected function afterCreate()
   {
    $this->notify('success', 'Client added successfully', true );
   }
}
