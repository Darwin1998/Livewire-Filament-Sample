<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClient extends ViewRecord
{
    protected static string $resource = ClientResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // $data['image'] = [\Illuminate\Support\Str::uuid() => 'storage/app/public'];
        $data['amount'] = $data['amount'] / 100;
        return $data;
       
    
    }    

}
