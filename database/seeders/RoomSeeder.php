<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $roomTypes = [
            [
                'type' => 'Standard Room', 
                'base_number' => 100, 
                'price' => 150,
                'quantity' => 4,
                'room_numbers' => [1, 2, 3, 4] 
            ],
            [
                'type' => 'Presidential Suite',
                'base_number' => 200, 
                'price' => 800,
                'quantity' => 4,
                'room_numbers' => [1, 2, 3, 4] 
            ],
            [
                'type' => 'One Bedroom Suite',
                'base_number' => 300, 
                'price' => 350,
                'quantity' => 4,
                'room_numbers' => [1, 2, 3, 4] 
            ],
            [
                'type' => 'Two Bedroom Suite',
                'base_number' => 400, 
                'price' => 500,
                'quantity' => 4,
                'room_numbers' => [1, 2, 3, 4] 
            ]
        ];

        foreach ($roomTypes as $type) {
            foreach ($type['room_numbers'] as $roomNumber) {
                Room::create([
                    'RoomNumber' => $type['base_number'] + $roomNumber, 
                    'Type' => $type['type'] . ' ' . $roomNumber, 
                    'Price' => $type['price'],
                    'Status' => 'available'
                ]);
            }
        }
    }
}

