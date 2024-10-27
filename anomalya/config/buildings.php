<?php

return [
    'resource_buildings' => [
        'lumber_mill' => [
            'cost' => ['wood' => 100, 'stone' => 50, 'gold' => 20],
            'production_rate' => 10,
        ],
        'stone_quarry' => [
            'cost' => ['wood' => 50, 'stone' => 100, 'gold' => 20],
            'production_rate' => 10,
        ],
        'farm' => [
            'cost' => ['wood' => 50, 'stone' => 50, 'gold' => 20],
            'production_rate' => 20,
        ],
    ],
    'military_buildings' => [
        'barracks' => [
            'cost' => ['wood' => 200, 'stone' => 150, 'gold' => 50],
            'capacity' => 50,
        ],
        'stable' => [
            'cost' => ['wood' => 150, 'stone' => 100, 'gold' => 75],
            'capacity' => 30,
        ],
    ],
];
