<?php

$patterns = [
    'id' => '[0-9A-Z]{26}',
];

$router->delete(
    "/event/delete/{id:{$patterns['id']}}",
    [
        'uses' => 'EventDeleteController@process',
    ]
);

$router->get(
    '/event/dead_list',
    [
        'uses' => 'EventDeadListController@process',
        'validator' => 'App\Domains\Event\Http\Validators\EventDeadListValidator',
        'parameters' => 'App\Domains\Event\Http\Parameters\EventParameters',
        'filters' => 'App\Domains\Event\Http\Filters\EventFilters',
    ]
);

$router->get(
    '/event/list',
    [
        'uses' => 'EventListController@process',
        'validator' => 'App\Domains\Event\Http\Validators\EventListValidator',
        'parameters' => 'App\Domains\Event\Http\Parameters\EventParameters',
        'filters' => 'App\Domains\Event\Http\Filters\EventFilters',
    ]
);

$router->get(
    "/event/dead_detail/{id:{$patterns['id']}}",
    [
        'uses' => 'EventDeadDetailController@process',
    ]
);

$router->get(
    "/event/detail/{id:{$patterns['id']}}",
    [
        'uses' => 'EventDetailController@process',
    ]
);

$router->patch(
    "/event/edit/{id:{$patterns['id']}}",
    [
        'uses' => 'EventEditController@process',
        'validator' => 'App\Domains\Event\Http\Validators\EventEditValidator',
    ]
);

$router->post(
    '/event/add',
    [
        'uses' => 'EventAddController@process',
        'validator' => 'App\Domains\Event\Http\Validators\EventAddValidator',
    ]
);

$router->post(
    '/event/bulk',
    [
        'uses' => 'EventBulkController@process',
        'validator' => 'App\Domains\Event\Http\Validators\EventBulkValidator',
        'parameters' => 'App\Domains\Event\Http\Parameters\EventParameters',
    ]
);
